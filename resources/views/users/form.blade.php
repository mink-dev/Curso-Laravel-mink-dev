   @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control bg-light border-0 shadow-sm" type="text" name="name" placeholder="nombre..." value="{{ old('name',$usr->name) }}">
        <br>
        <label for="email">Email</label>
        <input class="form-control bg-light border-0 shadow-sm" type="text" name="email" placeholder="email..." value="{{ old('email', $usr->email ) }}">
        <br>

      @unless ($usr->id)
      
        <label for="password">Password</label>
        <input class="form-control bg-light border-0 shadow-sm" type="password" name="password" placeholder="password..."  }}>
        <br>
        <label for="password_confirmation">Password Confirm</label>
        <input class="form-control bg-light border-0 shadow-sm" type="password" name="password_confirmation" placeholder="password confirm..."  }}>
      @endunless 
        <br>
        <div class="checkbox">
            @foreach ($roles as $id => $name)
            <label>
                <input 
                    type="checkbox" 
                    name="roles[]" 
                    value="{{ $id }}"
                    {{ $usr->roles->pluck('id')->contains($id) ? 'checked' : ''}} >
                    
                    {{ $name }}
            </label>  
            @endforeach

        </div>
    </div>