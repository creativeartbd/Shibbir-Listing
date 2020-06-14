;(function($) {
    $("document").ready(function(){

        // Handle registration form
        $("#registration_form").on("submit", function( e ) {    
            e.preventDefault();

            var data = $(this).serialize();

            $.post( sl.ajax_url, data, function ( response ) {
                if( response.success ) {
                    $(".form_result").html( "<div class='alert alert-success'>" + response.data.message + "</div>" );                
                    setTimeout( function() {
                        window.location.href =  response.data.login_url;
                    }, 3000 );
                } else {
                    $(".form_result").html( "<div class='alert alert-danger'>" + response.data.message + "</div>" );
                }  
            })
            .fail( function( e ) {                
                alert( sl.error );
            });
        });
       
        // Handle login form
        $(".login_form").on("submit", function( e ) {
            e.preventDefault();

            var data = $(this).serialize();            

            $.post( sl.ajax_url, data, function ( response ) {                
                if( response.success ) {
                    $(".form_result").html( "<div class='alert alert-success'>" + response.data.message + "</div>" );                
                    setTimeout( function() {
                        window.location.href =  sl.homepage;
                    }, 3000 );
                } else {
                    $(".form_result").html( "<div class='alert alert-danger'>" + response.data.message + "</div>" );
                }                
            })
            .fail( function( e ) {                
                alert( sl.error );
            });
        });
        

        // Handle login form
        $("#add_new_listing").on("submit", function( e ) {
            e.preventDefault();

            var data = $(this).serialize();            

            $.post( sl.ajax_url, data, function ( response ) {                
                if( response.success ) {
                    $(".form_result").html( "<div class='alert alert-success'>" + response.data.message + "</div>" );                
                    setTimeout( function() {
                        location.reload();
                    }, 3000 );
                } else {
                    $(".form_result").html( "<div class='alert alert-danger'>" + response.data.message + "</div>" );
                }                
            })
            .fail( function( e ) {                
                alert( sl.error );
            });
        });

        // Add / Remove opening hour
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><div class="add_day_hours day_hours"> <div class="day_hours"> <div class="row align-items-center"> <div class="col-3"> <div class="weekday"> <select class="search_select" name="opening_day[]"> <option value="saturday" data-display="Add day">Saturday</option> <option value="sunday">Sunday</option> <option value="monday">Monday</option> <option value="tuesday">Tuesday</option> <option value="wednesday">Wednesday</option> <option value="thrusday">Thrusday</option> <option value="friday">Friday</option> </select> </div></div><div class="col-3"> <div class="st_time"> <select class="search_select" name="opening_from[]"> <option value="7am" data-display="Start Time">7.00 Am</option> <option value="8am">8.00 Am</option> <option value="9am">9.00 Am</option> <option value="10am">10.00 Am</option> <option value="11am">11.00 Am</option> <option value="12pm">12.00 Pm</option> <option value="1pm">01.00 pm</option> </select> </div></div><div class="col-3"> <div class="ed_time"> <select class="search_select" name="opening_to[]"> <option value="5pm" data-display="Start Time">5.00 Pm</option> <option value="6pm">6.00 Pm</option> <option value="7pm">7.00 Pm</option> <option value="8pm">8.00 Pm</option> <option value="9pm">9.00 Pm</option> <option value="10pm">10.00 Pm</option> <option value="11pm">11.00 Pm</option> </select> </div></div><div class="col-3"> <div class="add_remove"> <a href="javascript:void(0);" class="remove_button times"><i class="fas fa-times"></i></a> </div> </div></div></div> </div></div></div></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();            
            $(this).parents('.day_hours').remove(); //Remove field html
            x--; //Decrement field counter
        });

        $('.day_hours').on('click', '.remove_button_2', function(e){
            e.preventDefault();            
            $(this).parents('.day_hours').remove(); //Remove field html
            x--; //Decrement field counter
        });

        
        $('.input-images').imageUploader();
        
    });
})(jQuery);   