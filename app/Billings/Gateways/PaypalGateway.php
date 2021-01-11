<?php
namespace App\Billings\Gateways;

/**
 *  Paypal Gateways 
 */

use App\Billings\PaypalGatewayInterface;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;


class PaypalGateway implements PaypalGatewayInterface
{
	
	public function process(Request $request){
		$products=[];
		$products['items']=[
			[
				'name'=>'RN Laptops',
				'price'=>20,
				'des'=>'its good for gamming',
				'qty'=>1
			]
		];
		$products['invoice_id']=uniqid();
		$products['invoice_description']="Order #{$products['invoice_id']} Billing";
		$products['return_url']=route('success.pay');
		$products['cancel_url']=route('success.pay');
		$products['total']=20;

		$paypal=new ExpressCheckout();
		return $paypal->setExpressCheckout($products);
	}

	public function checkout($res){
		return redirect($res['paypal_link']);
	}
	
}