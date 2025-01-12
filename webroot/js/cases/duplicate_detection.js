$(document).ready(function() {
    var unsaved = false;

    $("input:not(:button,:submit),textarea,select").change(function(){   //triggers change in all input fields including text type
        unsaved = true;
    });

    window.onbeforeunload = function (){
        if(unsaved){
            return 'Your data is changed, are you sure you want to complete?';
        }
    };
});
$(document).ready(function(){
    /**
     *
     * change Workflow Name according to Product selection
     */
    $('#product_id').change(function(){
        var text = "<option value=\"\">Select Country:</option>";
        var product_id = $(this).val();
        $(productInfo).each(function(k,v){
            if(v.id == $('#product_id').val()){
                $(v.sd_product_workflows).each(function(k,v){
                    text +="<option value=\""+v.id+"\">"+v.sd_workflow.country+"</option>"
                });
            }
        });
        $('#sd_product_workflow_id').html(text);
        $('#input_product_id').val(product_id);
    });

    $('#sd_product_workflow_id').change(function(){
        var product_workflow_id = $(this).val();
        $('#input_product_workflow_id').val(product_workflow_id);
    });


    /**
     *show caseNo
     */
    // $('#no_of_sae').change(function(){console.log($('#no_of_sae').val());
    //     var text = "";
    //     for(i = 1;i <= $('#no_of_sae').val();i++){
    //         text += "<input class=\"form-control\" type=\"text\" readonly=\"readonly\" id=\"caseNO-"+i+"\" name=\"case[caseNo]["+i+"]\"value=\""+randCaseNo+str_pad(i,5)+"\">";
    //     }
    //     $('#show_selected_sae_name').html(text);
    // })
});

// function str_pad(str, max){
//     return str.length>=max?str:str_pad("0"+str, max);
// }
function searchWhoDra(){
    var request = {
        'atc-name': $("#atc").val(),
        'drug-name':$("#drugname").val(),
        'medicinal-prod-id':$('#medicalProd').val(),
        'trade-name':$('#tradename').val(),
        'ingredient':$('#ingredient').val(),
        'formulation':$('#formulation').val(),
        'country':$('#inputState').val(),
    };
    console.log(request);

}
function checkDuplicate(){
    $("[id=checkbutton]").hide();

    var request={
        'userId':userId,
        'product_id':$('#product_id').val(),
        'sd_product_workflow_id':$('#sd_product_workflow_id').val(),
        'patient_initial':$('#patient_initial').val(),
        'patient_age':$('#patient_age').val(),
        'patient_age_unit':$('#patient_age_unit').val(),
        'patient_gender':$('#patient_gender').val(),
        'patient_dob':$('#patient_dob').val(),
        'reporter_firstname':$('#reporter_firstname').val(),
        'reporter_lastname':$('#reporter_lastname').val(),
        'report_term':$('#report_term').val(),
        'event_onset_date':$('#event_onset_date').val(),
        'patient_ethnic_origin':$('#patient_ethnic_origin').val(),
        'patient_age_group':$('#patient_age_group').val(),
        'meddraptname':$('#meddraptname').val(),
        'meddralltname':$('#meddralltname').val(),
        'meddrahltname':$('#meddrahltname').val(),
        'activity_due_date':$('#activity_due_date').val(),
        'submission_due_date':$('#submission_due_date').val(),

    };
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-cases/duplicate-detection',
        data:request,
        success:function(response){
            console.log(response);
            var result = $.parseJSON(response);
            var text = "";
            if(response!="[]"){
                text +="<h3>Search Results</h3>";
                text +="<table class=\"table table-hover\">";
                text +="<thead>";
                text +="<tr>";
                text +="<th class=\"align-middle text-center\" scope=\"col\">Caes No.</th>";
                text +="<th scope=\"col\">Patient Initial</th>";
                text +="<th scope=\"col\">Patient Age</th>";
                text +="<th scope=\"col\">Patient Gender</th>";
                text +="<th scope=\"col\">Patient Date of Birth</th>";
                text +="<th scope=\"col\">Reporter Name</th>";
                text +="<th scope=\"col\">Event Report Term</th>";
                text +="<th scope=\"col\">Meddra Pt Term</th>";
                text +="</tr>";
                text +="</thead>";
                text +="<tbody>";
                $.each(result, function(k,caseDetail){
                    text += "<tr>";
                    text += "<td><button type=\"button\" class=\"btn btn-outline-info\" onclick=\"caseDetail(\'"+caseDetail.caseNo+"\')\" data-toggle=\"modal\" data-target=\".CaseDetail\">" + caseDetail.caseNo;
                    text += "<div id=\"version-"+ caseDetail.caseNo+"\"></b>(ver:"+caseDetail.versions+")";
                    text +="</button></td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.patient_initial)) text +=caseDetail.patient_initial;
                    text +=  "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.patient_age)) text +=caseDetail.patient_age;
                    text += "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.patient_gender)) text +=caseDetail.patient_gender;
                    text += "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.patient_dob)) text += caseDetail.patient_dob;
                    text += "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.reporter_firstname)) text +=caseDetail.reporter_firstname+" ";
                    if(!jQuery.isEmptyObject(caseDetail.reporter_lastname)) text += caseDetail.reporter_lastname;
                    text += "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.event_report_term)) text +=caseDetail.event_report_term;
                    text += "</td>";
                    text += "<td>";
                    if(!jQuery.isEmptyObject(caseDetail.meddra_pt)) text +=caseDetail.meddra_pt;
                    text += "</td>";
                    text += "</tr>";
                })
                text +="</tbody>";
                text +="</table>";
            }else text+="<div class=\"my-3 text-center\"><h3>No Duplicate AER(s) Found</h3></div>"
            //text +="<div class=\"text-center\"> <button onclick=\"clearResult()\" class=\"btn btn-outline-warning mx-2 w-25\">Search Again</button>";
            text +="<button onclick=\"createCase()\" class=\"btn btn-primary float-right w-25 my-3\">Create This Case</button> </div>";
            $("#caseTable").html(text);
        },
        error:function(response){
                console.log(response.responseText);

            $("#textHint").html("Sorry, no case matches");

        }
    });
    $("input").each(function(){
        $(this).prop('readonly', true);
    });
    $("select").each(function(){
        $(this).prop("disabled", true);
    });

}
function createCase(){
    swal({
        title: "Are you sure?",
        text: "Is your duplicate search completed?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then(() => {
        $(location).attr('href', '/sd-cases/createcase');
      });
    $("select").each(function(){
        $(this).prop("disabled", false);
    });
}
function clearResult(){
    $('#caseTable').html("");
    $("input").each(function(){
        $(this).prop("readonly", false);;
    });
    $("select").each(function(){
        $(this).prop("disabled", false);;
    });
    $("[id=checkbutton]").show();
}
function caseDetail(caseNo)
{
    $('#caseLabel').text("Case Detail:"+caseNo);
    $('#iframeDiv').attr('src','/sd-tabs/showdetails/'+caseNo+'/'+$('#version-'+caseNo).val()+'/1?readonly=1');
}

