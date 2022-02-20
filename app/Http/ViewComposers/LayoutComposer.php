<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class LayoutComposer
{
  public function compose(View $view)
  {
    $categories = Category::all();

    $view->with('categories', $categories);
  }
}