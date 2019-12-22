<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/dist/images/owl-foresight.png') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/uikit-rtl.min.css') }}">
</head>
<body>
    
    @section('content')

    @show
    

    <script src="{{ asset('/dist/js/uikit.min.js') }}"></script>
    <script src="{{ asset('/dist/js/uikit-icons.min.js') }}"></script>

</body>
</html>