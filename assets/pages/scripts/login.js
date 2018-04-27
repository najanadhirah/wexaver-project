var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    }

    var handleRegister = function() {
        // $('.register-form').validate({
        //     errorElement: 'span', //default input error message container
        //     errorClass: 'help-block', // default input error message class
        //     focusInvalid: false, // do not focus the last invalid input
        //     ignore: "",
        //     rules: {
        //
        //         fullname: {
        //             required: true
        //         },
        //         email: {
        //             required: true,
        //             email: true
        //         },
        //         state: {
        //             required: true
        //         },
        //
        //         username: {
        //             required: true
        //         },
        //         password: {
        //             required: true
        //         },
        //         rpassword: {
        //             equalTo: "#register_password"
        //         },
        //
        //         tnc: {
        //             required: true
        //         }
        //     },
        //
        //     messages: { // custom messages for radio buttons and checkboxes
        //         tnc: {
        //             required: "Please accept TNC first."
        //         }
        //     },
        //
        //     invalidHandler: function(event, validator) { //display error alert on form submit
        //
        //     },
        //
        //     highlight: function(element) { // hightlight error inputs
        //         $(element)
        //             .closest('.form-group').addClass('has-error'); // set error class to the control group
        //     },
        //
        //     success: function(label) {
        //         label.closest('.form-group').removeClass('has-error');
        //         label.remove();
        //     },
        //
        //     errorPlacement: function(error, element) {
        //         if (element.attr("name") == "tnc") { // insert checkbox errors after the container
        //             error.insertAfter($('#register_tnc_error'));
        //         } else if (element.closest('.input-icon').size() === 1) {
        //             error.insertAfter(element.closest('.input-icon'));
        //         } else {
        //             error.insertAfter(element);
        //         }
        //     },
        //
        //     submitHandler: function(form) {
        //         form[0].submit();
        //     }
        // });
        //
        // $('.register-form input').keypress(function(e) {
        //     if (e.which == 13) {
        //         if ($('.register-form').validate().form()) {
        //             $('.register-form').submit(function(event) {
        //                 var formData = {
        //                     'frmfn'     : $("#reg_fn").val(),
        //                     'frmstate'  : $("#reg_state").val(),
        //                     'frmemail'  : $("#reg_email").val(),
        //                     'frmpwd'    : $("#reg_pwd").val()
        //                 };
        //
        //                 $.ajax({
        //                     type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        //                     url         : '/index.php/register/ajaxcreate', // the url where we want to POST
        //                     data        : formData, // our data object
        //                     dataType    : 'json', // what type of data do we expect back from the server
        //                     encode      : true
        //                 })
        //                 .done(function(data) {
        //                     console.log(data);
        //                 });
        //                 event.preventDefault();
        //             });
        //
        //
        //             // $("#register-submit-btn").prop('disabled',true);
        //             // $("#reg_error").html('');
        //             // $("#register-submit-btn").html('<i class="fa fa-spinner fa-pulse fa-fw margin-bottom"></i><span class="sr-only">Signing...</span>');
        //             //
        //             // var frmfn = $("#reg_fn").val();
        //     		// var frmstate = $("#reg_state").val();
        //     		// var frmemail = $("#reg_email").val();
        //     		// var frmpwd = $("#reg_pwd").val();
        //             //
        //             // $.post("/index.php/register/ajaxcreate",
        // 			// {
        // 			//   fullname   : frmfn,
        // 			//   state	     : frmstate,
        // 			//   email      : frmemail,
        //             //   pwd        : frmpwd
        // 			// },
        // 			// function(data,status){
        //             //     $("#register-submit-btn").html('Submit');
        // 			// 	$("#register-submit-btn").prop('disabled',false);
        //             //
        // 			// 	if (data["status"] === "Success")
        // 			// 	{
        //             //         location.reload();
        // 			// 	}
        // 			// 	else
        // 			// 	{
        //             //         $("#reg_error").html('<div class="alert alert-danger"><strong>Error!</strong> '+data["error_msg"]+'</div>');
        // 			// 	}
        // 			// });
        //         }
        //         return false;
        //     }
        // });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    }

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});
