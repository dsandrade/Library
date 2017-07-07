<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;

use Library\Publisher;
use Library\Http\Requests\PublisherFormRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::orderBy('name', 'ASC')->get();

        return view('admin.publishers.index')->with(compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherFormRequest $request)
    {
        $publisher = new Publisher;

        $publisher->name = $request->name;

        $publisher->save();

        return redirect()
            ->route('editoras.index')
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
        $publisher = Publisher::find($id);

        return view('admin.publishers.edit')->with(compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherFormRequest $request, $id)
    {
        $publisher = Publisher::find($id);

        $publisher->fill($request->only('name'));

        $publisher->save();

        return redirect()
            ->route('editoras.edit', $id)
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
        $publisher = Publisher::find($id);

        $publisher->delete();

        return redirect()
            ->route('editoras.index')
            ->with(['success' => 'Leitor deletado com sucesso!']);
    }
}
