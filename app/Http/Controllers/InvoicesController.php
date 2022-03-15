<?php

namespace App\Http\Controllers;

use App\Models\Item;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function calculate(Item $item)
    {
        $this->authorize($item);

        // We need to use Party (instead of Seller class, to override default config details)
        $client = new Party([
            'name'          => $item->user->full_name,
            'custom_fields' => [
                'email' => $item->user->email,
            ],
        ]);

        $customer = new Buyer([
            'name'          => $item->buyer->full_name,
            'custom_fields' => [
                'email' => $item->buyer->email,
            ],
        ]);

        $invoice_item = (new InvoiceItem())->title($item->name)
                                           ->description($item->description) // number of characters should be limited.
                                           ->pricePerUnit($item->final_price);

        $invoice = Invoice::make()
            ->series('WA')
            ->dateFormat('d.m.Y.')
            ->seller($client)
            ->buyer($customer)
            ->currencySymbol('RSD')
            ->currencyCode('RSD')
            ->currencyFraction('paras')
            ->addItem($invoice_item);

        return $invoice->stream();
    }
}
