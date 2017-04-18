@extends('layouts.app')

@section('contentheader_title')
{{ trans('message.Ngo') }}
@endsection

@section('main-content')
<div class="box box-primary col-lg-6">
  <div class="box-header with-border ">
    <h3 class="box-title">{{ trans('message.ngo_add') }}</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(array('url' => '/ngo/create'),['method' => 'post', 'class' => 'form-horizontal']) !!}
    <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">  
    <div class="box-body">
      <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Name</label>  
           {!! $errors->first('name','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
        </div>        
      </div> 
      <div class="form-group {{ $errors->has('regdoffice') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Reg Office</label>  
           {!! $errors->first('regdoffice','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="regdoffice" value="{{ old('regdoffice') }}" placeholder="Reg Office" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Address</label>  
           {!! $errors->first('address','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('vision') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Vision</label>  
           {!! $errors->first('vision','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="vision" value="{{ old('vision') }}" placeholder="Vision" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Email</label>  
           {!! $errors->first('email','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" >
        </div>        
      </div>
      <div class="form-group {{ $errors->has('phoneno') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Phone No</label>  
           {!! $errors->first('phoneno','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="phoneno" value="{{ old('phoneno') }}" placeholder="Phone no" >
        </div>        
      </div>  
      <div class="form-group {{ $errors->has('others') ? 'has-error' :'' }}">  
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Others</label>  
           {!! $errors->first('others','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
          <input type="text" class="form-control" name="others" value="{{ old('others') }}" placeholder="Others" >
        </div>        
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a href="{{ url('/ngos') }}" class="btn btn-default pull-left" style="text-decoration:none">{{ trans('message.back') }}</a>              
        {!! Form::submit(trans('message.save'), ['class' => 'btn btn-info pull-right']) !!}           
    </div>
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection