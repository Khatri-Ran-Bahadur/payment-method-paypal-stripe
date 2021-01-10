<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
class AdminController extends Controller
{
	use AuthenticatesUsers;

    protected function authenticated(Request $request,$user){
    	return redirect()->route('admin.dashbord');
    }

    public function logout(Request $request)
    {
        /**
        * override the logout function or admin gaurd
        */
        $this->guard()->logout();        
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function loggedOut(Request $request){
    	return redirect()->route('admin.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */


    protected function guard()
    {
    	return Auth::guard('admin');
    }
}
