<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doctor Please Login &amp; Register</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Welcome to Doctor Please</strong> Login &amp; Register</h1>
                            <div class="description">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">

                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to your account</h3>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
  				                    {!!Form::open(['route'=>'login','method'=>'post', 'enctype'=>'multipart/form-data'])!!}
  				                    	<div class="form-group">
                                  {{ Form::label('email', 'Email ID', ['class' => 'sr-only','for'=>'form-username']) }}
                                  {{ Form::text('email',old("email"),['class'=>'form-username form-control','placeholder'=>'Email ID','id'=>'form-username','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','required','autofocus'])}}
				                        </div>

				                        <div class="form-group">
                                  {{ Form::label('password', 'Password', ['class' => 'sr-only','for'=>'form-password']) }}
                                  {{ Form::password('password',['class'=>'form-password form-control','id'=>'form-password','placeholder'=>'Password Minimum 6 characters','pattern'=>'.{6,}','title'=>'Six or more characters','required'])}}
				                        </div>
				                        <button type="submit" class="btn">Sign in!</button>
  				                    {!! Form::close() !!}
			                    </div>
		                    </div>

		                	<!-- <div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	<div class="social-login-buttons">
		                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
		                        		<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="btn btn-link-1 btn-link-1-google-plus" href="#">
		                        		<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div> -->

                        </div>

                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">

                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
	                            {!!Form::open(['route'=>'register','method'=>'post', 'enctype'=>'multipart/form-data'])!!}
				                    	<div class="form-group">
                                {{ Form::label('name', 'Full Name', ['class' => 'sr-only','for'=>'form-first-name']) }}
                                {{ Form::text('name',old("name"),['class'=>'form-first-name form-control','placeholder'=>'Full Name','id'=>'form-first-name','required'])}}
			                        </div>

			                        <div class="form-group">
                                {{ Form::label('userEmail', 'Email ID', ['class' => 'sr-only','for'=>'form-email']) }}
                                {{ Form::text('email',old("email"),['class'=>'form-last-name form-control','placeholder'=>'Email ID','id'=>'form-last-name','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','required','autofocus'])}}
			                        </div>

			                        <div class="form-group">
                                {{ Form::label('mobile', 'Mobile Number', ['class' => 'sr-only','for'=>'form-username']) }}
                                {{ Form::text('mobile',old("mobile"),['class'=>'form-email form-control','placeholder'=>'Mobile Number','id'=>'form-email','pattern'=>'[0-9]{11}','maxlength'=>'11','required'])}}
			                        </div>

                              <div class="form-group">
                                {{ Form::label('password', 'Password', ['class' => 'sr-only','for'=>'form-password']) }}
                                {{ Form::password('password',['class'=>'form-password form-control','id'=>'form-password','placeholder'=>'Password Minimum 6 characters','pattern'=>'.{6,}','title'=>'Six or more characters','required'])}}
			                        </div>

                              <div class="form-group">
                                {{ Form::password('password_confirmation',['class'=>'form-password form-control','id'=>'form-password','placeholder'=>'Confirm Password','pattern'=>'.{6,}','title'=>'Six or more characters','required'])}}
			                        </div>

			                        <button type="submit" class="btn ">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">

        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>© {{date('Y')}} - <a href="http://doctorplease.com.bd">doctorplease.com.bd</a> All Rights Reserved. Developed and maintenance by nanoworkerbd.com.</p>
        			</div>

        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>



    </body>

</html>
