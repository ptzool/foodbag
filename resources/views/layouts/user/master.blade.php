
<!DOCTYPE html>
<html>
<head>

    @include("layouts.components.header-includes")

</head>
<body class="skin-blue">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <a href="{{ Config::get('app.url') }}" class="logo"><b>Food</b>bag</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                @include("navigation.user.navbar")
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            @include("navigation.user.sidebar")
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page['title'] or "Foodbag" }}
                <small>{{ $page['subtitle'] or "Simple eats & weight tracking" }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2015 <a href="http://gocompose.com/foodbag">Gocompose</a>.</strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->

@include("layouts.components.scripts")

</body>
</html>