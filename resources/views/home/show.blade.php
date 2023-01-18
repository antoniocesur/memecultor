@extends('layouts.app')
@section("titulo", $viewData["titulo"])
@section("contenido")
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="fw-light">{{$viewData["meme"]->nombre}}</h1>
                    <p>{{$viewData["meme"]->descripcion}}</p>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col-4 align-self-center">
                    <img src="/images/{{$viewData["meme"]->imgPlantilla}}" class="d-block w-100" alt="...">
                </div>
                <div class="col-4 align-self-center">
                    <img src="/images/{{$viewData["meme"]->imgEjemplo}}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

    </main>
@endsection
