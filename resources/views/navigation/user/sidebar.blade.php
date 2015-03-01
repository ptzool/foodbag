<!-- search form -->
<!--
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
    </div>
</form>
-->
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li>
        <a href="/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="header">EATS</li>

    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Quick</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Food log</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Edit Foods</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Weight Chart</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Calorie Chart</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}weight">
            <i class="fa fa-th"></i> <span>Weight History</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>All History</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    <li>
        <a href="{{ Config::get('app.url') }}">
            <i class="fa fa-th"></i> <span>Training</span> <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>

    <li class="header">TEST</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Manage Foods</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
    </li>


</ul>