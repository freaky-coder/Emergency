$(function() {

    $("#requestForm input,#requestForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var phone = $("input#r_phone").val();
            var fire = $("input#fire").val();
            var ambulance = $("input#ambulance").val();
            var police = $("input#police").val();
			// Printing values on console
			console.log(r_phone);	
			console.log(fire);
			console.log(ambulance);
			console.log(police);
            var service_code = 0;
			
            var request= document.getElementById("request_service");
			request.innerHTML = 'Your request has been processed.<br> ETA= 8 min';
            if(fire != "on" && ambulance != "on" && police == "on")
                console.log('111');    
			// Extracting the first name for Success/Failure Message
            var firstName = name; 
			
            // Check for white space in name for Success/Fail message
            if ((firstName.indexOf(' ') >= 0)) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/request_service.php",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    address: address,
                    emphone: emphone
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
