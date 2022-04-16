<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        // gate, gerbang. artinya yang bisa mengakses hanya yang memenuhi syarat ini.
        // cara make di yg lain.
        // $this->authorize('admin')
        // 'admin' sesuai nama yg di define dibawah ini.
        Gate::define('admin', fn(User $user) => $user->is_admin);
    }
}
