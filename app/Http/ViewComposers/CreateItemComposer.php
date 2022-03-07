<?php

namespace App\Http\ViewComposers;

use App\Models\Payment;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Delivery;
use Illuminate\View\View;

class CreateItemComposer
{
  public function compose(View $view)
  {
    $view->with('deliveries', Delivery::all())
         ->with('payments', Payment::all())
         ->with('categories', Category::all())
         ->with('conditions', Condition::all());
  }
}