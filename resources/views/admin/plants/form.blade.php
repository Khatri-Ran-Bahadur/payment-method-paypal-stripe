@extends('layouts.admin')

@section('content')
<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
             @if(!isset($plant)) Add Plant @else Update Plant @endif 
             @if(Session::has('message'))
<span class="alert alert-info">{{ Session::get('message') }}</span>
@endif
        </div>
        <div class="card-body">
        <form action="@if(isset($plant)){{route('plants.update',$plant->id)}}@else{{route('plants.store')}}@endif" method="post">
            @if(isset($plant))
                @method('PUT')
            @endif
            @csrf
            <div class="form-group">
              <label for="inputPlant">Plant</label>
              <input type="text" class="form-control" id="inputPlant" placeholder="Enter Plant" name="plant" value="{{old('plant',@$plant->plant)}}">
            </div>
          <div class="form-group">
            <label for="to">TO</label>
            <input type="email" class="form-control" id="to" placeholder="" name="to" value="{{old('plant',@$plant->to)}}">
          </div>
          <div class="form-group">
            <label for="cc">CC</label>
            <input type="email" class="form-control" id="cc" name="cc" value="{{old('plant',@$plant->cc)}}">
          </div>

          <div class="form-group">
            <label for="cc">BCC</label>
            <input type="email" class="form-control" id="bcc" name="bcc" value="{{old('plant',@$plant->bcc)}}">
          </div>
                      
          <button type="submit" class="btn btn-primary">{{(@$plant)?'Update':'Submit'}}</button>
        </form>
    </div>
</div>
@endsection