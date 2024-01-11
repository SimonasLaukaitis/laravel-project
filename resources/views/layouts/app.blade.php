<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel project - @yield('title')</title>

    {{-- <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <!-- Include Slick CSS from CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
   
</head>

<body>
<div class="text-center">
        <p></p>
        <a class="btn btn-primary mx-2" href="{{ route('index') }}">{{ __('app.home')}}</a>
        <div class="d-flex justify-content-end" style="margin-right: 20px; margin-top: 20px;">
            <p>Vardas Pavardė</p>
            <a class="btn btn-primary mx-2 disabled" href="">{{ __('app.logout')}}</a>
        </div>
  
    </div>


    @yield('content')

    <!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Slick JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
   $(document).ready(function(){
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
        responsive: [
            {
                breakpoint: 768, // Adjust this breakpoint as needed
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});

</script>

</body>

</html>
<!-- butinai gale tuscia eilute -->