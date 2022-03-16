<?php

namespace App\Services;

use App\Models\Item;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Facades\Invoice as InvoiceFacade;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceService
{
    public function calculate(Item $item): Invoice
    {
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

        $sequence = $item->updated_at->format('dmY') . '00' . $item->id;
        $invoice = InvoiceFacade::make()
            ->name('Web auction invoice')
            ->series('WA')
            ->sequence($sequence)
            ->delimiter('-')
            ->date($item->updated_at)
            ->dateFormat('d.m.Y.')
            ->payUntilDays(14)
            ->seller($client)
            ->buyer($customer)
            ->currencySymbol('RSD')
            ->currencyCode('RSD')
            ->currencyDecimals(0)
            ->addItem($invoice_item);

        return $invoice;
    }
}