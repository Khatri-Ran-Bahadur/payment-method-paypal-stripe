<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billings\PaymentGatewayInterface;
use App\Billings\Gateways\PaypalGateway;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(PaymentGatewayInterface::class, function($app){
            $gateway = request()->gateway;
           if ($gateway === "paypal"){
               return new PaypalGateway();
           }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
