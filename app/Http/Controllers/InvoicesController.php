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

    public function invoice(Item $item, InvoiceService $invoiceService)
    {
        $this->authorize($item);

        $invoice = $invoiceService->invoice($item);

        return $invoice->stream();
    }
}
