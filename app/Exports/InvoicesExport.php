<?php

namespace App\Exports;

use App\Models\Invoices;
use App\Models\invoices_details;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return Invoices::all();
        return invoices::select('invoice_number', 'invoice_Date', 'Due_date', 'product', 'Amount_collection','Amount_Commission', 'Rate_VAT', 'Value_VAT','Total', 'Status', 'Payment_Date','note')->get();


    }
    public function query()
    {
        return invoices::query();
    }
//    public function view(): View
//    {
//        return view('invoices/invoices', [
//            'invoices' => Invoice::all()
//        ]);
//    }

}
