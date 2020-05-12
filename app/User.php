<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Presenters\UsersPresenter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);

    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Definimos relacion de usuario 
    public function roles(){
       return $this->belongsToMany(Role::class,'assigned_roles');
    }

    public function hasRoles(array $roles){
    
        return $this->roles->pluck('name')->intersect($roles)->count();

    }

    public function isAdmin(){
        return $this->hasRoles(['admin']);
    }

    public function emails(){
        return $this->hasMany(Email::class);
    }
    //Método creado bajo una relacion polimorfica en model NOTE
    public function note(){ 
        return $this->morphOne(Note::class, 'notable');//hasOne one object and hasMany collection of objects
    }
//Método creado bajo relacion muchos a muchos morphToMany
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    public function present(){
        return new UsersPresenter($this);
    }
    
}
