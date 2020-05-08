@extends('layout')

@section('title','Crear proyecto')

@section('content')

@include('partials.validation-errors')

<div class="container">
    <div class="row">
        <div class="col-11 col-sm-10 col-md-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('projects.store') }}">
                <h1 class="display-5">Nuevo Proyecto</h1>
                <hr><br>
                @include('projects._form', ['btn_text' => 'Guardar'])
            </form>
        </div>
    </div>        
</div>    
@endsection