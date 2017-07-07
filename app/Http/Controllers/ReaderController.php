<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Reader;
use Library\Http\Requests\ReaderFormRequest;

class ReaderController extends Controller
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
        $readers = Reader::orderBy('name', 'ASC')->get();

        return view('admin.readers.index')->with(compact('readers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.readers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReaderFormRequest $request)
    {
        $reader = new Reader;

        $reader->name = $request->name;

        $reader->save();

        return redirect()
            ->route('leitores.index')
            ->with(['success' => 'Leitor salvo com sucesso!']);
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
        $reader = Reader::find($id);

        return view('admin.readers.edit')->with(compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReaderFormRequest $request, $id)
    {
        $reader = Reader::find($id);

        $reader->fill($request->only('name'));

        $reader->save();

        return redirect()
            ->route('leitores.edit', $id)
            ->with(['success' => 'Leitor editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reader = Reader::find($id);

        $reader->delete();

        return redirect()
            ->route('leitores.index')
            ->with(['success' => 'Leitor deletado com sucesso!']);
    }
}
