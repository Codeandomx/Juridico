<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Feb 2017 18:29:35 GMT -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
	<meta name="author" content="">
	@yield("metas")

    <!-- Title -->
    <title>Juridico - @yield('title')</title>

    <!-- vendor CSS -->
    <link rel="stylesheet" href="/_vendor/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/_vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/_vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/_vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="/_vendor/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" href="/_vendor/waves/waves.min.css">
    <link rel="stylesheet" href="/_vendor/switchery/dist/switchery.min.css">
    <link rel="stylesheet" href="/_vendor/morris/morris.css">
	<link rel="stylesheet" href="/_vendor/jvectormap/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" href="/_vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="/_vendor/DataTables/css/dataTables.bootstrap4.min.css">

    <!-- Neptune CSS -->
	<link rel="stylesheet" href="/css/core.css">

	@yield("styles")

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fixed-sidebar fixed-header skin-5 content-appear">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

		<!-- Sidebar -->
		<div class="site-overlay"></div>
		<div class="site-sidebar">
			<div class="custom-scroll custom-scroll-dark">
				<ul class="sidebar-menu">
					<li class="menu-title">Juridico</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Amparos</span>
						</a>
						<ul>
							<li><a href="/amparos">Registros</a></li>
							<li><a href="/amparos-reporte">Reportes</a></li>
                            <li><a href="/amparos-archivo">Archivo</a></li>
						</ul>
					</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Armas</span>
						</a>
						<ul>
							<li><a href="/armas">Registros</a></li>
							<li><a href="/armas-reporte">Reportes</a></li>
                            <li><a href="/armas-archivo">Archivo</a></li>
						</ul>
					</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Derechos humanos</span>
						</a>
						<ul>
							<li><a href="/derechos-humanos">Registros</a></li>
                            <li><a href="/derechos-humanos-reporte">Reportes</a></li>
                            <li><a href="/derechos-humanos-archivo">Archivo</a></li>
						</ul>
					</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Transparencia</span>
						</a>
						<ul>
							<li><a href="/transparencia">Registros</a></li>
							<li><a href="/transparencia-reporte">Reportes</a></li>
                            <li><a href="/transparencia-archivo">Archivo</a></li>
						</ul>
					</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Procedimientos administrativos</span>
						</a>
						<ul>
							<li><a href="/procedimientos-administrativos">Reporte</a></li>
						</ul>
					</li>
					<li class="with-sub">
						<a href="#" class="waves-effect  waves-light">
							<span class="s-caret"><i class="fa fa-angle-down"></i></span>
							<!--
								<span class="tag tag-purple">3</span>
							-->
							<span class="s-icon"><i class="ti-book"></i></span>
							<span class="s-text">Penal y siniestros</span>
						</a>
						<ul>
							<li><a href="/penal-siniestros">Registros</a></li>
							<li><a href="/penal-siniestros-form">Formularios</a></li>
                            <li><a href="#">Exportación</a></li>
                            <li><a href="#">Archivo</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

        <!-- Header -->
        <div class="site-header">
			<nav class="navbar navbar-dark">
				<div class="navbar-left">
					<a class="navbar-brand" href="/">
						<div class="logo"></div>
					</a>
					<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
						<span class="hamburger"></span>
					</div>
					<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
						<span class="more"></span>
					</div>
				</div>
				<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
					<!-- Menu para el perfil de usuario -->
					<ul class="nav navbar-nav float-md-right">
						<li class="nav-item dropdown hidden-sm-down">
							<a href="#" data-toggle="dropdown" aria-expanded="false">
								<span class="avatar box-32">
									<img src="/img/avatars/1.jpg" alt="">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right animated fadeInUp">
								<!--
								<a class="dropdown-item" href="#">
									<i class="ti-user mr-0-5"></i> Profile
								</a>
								<a class="dropdown-item" href="#">
									<i class="ti-settings mr-0-5"></i> Settings
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="ti-help mr-0-5"></i> Help</a>
								-->
								<a class="dropdown-item" href="#"><i class="ti-power-off mr-0-5"></i> Sign out</a>
							</div>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li class="nav-item hidden-sm-down">
							<a class="nav-link toggle-fullscreen" href="#">
								<i class="ti-fullscreen"></i>
							</a>
						</li>
					</ul>
					<!-- Formulario de busqueda -->
					<!--
					<div class="header-form float-md-left ml-md-2">
						<form>
							<input type="text" class="form-control b-a" placeholder="Search for...">
							<button type="submit" class="btn bg-white b-a-0">
								<i class="ti-search"></i>
							</button>
						</form>
					</div>
					-->
				</div>
			</nav>
		</div>

		<div class="site-content">
			<!-- Content -->
			<div class="content-area py-1">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- Footer -->
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-xs-center">
						<div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
							2019 © Sistema Juridico
						</div>
						<div class="col-sm-8 text-sm-right">
							<ul class="nav nav-inline l-h-2">
								<li class="nav-item"><a class="nav-link text-black" href="#">Privacy</a></li>
								<li class="nav-item"><a class="nav-link text-black" href="#">Terms</a></li>
								<li class="nav-item"><a class="nav-link text-black" href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
    </div>

    <!-- /_vendor JS -->
    <script type="text/javascript" src="/_vendor/jquery/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="/_vendor/tether/js/tether.min.js"></script>
    <script type="text/javascript" src="/_vendor/bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/_vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
    <script type="text/javascript" src="/_vendor/jscrollpane/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="/_vendor/jscrollpane/mwheelIntent.js"></script>
    <script type="text/javascript" src="/_vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="/_vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
    <script type="text/javascript" src="/_vendor/waves/waves.min.js"></script>
	<script type="text/javascript" src="/_vendor/switchery/dist/switchery.min.js"></script>
    <script type="text/javascript" src="/_vendor/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="/_vendor/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="/_vendor/flot/jquery.flot.stack.js"></script>
	<script type="text/javascript" src="/_vendor/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="/_vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script type="text/javascript" src="/_vendor/CurvedLines/curvedLines.js"></script>
    <script type="text/javascript" src="/_vendor/TinyColor/tinycolor.js"></script>
    <script type="text/javascript" src="/_vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="/_vendor/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script type="text/javascript" src="/_vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
	<script type="text/javascript" src="/_vendor/toastr/toastr.min.js"></script>
	<script type="text/javascript" src="/js/jquery-validate.min.js"></script>

    <!-- Neptune JS -->
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/demo.js"></script>

	@yield('scripts')
</body>
</html>
