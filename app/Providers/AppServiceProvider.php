<?php

namespace App\Providers;

use App\Models\Links;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    private $links = [];
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
        $this->setLinks();
        View::share('menus', $this->links);
//        view()->share('menus', $this->links);
    }

    protected function setLinks(){
        $links = Links::all();

        if($links !== null ){
            $this->links = $links;
        }
    }
}
