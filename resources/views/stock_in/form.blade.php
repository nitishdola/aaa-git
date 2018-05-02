@extends('layout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Stationary Receive</h4>
          </div>
          <div class="content">

              {!! Form::open(array('route' => ['stock.receive.post'], 'id' => 'stock.receive.post', 'class' => '')) !!}

                  @include('stock_in._form')
                  <div class="text-center1">
                      <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                  </div>
                  <div class="clearfix"></div>
              {!! Form::close() !!}
          </div>
      </div>
  </div>


</div>
@stop