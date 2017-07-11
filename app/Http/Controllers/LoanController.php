<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Loan;
use Library\Book;
use Library\Reader;
use Library\User;
use Library\Http\Requests\LoanFormRequest;

class LoanController extends Controller
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
        $loans = Loan::with('book', 'reader', 'user')->get();

        return view('admin.loans.index')->with(compact('loans'));
    }

    public function option(Request $request)
    {
        $loans = Loan::with('book', 'reader', 'user')->get();

        $option = $request->option;

        return view('admin.loans.index')->with(compact('option', 'loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booksForSelect = Book::orderBy('title')
            ->get()
            ->pluck('title', 'id');

        $readersForSelect = Reader::orderBy('name')
            ->get()
            ->pluck('name', 'id');

        $usersForSelect = User::orderBy('name')
            ->get()
            ->pluck('name', 'id');

        return view('admin.loans.loan')->with(compact('booksForSelect', 'readersForSelect', 'usersForSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanFormRequest $request)
    {
        $loan = new Loan;

        $loan->book_id = $request->book_id;
        $loan->reader_id = $request->reader_id;
        $loan->withdrawal_at = $request->withdrawal_at;
        $loan->return_date = $request->return_date;
        $loan->user_id = $request->user_id;

        $loan->save();

        return redirect()
            ->route('emprestimos.index')
            ->with(['success' => 'Empréstimo realizado com sucesso!']);
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
        if($id == 1) {
            return view('admin.loans.return');
        } else {
            return view('admin.loans.cancel');
        }
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
        if($id == 1) {

            $this->validate($request, [
                'id' => 'required|returned|canceled',
                'returned_at' => 'required',
            ], [
                'id.required' => 'O campo ID é obrigatório',
                'returned_at.required' => 'O campo data de devolução é obrigatório',
                'id.returned' => 'Este empréstimo já foi devolvido',
                'id.canceled' => 'Este empréstimo já foi cancelado',
            ]);

            $loan = Loan::find($request->id);

            $loan->returned_at = $request->returned_at;

            $loan->save();

            return redirect()
                ->route('emprestimos.index', $id)
                ->with(['success' => 'Devolução efetuada com sucesso!']);

        } else {

            $this->validate($request, [
                'id' => 'required|returned|canceled',
                'canceled_at' => 'required',
            ], [
                'id.required' => 'O campo ID é obrigatório',
                'canceled_at.required' => 'O campo data de cancelamento é obrigatório',
                'id.returned' => 'Este empréstimo já foi devolvido',
                'id.canceled' => 'Este empréstimo já foi cancelado',
            ]);

            $loan = Loan::find($request->id);

            $loan->canceled_at = $request->canceled_at;

            $loan->save();

            return redirect()
                ->route('emprestimos.index', $id)
                ->with(['success' => 'Cancelamento efeituado com sucesso!']);
        }
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
}
