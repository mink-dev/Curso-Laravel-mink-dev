@extends('layout')

@section('title','About')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid" src="/img/about.svg" alt="Quén soy">
        </div>
        <div class="col-12 col-lg-6 mb-4">
            <h1 class="display-4 text-primary">Quién soy</h1>
            <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur 
                adipisicing elit. Id, dolorem iste? Similique consequatur accusamus 
                odio omnis error aspernatur sunt magnam sit, in voluptatibus amet
                porro, laborum, neque voluptates doloribus molestiae mollitia eaque
                asperiores sapiente. Reprehenderit enim maiores asperiores, 
                voluptatibus cum, vitae ad quas iusto beatae error placeat magnam 
                dolorem non.
            </p>
            <a class="btn btn-lg btn-block btn-primary text-white" href="{{ route('contact') }}">Contáctame</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
        </div>
    </div>
</div>
@endsection