<?php

namespace App\Http\Controllers;

use App;
use PDF;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Loan;
use App\Models\LoanItem;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Barryvdh\DomPDF\Facade as PDF2;
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

        $pdf = PDF2::loadview('loan_pdf', ['loan' => $loan]);
        return $pdf->download('Peminjaman_' . $loan->id . '_' . $loan->program . '.pdf');
    }

    function show_pdf($id)
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
        $loaned_items = LoanItem::where('loan_id', $id)->orderBy('category', 'asc')->orderBy('name', 'asc')->get();

        // COUNT LOANED ITEM QUANTITY (EACH ITEMS)
        foreach ($loaned_items as $item) {
            $item->loan_quantity = LoanItem::where('loan_id', $id)->where('item_id', $item->id)->count();
            if ($item->loan_quantity == 0) {
                $item->loan_quantity = NULL; // SET TO NULL SUPAYA DI VIEWS TIDAK KELUAR ANGKA 0
            }
        }

        return view('loan_pdf_non_bootstrap', [
            'loan' => $loan,
            'items' => $loaned_items,
        ]);
    }

    public function test_pdf2($id)
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
        foreach ($loaned_items as $item) {
            $item->loan_quantity = LoanItem::where('loan_id', $id)->where('item_id', $item->id)->count();
            if ($item->loan_quantity == 0) {
                $item->loan_quantity = NULL; // SET TO NULL SUPAYA DI VIEWS TIDAK KELUAR ANGKA 0
            }
        }

        $pdf = PDF2::loadview('loan_pdf3', [
            'loan' => $loan,
            'items' => $loaned_items,
        ]);

        // $pdf->set_base_path("/css/");
        return $pdf->download('SPP_' . $loan->id . '_' . $loan->program . '.pdf');
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
        // $items = Item::orderBy('category', 'asc')->get();

        // GET ALL LOANED ITEMS
        $loaned_items = LoanItem::where('loan_id', $id)->orderBy('category', 'asc')->orderBy('name', 'asc')->get();

        // COUNT LOANED ITEM QUANTITY (EACH ITEMS)
        foreach ($loaned_items as $item) {
            $item->loan_quantity = LoanItem::where('loan_id', $id)->where('item_id', $item->id)->count();
            if ($item->loan_quantity == 0) {
                $item->loan_quantity = NULL; // SET TO NULL SUPAYA DI VIEWS TIDAK KELUAR ANGKA 0
            }
        }

        // $pdf = PDF::loadview('loan_pdf4', [
        //     'loan' => $loan,
        //     'items' => $loaned_items,
        // ])->setPaper('a4')->setOrientation('portrait');
        // $pdf = new DomPDFPDF();
        $pdf = PDF2::loadview('loan_pdf_non_bootstrap', [
            'loan' => $loan,
            'items' => $loaned_items,
        ]);

        // $pdf->set_base_path("/css/");
        return $pdf->stream('Peminjaman_' . $loan->id . '_' . $loan->program . '.pdf');
    }
}
