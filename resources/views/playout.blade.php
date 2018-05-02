<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AAAS Package List</title>
    <meta name="description" content="AAAS Package List">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('passets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('passets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('passets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Package Details</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                   

                        <div class="card-body">
                    @if(count($results))
                  <table class="table table-striped table-bordered dataTable">
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


                      <th>MUMBAI (NABH) </th>
                      <th>MUMBAI (NON NABH) </th>


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
                          
                          <td>{{ number_format((float)$v->guwahati_nabh, 2, '.', '')  }}</td>
                          <td>{{ number_format((float)$v->guwahati_non_nabh, 2, '.', '')  }} </td>

                          <td>{{ number_format((float)$v->banglore_nabh, 2, '.', '')  }}</td>
                          <td>{{ number_format((float)$v->banglore_non_nabh, 2, '.', '')  }}</td>

                          
                          <td>{{ number_format((float)$v->mumbai_nabh, 2, '.', '')  }} </td>
                          <td>{{ number_format((float)$v->mumbai_non_nabh, 2, '.', '')  }}</td>
                          
                          <td>{{ number_format((float)$v->chennai_nabh, 2, '.', '')  }} </td>
                          <td>{{ number_format((float)$v->chennai_non_nabh, 2, '.', '')  }} </td>
                          
                          <td>{{ number_format((float)$v->kolkatta_nabh, 2, '.', '')  }} </td>
                          <td>{{ number_format((float)$v->kolkatta_non_nabh, 2, '.', '')  }}</td>

                          <td>{{ number_format((float)$v->delhi_nabh, 2, '.', '')  }} </td>
                          <td>{{ number_format((float)$v->delhi_non_nabh, 2, '.', '')  }}</td>
                          

                        </tr>
                      
                      @endforeach
                    </tbody>
                  </table>

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
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="{{ asset('passets//js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('passets//js/popper.min.js') }}"></script>
    <script src="{{ asset('passets//js/plugins.js') }}"></script>
    <script src="{{ asset('passets//js/main.js') }}"></script>


    <script src="{{ asset('passets//js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('passets//js/lib/data-table/datatables-init.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();

          $('.dataTable').DataTable({ "bPaginate": false,  "dom": '<"pull-left"f><"pull-right"l>tip' });

        } );
    </script>


</body>
</html>
