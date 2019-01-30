// For popover effect on comments
var $popover = jQuery.noConflict(); // This line is required if call more than 1 jQuery function from library
$popover(document).ready(function(){
    $popover('[data-toggle="popover"]').popover({
        html: true,
        trigger: 'hover focus',
        delay: { show: 100, hide: 500 }
    });
});

jQuery(function($) {  // In case of jQuery conflict



  // TO DO: This line should have deleted, BUT will not work if delete directly
// Date Input Validation ("Latest received date (A.1.7.b)" MUST Greater than "Initial Received date (A.1.6.b)")
    $("#section-1-date-12").change(function () {
        var startDate = $('#section-1-date-10').val();
        var endDate = $('#section-1-date-12').val();

        if (Date.parse(endDate) <= Date.parse(startDate)) {
            alert("End date should be greater than Start date");
            document.getElementById("section-1-date-12").value = "";
        }
    });

// Dashboard popup Advance Search
jQuery(function($) {
    $(document).ready(function(){
        $("#advsearch").click(function(){
            $(this).parent().hide();
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


// Dashboard "Case search modal" for clearing inputs
    $(".clearsearch").click(function(){
        $(':input').val('');
    });

// Dashboard "Search case" button of shadow effect
    $('#searchBtn').hover(
        function(){ $(this).addClass('shadow') },
        function(){ $(this).removeClass('shadow')
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
        $('#addprobtn').click(function() {
            var request = {'product_name': $("#product_name").val(), 'study_no':$("#study_no").val(),
                    'sd_sponsor_company_id':$("#sd_sponsor_company_id").val(),
                    'sd_product_type_id':$("#sd_product_type_id").val(),
                    'status':$("#status").val()
                };
            console.log(request);

            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                type:'POST',
                url:'/sd-products/create',
                data:request,
                success:function(response){
                    console.log(response);
                    var result = $.parseJSON(response);
                    console.log(result);
                    if (result.result == 1)
                    {
                        $('#product_id').val(result.product_id);
                        $('#choosecon').show();
                        $("#addpro > div > input, #addpro > div > select").prop("disabled", true);
                    }
                    else{
                        swal({
                            title: "Failed to add a new product",
                            text: "All the Fields are REQUIRED",
                            icon: "warning",
                            button: "OK",
                          });
                        // $("#errorMsg").show();
                        // $("#errorMsg").html("Failed to add a new product!");
                    }

                },
                error:function(response){
                        console.log(response);
                }
            });


        });
    });

    function iterateWorkflow(wkfl_name)
    {
        var steps = [];
        var listItems = $("."+wkfl_name+" li");
        //console.log(listItems);
        listItems.each(function(idx, li) {
            var display_order = idx+1;
            var step_name = $(li).find("h5").text().replace(/ /g,'');
            steps.push({
                display_order: display_order,
                step_name: step_name
            });
            // console.log(display_order);
            // console.log(step_name);

        })
        //console.log(steps);
        return steps;
    }

});

function onQueryClicked(){
    var request = {'searchName': $("#searchName").val(), 'searchProductName':$("#searchProductName").val()};
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/dashboards/search',
        data:request,
        success:function(response){
            console.log(response);
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
            var product_type_id=["clinical trials", "individual patient use","other studies"]
            $.each(result, function(k,caseDetail){
                text += "<tr>";
                text += "<td>" + caseDetail.caseNo + "</td>";
                text += "<td></td>";
                text += "<td></td>";
                text += "<td>";
                if(jQuery.isEmptyObject(caseDetail.wa.activity_name)) text += "New"; else text +=caseDetail.wa.activity_name;
                text += "</td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.pd.product_name + "</td>";
                text += "<td>"+product_type_id[caseDetail.product_type]+"</td>";
                text += "<td>"+caseDetail.activity_due_date+"</td>";
                text += "<td>" + caseDetail.submission_due_date + "</td>";
                text += "<td><a class=\"btn btn-outline-info\" href=\"/sd-tabs/showdetails/1?caseId="+caseDetail.id+"\">Data Entry</a> <a class=\"btn btn-outline-info\" href=\"#\">More</a></td>";
                text += "</tr>";
            })
            text +="</tbody>";
            text +="</table>";
            $("#textHint").html(text);
        },
        error:function(response){
                console.log(response.responseText);

            $("#textHint").html("Sorry, no case matches");

        }
    });
}
function searchProd(){
    var request = {
        'searchName': $("#key_word").val(),
        'productName':$("#product_name").val(),
        'studyName':$("#study_no").val()
    };
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-products/search',
        data:request,
        success:function(response){
            console.log(response);
            var result = $.parseJSON(response);
            var text = "";
            text +="<h3>Product List</h3>";
            text +="<table class=\"table table-hover\">";
            text += "<thead>";
            text +="<tr class=\"table-secondary\">";
            text +="<th scope=\"col\">Product Name</th>";
            text +="<th scope=\"col\">Study Number</th>";
            text +="<th scope=\"col\">Study Type</th>";
            text +="<th scope=\"col\">Sponsor</th>";
            text +="<th scope=\"col\">mfr name</th>";
            text +="<th scope=\"col\">Status</th>";
            text +="<th scope=\"col\">Workflows / Country</th>";
            text +="</tr>";
            text +="</thead>";
            text +="<tbody>";
            var study_type=["clinical trials", "individual patient use","other studies"]
            $.each(result, function(k,caseDetail){
                text += "<tr>";
                text += "<td>" + caseDetail.product_name + "</td>";
                text += "<td>" + caseDetail.study_no +"</td>";
                text += "<td>" + study_type[caseDetail.study_type]+ "</td>";
                text += "<td>"+caseDetail.sd_company.company_name+"</td>";
                text += "<td>"+caseDetail.mfr_name+"</td>";
                text += "<td>new</td>";
                text += "<td>";
                console.log(caseDetail);
                $.each(caseDetail.sd_product_workflows, function(k,product_workflowdetail){
                    text += "<div class=\"btn btn-sm btn-outline-info mx-1\" data-toggle=\"modal\" onclick=\"view_workflow("+product_workflowdetail.id+")\" data-target=\".WFlistView\">"+product_workflowdetail.sd_workflow.name+" / "+product_workflowdetail.sd_workflow.country+"</div>";
                });
                text += "</td>";
                text +="<div id=\"product_"+caseDetail.id+"\" style=\"display:none\">"+caseDetail+"</div>";
                text += "</tr>";
            });
            text +="</tbody>";
            text +="</table>";
            $("#searchProductlist").html(text);
        },
        error:function(response){
                console.log(response.responseText);

            $("#textHint").html("Sorry, no case matches");

        }
    });
}
function view_workflow(workflow_k){
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-product-workflows/view/'+workflow_k,
        success:function(response){
            console.log(response);
            var result=$.parseJSON(response);
            var workflow_info = result['sd_workflow'];
            $('#viewWFname').text(workflow_info['name']);
            $('#viewCC').text(result['sd_company']['company_name']);
            $('#viewCountry').text(workflow_info['country']);
            $('#viewDesc').text(workflow_info['description']);
            $('#viewMan').html("<b>"+result['sd_user']['firstname']+" "+result['sd_user']['lastname']+"</b> FROM "+result['sd_user']['sd_company']['company_name']);
            var team_resources_text="";
            $.each(result['sd_user_assignments'], function(k, v){
                    console.log(v);
                    team_resources_text += "<div><b>"+v['sd_user']['firstname']+" "+v['sd_user']['lastname']+"</b> From"+v['sd_user']['sd_company']['company_name']+"</div>";
            });
            $('#viewRes').html(team_resources_text);
            var activities_text="";
            $(workflow_info['sd_workflow_activities']).each(function(k,activity_detail){
                activities_text +="<span class=\"badge badge-info px-5 py-3 m-3\"><h5>"+activity_detail['activity_name']+"</h5><h8>"+activity_detail['description']+"</h8></span><i class=\"fas fa-long-arrow-alt-right\"></i>";
            })
            activities_text+="<span class=\"badge badge-info px-5 py-3 m-3\"><h5>Complete</h5><h8>End of the case</h8></span>"
            $('#view_activities').html(activities_text);
        },
        error:function(response){
                console.log(response.responseText);

            $("#textHint").html("Sorry, no case matches");

        }
    });
}