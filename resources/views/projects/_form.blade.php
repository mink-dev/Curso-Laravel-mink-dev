@csrf
    <div class="form-group">
        <label for="title">Titulo del proyecto</label>
            <input class="form-control bg-light border-0 shadow-sm" type="text" name="title" placeholder="titulo..." value="{{ old('title',$project->title) }}">
            <br>
        <label for="url">Url del proyecto</label>
            <input class="form-control bg-light border-0 shadow-sm" type="text" name="url" placeholder="url..." value="{{ old('url', $project->url ) }}">
            <br>
        <label for="description">Descripción del proyecto</label>
            <textarea class="form-control bg-light border-0 shadow-sm" name="description" placeholder="descripción...">{{ old('description', $project->description ) }}</textarea>
            <br>
    </div>
    
<button class="btn btn-primary text-white btn-lg btn-block">{{ $btn_text }}</button>