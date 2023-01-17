<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["titulo"] = "Home Page - Online Store";
        $viewData["memes"]=["hola", "adiós"];
        return view('home.index')->with("viewData", $viewData);
    }
}
