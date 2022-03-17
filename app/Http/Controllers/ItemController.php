<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;
use App\Http\Requests\StoreItem;
use App\Http\Requests\SearchRequest;

class ItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request, ItemService $itemService)
    {
        $item = $itemService->store($request->validated());

        return redirect()->route('items.show', ['item' => $item->id])
                         ->withStatus("You have published new item!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $this->authorize($item);

        return view('items.show', [
            'item' => $item,
        ]);
    }

    public function cancelItem(Item $item)
    {
        $this->authorize($item);

        $item->status()->associate(Item::$canceled);
        $item->save();

        return back()->withStatus("You have canceled your item '{$item->name}'");
    }

    public function bid(Item $item)
    {
        $this->authorize($item);

        // Validation is not in custom request, because of $item->starting_price value.
        $rules['price'] = "required|integer|gt:{$item->starting_price}";
        $validated = request()->validate($rules);

        $item->bidUsers()->attach(auth()->id(), ['price' => $validated['price']]);

        return back()->withStatus('You have bid for this item!');
    }

    public function cancelBid(Item $item)
    {
        $this->authorize($item);

        $item->bidUsers()->updateExistingPivot(auth()->id(), ['status_id' => Item::$canceled]);

        return redirect()->back()
                         ->withStatus("You have canceled your bid for item '{$item->name}'");
    }

    public function search(SearchRequest $request)
    {
        if ($request->has('search')) {
            $result = $request->input('search');
            // First we are getting all ids, with(), withCount() are not awailable while searching...
            $itemIds = Item::search($result)->get()->pluck('id');

            $items = Item::whereIn('id', $itemIds)
                         ->withImageAndBidUsersCount()
                         ->onlyActiveItems()
                         ->get();
        }

        return view('items.search', [
            'items' => $items ?? null,
            'result' => $result ?? null,
        ]);
    }
}
