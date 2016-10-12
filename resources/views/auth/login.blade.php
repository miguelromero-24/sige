<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>SIGE - Login</title>

    @include('partials.css')

</head>

<body class="login-img3-body">

<div class="container">
    {!! Form::open(array('url' => url('login'), 'method' => 'post', 'id' => 'loginForm', 'class' => 'login-form')) !!}
    <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>

        <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            {!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Usuario')) !!}
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            {!! Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>
        {!! Form::hidden('_token', csrf_token()) !!}
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
    </div>
    {!! Form::close() !!}
</div>


</body>
</html>