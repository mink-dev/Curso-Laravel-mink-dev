@extends('layout')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @include('partials.validation-errors')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('emails.update', $email) }}">
                @method('PATCH')
                <h1 class="display-5">Editar Correo</h1>
                <hr>
                <br>
                @csrf
                <div class="form-group">
                @if(!$email->user_id)       
                        <label for="name">Nombre</label>
                            <input class="form-control bg-light border-0 shadow-sm" type="text" name="name" placeholder="nombre..." value="{{ old('nombre',$email->name) }}">
                            <br>
                        <label for="email">Email</label>
                            <input class="form-control bg-light border-0 shadow-sm" type="text" name="email" placeholder="email..." value="{{ old('email', $email->email ) }}">
                            <br>
                @endif        
                    <label for="subject">Subject</label>
                        <input class="form-control bg-light border-0 shadow-sm" type="text" name="subject" placeholder="asunto..." value="{{ old('asunto', $email->subject ) }}">
                        <br>
                    <label for="content">Contenido</label>
                        <textarea class="form-control bg-light border-0 shadow-sm"  name="content" placeholder="contenido...">
                            {{ old('contenido', $email->content ) }}
                        </textarea>
                        <br>        
                </div>
                <button class="btn btn-primary text-white btn-lg btn-block">Actualizar</button>
                <a class="btn btn-link btn-block" href="{{ route('emails.index') }}"> 
                    Regresar
                </a>

            </form>
        </div>
    </div>
     
</div> 
@endsection