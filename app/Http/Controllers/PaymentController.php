<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billings\Gateways\PaypalGateway;
use App\Billings\PaymentGatewayInterface;
// use \Softon\Indipay\Facades\Indipay;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
	public function pay(Request $request)//PaymentGatewayInterface $module
    {
    	$paypal=new PaypalGateway();
        $res = $paypal->process($request);
        return $paypal->checkout($res);
    }

	/*
	* Payment Success
	*/
	public function paymentSuccess(Request $request)
    {
        dump($request->all());
        $paypal = new ExpressCheckout();
        $response = $paypal->getExpressCheckoutDetails($request->token);
        dump($response);

    }


	/*
	* Payment
	*/
    public function rnPay(Request $request)
    {

    }
}
