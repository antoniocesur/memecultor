@extends('layouts.app')
@section("titulo", $viewData["titulo"])
@section("contenido")
<main>

    <section class="py-2 text-center container">
        <div class="row py-lg-2">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">MemeCultor</h1>
                <p class="lead text-muted">La que va a ser la colección más completa y ordenada de memes</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Busca</a>
                    <a href="#" class="btn btn-secondary my-2">Crea el tuyo</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($viewData["memes"] as $meme)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{"/images/" . $meme->imgPlantilla}}" style="width: 100%; height: 15vw; object-fit: cover;" class="rounded">
                        <!--<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
                        <div class="card-body">
                            <h4>{{$meme->nombre}}</h4>
                            <p class="card-text">{{$meme->descripcion}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/show/{{$meme->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                    <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection

