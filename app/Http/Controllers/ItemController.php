<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Image;
use App\Models\ItemUser;
use App\Http\Requests\StoreItem;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $result = $request->input('search');
            $items = Item::search($result)
                         ->where('status', 'active')
                        //  ->with('image') // not availabe
                         ->get();
        } else {
            $items = Item::where('status', 'active')
                         ->with('image')
                         ->get();
        }

        return view('items.index', [
            'items' => $items,
            'result' => $result ?? null,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deliveries = Delivery::all();

        return view('items.create', [
            'deliveries' => $deliveries,
        ]);
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
        $item = $user->items()->create($validated);
        // Save deliveries for this item.
        $item->deliveries()->sync($validated['deliveries']);
        
        // Image file is optional.
        if (isset($validated['image'])) {
            $path = $validated['image']->store('images');
            $item->image()->save(
                Image::make(['path' => $path])
            );
        }

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

    public function cancel_item(Item $item)
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

        $rules['price'] = "required|integer|gt:{$item->starting_price}";
        $validated = request()->validate($rules);

        ItemUser::create([
            'item_id' => $item->id,
            'user_id' => Auth::user()->id,
            'price' => $validated['price'],
        ]);

        return redirect()->back()
                         ->withStatus('You have bidden for this item!');
    }

    public function cancel_bid(Item $item)
    {
        $this->authorize($item);
        
        $item_user = ItemUser::where('item_id', $item->id)
                             ->where('user_id', Auth::user()->id)
                             ->first();

        $item_user->status = 'canceled';
        $item_user->save();

        return redirect()->back()
                         ->withStatus("You have canceled your bid for item '{$item_user->item->name}'");
    }
}
