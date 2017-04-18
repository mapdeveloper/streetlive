@extends('layouts.app')

@section('contentheader_title')
{{ trans('donate.pay_now') }}
@endsection
@section('main-content')
<div class="box box-primary col-lg-6">
  <div class="box-header with-border">
    <h3 class="box-title">{{ trans('donate.pay_now') }}</h3>
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
  <?php
   // $formPostUrl = "https://sandbox.citruspay.com/citrus-demo-jsp/paymentOptions.jsp";	
    $formPostUrl = "https://sandbox.citruspay.com/sslperf/johntest";	
    $secret_key = "371425c568ac70333e0b24652591ea6126de9827";
    $vanityUrl = "johntest";
    $merchantTxnId = uniqid(); 
    $orderAmount = "8.00";
    $currency = "INR";
    $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
    $notifyUrl = "www.YourDomain.com/notifyResponsePage";	
    $securitySignature = hash_hmac('sha1', $data, $secret_key);  
  ?>
  <!-- form start -->
  {!! Form::open(array('url' => $formPostUrl),['method' => 'post', 'class' => 'form-horizontal']) !!}
    <div class="box-body">
      <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">      
        <div class="input-group col-lg-12">            
          <label for="inputName" class=" control-label">Amout:</label>  
            {{$amount}}
    </div>        
      </div> 
   <div> 
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit(trans('donate.pay_now'), array('class' => 'btn btn-info pull-right','id'=>'pay_now')) !!}
     
    <!-- /.box-footer -->
  {!! Form::close() !!}
</div>
@endsection
