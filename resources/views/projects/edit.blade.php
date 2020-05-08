@extends('layout')

@section('title','Crear proyecto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-11 col-sm-10 col-md-6 mx-auto">
            
            @include('partials.validation-errors')

            <br>

            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('projects.update', $project) }}">
                @method('PATCH')
                <h1 class="display-5">Editar proyecto</h1>
                <hr>
                <br>
                @include('projects._form', ['btn_text' => 'Actualizar'])
                <a class="btn btn-link btn-block" href="{{ route('projects.index') }}"> 
                    Cancelar
                </a>

            </form>
        </div>
    </div>
</div>                  
@endsection