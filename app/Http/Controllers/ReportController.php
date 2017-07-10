<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Loan;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index');
    }

    public function option(Request $request)
    {

        if ($request->option == 0) {
            $reports = Loan::with('book')
                ->selectRaw('book_id, count(book_id) as quant_loans')
                ->groupBy('book_id')
                ->orderBy('quant_loans', 'DESC')
                ->get();
        } else {
            $reports = Loan::with('reader')
                ->selectRaw('reader_id, count(reader_id) as quant_loans')
                ->groupBy('reader_id')
                ->orderBy('quant_loans', 'DESC')
                ->get();
        }

        $option = $request->option;

        return view('admin.reports.index')->with(compact('option', 'reports'));
    }
}
