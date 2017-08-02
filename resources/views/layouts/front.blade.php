<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="author" content="Mathias Robert <3 Le plus beau">

		<title>Assos ENSC</title>

		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/material-kit.min.css">
		<link rel="stylesheet" href="/css/app.css">

	    @yield('css')

	</head>
	<body>

		<nav class="navbar navbar-primary navbar-transparent navbar-absolute" role="navigation">
		    <div class="container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse"
		                    data-target="#bs-example-navbar-collapse-1">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="/">Assos ENSC</a>
		        </div>
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul class="nav navbar-nav navbar-right">
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Les Assos <b class="caret"></b></a>
		                    <ul class="dropdown-menu">
		                        @foreach($assoDiminutifs as $diminutif)
		                            <li>
		                                <a href="/asso/{!! $diminutif !!}">{!! $diminutif !!}</a>
		                            </li>
		                        @endforeach
		                    </ul>
		                </li>
		                <li>
		                    <a href="/calendrier"><i class="material-icons">event</i> Calendrier</a>
		                </li>

		                @if(Auth::guest())
		                    <li><a href="{{ route('login') }}">Connexion</a></li>
		                @else
		                    <li class="dropdown">
		                        <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		                            <div class="profile-photo-small">
		                                <img id="avatar" class="img-circle img-responsive" src="{{ Auth::user()->avatar }}"
		                                     alt="avatar">
		                            </div>
		                            <b class="caret"></b>
		                        </a>
		                        <ul class="dropdown-menu">
		                            <li>
		                                <a href="#">Mon compte</a>
		                            </li>
		                            <li>
		                                <a href="#">Mes événements</a>
		                            </li>
		                            <li>
		                                <a href="{{ route('logout') }}"
		                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		                                    Se déconnecter
		                                </a>

		                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
		                                      style="display: none;">{{ csrf_field() }}</form>
		                            </li>
		                        </ul>
		                    </li>
		                @endif

		                @if(Auth::check() && Auth::user()->isAdmin())
		                    <li><a href="{{ route('admin') }}">Admin</a></li>
		                @endif
		            </ul>

		        </div>
		    </div>
		</nav>

		@yield('header')

		@yield('content')

		<footer class="footer">
			@if(Auth::guest())
			    <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
			@endif
			<div class="copyright text-center">
			    Copyright &copy; Assos ENSC 2017
			</div>
	    </footer>

		<!--   Core JS Files   -->
		<script src="/js/jquery.min.js" type="text/javascript"></script>
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/js/material.min.js"></script>
		<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
		<script src="/js/moment.min.js"></script>
		

		<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
		<script src="/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
		
		<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
		<script src="/js/bootstrap-selectpicker.js" type="text/javascript"></script>
		
		<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
		<script src="/js/bootstrap-tagsinput.js"></script>

		<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
		<!-- <script src="/js/jasny-bootstrap.min.js"></script> -->
		
		<!--    Plugin for 3D images animation effect, full documentation here: https://github.com/drewwilson/atvImg    -->
		<script src="/js/atv-img-animation.js" type="text/javascript"></script>
		

		<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
		<script src="/js/material-kit.min.js" type="text/javascript"></script>

		@yield('scripts')

		<script src="/js/app.js" type="text/javascript"></script>
	</body>

</html>