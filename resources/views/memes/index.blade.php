@extends('layouts.admin')

@section('contenido')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crea memes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('memes.create') }}"> Crear un nuevo meme</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Plantilla</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        @foreach ($memes as $meme)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $meme->imgPlantilla }}" width="100px"></td>
                <td>{{ $meme->nombre }}</td>
                <td>{{ $meme->descripcion }}</td>
                <td>
                    <form action="{{ route('memes.destroy',$meme->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('memes.show',$meme->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('memes.edit',$meme->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $memes->links() !!}

@endsection
