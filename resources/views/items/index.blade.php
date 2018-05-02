@extends('layout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Items Report</h4>
          </div>
          <div class="content">
              <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content table-responsive table-full-width ">
                                <table class="table table-striped dataTable">

                                    <thead>
                                      <th>Sl No</th>
                                      <th>Name</th>
                                      <th>Current Stock</th>
                                      
                                    </thead>
                                    <tbody>
                                      @foreach($results as $k => $v)

                                        <tr>
                                          <td>{{ $k+1 }}</td>
                                          <td>{{ $v->name }}</td>
                                          <td>{{ $v->stock_in_hand }}</td>
                                        </tr>
                                      
                                      @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
          </div>
      </div>
  </div>


</div>
@stop
