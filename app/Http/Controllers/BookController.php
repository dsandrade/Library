<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Book;
use Library\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('publishers')->orderBy('title')->get();

        return view('admin.books.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishersForSelect = Book::with('publishers')
            ->get()
            ->pluck('publishers.name', 'publishers.id');

        return view('admin.books.create')->with(compact('publishersForSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {
        $book = new Book;

        $book->publisher_id = $request->publisher_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->isbn = $request->isbn;

        $book->save();

        return redirect()
            ->route('livros.index')
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookFormRequest $request, $id)
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
}
