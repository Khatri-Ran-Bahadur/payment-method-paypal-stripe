@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
             Vender Registration
             @if(Session::has('message'))
<span class="alert alert-info">{{ Session::get('message') }}</span>
@endif
        </div>
        <div class="card-body">
        <form action="{{route('registration.store')}}" method="post" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group">
              <label for="inputPlant">Delivery Plant</label>
              <select class="form-control" name="plant_id">
              	@foreach($plants as $plant)
              	<option value="{{$plant->id}}">{{$plant->plant}}</option>
              	@endforeach
              </select>
            </div>
          <div class="form-group">
            <label for="to">NAME OF THE COMPANY / VENDOR NAME:=</label>
            <input type="text" class="form-control" id="to" placeholder="" name="company_name_vendor_name">
          </div>
          <div class="form-group">
            <label for="cc">STREET/HOUSE NUMBER*</label>
            <input type="text" class="form-control" id="cc" name="street">
          </div>

          <div class="form-group">
            <label for="cc">ADDRESS 1 *</label>
            <input type="text" class="form-control"  name="address1" >
          </div>

          <div class="form-group">
            <label for="cc">ADDRESS 2</label>
            <input type="text" class="form-control"  name="address2" >
          </div>

          <div class="form-group">
            <label for="cc">City *</label>
            <input type="text" class="form-control"  name="city" >
          </div>

          <div class="form-group">
            <label for="cc">State *</label>
            <input type="text" class="form-control"  name="state" >
          </div>

          <div class="form-group">
            <label for="cc">PIN *</label>
            <input type="text" class="form-control"  name="pin" >
          </div>

          <div class="form-group">
            <label for="cc">Country*</label>
            <input type="text" class="form-control"  name="country" >
          </div>

          <div class="form-group">
            <label for="cc">Contact Person Name*</label>
            <input type="text" class="form-control"  name="contact_person_name" >
          </div>
          <div class="form-group">
            <label for="cc">Telephone No. *</label>
            <input type="text" class="form-control"  name="tel_no" >
          </div>

          <div class="form-group">
            <label for="cc">Mobile No.*</label>
            <input type="text" class="form-control"  name="mobile_no" >
          </div>

          <div class="form-group">
            <label for="cc">Email</label>
            <input type="email" class="form-control"  name="email" >
          </div>

          <div class="form-group">
            <label for="cc">Type Of Industry</label>
            <input type="text" class="form-control"  name="industry_type" >
          </div>

          <div class="form-group">
            <label for="cc">Whether Located in SEZ/EOU*</label>    <br>
            <input type="radio" name="located" value="Yes">Yes
            <input type="radio" name="located" value="No">No
          </div>
          <p>Following Supporting Documents need to be submitted: attach documents</p>
           <div class="form-group">
            <label for="cc">a) Address proof</label>
            <input type="file" class="form-control"  name="address_proof">
          </div>

          <div class="form-group">
            <label for="cc">b) Copy of registration certificate/ Incorporation</label>
            <input type="file" class="form-control"  name="registration_certificate">
          </div>

          <div class="form-group">
            <label for="cc">c) Copy of PAN Card</label>
            <input type="file" class="form-control"  name="copy_pan_card" >
          </div>
          
                      
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection
