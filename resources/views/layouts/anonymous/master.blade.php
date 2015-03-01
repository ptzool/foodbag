
<!DOCTYPE html>
<html>
<head>
@include("layouts.components.header-includes")
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Food</b>bag</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        @yield('content')

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@include("layouts.components.scripts")

</body>
</html>