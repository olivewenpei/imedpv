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

// Defaultworkflow and Custworkflow button control
    $('#defbtn').click(function() {
        $('.defworkflow').slideDown();
        $('.custworkflow').slideUp();
    })

    $('#custbtn').click(function() {
        $('.custworkflow').slideDown();
        $('.defworkflow').slideUp();
    });

// Custworkflow draggable effect
    $( function() {
        $( "#sortable" ).sortable({
            revert: true,
            cancel: ".fixed,input,textarea",
            delay: 100,
            placeholder: "ui-state-highlight",
            start  : function(event, ui){
                $(ui.helper).addClass("w-100 h-50");
            },
            // Remove Custworkflow Step
            update: function (event,ui) {
                $('.close').click(function() {
                    $(this).parents('li.custworkflowstep').fadeOut();
                });
            }
        });
        $( "#draggable" ).draggable({
            connectToSortable: "#sortable",
            cursor: "pointer",
            helper: "clone",
            opacity: 0.6,
            revert: "invalid",
            start  : function(event, ui){
                    $(ui.helper).addClass("w-100 h-75");
            },
            // Add "close icon" when drag into new place
            create :  function (event, ui) {
                    $(this).find('.card-body').prepend(
                        '<button type="button" class="close" aria-label="Close">' +
                            '<span aria-hidden="true">' + '&times;' + '</span>' +
                        '</button>');
                    },
            // Remove all inputs in original when drag into new place
            stop : function (event,ui) {
                $(this).find('input, textarea').val('');
            }
        });

      } );


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
        };

        window.onbeforeunload = unloadPage;
    });

// Dashboard "Case search modal" for clearing inputs
    $("#clearsearch").click(function(){
        $(':input').val('');
    });

// Dashboard "Search case" button of shadow effect
    $('#searchBtn').hover(
        function(){ $(this).addClass('shadow') },
        function(){ $(this).removeClass('shadow')
    });

// Make the table row clickable
    $(document).ready(function($) {
        $("tbody > tr").click(function() {
            window.document.location = $(this).data("href");
        });
    });

// TO DO: make nav button has "active" effect
    $(document).ready(function($) {
        $("#navbarSupportedContent > ul > li").click(function() {
            $(this).removeClass('active');
            $(this).addClass('active');
        });
    });

// Add Product card
    $(document).ready(function($){
        $('#addpro').click(function() {
            $('#choosecon').show();
        })
        $('#submitchocountry').click(function() {
            $('.firstpage').hide();
            $('.thirdpage').show();
        });
        $('#submitworkflow').click(function() {
            $('.thirdpage').hide();
            $('.fourthpage').show();
        });
        $('#goback2').click(function() {
            $('.thirdpage').hide();
            $('.firstpage').show();
        });
        $('#goback3').click(function() {
            $('.fourthpage').hide();
            $('.thirdpage').show();
        });
    });

// Assign human to CROs
    $(document).ready(function($){
        $('#worman,#teres').click(function() {
            if($(".checkboxstyle").is(":checked")) {
                $(".checkboxstyle:checked").prop("disabled",true);
                $("input:disabled").parent().find(".undo").attr('style', 'display: block !important');
            };
        });
        $(".undo").click(function() {
            $(this).prevAll().prop("checked",false).prop("disabled",false);
            $(this).attr('style', 'display: none !important');
        });
    });


});


function onQueryClicked(){
    var request = {'searchName': $("#searchName").val(), 'searchProductName':$("#searchProductName").val()};
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/dashboards/index',
        data:request,
        success:function(response){
            var result = $.parseJSON(response);
            var text = "";
            text +="<h3>Search Results</h3>";
            text +="<table class=\"table table-hover\">";

            text += "<thead>";
            text +="<tr class=\"table-secondary\">";
            text +="<th scope=\"col\">AER No.</th>";
            text +="<th scope=\"col\">Documents</th>";
            text +="<th scope=\"col\">Version</th>";
            text +="<th scope=\"col\">Activity</th>";
            text +="<th scope=\"col\">Country</th>";
            text +="<th scope=\"col\">Project No.</th>";
            text +="<th scope=\"col\">Product Type</th>";
            text +="<th scope=\"col\">Activity Due Date</th>";
            text +="<th scope=\"col\">Submission Due Date</th>";
            text +="<th scope=\"col\">Action</th>";
            text +="</tr>";
            text +="</thead>";
            text +="<tbody>";
            $.each(result, function(k,caseDetail){
                text += "<tr>";
                text += "<td>" + caseDetail.caseNo + "</td>";
                text += "<td></td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.start_date + "</td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.sd_product.study_no + "<td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.end_date + "</td>";
                text += "<td><a class=\"btn btn-outline-info\" href=\"/sd-tabs/showdetails/1?caseNo="+caseDetail.caseNo+"\">Data Entry</a> <a class=\"btn btn-outline-info\" href=\"#\">More</a></td>";
                text += "</tr>";
            })
            text +="</tbody>";
            text +="</table>";
            $("#textHint").html(text);
        },
        error:function(response){
                console.log(response);
                console.log(response.status);
                console.log(response.statusText);
            $("#textHint").html("Sorry, no case matches");

        }
    });
}
