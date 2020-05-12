<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


use App\Repositories\EmailsInterface;
use App\Repositories\CacheEmails;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
    */
    public function boot()
    {
        //Binding, como parametros: INterface y decorador->(contiene la llamada a un repositorio)
        $this->app->bind(EmailsInterface::class, CacheEmails::class);
    
        Route::resourceVerbs([
                'create' => __('crear'),
                'edit' => __('editar'),
            ]);
    }
}
