<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Plant;
use App\Mail\VendorMail;
use App\Http\Requests\VendorRequest;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(VendorRequest $request){
        /**
        * file upload 
        */
    
        $data=$request->except('_token','password_conformation');
        $data['address_proof']=$this->file_upload($request,'address_proof');
        $data['registration_certificate']=$this->file_upload($request,'registration_certificate');
        $data['copy_pan_card']=$this->file_upload($request,'copy_pan_card');
        $data['password']=Hash::make($data['password']);

        $user = User::insert($data);

        /**
        * send email after vender registration
        */
        $files_attachments = array();
        foreach ($request->files as $key=>$value) {
           $files_ext = array('ext' => $request[$key]->getClientOriginalExtension(), 'mime' => $request[$key]->getClientMimeType());
           array_push($files_attachments, [$request[$key]->getRealPath(), $files_ext]);
        }
        $plant=Plant::find($request->plant_id);
        $receiver_email = $plant->to;
        $from_email = $request->email;
        $subject = "Vendor Registration Faram";
        $cc=$plant->cc;
        $bcc=$plant->bcc;
        

       $details = [
           'template' => 'emails.venderRegistration',
           'to' => $receiver_email,
           'cc'=>$cc,
           'bcc'=>$bcc,
           'from' => $from_email,
           'subject' => $subject,
           'attachments' => $files_attachments,
           'plant'=>$plant,
           'data'=>$data
       ];
       Mail::to($details['to'])->cc($details['cc'])->bcc($details['bcc'])->send(new VendorMail($details));

        return redirect()->to('/home');
    }

    
    /**
    * This is the only sample project, so i can make member function of the class not make globle function it store the file and return name of file
    *@return fileName
    */
    public function file_upload($request,$field){
        if($request->$field){
           $fileName = time().'.'.$request->$field->extension();
            $request->$field->storeAs('public/files', $fileName);
            return $fileName; 
        }        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
