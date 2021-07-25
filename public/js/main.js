// Main Js File
$(document).ready(function () {
  
//Form Validations
$("#signupForm").validate({
    rules:{
        fname:{
            lettersonly: true,
            required:true,
            minlength:4,
            maxlength:20
        },
        lname:{
            lettersonly: true,
            required:true,
            minlength:4,
            maxlength:20
        },
        contact:{
            required:true,
            number:true,
            minlength:9,
            maxlength:12,
            // remote:'/check-mobile'
        },        
        email:{
            required:true,
            email:true,
            // remote:'/check-email'
        },
        address:{
            required:true,
            minlength:4,
            maxlength:20
        }, 
        country:{
            required:true
        },  
        state:{
            required:true
        },  
        city:{
            required:true
        },        
        username:{
            lettersonly: true,
            required:true,
            minlength:4,
            maxlength:20
        },
        password:{
            required:true,
            minlength:6,
            maxlength:20
        }
    },
    messages:{
        fname:{
            lettersonly: "Use only letters",
            required:"This field is mandatory",
            minlength:"First Name should not be less than 4 characters",
            maxlength:"First Name should not be more than 20 characters",
        },
        lname:{
            lettersonly: "Use only letters",
            required:"This field is mandatory",
            minlength:"Last Name should not be less than 4 characters",
            maxlength:"Last Name should not be more than 20 characters",
        },
        contact:{
            required:"This field is mandatory",
            number:"Enter Digits only",
            minlength:"Please enter valid mobile number",
            maxlength:"Please enter valid mobile number",
            // remote:"It looks like you are already used this number, please enter another."
        },        
        email:{
            required:"This field is mandatory",
            email: "Please enter valid email.",
            // remote:"It looks like you are already registered with us, please login to continue."
        },
        address:{
            required:"This field is mandatory",
            minlength:"Address should not be less than 4 characters",
            maxlength:"Address should not be more than 20 characters",
        },
        country:{
            required:"This field is mandatory",
        }, 
        state:{
            required:"This field is mandatory",
        }, 
        city:{
            required:"This field is mandatory",
        },        
        username:{
            lettersonly: "Use only letters",
            required:"This field is mandatory",
            minlength:"Username should not be less than 4 characters",
            maxlength:"Username should not be more than 20 characters",
        },
        password:{
            required:"This field is mandatory",
            minlength:"Password should not be less than 6 characters",
            maxlength:"Password maxlength limit is reached"
        }
    }
});

});