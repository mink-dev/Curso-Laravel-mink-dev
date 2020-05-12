<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use Illuminate\Routing\Route;


//Linea de código para cambiar de lenguaje la app
//App::setLocale('es'); 

// App\User::create([
//   'name'  => 'sergio',
//   'email' => 'sergio@hotmail.com',
//   'password' => bcrypt('123'),

// ]);

// App\User::create([
//   'name'  => 'admin',
//   'email' => 'admin@hotmail.com',
//   'password' => bcrypt('123'),

// ]);

// App\User::create([
//   'name'  => 'estudiante',
//   'email' => 'estudiante@hotmail.com',
//   'password' => bcrypt('123'),

// ]);


//Codigo para imprimier querys en vista asi como su tiempo
// DB::listen(function($query){
// echo  "<pre>{$query->sql}</pre>";
// });



Route::get('roles', function () {
    return \App\Role::with('user')->get();
});

Route::view('/welcome','welcome');

Route::view('/','home')->name('home');
Route::view('/quienes-somos','about')->name('about');

// Route::get('/portafolio','ProjectController@index')->name('projects.index');
// Route::get('portafolio/crear', 'ProjectController@create')->name('projects.create');
// Route::get('/portafolio/{project}/editar','ProjectController@edit')->name('projects.edit');
// Route::patch('/portafolio/{project}','ProjectController@update')->name('projects.update');
// Route::post('/portafolio','ProjectController@store')->name('projects.store');
// Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
// Route::delete('/portafolio/{project}', 'ProjectController@destroy')->name('projects.destroy');

Route::resource('portafolio', 'ProjectController')->names('projects')->parameters(['portafolio'=> 'project']);

Route::view('/contacto','contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

Route::resource('usuario', 'UsersController')->names('users')->parameters(['usuario' => 'user']);

Route::resource('correo', 'EmailController')->names('emails')->parameters( ['correo' =>'email'] );

Route::get('crearNota', 'EmailController@crearNota')->name('createNote');

// Route::get('usuarios', 'UsersController@index')->name('users.index');
// Route::get('usuarios/editar/{user}', 'UsersController@edit')->name('users.edit');
// Route::delete('usuarios/{user}', 'UsersController@destroy')->name('users.destroy');


// Route::post('contact', 'MessagesController@store' );

//Creacion de rutas con resource 
// Route::resource('proyectos', 'ProjectController')->except('create','show');
//Route::resource('proyectos', 'ProjectController');

//creacion de rutas con api
//Route::apiResource('proyectos','ProjectController');




// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', function () {
  //      $nombre ='Sergio';
        
        //USO DE WHIT
        //return view('home')->with('prueba', $nombre);

        //USO DE WHIT enviando array
        //return view('home')->with(['prueba' => $nombre]);

        //SIN WITH ENVIANDO PARAMETRO A LADO DE LA VISTA 
        //return view('home', ['prueba' => $nombre]);
        
        //ENVIANDO CON COMPACT SIEMPRE Y CUANDO TENGA EL MISMO NOMBRE DE LA VARIABLE
        //return view('home', compact('nombre'));
    
//})->name('home');

Auth::routes( ['register' => false] );
