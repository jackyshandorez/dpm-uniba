<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Kontak;
use App\Models\Notifikasi;
use App\Models\Organisasi;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            // Blade::component('alert.simpan-data', 'alert-simpan');
            View::share('kontak', Kontak::first());
            View::composer('*', function ($view) {
                $organisasi = Organisasi::orderBy('nama')->get();
                $view->with('organisasi', $organisasi);
            });


            View::composer('*', function ($view) {
                // $notifikasiBaru = Notifikasi::where('dibaca', false)->latest()->take(5)->get();
                $notifikasiBaru = Notifikasi::latest()->get();
                $jumlahNotif = Notifikasi::where('dibaca', false)->count();
                $view->with(compact('notifikasiBaru', 'jumlahNotif'));
            });
    }


}
