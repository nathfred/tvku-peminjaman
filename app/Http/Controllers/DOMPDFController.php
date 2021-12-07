<?php

namespace App\Http\Controllers;

use App;
use PDF;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Loan;
use App\Models\LoanItem;
use Illuminate\Http\Request;

class DOMPDFController extends Controller
{
    public function createPDF($id)
    {
        $loan = Loan::where('id', $id)->first();
        // VALIDASI APAKAH LOAN ADA
        if ($loan === NULL) {
            return back()->with('message', 'loan-not-found');
        }

        $items = Item::orderBy('category', 'desc')->get();
        $loaned_items = LoanItem::where('loan_id', $id)->get();

        $pdf = PDF::loadview('loan_pdf', ['loan' => $loan]);
        return $pdf->download('Peminjaman_' . $loan->id . '_' . $loan->program . '.pdf');
    }

    function show_pdf($id)
    {
        $loan = Loan::where('id', $id)->first();
        // VALIDASI APAKAH LOAN ADA
        if ($loan === NULL) {
            return back()->with('message', 'loan-not-found');
        }

        $items = Item::orderBy('category', 'desc')->get();
        $loaned_items = LoanItem::where('loan_id', $id)->get();

        $pdf = PDF::loadview('loan_pdf', ['loan' => $loan]);
        return $pdf->stream('SPP_' . $loan->id . '_' . $loan->program . '.pdf');
    }

    public function test_pdf($id)
    {
        $loan = Loan::find($id);
        // VALIDASI APAKAH LOAN ADA
        if ($loan === NULL) {
            return back()->with('message', 'loan-not-found');
        }

        // UBAH FORMAT 'created' DATE (Y-m-d menjadi d-m-Y)
        // UBAH KE FORMAT CARBON
        $loan->created = Carbon::createFromFormat('Y-m-d', $loan->created);
        $loan->book_date = Carbon::createFromFormat('Y-m-d', $loan->book_date);
        $loan->book_time = Carbon::createFromFormat('H:i:s', $loan->book_time);
        // UBAH FORMAT KE d-m-Y
        $loan->created = $loan->created->format('d-m-Y');
        $loan->book_date = $loan->book_date->format('d-m-Y');
        $loan->book_time = $loan->book_time->format('H:i');

        // GET ALL ITEMS
        $items = Item::orderBy('category', 'asc')->get();

        // GET ALL LOANED ITEMS
        $loaned_items = LoanItem::where('loan_id', $id)->orderBy('category', 'asc')->get();

        // COUNT LOANED ITEM QUANTITY (EACH ITEMS)
        foreach ($items as $item) {
            $item->loan_quantity = LoanItem::where('loan_id', $id)->where('item_id', $item->id)->count();
            if ($item->loan_quantity == 0) {
                $item->loan_quantity = NULL; // SET TO NULL SUPAYA DI VIEWS TIDAK KELUAR ANGKA 0
            }
        }

        $pdf = PDF::loadview('loan_pdf', ['loan' => $loan, 'items' => $items]);
        return $pdf->stream('SPP_' . $loan->id . '_' . $loan->program . '.pdf');
    }
}
