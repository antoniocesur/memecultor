<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["titulo"] = "MemeCultor, el inicio";
        $viewData["memes"]=\App\Models\Meme::latest()->paginate(5);
        return view('home.index')->with("viewData", $viewData);
    }

    public function show($id){
        $viewData = [];
        $meme=\App\Models\Meme::findOrFail($id);
        $viewData["titulo"] = "Meme: " . $meme->nombre;
        $viewData["meme"]=$meme;

        return view('home.show')->with("viewData", $viewData);
    }
}
