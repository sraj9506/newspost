

// A $( document ).ready() block.
$(document).ready(function() {
     

      
    $("#form").validate(
        {
          

          rules:{
            name:"required",
            email:"required",
           
            num:{
                required:true,
                minlength:10,
                maxlength:10,
                number:true,

            },
            password:{
                required:true,
                minlength:10,
                // maxlength:10,
            },
            cpassword : {
                minlength : 10,
                equalTo : "#password"
            },
    
           
          },messages:
          {
             num:"Please enter at least 10 Number",
             password:"Please enter strong password",
             cpassword:"password does not match",
            
             

          }
            
        }
    
    );
});

