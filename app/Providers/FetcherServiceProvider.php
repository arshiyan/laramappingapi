<?php

namespace App\Providers;

use App\Services\FetcherService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;


class FetcherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('checkExtention', function ($value) {
            $res = new FetcherService();
           return Response::make($res->detectApiFormat(file_get_contents($value)));
        });

    }
}
