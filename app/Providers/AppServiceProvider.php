<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFour();
        View::composer('*', function ($view) {
            $carrinho = session()->get('carrinho', []);

            // Calcular o total de itens
            $totalItens = 0;
            foreach ($carrinho as $item) {
                $totalItens += $item['quantidade'];
            }

            $view->with('totalItensCarrinho', $totalItens);
        });
    }
}
