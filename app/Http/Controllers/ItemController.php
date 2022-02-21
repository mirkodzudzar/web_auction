<?php

namespace App\Http\Controllers;

use App\Events\ItemCreated;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\ItemUser;
use App\Http\Requests\StoreItem;
use App\Http\Requests\SearchRequest;
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
        $items = Item::where('status', 'active')
                     ->with('image')
                     ->withCount('bid_users')
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
        $deliveries = Delivery::all();
        $payments = Payment::all();
        $categories = Category::all();

        return view('items.create', [
            'deliveries' => $deliveries,
            'payments' => $payments,
            'categories' => $categories,
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
        $item = event(new ItemCreated($request->validated()))[0];

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

    public function search(SearchRequest $request)
    {
        if ($request->has('search')) {
            $result = $request->input('search');
            // First we are getting all ids, with(), withCount() are not awailable while searching...
            $item_ids = Item::search($result)->get()->pluck('id');

            $items = Item::whereIn('id', $item_ids)
                         ->where('status', 'active')
                         ->with('image') 
                         ->withCount('bid_users')
                         ->get();
        }

        return view('items.search', [
            'items' => $items ?? null,
            'result' => $result ?? null,
        ]);
    }
}
