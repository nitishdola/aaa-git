@extends('layout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Excel Upload</h4>
          </div>
          <div class="content">

              {!! Form::open(array('route' => ['process.excel'], 'id' => 'process.excel', 'files' => true)) !!}

                  <div class="row">
                    <div class="col-md-6">
                      <input type="file" name="mis_excel">
                    </div>
                  </div>
                  <div class="text-center1" style="margin-top: 20px;">
                      <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                  </div>
                  <div class="clearfix"></div>
              {!! Form::close() !!}
          </div>
      </div>
  </div>


</div>
@stop