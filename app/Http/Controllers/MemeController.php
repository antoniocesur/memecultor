<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memes = Meme::latest()->paginate(5);
        $viewData["titulo"]="Lista de memes";
        $viewData["memes"]=$memes;

        return view('memes.index',compact('memes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imgPlantilla' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imgEjemplo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('imgPlantilla')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "plantilla." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imgPlantilla'] = "$profileImage";
        }

        if ($image2 = $request->file('imgEjemplo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "ejemplo." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $profileImage);
            $input['imgEjemplo'] = "$profileImage";
        }

        Meme::create($input);

        return redirect()->route('memes.index')->with('success','Meme creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function show(Meme $meme)
    {
        return view('memes.show',compact('meme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function edit(Meme $meme)
    {
        return view('memes.edit',compact('meme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meme $meme)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('imgPlantilla')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "plantilla." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imgPlantilla'] = "$profileImage";
        }else{
            unset($input['imgPlantilla']);
        }
        if ($image = $request->file('imgEjemplo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "ejemplo." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imgEjemplo'] = "$profileImage";
        }else{
            unset($input['imgEjemplo']);
        }

        $meme->update($input);
        return redirect()->route('memes.index')->with('success','Meme actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meme $meme)
    {
        $meme->delete();
        return redirect()->route('memes.index')->with('success','Meme eliminado');
    }
}
