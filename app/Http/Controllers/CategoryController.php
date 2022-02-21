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
        return view('category.show', [
            'category' => $category,
        ]);
    }
}
