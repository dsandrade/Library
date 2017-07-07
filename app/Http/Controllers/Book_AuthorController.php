<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Book_Author;
use Library\Book;
use Library\Author;
use Library\Http\Requests\Book_AuthorFormRequest;

class Book_AuthorController extends Controller
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
        $book_authors = Book_Author::with('book', 'author')->get();

        return view('admin.book_authors.index')->with(compact('book_authors'));
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

        $authorsForSelect = Author::orderBy('name')
            ->get()
            ->pluck('name', 'id');

        return view('admin.book_authors.create')->with(compact('booksForSelect', 'authorsForSelect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book_AuthorFormRequest $request)
    {
        $book_author = new Book_Author;

        $book_author->fill($request->only('book_id', 'author_id'));

        $book_author->save();

        return redirect()
            ->route('livrosautores.index')
            ->with(['success' => 'Autor do livro salvo com sucesso!']);
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
        $book_author = Book_Author::with('book', 'author')
            ->where('book_authors.id', $id)
            ->get();

        $booksForSelect = Book_Author::with('book')
            ->get()
            ->pluck('book.title', 'book.id');

        $authorsForSelect = Book_Author::with('author')
            ->get()
            ->pluck('author.name', 'author.id');

        return view('admin.book_authors.edit')->with(compact('book_author', 'booksForSelect', 'authorsForSelect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Book_AuthorFormRequest $request, $id)
    {
        $book_author = Book_Author::find($id);

        $book_author->fill($request->only('book_id', 'author_id'));

        $book_author->save();

        return redirect()
            ->route('livrosautores.edit', $id)
            ->with(['success' => 'Autor do livro editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_author = Book_Author::find($id);

        $book_author->delete();

        return redirect()
            ->route('livrosautores.index')
            ->with(['success' => 'Autor do livro deletado com sucesso!']);
    }
}
