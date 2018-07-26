var Custom = function () {

    var myFunc = function(text) {

	/****
	* ajax - signup
	*****/

	$('#register-submit-btn').click(function(event){
		event.preventDefault ? event.preventDefault() : (event.returnValue = false);

        $("#register-submit-btn").prop('disabled',true);
        $("#reg_error").html('');
        $("#register-submit-btn").html('<i class="fa fa-spinner fa-pulse fa-fw margin-bottom"></i><span class="sr-only">Signing...</span>');

        var fullname 	  = $("#fullname").val();
        var ic            = $("#ic").val();
        var email 	      = $("#email").val();
        var phone 	      = $("#phone").val();
        var package       = $("#package").val();
        var password      = $("#submit_form_password").val();
        var rpassword 	  = $("#rpassword").val();
        var average_list  = $("#average_list").val();
        var address       = $("#address").val();
        var city 		  = $("#city").val();
        var postcode 	  = $("#postcode").val();
        var vmodel        = $("#vmodel").val();

        if (document.getElementById('radio1').checked) {
            var radio2 = document.getElementById('radio1').value;
        }else{
            var radio2 = document.getElementById('radio2').value;
        }
        //var radio2        = $("#radio2").val();
        var cc            = $("#cc").val();
        var vplate 		  = $("#vplate").val();
        var vmanufactured = $("#vmanufactured").val();
        var road_tax      = $("#road_tax").val();

        $.post("/index.php/register/ajaxOnline",
        {
          	fullname	    : fullname,		
			ic	  		: ic,
			email	  		: email,
			phone		: phone,
			package	    : package,
			password			: password,	
			rpassword		: rpassword,
			average_list	: average_list,
			address	: address,
			city  		: city,
			postcode		    : postcode,
			vmodel		    : vmodel,
			radio2		: radio2,
			cc 		: cc,
			vplate 			: vplate,
			vmanufactured 		: vmanufactured,
			road_tax 			: road_tax,
        },
        function(data,status){
            $("#register-submit-btn").html('Submit');
        	$("#register-submit-btn").prop('disabled',false);

        	if (data["status"] === "Success")
        	{
                location.replace("http://localhost:82/welcome/success");
        	}
        	else
        	{
                $("#reg_error").html('<div class="alert alert-danger"><strong>Error!</strong> '+data["error_msg"]+'</div>');
        	}
        });

	});


    


	$('#myForm').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
   });
	////where myForm is the form id
	//$("#myForm").ajaxForm(options);
}

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
			//uploadPhoto();
        }

    };

}();

jQuery(document).ready(function() {
   Custom.init();
});

/***
Usage
***/
Custom.doSomeStuff();
