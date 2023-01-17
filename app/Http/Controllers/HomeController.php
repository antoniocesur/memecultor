<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["titulo"] = "MemeCultor, el inicio";
        $viewData["memes"]=[];
        return view('home.index')->with("viewData", $viewData);
    }
}
