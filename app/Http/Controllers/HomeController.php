<?php

namespace App\Http\Controllers;

use App\Models\Item;


class HomeController extends Controller
{
    public function index()
    {
        $items = Item::where('status', 'active')
                     ->with('user')
                     ->get();

        return view('home', [
            'items' => $items,
        ]);
    }
}
