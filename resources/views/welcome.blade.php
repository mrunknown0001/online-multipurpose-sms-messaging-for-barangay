<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $setting->app_name }}</title>
  <link type="text/css" rel="stylesheet" href="{{ asset('landing/css/style.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('modular/css/vendor.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('modular/css/app-blue.css') }}" />
  <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    a {
      margin-top: 5px;
    }
    .black-opcity {
      background: rgba(0, 0, 0, 0.4) !important;
      height: 100%;
      width: 100%;
    }
  </style>
</head>
<body>
  <header id="home">
    <div class="bg-img" style="background-image: url({{ asset('landing/img/bg.jpg') }});">
      <div class="black-opcity"></div>
    </div>
    <div class="home-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="home-content">
               <h1 class="white-text">{{ $setting->barangay_name }}</h1>
			         <a href="{{ route('login') }}" class="btn btn-primary btn-lg"><i class="fa fa-user"></i> Login</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </header>
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('landing/js/main.js') }}"></script>
</body>
</html>