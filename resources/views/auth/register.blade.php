@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                  @if($errors)
                      @foreach ($errors->all() as $error)
                          <div>{{ $error }}</div>
                      @endforeach
                  @endif
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="to">Name</label>
                        <input type="text" class="form-control" id="to" placeholder="" name="name" value="{{old('name')}}">
                      </div>
                        <div class="form-group">
                          <label for="inputPlant">Delivery Plant</label>
                          <select class="form-control" name="plant_id">
                            @php $plants=App\Models\Plant::all(); @endphp
                            @foreach($plants as $plant)
                            <option value="{{$plant->id}}">{{$plant->plant}}</option>
                            @endforeach
                          </select>
                        </div>
                      <div class="form-group">
                        <label for="to">NAME OF THE COMPANY / VENDOR NAME:=</label>
                        <input type="text" class="form-control" id="to" placeholder="" name="company_name_vendor_name" value="{{old('company_name_vendor_name')}}">
                      </div>
                      <div class="form-group">
                        <label for="cc">STREET/HOUSE NUMBER*</label>
                        <input type="text" class="form-control" id="cc" name="street"  value="{{old('street')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">ADDRESS 1 *</label>
                        <input type="text" class="form-control"  name="address1"  value="{{old('address1')}}" >
                      </div>

                      <div class="form-group">
                        <label for="cc">ADDRESS 2</label>
                        <input type="text" class="form-control"  name="address2"  value="{{old('address2')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">City *</label>
                        <input type="text" class="form-control"  name="city"  value="{{old('city')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">State *</label>
                        <input type="text" class="form-control"  name="state" value="{{old('state')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">PIN *</label>
                        <input type="text" class="form-control"  name="pin"  value="{{old('pin')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">Country*</label>
                        <input type="text" class="form-control"  name="country"  value="{{old('country')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">Contact Person Name*</label>
                        <input type="text" class="form-control"  name="contact_person_name"  value="{{old('contact_person_name')}}">
                      </div>
                      <div class="form-group">
                        <label for="cc">Telephone No. *</label>
                        <input type="text" class="form-control"  name="tel_no"  value="{{old('tel_no')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">Mobile No.*</label>
                        <input type="text" class="form-control"  name="mobile_no"  value="{{old('mobile_no')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">Email</label>
                        <input type="email" class="form-control"  name="email"  value="{{old('email')}}">
                      </div>

                      <div class="form-group">
                        <label for="cc">Type Of Industry</label>
                        <input type="text" class="form-control"  name="industry_type" value="{{old('industry_type')}}" >
                      </div>

                      <div class="form-group">
                        <label for="cc">Whether Located in SEZ/EOU*</label>    <br>
                        <input type="radio" name="located" value="Yes" >Yes
                        <input type="radio" name="located" value="No">No
                      </div>
                      <p>Following Supporting Documents need to be submitted: attach documents</p>
                       <div class="form-group">
                        <label for="cc">a) Address proof</label>
                        <input type="file" class="form-control"  name="address_proof" >
                      </div>

                      <div class="form-group">
                        <label for="cc">b) Copy of registration certificate/ Incorporation</label>
                        <input type="file" class="form-control"  name="registration_certificate" >
                      </div>

                      <div class="form-group">
                        <label for="cc">c) Copy of PAN Card</label>
                        <input type="file" class="form-control"  name="copy_pan_card"  >
                      </div>


                        <div class="form-group">
                        <label for="to">Password</label>
                        <input type="password" class="form-control" id="to" placeholder="" name="password" >
                      </div>

                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Vendor Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
