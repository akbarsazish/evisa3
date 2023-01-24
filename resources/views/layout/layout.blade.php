<!DOCTYPE html>
<html dir="rtl">
        <head>
            <meta charset="UTF-8">
            <meta name="author" content="Ali Akbar Sazish and Javad Akhlaqi">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
            <title> ویزا الکترونیک </title>
            <link rel="icon" type="image/png" href="{{ url('resources/assets/images/logo.png')}}">
            <link rel="stylesheet" href="{{ url('/resources/assets/css/bootstrap.min.css')}}" rel="stylesheet">
            <link rel="stylesheet" href="{{ url('/resources/assets/fontawesome/css/all.min.css')}}">
            <link rel="stylesheet" href="{{ url('/resources/assets/css/mainAdmin.css')}}">
            <link rel="stylesheet" href="{{url('/resources/assets/js/persianDatepicker-master/css/persianDatepicker-default.css')}}" />
            <link rel="stylesheet" href="{{ url('/resources/assets/js/jquery-ui.css')}}"/>
            <script src="{{ url('resources/assets/js/jquery.min.js')}}"></script>
            <meta name="theme-color" content="#6777ef"/>
            <link rel="manifest" href="{{ asset('/manifest.json') }}"> 
        </head>
        <body>

            @yield('content')
            
            <script src="{{url('/resources/assets/js/persianDatepicker-master/js/persianDatepicker.min.js')}}"></script> 
            <script src="{{ url('/resources/assets/js/script.js')}}"></script>
            <script defer src="{{ url('/resources/assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('/sw.js') }}"></script> 
        </body>
</html>
