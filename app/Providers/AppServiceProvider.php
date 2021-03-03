<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider {
    public function boot() {
        // digunakan untuk Bootstrap pagination
        Paginator::useBootstrap();
    }

    public function register() {
        //
    }

}
