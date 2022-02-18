<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Http\Requests\StoreItem;
use App\Models\ItemUser;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validated();

        $user = User::findOrFail(Auth::user()->id);
        $user->items()->create($validated);

        return redirect()->back()
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

    public function cancel(Item $item)
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

        // @TODO e.g number 123 still can pass as 123.01 and be saved as 123 which is same as starting_price - not greater!
        $rules['price'] = "required|numeric|gt:{$item->starting_price}";
        $validated = request()->validate($rules);

        ItemUser::create([
            'item_id' => $item->id,
            'user_id' => Auth::user()->id,
            'price' => $validated['price'],
        ]);

        return redirect()->back()
                         ->withStatus('You have bidden for this item!');
    }
}
