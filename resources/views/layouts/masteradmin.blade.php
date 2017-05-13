<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ez Travel - Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Navigation -->
<nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{route('admin.dashboard')}}"><i class="fa fa-paper-plane"></i>&nbsp;Ez Travel - Admin Panel</a>
    <div class="collapse navbar-collapse" id="navbarExample">
        <ul class="sidebar-nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="scroll-to-bot nav-link" href="#chart"><i class="fa fa-fw fa-area-chart"></i> Charts</a>
            </li>
            <li class="nav-item">
                <a class="scroll-to-bot nav-link" href="#table"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i
                            class="fa fa-fw fa-wrench"></i> Components</a>
                <ul class="sidebar-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="#">Fixed Navigation</a>
                    </li>
                    <li>
                        <a href="#">Custom Card Examples</a>
                    </li>
                    <li>
                        <a href="#">Blank Page</a>
                    </li>
                    <li>
                        <a href="#">Login Page</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"><i
                            class="fa fa-fw fa-sitemap"></i> Menu Levels</a>
                <ul class="sidebar-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third
                            Level</a>
                        <ul class="sidebar-third-level collapse" id="collapseMulti2">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-envelope"></i> <span class="hidden-lg-up">Messages <span
                                class="badge badge-pill badge-primary">{{$sql}} New</span></span>
                    <span class="new-indicator text-primary hidden-md-down"><i class="fa fa-fw fa-circle"></i>
                        <span class="number">{{$sql}}</span>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">New Messages:</h6>
                    <div class="dropdown-divider"></div>
                    @foreach($contact as $row)
                        <a class="dropdown-item" href="#">
                            <strong>{{$row->name}}</strong> <span
                                    class="small float-right text-muted">{{$row->created_at}}</span>
                            <div class="dropdown-message small">{{$row->message}}</div>
                        </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">
                        View all messages
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i> <span class="hidden-lg-up">Alerts <span
                                class="badge badge-pill badge-warning">{{$sql}} New</span></span>
                    <span class="new-indicator text-warning hidden-md-down"><i class="fa fa-fw fa-circle"></i><span
                                class="number">{{$sql}}</span></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                    </div>
                </form>
            </li>
            <li class="dropdown nav-item" style="color: white">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a style="text-decoration: none" href="/ez"><i class="fa fa-fw fa-eye"></i> View
                            Site</a></li>
                    <li>
                        <a style="text-decoration: none" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-sign-out"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-chevron-up"></i>
</a>

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/tether/tether.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for this template -->
<script src="/js/sb-admin.min.js"></script>

</body>
</html>
