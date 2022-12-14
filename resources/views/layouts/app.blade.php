<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css"> -->
        <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
        <title>Gamers</title>
    </head>
    <body>
        <div class="home-wrapper">
            @include('includes.users.navbar')
            @yield('content')
            @include('includes.users.footer')
        </div>
        <script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery-ui.js"></script>
        <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
        <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery.stellar.min.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery.countdown.min.js"></script>
        <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('frontend') }}/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('frontend') }}/js/aos.js"></script>
        <script src="{{ asset('frontend') }}/js/main.js"></script>
    </body>
</html>