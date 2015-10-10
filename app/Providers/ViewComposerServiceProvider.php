<?php
/**
 * Created by PhpStorm.
 * User: bko
 * Date: 15/09/05
 * Time: 23:07
 */
namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * return void
     */
    public function boot()
    {
        //View::composer('*', 'App\Http\ViewComposers\FooComposer');
    }

    /**
     * Register
     */
    public function register()
    {
    }

}
