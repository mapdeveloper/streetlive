@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.transaction') }}
@endsection

@section('contentheader_title')
{{ trans('message.transaction_details') }}
@endsection

@section('contentheader_subtitle')
{{ trans('message.transaction') }}
@endsection
{{-- List View --}}
@section('main-content') 
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
  @if(Session::has('error_msg'))
  <div class="alert alert-danger">
      <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
      {{Session::get('error_msg')}}
  </div> <!-- /.alert -->
  @endif
  <!--Message ends!-->
  <div class="box">
    <div class="box-header">                      
      <div class="">         
        <div class="col-lg-8">                  
        </div>  
        <div class="col-lg-3">      
         {!! Form::open(array('method' => 'get')) !!} 
          <div class="input-group input-group-sm  pull-right" style="width: 150px;">              
            <input type="text" name="table_search" value="{{ old('table_search') }}" class="form-control pull-right" placeholder="name">
            <div class="input-group-btn">
            {!! Form::button('<i class="fa fa-search"></i>', ['type'=>'submit','class' => 'btn btn-default']) !!}            
            </div>              
          </div>
          {!! Form::close() !!}    
        </div>
        <div class="col-lg-1 pull-right">              
          <a href="{{ url('transaction/exportcsv') }}" class="btn btn-block btn-primary" style="text-decoration:none"><i class="fa fa-file-excel-o"></i></a>          
       </div>
      </div>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <thead>
            <tr role="row">
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Name</th>
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Amount</th>
              <th class="sorting col-lg-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th> -->
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Merchant Id</th> 
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
               Transaction Id</th> 
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Currency</th> 
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">status</th> 
              <th class="sorting col-lg-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Created On</th>              
            </tr>
          </thead>
          <tbody>    
           @foreach ($transaction as $transactions)           
            <tr role="row" class="odd">
              @if(!empty($transactions->donors->name))
                <td>
                  <a href="{{ url('transactionsdetails/'.$transactions->id)}}">{{$transactions->donors->name}}</a>
                </td>
              @endif
              @if(!empty($transactions->ngos->name))
                <td>
                    <a href="{{ url('transactionsdetails/'.$transactions->id)}}">{{$transactions->ngos->name}}</a>
                </td>
              @endif
              @if(!empty($transactions->volunteers->name))
                <td>
                  <a href="{{ url('transactionsdetails/'.$transactions->id)}}">{{$transactions->volunteers->name}}</a>
                </td>
              @endif
              <td>{{$transactions->amount}}</td>
              <td>{{$transactions->email}}</td>
              <td>{{$transactions->merchantTxnId}}</td>
              <td>{{$transactions->transactionId}}</td>
              <td>{{$transactions->currency}}</td> 
              <td>{{$transactions->status}}</td> 
              <td>{{$transactions->created_at}}</td>                
            </tr>
          @endforeach
          </tbody>         
        </table> 
         <div class="pagination  no-margin pull-right">
            {{ $transaction->links() }}
        </div>
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div> <!-- end .flash-message -->       
      </div>
    </div>        
  </div>
</div>

{{-- Show View --}}
<div class="modal modal-default" id="show_country_info" style="left:0;right:0;top:0;bottom:0;margin:auto;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd class="modal-name"></dd>               
          </dl>
        </div>
      </div>        
    </div>
  </div>
</div>

<div class="modal modal-default" id="confirmDelete" id="delete_country">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <span id="pName"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection

