<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Mail\VendorMail;
use App\Models\Vendor;
use App\Http\Requests\VendorRequest;
use Mail;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants=Plant::all();
        return view('vendor.registration',['plants'=>$plants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        /**
        *file upload 
        */
        $data['address_proof']=$this->file_upload($request,'address_proof');
        $data['registration_certificate']=$this->file_upload($request,'registration_certificate');
        $data['copy_pan_card']=$this->file_upload($request,'copy_pan_card');

        User::insert($data);
        /**
        * send email after vender registration
        */
        $plant=Plant::find($request->plant_id);

        // Mail::to($plant->to)
        //     ->cc($plant->cc)
        //     ->bcc($plant->bcc)
        //     ->send(new VendorMail($request,$plant));


        return back()->with('message','Successful');
    }

    public function file_upload($request,$field){
        if($request->$field){
           $fileName = time().'.'.$request->$field->extension();
            $request->$field->move(public_path($field), $fileName);
            return $fileName; 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

 // Mail::to($myUsers)
 //        ->cc($moreMyUsers)
 //        ->bcc($evenMyMoreUsers)
 //        ->send(new MyTestMail());