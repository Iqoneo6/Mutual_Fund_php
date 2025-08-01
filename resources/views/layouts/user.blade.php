<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{ $site_title }}" />
    <meta name="author" content="" />

    <link rel="icon" href="{{ asset('assets/images') }}/{{ $general->favicon }}">

    <title>{{ $site_title }} | {{ $page_title }}</title>

    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/font-icons/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/sweetalert.css') }}">

    <script src="{{ asset('assets/dashboard/js/jquery-1.11.3.min.js') }}"></script>

    @yield('style')

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>

            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="{{ Request::is('user-dashboard') ? " opened active" : "" }}">
                    <a href="{{ route('user-dashboard') }}">
                        <i class="entypo-gauge"></i>
                        <span class="title">Statement</span>
                    </a>

                </li>

                <li class="has-sub">
                    <a href="#">
                        <span class="title"><i class="fa fa-money"></i> Deposits</span>
                    </a>
                    <ul>

                        <li>
                            <a href="{{ route('manual-fund-add') }}">
                                <i class="fa fa-bank"></i>
                                <span class="title">Add Deposit</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manual-fund-history') }}">
                                <span class="title"><i class="fa fa-history"></i> Deposit History</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="has-sub">
                    <a href="#">
                        <span class="title"><i class="fa fa-reply-all"></i> Withdrawals</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('withdraw-new') }}">
                                <i class="fa fa-plus"></i>
                                <span class="title">New Withdrawal</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('withdraw-history') }}">
                                <span class="title"><i class="fa fa-history"></i> Withdrawal History</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ Request::is('user-activity') ? " opened active" : "" }}">
                    <a href="{{ route('user-activity') }}">
                        <i class="fa fa-indent"></i>
                        <span class="title">User Activity Log</span>
                    </a>
                </li>
				
				
									@foreach($withdrawalcnt as $c)
										@if( $member->name == $c->name )
											@continue;
										@endif	
											<li class="">
												<a href="../user/switch/start/{{$c->id}}" > 
													<i class="fa fa-address-book"></i>{{$c->name}}'s Account<br>
												</a>
											</li>
                                    @endforeach                             
														
									
						

            </ul>

        </div>

    </div>

    <div class="main-content">

        <div class="row">

            <div class="col-md-6">

            </div>

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-6 clearfix" style="padding-right: 50px;">

                <ul class="user-info pull-right pull-none-xsm">

                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img style="height: 40px" src="{{ asset('assets/images') }}/{{ Auth::user()->image }}" alt="" class="img-circle" width="44" />
                            {{ Auth::user()->name }} <i class="fa fa-sort-down"></i>
                        </a>

                        <ul class="dropdown-menu">

                            <!-- Reverse Caret -->
                            <li class="caret"></li>

                            <!-- Profile sub-links -->
                            <li>
                                <a href="{{ route('user-edit') }}">
                                    <i class="entypo-pencil"></i>Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user-password') }}">
                                    <i class="entypo-attention"></i>
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class=""><i class="fa fa-sign-out right"></i>Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>

        <hr />
        <div class="row">
            <div class="col-md-12">
                <!--  ==================================VALIDATION ERRORS==================================  -->
                @if($errors->any())
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!!  $error !!}
                        </div>

                @endforeach
            @endif
            <!--  ==================================SESSION MESSAGES==================================  -->
            </div>
        </div>

    @yield('content')


    <!-- Footer -->
        <footer class="main">

            &copy;Copyright  @php echo date('Y'); @endphp <strong>All  Reserved.</strong>

        </footer>
    </div>


</div>


<!-- Bottom scripts (common) -->
<script src="{{ asset('assets/dashboard/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/joinable.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/neon-api.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/sweetalert.min.js') }}"></script>

<script>
    @if (session()->has('message'))
        swal({
        title: "{!! session()->get('title')  !!}",
        text: "{!! session()->get('message')  !!}",
        type: "{!! session()->get('type')  !!}",
        confirmButtonText: "OK"
    });
    @endif

</script>


@yield('scripts')

<!-- JavaScripts initializations and stuff -->
<script src="{{ asset('assets/dashboard/js/neon-custom.js') }}"></script>


</body>
</html>