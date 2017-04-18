@extends('layouts.app')

@section('contentheader_title')
{{ trans('donate.donate') }}
@endsection
@section('main-content')
<div class="box box-primary col-lg-6">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('donate.amount') }}</h3>
  </div>
  <!--message Details starts here !-->
  @if(Session::has('success_msg'))
  <div class="alert alert-success">
      <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
      {{Session::get('success_msg')}}
  </div> <!-- /.alert -->
  @endif
  @if(Session::has('error_msg'))
  <div class="alert alert-danger">
      <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
      {{Session::get('error_msg')}}
  </div> <!-- /.alert -->
  @endif
  @if(isset($errors) && !empty($errors))
      @foreach ($errors->all() as $message)
          <p class="error">{{$message}}</p>
      @endforeach
 @endif
 <!--message Details ends here !-->
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(array('url' => '/paynow'),['method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="box-body">
      <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Donate Amout</label>  
           {!! $errors->first('amount','<label class="control-label pull-right" for="inputError"><i class="fa fa-times-circle-o"></i> :message</label>') !!}                 
            <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="Donate Amount" >
            <input type="hidden" id="merchantTxnId" name="merchantTxnId" value= "1234567"/>
             <input type="hidden" id="transactionId" name="transactionId" value= "000123"/>
            <input type="hidden" id="firstName" name="firstName" value="mapol" />
            <input type="hidden" id="email" name="email" value="developer@gmail.com" />
            <input type="hidden" id="currency" name="currency" value= INR  />
            <input type="hidden" id="status" name="status" value= "success"  />
            <input type="hidden" name="returnUrl" value="http://localhost/streetlights/public/home" />

    </div>        
      </div> 
   <div> 
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a href="{{ url('dashboard') }}" class="btn btn-default pull-left" style="text-decoration:none">{{ trans('donate.back') }}</a>              
      {!! Form::submit(trans('donate.donate'), array('class' => 'btn btn-info pull-right','id'=>'pay_now')) !!}
     
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection
