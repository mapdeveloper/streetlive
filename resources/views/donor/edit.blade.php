@extends('layouts.app')

@section('contentheader_title')
{{ trans('message.Donor') }}
@endsection

@section('main-content')
<div class="box box-primary col-lg-6" style = "padding-botton:10px;">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('message.donor_edit') }}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(array('url' => '/donor/edit'),['method' => 'post', 'class' => 'form-horizontal']) !!}
    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">  
    <input type="hidden" name="_method" id="_method" value="put"> 
    <input type="hidden" class="form-control" name="id" value="{{ old('id') ? old('id') : $donor->id }}" placeholder="id"> 
    <div class="box-body">
      <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Name</label>  
           {!! $errors->first('name','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="name" value="{{ old('name') ? : $donor->name }}" placeholder="Name" disabled = "disabled" >
        </div>        
      </div> 
      <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Address</label>  
           {!! $errors->first('address','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="address" value="{{ old('address')? : $donor->address }}" placeholder="Address" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('phoneno') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Phone No</label>  
           {!! $errors->first('phoneno','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="phoneno" value="{{ old('phoneno')? : $donor->phoneno }}" placeholder="Phone no" >
        </div>        
      </div> 
      <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Email</label>  
           {!! $errors->first('email','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="email" value="{{ old('email')? : $donor->email }}" placeholder="Email" >
        </div>        
      </div> 
      <div class="form-group {{ $errors->has('occupation') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Occupation</label>  
           {!! $errors->first('occupation','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="occupation" value="{{ old('occupation')? : $donor->occupation }}" placeholder="Occupation" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('occupation_details') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Occupation Details</label>  
           {!! $errors->first('occupation_details','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="occupation_details" value="{{ old('occupation_details')? : $donor->occupation_details }}" placeholder="Occupation Details" >
        </div>        
      </div> 
      <div class="form-group {{ $errors->has('panno') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Panno</label>  
           {!! $errors->first('panno','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="panno" value="{{ old('panno')? : $donor->panno }}" placeholder="Pan no" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('others') ? 'has-error' :'' }}">  
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Others</label>  
           {!! $errors->first('others','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="others" value="{{ old('others')? : $donor->others }}" placeholder="Others" >
        </div>        
      </div>
      @if (Auth::user()->role_id=='1')
      <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Active</label>  
           {{ Form::checkbox('is_active', 1,$donor->is_active , ['class' => 'field']) }}
      </div>  
      @endif
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ url('/donors') }}" class="btn btn-default pull-left" style="text-decoration:none">{{ trans('message.back') }}</a>              
      {!! Form::submit(trans('message.update'), ['class' => 'btn btn-info pull-right']) !!}           
    </div>
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection