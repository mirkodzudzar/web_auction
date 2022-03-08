<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemUser;
use App\Http\Requests\StoreItem;
use App\Http\Requests\SearchRequest;
use App\Services\ItemService;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show', 'search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::withImageAndBidUsersCount()
                     ->onlyActiveItems()
                     ->get();

        return view('items.index', [
            'items' => $items,
        ]);
    }

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
    public function store(StoreItem $request)
    {
        $item = ItemService::store($request->validated());

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

        $item->status = 'canceled';
        $item->save();

        return redirect()->back()
                         ->withStatus("You have canceled your item '{$item->name}'");
    }

    public function bid(Item $item)
    {
        $this->authorize($item);

        // Validation is not in custom request, because of $item->starting_price value.
        $rules['price'] = "required|integer|gt:{$item->starting_price}";
        $validated = request()->validate($rules);

        $itemUser = ItemUser::make([
            'price' => $validated['price'],
        ]);

        $itemUser->item()->associate($item);
        $itemUser->user()->associate(Auth::user());

        $itemUser->save();

        return redirect()->back()
                         ->withStatus('You have bid for this item!');
    }

    public function cancelBid(Item $item)
    {
        $this->authorize($item);

        $item->bidUsers()
             ->where('user_id', Auth::user()->id)
             ->first()
             ->pivot
             ->update([
                 'status' => 'canceled',
             ]);

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
