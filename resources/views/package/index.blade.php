@extends('playout')

@section('content')
<div class="row">
  
  <div class="col-lg-12 col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Hospital Packages</h4>
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
                                      <th>Category</th>
                                      <th>Sub Category</th>
                                      <th>Procedure Code</th>
                                      <th>Procedure Name</th>
                                      
                                      <th>Guwahati (NABH) </th>
                                      <th>Guwahati (NON NABH) </th>

                                      <th>BANGLORE (NABH) </th>
                                      <th>BANGLORE (NON NABH) </th>


                                      <th>MUNMBAI (NABH) </th>
                                      <th>MUNMBAI (NON NABH) </th>


                                      <th>CHENNAI (NABH) </th>
                                      <th>CHENNAI (NON NABH) </th>

                                      <th>KOLKATA (NABH) </th>
                                      <th>KOLKATA (NON NABH) </th>

                                      <th>DELHI (NABH) </th>
                                      <th>DELHI (NON NABH) </th>
                                    </thead>
                                    <tbody>
                                      @foreach($results as $k => $v)

                                        <tr>
                                          <td>{{ $k+1 }}</td>
                                          <td>{{ $v->category }}</td>
                                          <td>{{ $v->sub_category }}</td>
                                          <td>{{ $v->procdure_code }}</td>
                                          <td>{{ $v->procedure_name }}</td>
                                          
                                          <td>{{ $v->guwahati_nabh }}</td>
                                          <td>{{ $v->guwahati_non_nabh }}</td>

                                          <td>{{ $v->banglore_nabh }}</td>
                                          <td>{{ $v->banglore_non_nabh }}</td>

                                          
                                          <td>{{ $v->mumbai_nabh }}</td>
                                          <td>{{ $v->mumbai_non_nabh }}</td>
                                          
                                          <td>{{ $v->chennai_nabh }}</td>
                                          <td>{{ $v->chennai_non_nabh }}</td>
                                          
                                          <td>{{ $v->kolkatta_nabh }}</td>
                                          <td>{{ $v->kolkatta_non_nabh }}</td>

                                          <td>{{ $v->delhi_nabh }}</td>
                                          <td>{{ $v->delhi_non_nabh }}</td>
                                          

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
