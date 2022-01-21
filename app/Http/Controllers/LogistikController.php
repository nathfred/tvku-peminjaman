<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $today = Carbon::today('GMT+7');

        $loans = Loan::orderBy('created_at', 'asc')->get();
        $responed_loans = Loan::whereNotNull('app_signed')->orderBy('created_at', 'desc')->get();
        $unresponed_loans = Loan::whereNull('app_signed')->orderBy('created_at', 'desc')->get();
        $today_loans = Loan::where('created', $today)->get();
        $recent_loans = Loan::orderBy('created', 'desc')->take(3)->get();

        // UBAH FORMAT 'created' DATE (Y-m-d menjadi d-m-Y)
        foreach ($loans as $loan) {
            // UBAH KE FORMAT CARBON
            $loan->created = Carbon::createFromFormat('Y-m-d', $loan->created);
            $loan->book_date = Carbon::createFromFormat('Y-m-d', $loan->book_date);
            $loan->book_time = Carbon::createFromFormat('H:i:s', $loan->book_time);
            // UBAH FORMAT KE d-m-Y
            $loan->created = $loan->created->format('d-m-Y');
            $loan->book_date = $loan->book_date->format('d-m-Y');
            $loan->book_time = $loan->book_time->format('H:i');
        }

        // UBAH FORMAT 'created' DATE (Y-m-d menjadi d-m-Y)
        foreach ($unresponed_loans as $loan) {
            // UBAH KE FORMAT CARBON
            $loan->created = Carbon::createFromFormat('Y-m-d', $loan->created);
            $loan->book_date = Carbon::createFromFormat('Y-m-d', $loan->book_date);
            $loan->book_time = Carbon::createFromFormat('H:i:s', $loan->book_time);
            // UBAH FORMAT KE d-m-Y
            $loan->created = $loan->created->format('d-m-Y');
            $loan->book_date = $loan->book_date->format('d-m-Y');
            $loan->book_time = $loan->book_time->format('H:i');
        }

        // UBAH FORMAT 'created' DATE (Y-m-d menjadi d-m-Y)
        foreach ($recent_loans as $loan) {
            // UBAH KE FORMAT CARBON
            $loan->created = Carbon::createFromFormat('Y-m-d', $loan->created);
            $loan->book_date = Carbon::createFromFormat('Y-m-d', $loan->book_date);
            $loan->book_time = Carbon::createFromFormat('H:i:s', $loan->book_time);
            // UBAH FORMAT KE d-m-Y
            $loan->created = $loan->created->format('d-m-Y');
            $loan->book_date = $loan->book_date->format('d-m-Y');
            $loan->book_time = $loan->book_time->format('H:i');
        }

        return view('logistik.index', [
            'title' => 'Index',
            'active' => 'index',
            'user' => $user,
            'loans' => $loans,
            'unresponded_loan' => $unresponed_loans,
            'recent_loan' => $recent_loans,
            'total_loans' => $loans->count(),
            'responded_loans' => $responed_loans->count(),
            'unresponded_loans' => $unresponed_loans->count(),
            'today_loans' => $today_loans->count(),
            'recent_loans' => $recent_loans->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_loans()
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $today = Carbon::today('GMT+7');

        $loans = Loan::orderBy('created', 'desc')->orderBy('id', 'desc')->get();

        // UBAH FORMAT 'created' DATE (Y-m-d menjadi d-m-Y)
        foreach ($loans as $loan) {
            // UBAH KE FORMAT CARBON
            $loan->created = Carbon::createFromFormat('Y-m-d', $loan->created);
            $loan->book_date = Carbon::createFromFormat('Y-m-d', $loan->book_date);
            $loan->book_time = Carbon::createFromFormat('H:i:s', $loan->book_time);
            // UBAH FORMAT KE d-m-Y
            $loan->created = $loan->created->format('d-m-Y');
            $loan->book_date = $loan->book_date->format('d-m-Y');
            $loan->book_time = $loan->book_time->format('H:i');
        }

        return view('logistik.loans', [
            'title' => 'List Peminjaman',
            'active' => 'loan',
            'user' => $user,
            'loans' => $loans,
        ]);
    }

    public function detail_loan($id)
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

        $loan_items = LoanItem::where('loan_id', $id)->orderBy('name', 'asc')->get();

        return view('logistik.loan_detail', [
            'title' => 'Detail Peminjaman',
            'active' => 'loan',
            'loan' => $loan,
            'items' => $loan_items,
        ]);
    }

    public function set_item_loan_code(Request $request, $id)
    {
        // GET REQUEST DATA (ITEM LOAN CODES ONLY)
        $data = $request->except(['_token', '_method', 'app_name', 'app_phone', 'app_signed']);

        // LOOP THROUGH REQUEST
        foreach ($data as $key => $value) {
            // SET CODE TO EACH LOAN ITEM BY REQUEST DATA
            $affected = LoanItem::where('id', $key)->update(['code' => $value]);
        }

        $loan = Loan::find($id);
        // VALIDASI APAKAH LOAN ADA
        if ($loan === NULL) {
            return back()->with('message', 'loan-not-found');
        }

        // VALIDASI APPROVAL LOGISTIK
        $request->validate([
            'app_name' => 'string|required|max:24',
            'app_phone' => 'max:16',
            'app_signed' => 'boolean|required',
        ]);

        $loan->app_name = $request->app_name;
        $loan->app_phone = $request->app_phone;
        $loan->app_signed = $request->app_signed;
        $loan->approval = $request->app_signed;
        if ($request->return === NULL) {
            // REQUEST TANPA RETURN (KONFIRMASI LOGISTIK PERTAMA KALI)
        } else {
            $loan->return = $request->return;
        }

        $loan->save();

        return back()->with('message', 'success-set-code');
    }

    public function delete_loan($id)
    {
        $loan = Loan::find($id);
        // VALIDASI APAKAH LOAN ADA
        if ($loan === NULL) {
            return back()->with('message', 'loan-not-found');
        }

        $loan->delete();
        return back()->with('message', 'success-delete-loan');
    }

    public function show_items()
    {
        $items = Item::orderBy('category', 'desc')->orderBy('name', 'asc')->get();

        // UBAH ADDITIONAL KE LAIN-LAIN
        foreach ($items as $item) {
            if ($item->category == 'Additional') {
                $item->category = 'Lain-lain';
            }
        }

        return view('logistik.items', [
            'title' => 'List Barang',
            'active' => 'item',
            'items' => $items,
        ]);
    }

    public function detail_item($id)
    {
        $item = Item::find($id);
        // VALIDASI APAKAH ITEM ADA
        if ($item === NULL) {
            return back()->with('message', 'item-not-found');
        }

        // dd($item);

        return view('logistik.item_detail', [
            'title' => 'Detail Barang',
            'active' => 'item',
            'item' => $item,
        ]);
    }

    public function create_item()
    {
        return view('logistik.item_create', [
            'title' => 'Buat Barang',
            'active' => 'item',
            'item' => NULL,
        ]);
    }

    public function store_item(Request $request)
    {
        // VALIDASI POST REQUEST
        $request->validate([
            'name' => 'string|required|max:24',
            'category' => 'string|required|max:10',
        ]);

        Item::create([
            'name' => $request->name,
            'category' => $request->category,
        ]);

        return redirect(route('logistik-show-items'))->with('message', 'success-create-item');
    }

    public function save_item(Request $request, $id)
    {
        $item = Item::find($id);
        // VALIDASI APAKAH ITEM ADA
        if ($item === NULL) {
            return back()->with('message', 'item-not-found');
        }

        // VALIDASI POST REQUEST
        $request->validate([
            'name' => 'string|required|max:24',
            'category' => 'string|required|max:10',
        ]);

        $item->name = $request->name;
        $item->category = $request->category;
        $item->save();

        return redirect(route('logistik-detail-item', ['id' => $id]))->with('message', 'success-edit-item');
    }

    public function delete_item($id)
    {
        $item = Item::find($id);
        // VALIDASI APAKAH ITEM ADA
        if ($item === NULL) {
            return back()->with('message', 'item-not-found');
        }

        $item->delete();
        return back()->with('message', 'success-delete-item');
    }
}
