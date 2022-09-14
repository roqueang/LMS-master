<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anuncio;

class AnuncioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-anuncio|crear-anuncio|editar-anuncio|eliminar-anuncio')->only('index');
        $this->middleware('permission:crear-anuncio',['only'=>['crate','store']]);
        $this->middleware('permission:editar-anuncio',['only'=>['edit','update']]);
        $this->middleware('permission:eliminar-anuncio',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = anuncio::paginate(5);
        return view('anuncios.index', compact('anuncios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuncios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
                'titulo' => 'required',
                'contenido' => 'required'
        ]);
        anuncio::create($request->all());
        return redirect()->route('anuncios.index');
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
    public function edit(anuncio $anuncio)
    {
        return view('anuncios.editar', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anuncio $anuncio)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);
        $anuncio->update($request->all());
        return redirect()->route('anuncios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(anuncio $anuncio)
    {
        $anuncio->delete();
        return redirect()->route('anuncios.index');
    }
}
