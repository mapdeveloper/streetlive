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
     
      </div>
    </div>
    <div class="box-body">
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <tbody>          
        </div>   
            <tr role="row" class="odd">
                <td>Name</td>
                @if($result[0]->name)
                    <td>{{$result[0]->name}}</td>
                @endif
            </tr>
            <tr>
                <td>Address</td>
                @if($result[0]->address)
                    <td>{{$result[0]->address}}</td>
                @endif         
            </tr>
            <tr>
                <td>Phone No</td>
                @if($result[0]->phoneno)
                    <td>{{$result[0]->phoneno}}</td>
                @endif          
            </tr>
              <tr>
                <td>Amount</td>
                <td>{{$transactions->amount}}</td>              
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$transactions->email}}</td>              
              </tr>
               <tr>
                <td>Transaction Id</td>
                <td>{{$transactions->transactionId}}</td>              
              </tr>
              <tr>
                <td>Status</td>
                <td>{{$transactions->status}}</td>              
            </tr>
          </tbody>         
        </table>  
@endsection

