<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // To have less queries.
        $items = $category->items()
                          ->with('image')
                          ->withCount('bidUsers')
                          ->onlyActiveItems()
                          ->get();

        return view('category.show', [
            'category' => $category,
            'items' => $items,
        ]);
    }
}
