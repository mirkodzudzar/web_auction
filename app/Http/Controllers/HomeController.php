<?php

namespace App\Http\Controllers;

use App\Models\Item;

class HomeController extends Controller
{
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

        return view('home.index', [
            'items' => $items,
        ]);
    }
}
