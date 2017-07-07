<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Book;
use Library\Publisher;
use Library\Http\Requests\BookFormRequest;

class BookController extends Controller
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
        $books = Book::with('publisher')->get();

        return view('admin.books.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishersForSelect = Publisher::orderBy('name')
            ->get()
            ->pluck('name', 'id');

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
            ->with(['success' => 'Livro salvo com sucesso!']);
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
        $book = Book::with('publisher')
            ->where('books.id', $id)
            ->get();

        $publishersForSelect = Book::with('publisher')
            ->get()
            ->pluck('publisher.name', 'publisher.id');

        return view('admin.books.edit')->with(compact('book', 'publishersForSelect'));
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
        $book = Book::find($id);

        $book->fill($request->only('publisher_id', 'title', 'description', 'isbn'));

        $book->save();

        return redirect()
            ->route('livros.edit', $id)
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
        $book = Book::find($id);

        $book->delete();

        return redirect()
            ->route('livros.index')
            ->with(['success' => 'Autor deletado com sucesso!']);
    }
}