$(document).ready(function(){
    $("#confirmElements").click(function(){
        // IF invalid case
        if ($('#patient').val() == 1) {
            swal("We think this an invalid case. Do you want to continue creating a new case?","","warning", {
                buttons: {
                    Yes: true,
                    No: true,
                    cancel: "Cancel"
                },
            })
            .then((value) => {
                switch (value) {
                    case "Yes":
                        swal("Please Select Reasons in following step","", "success");
                        $("#basicInfo :input").each(function(){
                            $(this).prop("readonly", true);
                        });
                        $('#confirmElements').hide();
                        $('#selRea').show();
                        break;

                    case "No":
                        swal("Your case has been inactivated","", "warning");
                        $(location).attr('href', '/sd-cases/caseregistration');
                        break;

                        //   default:
                        //     swal("cancel");
                }
            });
        }
        // ELSE valid case
        else {
            $("#basicInfo :input").each(function(){
                $(this).prop("readonly", true);
            });
            $('#confirmElements').hide();
            $('#prioritize').show();}
    });

    $("#checkbtn").click(function(){
        //$(this).hide();
        $('#clear').show();
    });

    $("#clear").click(function(){
        $(this).hide();
    });

    $("#caseRegAdvBtn").click(function(){
        $(this).hide();
        $('#caseRegAdvFields').show();
    });

    $("#otherCheck").click(function(){
        $('#othersInput').toggle();
    });

    $("#selReaBack").click(function(){
        $('#selRea').hide();
        $('#confirmElements').show();
        $("#basicInfo :input").each(function(){
            $(this).prop("readonly", false);
        });
    });
    $("#confirmRea").click(function(){
        $('#selRea').hide();
        $('#prioritize').show();
    });
    $("#prioritizeBack").click(function(){
        $('#prioritize').hide();
        $('#confirmElements').show();
        $("#basicInfo :input").each(function(){
            $(this).prop("readonly", false);
        });
    });
    $("#confirmPrioritize").click(function(){
        $('#prioritize').hide();
        $('#attach').show();
        // $("#prioritize :input").each(function(){
        //     $(this).prop("readonly", false);
        // });
    });
    $("#attachBack").click(function(){
        $('#attach').hide();
        $('#confirmElements').show();
        $("#basicInfo :input").each(function(){
            $(this).prop("readonly", false);
        });
    });
});
