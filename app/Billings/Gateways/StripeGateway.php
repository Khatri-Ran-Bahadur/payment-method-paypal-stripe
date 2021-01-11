<?php
namespace App\Billings\Gateways;

/**
 *  Paypal Gateways 
 */

use App\Billings\PaypalGatewayInterface;
use Illuminate\Http\Request;


class StripeGateway implements PaypalGatewayInterface
{
	
	public function process(Request $request){

	}

	public function checkout($res){
		
	}
	
}