<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\InvoiceService;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function calculate(Item $item, InvoiceService $invoiceService)
    {
        $this->authorize($item);

        $invoice = $invoiceService->calculate($item);

        return $invoice->stream();
    }
}
