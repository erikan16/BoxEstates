<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="img-responsive" src="{{ asset('assets/images/small_logo.png') }}"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img class="img-responsive" src="{{ asset('assets/images/large_logo-01.png') }}"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $user->name; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                            <p>
                                <?= $user->name ?> - Agent
                                <small>Member since <?= (new \DateTime($user->created_at))->format('M. jS Y') ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('/') ? "active" : " " }}">
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ Request::is('/') ? "active" : " " }}">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Properties</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('/') ? "active" : " " }}">
                        <a href="{{ route('property.index') }}"><i class="fa fa-circle-o"></i> View All Post</a>
                    </li>
                    <li class="{{ Request::is('/') ? "active" : " " }}">
                        <a href="{{ route('property.create') }}"><i class="fa fa-circle-o"></i>New Post</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::is('/') ? "active" : " " }}">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Articles</span>
                    <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('/') ? "active" : " " }}">
                        <a href="{{ route('article.index') }}"><i class="fa fa-circle-o"></i> View All Post</a>
                    </li>
                    <li class="{{ Request::is('/') ? "active" : " " }}">
                        <a href="{{ route('article.create') }}"><i class="fa fa-circle-o"></i>New Post</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>