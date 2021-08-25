<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $listInvoice = Invoice::latest()->paginate(10);
        $listInvoice->load(['user']);
        return view('admin/invoices/index', ['data' => $listInvoice]);
    }
    public function show($id)
    {
        $lstInvoice = Invoice::find($id);
        $lstInvoice->load('invoiceDetails');
        return view('admin/invoices/invoiceDetails', ['data' => $lstInvoice]);
    }
    
    public function delete($id)
    {
        Invoice::destroy($id);
        return redirect()->back();
    }
}
