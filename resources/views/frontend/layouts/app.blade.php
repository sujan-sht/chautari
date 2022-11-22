<!doctype html>
<html lang="en">

<head>
    <!-- REQUIRED META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!--BOXICON-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <!--OWL CAROUSEL-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SIummerNote Editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/photo.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vars.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/termsncondition.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/about-us.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/news-details.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/news-post.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/category.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/contact-us.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    
    @php
    $setting = \App\Models\SiteSetting::first();
    @endphp
    @if (!empty($setting))
    <link rel="icon" type="image/x-icon" href="{{asset('admin/image/'.$setting->favicon)}}">
    @endif
    <!-- FAVICON -->
    <!-- TITLE -->
    <title>{{$setting->title}}</title>
    <style>
        :root {
            --primary-color:{{$setting->primary_color ? $setting->primary_color : '#27244f'}} !important;
            --secondary-color:{{$setting->secondary_color ? $setting->secondary_color : '#d80822'}} !important;
            --white-color: #ffffff;
            --black-color: #000000;
            --font-color: rgb(131, 131, 131);
            --section-color: #f1f1f1;
            --dark-color: #090706;
            --primary-font: "Mukta", sans-serif;
            --secondary-font: "Poppins", sans-serif;
            --box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            --breadcrumb: rgb(240, 239, 239);
        }
    </style>
</head>


<body>

    @include('frontend.includes.nav')

    @yield('content')
    @include('frontend.includes.footer')



    @include('frontend.includes.modal')
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=61da909ca3f186001956822c&product=inline-share-buttons"
        async="async"></script>
    <script type='text/javascript'
        src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.unveil.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
<script>

</script>
</body>

</html>
