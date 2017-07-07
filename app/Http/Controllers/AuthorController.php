<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Author;
use Library\Http\Requests\AuthorFormRequest;

class AuthorController extends Controller
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
        $authors = Author::orderBy('name', 'ASC')->get();

        return view('admin.authors.index')->with(compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorFormRequest $request)
    {
        $author = new Author;

        $author->name = $request->name;

        $author->save();

        return redirect()
            ->route('autores.index')
            ->with(['success' => 'Autor salvo com sucesso!']);
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
        $author = Author::find($id);

        return view('admin.authors.edit')->with(compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorFormRequest $request, $id)
    {
        $author = Author::find($id);

        $author->fill($request->only('name'));

        $author->save();

        return redirect()
            ->route('autores.edit', $id)
            ->with(['success' => 'Autor editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);

        $author->delete();

        return redirect()
            ->route('autores.index')
            ->with(['success' => 'Autor deletado com sucesso!']);
    }
}
