// Datepicker Script 
$( function() {
    $( "[id^=date]" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#field355").hide();
} );

// For Additional documents (A.1.8.1) select in General Tab
    // If choose "Yes", show "Choose file"
    $(document).ready(function(){
        $("#radio13-option-1").click(function(){
            $("#field355").show(1000);
        });
    });
    // If choose "No", hide "Choose file"
    $(document).ready(function(){
        $("#radio13-option-2").click(function(){
            $("#field355").hide(1000);
        });
    });

// For popover effect on comments    
var $popover = jQuery.noConflict(); // This line is required if call more than 1 jQuery function from library
$popover(document).ready(function(){
    $popover('[data-toggle="popover"]').popover();   
});

jQuery(function($) {  // In case of jQuery conflict

jQuery(function($) {  // TO DO: This line should have deleted, BUT will not work if delete directly    
// Date Input Validation ("Latest received date (A.1.7.b)" MUST Greater than "Initial Received date (A.1.6.b)")
    $("#date12").change(function () { 
        var startDate = $('#date10').val();
        var endDate = $('#date12').val(); 
        
        if (Date.parse(endDate) <= Date.parse(startDate)) {
            alert("End date should be greater than Start date");     
            document.getElementById("date12").value = "";
        } 
    });
});

// Dashboard popup Advance Search
jQuery(function($) { 
    $(document).ready(function(){
        $("#advsearch").click(function(){
            $("#advsearchfield").slideDown();
        });
    });
}); 


// Control the topNav and leftNav running with the scroll
    $(window).scroll(function() {
        if ($(window).scrollTop() > 176) {
            $('#topbar').addClass('topbarchange');
            $('#sidenav').addClass('sidenavchange');
            $('.dataentry').addClass('dataentrychange');
        }
        else {
            $('#topbar').removeClass('topbarchange');
            $('#sidenav').removeClass('sidenavchange');
            $('.dataentry').removeClass('dataentrychange');
        }
    })

// To uncheck a radio box if it had been checked
    $(function(){
        $('input[type="radio"]').click(function(){
            var $radio = $(this);

            // if this was previously checked
            if ($radio.data('waschecked') == true)
            {
                $radio.prop('checked', false);
                $radio.data('waschecked', false);
            }
            else
                $radio.data('waschecked', true);

            // remove was checked from other radios
            $radio.siblings('input[type="radio"]').data('waschecked', false);
        });
    });

// Alert if changes unsaved
    $(document).ready(function () {
        var unsaved = false;

        $(":input").change(function(){      //trigers change in all input fields including text type
            unsaved = true;
        });

        function unloadPage(){ 
            if(unsaved){
                return "You have unsaved changes on this page. Do you want to leave this page without saving or stay on this page?";
            }
        }

        window.onbeforeunload = unloadPage;
    });

// Dashboard "Case search modal" for clearing inputs
    $("#clearsearch").click(function(){
        $(':input').val('');
    });  

}); 
