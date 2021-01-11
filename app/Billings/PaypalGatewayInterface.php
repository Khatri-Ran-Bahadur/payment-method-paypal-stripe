<?php 
namespace App\Billings;

use Illuminate\Http\Request;
interface PaypalGatewayInterface{
	public function process(Request $request);

	public function checkout($res);
}