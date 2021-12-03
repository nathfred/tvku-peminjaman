<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DivisiController extends Controller
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

        $loans = Loan::where('user_id', $user_id)->orderBy('created_at', 'asc')->get();
        $responed_loans = Loan::where('user_id', $user_id)->whereNotNull('app_signed')->orderBy('created_at', 'desc')->get();
        $unresponed_loans = Loan::where('user_id', $user_id)->whereNull('app_signed')->orderBy('created_at', 'desc')->get();
        $today_loans = Loan::where('user_id', $user_id)->where('created', $today)->get();
        $recent_loans = Loan::where('user_id', $user_id)->orderBy('created', 'desc')->take(3)->get();

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

        return view('divisi.index', [
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

        $loans = Loan::where('user_id', $user_id)->orderBy('created', 'desc')->get();

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

        return view('divisi.loans', [
            'title' => 'Index',
            'active' => 'loan',
            'user' => $user,
            'loans' => $loans,
        ]);
    }
}
