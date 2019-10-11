@extends( 'layouts.app' )
@section( 'content' )
<div class="page login-page">
	<div class="container d-flex align-items-center">
		<div class="form-holder has-shadow">
			<div class="row">
				<!-- Logo & Information Panel-->
				<div class="col-lg-6">
					<div class="info d-flex align-items-center">
						<div class="content">
							<div class="logo">
								<div class="avatar text-center"><img src="/img/logo.png" alt="TIMSLogo"
										class="img-fluid" width="500" height="350">
								</div>
								<div class="title">

									<br>
									<h3 class="text-center">TRANSPORT INFORMATION MANGMENT SYSTEM(TIMS)</h3>
									<br>
									<p><i class="fa fa-user"></i> Developed By Yetimesht Tadesse</p>
									<p><i class="fa fa-mobile"></i> &nbsp; +251929102926</p>
									<p><i class="fa fa-google"></i> &nbsp; yetimnew@gmail.com</p>
									<p><i class="fa fa-facebook"></i> &nbsp; https://www.facebook.com</p>

								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- Form Panel    -->
				<div class="col-lg-6 bg-white">
					<div class="form d-flex align-items-center">
						<div class="content">
							<div class="card">
								<div class="card-header text-center"><strong> User Registration</strong>
								</div>

								<div class="card-body">
									<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
										@csrf
										<div class="form-group required">
											<label class="control-label">Full Name</label>
											<input id="name" type="text"
												class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
												name="name" value="{{ old('name') }}" required autofocus> @if
											($errors->has('name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group required">
											<label for="email"
												class="control-label col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


											<input id="email" type="email"
												class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
												name="email" value="{{ old('email') }}" required> @if
											($errors->has('email'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group required">
											<label for="password"
												class="control-label  col-form-label text-md-right">{{ __('Password') }}</label>


											<input id="password" type="password"
												class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
												name="password" required> @if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group required">
											<label for="password-confirm"
												class="control-label  col-form-label text-md-right">{{ __('Confirm Password') }}</label>


											<input id="password-confirm" type="password" class="form-control"
												name="password_confirmation" required>
										</div>

										<div class="form-group required">
											<label for="photo" class="col-form-label text-md-right ">User Photo</label>
											<input id="photo" type="file" class="form-control" name="photo">
										</div>


										<div class="form-group row mb-0">
											<div class="col-md-6 offset-md-4">
												<button type="submit" class="btn btn-primary">
													{{ __('Register') }}
												</button>

											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyrights text-center">
				<p>Design by <a href="#" class="external">Yetimeshet T</a>
				</p>
			</div>
		</div>
		@endsection