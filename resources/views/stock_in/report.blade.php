@extends('layout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Stationary Receive Report</h4>
          </div>
          <div class="content">
              <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(count($results))
                            <div class="content table-responsive table-full-width ">
                                <table class="table table-striped dataTable">

                                    <thead>
                                      <th>Sl No</th>
                                      <th>Date</th>
                                      <th>Item</th>
                                      <th>Quantity</th>
                                      <th>Vendor</th>
                                      <th>Remarks</th>
                                    </thead>
                                    <tbody>
                                      @foreach($results as $k => $v)

                                        <tr>
                                          <td>{{ $k+1 }}</td>
                                          <td>{{ date('d-m-Y', strtotime($v->date_of_receive)) }}</td>
                                          <td>{{ $v->item->name }}</td>
                                          <td>{{ $v->quantity }}</td>
                                          <td>{{ $v->vendor_name }}</td>
                                          <td>{{ $v->remarks }}</td>
                                        </tr>
                                      
                                      @endforeach

                                    </tbody>
                                </table>

                            </div>

                            @else
                              <div class="alert alert-danger">
                                     <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>NO RESULTS FOUND !</strong>
                               </div>
                            @endif
                        </div>
                    </div>

                </div>
          </div>
      </div>
  </div>


</div>
@stop
