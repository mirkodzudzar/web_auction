<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class LayoutComposer
{
  public function compose(View $view)
  {
    $view->with('categories', Category::all());
  }
}