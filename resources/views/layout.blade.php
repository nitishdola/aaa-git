<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AAAS Stock</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/Zebra_Datepicker/dist/css/default/zebra_datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/selectize/dist/css/selectize.default.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/data-table/datatables.min.css') }}" rel="stylesheet" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    @yield('pageCss')

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    	@include('common.sidebar')
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            @include('common.navigation')
        </nav>


        <div class="content">
            <div class="container-fluid">

                @if(Session::has('message'))
                <div class="row">
                   <div class="col-lg-12">
                         <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                               <button type="button" class="close" data-dismiss="alert">×</button>
                               {!! Session::get('message') !!}
                         </div>
                      </div>
                </div>
                @endif


                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                @include('common.footer')
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>


	<script src="{{ asset('assets/Zebra_Datepicker/dist/zebra_datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/selectize/dist/js/standalone/selectize.min.js') }}"></script>

    <script src="{{ asset('assets/data-table/datatables.min.js') }}"></script>

    <script src="{{ asset('js/canvasjs.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input.zebra').Zebra_DatePicker({ 'format' : 'd-m-Y'});

            $('.selectize').selectize({
                create: true,
                sortField: 'text'
            });

            $('.selectize_nocreate').selectize({
                create: false,
                sortField: 'text'
            });

            $('.dataTable').DataTable({ "bPaginate": false});
        });
    </script>
	@yield('pageJs')

</html>
