<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="csrf-token" content="content"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Laravel Assignment</title>
  </head>
  <body>
    <section class="content container">
      <div class="container-fluid">
    	<h1>Laravel Developer Assignment</h1>

    	@if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        	<strong>{!! session('flash_message_error') !!}!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(Session::has('flash_message_success'))      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> you have signed up successfully.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
        @endif 

	    <form method="post" action="{{ url('/signin') }}">
	    @csrf


		 <div class="form-group mt-4">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Username</label>
				</div>
				<div class="col-md-3">
			    	<input type="text" class="form-control" name="username" id="username"  placeholder="Username" required>
				</div>
			</div>
		  </div>

		 <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Password</label>
				</div>
				<div class="col-md-3">
			    	<input type="password" class="form-control" name="password" id="password"  placeholder="Password" required>
				</div>
			</div>
		  </div>


		  <button type="submit" class="btn btn-primary mb-3">Sign In</button>
		  <p>Don't have an account <a href="{{ ('/') }}">Sign up here</a></p>
		</form>

	</div>
	</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>