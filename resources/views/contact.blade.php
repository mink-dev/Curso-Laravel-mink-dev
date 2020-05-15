@extends('layout')

@section('title','Contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-11 col-sm-10 col-md-6 mx-auto">
            
                <br>
                <form  class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('messages.store')}}">
                    @csrf <!--Evita los ataques de suplantación de identidad -->
                    <div class="form-group">
                        <h1 class="display-5">{{__('Contact')}}</h1>
                        <hr>
                    @guest

                        <label for="name">Nombre</label>
                        <input 
                            name="name" 
                            placeholder="Nombre..." 
                            value="{{ old('name') }} "  
                            class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror<br>    
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            name="email" 
                            placeholder="Email..." 
                            value="{{ old('email') }} "
                            class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            
                            
                        @enderror<br>
                    @endguest

                    @auth
                            <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    @endauth
                        <label for="subject">Asunto</label>
                        <input 
                            name="subject" 
                            placeholder="Asunto..." 
                            value=" {{ old('subject') }} "
                            class=" form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="content">Mensaje</label>
                        <textarea 
                            name="content" 
                            placeholder="Mensaje..."
                            class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror" > {{ old('content') }} 
                        </textarea>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                        @enderror
                       
                    </div> 
                      <input type="submit" class="btn btn-primary text-white btn-lg btn-block" value="{{ __('Send') }}">
                </form>

            {{-- {{ $errors }} <!--variable que contiene los errores  de formulario--> --}}
            {{-- {{ $errors->any() }} <!--any nos especifica atra vez de un boolean si tenemos un error --> --}}
            {{-- {{ $errors->first('name') }}  nos muestra el primer errror del elemento indicado 
            --}}
        </div>
    </div>
   
</div>
@endsection