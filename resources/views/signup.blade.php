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

	    <form method="post" action="{{ url('/signup') }}" >
	    @csrf
		  <div class="form-group mt-4">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">User Name</label>
				</div>
				<div class="col-md-3">
			    	<input type="text" class="form-control" name="fname" id="fname"  placeholder="First Name" required maxlength="10">
				</div>
			    <div class="col-md-3">
			    	<input type="text" class="form-control" name="lname" id="lname"  placeholder="Last Name" required maxlength="10">
				</div>
			</div>
		  </div>

		  <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Contact Number</label>
				</div>
				<div class="col-md-3">
			    	<input type="text" class="form-control" name="contact" id="contact"  placeholder="Contact Number" required maxlength="10">
				</div>
			</div>
		  </div>

		  <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Email ID</label>
				</div>
				<div class="col-md-3">
			    	<input type="email" class="form-control" name="email" id="email"  placeholder="Email ID" required>
				</div>
			</div>
		  </div>

		  <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Address</label>
				</div>
				<div class="col-md-3">
			    	<Textarea class="form-control" name="address" placeholder="Address" required></Textarea>
				</div>
			</div>
		  </div>

		  <div class="form-group mt-4">
		    <div class="row">
		    	<div class="col-md-2">
			    	<select id="country" name="country" class="form-control" required>
			    		<option value="">Select Country</option>
			    		@foreach($country as $country_name)
			    		<option value="{{ $country_name->id }}">{{ $country_name->country }}</option>
			    		@endforeach
			    		

			    	</select>	
				</div>
				<div class="col-md-3">
                        <select id="state" name="state" class="form-control" required>
                        </select>	
				</div>
			    <div class="col-md-3">
                        <select id="city" name="city" class="form-control" required>
                        </select>
				</div>
			</div>
		  </div>

		 <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Username</label>
				</div>
				<div class="col-md-3">
			    	<input type="text" class="form-control" name="username" id="username"  placeholder="Username" required maxlength="20">
				</div>
			</div>
		  </div>

		 <div class="form-group">
		    <div class="row">
		    	<div class="col-md-2">
			    	<label for="">Password</label>
				</div>
				<div class="col-md-3">
			    	<input type="password" class="form-control" name="password" id="password"  placeholder="Password" required maxlength="20">
				</div>
			</div>
		  </div>

		  <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
		  <p>Already have an account <a href="{{ ('/login') }}">Sign in here</a></p>
		</form>

	</div>
	</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
	<!-- <script src="{{ asset('js/jquery.validate.js') }}"></script> -->
	<!-- <script src="{{ asset('js/main.js') }}"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var idCountry = this.value;
                $("#state").html('');
                $.ajax({

                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.state + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.city + '</option>');
                        });
                    }
                });
            });

        });

	  $(document).ready(function () {
	  $("#contact").keypress(function (e) {
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        $("#errmsg").html("Digits Only").show().fadeOut("slow");
	               return false;
	    }
	   });
	});
    </script>
  </body>
</html>