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
        var email 	      = $("#email").val();
        var phone 	      = $("#phone").val();
        var password      = $("#submit_form_password").val();
        var rpassword 	  = $("#rpassword").val();
        var partner 	  = $("#partner").val();
        var fuel_brand 	  = $("#fuel_brand").val();
        var average_usage = $("#average_usage").val();
        var grocer_brand  = $("#grocer_brand").val();
        var address       = $("#address").val();
        var city 		  = $("#city").val();
        var poscode 	  = $("#poscode").val();
        var reference     = $("#reference").val();
        var bnf_name      = $("#bnf_name").val();
        var bnf_ic 		  = $("#bnf_ic").val();
        var bnf_hp 		  = $("#bnf_hp").val();
        var bnf_relay     = $("#bnf_relay").val();

        $.post("/index.php/register/ajaxOnline",
        {
          	fullname	    : fullname,		
			email	  		: email,
			phone	  		: phone,
			password		: password,
			rpassword	    : rpassword,
			partner			: partner,	
			fuel_brand		: fuel_brand,
			average_usage	: average_usage,
			grocer_brand	: grocer_brand,
			address  		: address,
			city		    : city,
			poscode		    : poscode,
			reference		: reference,
			bnf_name 		: bnf_name,
			bnf_ic 			: bnf_ic,
			bnf_relay 		: bnf_relay,
			bnf_hp 			: bnf_hp,
        },
        function(data,status){
            $("#register-submit-btn").html('Submit');
        	$("#register-submit-btn").prop('disabled',false);

        	if (data["status"] === "Success")
        	{
                location.reload();
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
