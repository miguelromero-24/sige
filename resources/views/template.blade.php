<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>SIGE</title>
    @include('partials.css')
</head>

<body>
<!-- container section start -->
<section id="container" class="">


    @include('partials.header')
    @include('partials.left_navbar')

            <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            @include('partials.breadcrumb')

            @yield('main')

        </section>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->
@yield('js')
    @parent
    @include('partials.javascript')

</body>
</html>
