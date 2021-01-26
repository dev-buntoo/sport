<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login - HRMS admin template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('main')}}/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('main')}}/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{asset('main')}}/css/font-awesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('main')}}/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
			<script src="{{asset('main')}}/js/html5shiv.min.js"></script>
			<script src="{{asset('main')}}/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="account-page">

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		<div class="account-content">
			<div class="container">

				<div class="account-box w-100">

					<div class="account-wrapper">
                        @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                    @endif
						<h1 class="account-title">Two Factor Verification</h1>
						<p class="account-subtitle">You have received an email which contains two factor login code. If
							you haven't received it, press <a href="{{ route('verify.resend') }}">here</a></p>

						<!-- Account Form -->
                        <form method="POST" action="{{ route('verify.store') }}">
                            {{ csrf_field() }}
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-lock"></i></span>
								</div>
                                <input name="two_factor_code" type="text" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code">
                                @if($errors->has('two_factor_code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('two_factor_code') }}
                                    </div>
                                @endif
							</div>
							<div class="form-group pull-left mt-3">
								<button class="btn btn-primary account-btn" type="submit">Verify</button>
							</div>
							<div class="form-group pull-right mt-3">
								<a class="btn btn-danger logout" href="{{ route('logout') }}"
									style="padding:10px 26px;">Logout</a>
							</div>
						</form>
						<!-- /Account Form -->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{asset('main')}}/js/jquery-3.2.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('main')}}/js/popper.min.js"></script>
	<script src="{{asset('main')}}/js/bootstrap.min.js"></script>

	<!-- Custom JS -->
	<script src="{{asset('main')}}/js/app.js"></script>

</body>

</html>
