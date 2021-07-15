<!DOCTYPE html>
<html lang="en">
<head>
    <title>Netflix</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--  Noty Notifications--}}
//Jquery

    <script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('admin/plugins/noty.css') }}">
    <script src="{{ asset('admin/plugins/noty.js') }}"></script>
    <script src="{{ asset('admin/plugins/noty.min.js') }}"></script>

</head>
<body class="app sidebar-mini">

<!-- Navbar-->
@include('layouts.admin.header')

@include('layouts.admin.aside')
<main class="app-content">
{{--@include('admin.partials.noty')--}}
@yield('content')

</main>
<!-- Essential javascripts for application to work-->

<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

//select2
<script src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>
<script>
    $(document).ready(function (){
        $(document).on('click','.delete',function (e){
            e.preventDefault();
            var that = $(this);
            var n = new Noty({
                text: "Confirm deleting recode",
                killer:true,
                buttons: [
                    Noty.button('Yes','btn btn-success mr-2',function () {
                        that.closest('form').submit()
                        }),
                    Noty.button('NO','btn btn-danger',function (){
                        n.close()
                        }),
                ]
            });
            n.show();
        });
    });
    //select2
    $('.select2').select2({
        width: '100%'
    });

</script>


</body>
</html>
