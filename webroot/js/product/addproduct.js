var resource_list={};
var workflow_k = 0;
var workflow_info ={};
var cro_list=[];
var call_center_list = {};
function selectCro(id){
    $('[id^=conass]').attr('id', 'conass-'+id);
    var member_text = "";
    $(resource_list[workflow_k][id]['member_list']).each(function(k,v){
        member_text +="<div class=\"personnel\" id=\"userid_"+v.id+"\">"+v.firstname+" "+v.lastname+"</div>";

    });
    $('#personnelDraggable').html(member_text);

    var workflow_manager_text = "";
    $(resource_list[workflow_k][id]['workflow_manager']).each(function(k,v){
        workflow_manager_text +="<div class=\"personnel\" id=\"userid_"+v.id+"\">"+v.firstname+" "+v.lastname+"</div>";
    });
    $('#workflow_manager-add').html(workflow_manager_text);

    var team_resources_text = "";
    $(resource_list[workflow_k][id]['team_resources']).each(function(k,v){
        team_resources_text +="<div class=\"personnel\" id=\"userid_"+v.id+"\">"+v.firstname+" "+v.lastname+"</div>";
    });
    $('#team_resources-add').html(team_resources_text);
    croDroppableArea();
}
function removeCro(id){
    swal({
        title: "Are you sure?",
        text: "This record would be removed permanently once deleted",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            var crocaption = $('#crocompany-' + id).text();
            $('#crocompany-' + id).closest('tr').remove();
            $("#croname").append($("<option></option>").attr("value",id).text(crocaption));
            swal("This record has been deleted!", {
                icon: "success",
            });
        } else {
          swal("This record is safe!", {
            icon: "success",
        });
        }
      });
}
jQuery(function($) {  // In case of jQuery conflict
    $(document).ready(function(){
        // $('#submitchocountry').click(function(){
        //     var default_text = "<p>This is default workflow and cannot be changed</p>";
        //     var customize_text = "";
        //     var country = $('#select-country').val();
        //     $(workflowInfo[country]['sd_workflow_activities']).each(function(k,v){

        //         default_text +="<li class=\"defworkflowstep\">";
        //             default_text +="<div class=\"card w-100 h-25 my-2\">";
        //                 default_text +="<div class=\"card-body p-3\">";
        //                     default_text +="<h5 class=\"card-title\"><b>"+v.activity_name+"</b></h5>";
        //                     default_text +="<p class=\"card-text\">"+v.description+"</p>";
        //                 default_text +="</div>";
        //             default_text +="</div>";
        //         default_text +="</li>"

        //         customize_text +="<li class=\"custworkflowstep\">";
        //             customize_text +="<input value="+v.activity_name+" name=\"[workflow][0][workflow_activities]["+k+"]activity_name\" type=\"hidden\">";
        //             customize_text +="<input value="+v.description+" name=\"[workflow][0][workflow_activities]["+k+"]description\" type=\"hidden\">";
        //             customize_text +="<div class=\"card w-100 h-25 my-2\">";
        //                 customize_text +="<div class=\"card-body p-3\">";
        //                     customize_text +="<button class=\"close closewf\">&times;</button>";
        //                     customize_text +="<h5 class=\"card-title\"><b>"+v.activity_name+"</b></h5>";
        //                     customize_text +="<p class=\"card-text\">"+v.description+"</p>";
        //                 customize_text +="</div>";
        //             customize_text +="</div>";
        //         customize_text +="</li>"
        //     });
        //     $('#default_workflow').html(default_text);
        //     $('#sortable').html(customize_text);
        // });
        $("#sd_sponsor_company_id").change(function(){
            var request = {'sponsor_id': $("#sd_sponsor_company_id").val()};

            console.log(request);
            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                type:'POST',
                url:'/sd-products/searchCroCompanies',
                data:request,
                success:function(response){
                    console.log(response);
                    cro_list = [];
                    var result = $.parseJSON(response);
                    $.each(result, function(k,caseDetail){
                            cro_list.push({'id':k, 'name':caseDetail});
                        });
                },
                error:function(response){

                }
            });
            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                type:'POST',
                url:'/sd-products/searchCallcenterCompanies',
                data:request,
                success:function(response){
                    console.log(response);
                    var result = $.parseJSON(response);
                    $.each(result, function(k,caseDetail){
                            call_center_list[k]={'name': caseDetail};
                        });
                },
                error:function(response){}
            });
        });
    })
    // Select workflow manager and staff to CRO
    $('[id^=conass]').click(function() {
        var cro_id = $(this).attr('id').split('-')[1];

        var textmanager  = "";
        var textstaff = "";
        var member_list = [];
        var team_resources = [];
        var workflow_manager = [];
        // var managerChosed = $(".stackDrop1 > .personnel").text().match(/[A-Z][a-z]+/g);
        // var staffChosed = $(".stackDrop2 > .personnel").text().match(/[A-Z][a-z]+/g);
        $("#personnelDraggable").children("div").each(function(){
            var user_info = {};
            user_info.id = $(this).attr('id').split('_')[1];
            user_info.firstname = $(this).text().split(' ')[0];
            user_info.lastname = $(this).text().split(' ')[1];
            member_list.push(user_info);
        });
        resource_list[workflow_k][cro_id].member_list = member_list;
        $("#team_resources-add").children("div").each(function(){
            var user_info = {};
            user_info.id = $(this).attr('id').split('_')[1];
            user_info.firstname = $(this).text().split(' ')[0];
            user_info.lastname = $(this).text().split(' ')[1];
            team_resources.push(user_info);
            textstaff += "<div class=\"personnel\">"+$(this).text()+"</div>";
        });
        resource_list[workflow_k][cro_id].team_resources = team_resources;
        $("#workflow_manager-add").children("div").each(function(){
            var user_info = {};
            user_info.id = $(this).attr('id').split('_')[1];
            user_info.firstname = $(this).text().split(' ')[0];
            user_info.lastname = $(this).text().split(' ')[1];
            workflow_manager.push(user_info);
            textmanager += "<div class=\"personnel\">"+$(this).text()+"</div>";
        });
        resource_list[workflow_k][cro_id].workflow_manager = workflow_manager;
        // $.each(managerChosed, function(k,manager){
        //     textmanager += manager + "; ";
        // });
        $("#cromanager-"+cro_id).html(textmanager);
        // $.each(staffChosed, function(k,staff){
        //     textstaff += "<div id=>"+staff + "; </div>";
        // });
        $("#crostaff-"+cro_id).html(textstaff);
    });
    $('#confirm_activities').click(function(){

        if ($('.defworkflow').is(':visible') && $('.custworkflow').is(':hidden'))
        {
            $('#cusworkflow, #defbtn').hide();
            $('#defT, #undochoWF').show();
            $('#ifdef').addClass("mx-auto w-50");
        }
        if (($('.defworkflow').is(':hidden') && $('.custworkflow').is(':visible')))
        {
            workflowname = $('#custom-workflow_name').val();
            if(workflowname.length == 0){
                $(this).show();
                $('#custworkflowname').attr('disabled',false);
                $('li.custworkflowstep').find('button').show();
                $('#cusworkflow').find('ul').show();
                // $('#custworkflowname').after('<div id="errWorkflow" class="alert alert-danger" role="alert">Workflow name is required!</div>');
                $('#custworkflowname').after($("#errWorkflow").show());
                swal({
                    title: "Failed to choose Workflow",
                    text: "Workflow name is REQUIRED",
                    icon: "warning",
                    button: "OK",
                  });
                return false;
            }
            else {
                $('#defworkflow, #custbtn, .closewf').hide();
                $('#cusT, #undochoWF').show();
                $('#sortable, #draggable').addClass("mx-auto w-50");
                $('#cusworkflow').find('ul').hide();
                $('#custom-workflow_name').attr('disabled',true);
                $('#custom-workflow_description').attr('disabled',true);
                $('li.custworkflowstep').find('button').hide();
                $(this).hide();
                $('#sortable').find('.card-body').append( '<div class="input-group w-25 mx-auto"><i class="fas fa-arrow-up gobackstep"></i><input type="text" class="step_backward form-control form-control-sm backstep_input" aria-label="Back Steps" aria-describedby="backSteps"></div>');
                $('#custworkflowname').next('#errWorkflow').remove(); // *** this line have been added ***
            }
            $("#sortable").sortable({ disabled: true });
        };
        $(this).hide();
        $('#submitworkflow').show();
        $('#undochocon').hide();
        $('#undo_activities').show();

    });
    $('#undo_activities').click(function(){
        if ($('.defworkflow').is(':visible') && $('.custworkflow').is(':hidden'))
        {
            $('#cusworkflow').show();
            $('#defbtn').show();
            $('#defT, #undochoWF').hide();
            $('#ifdef').removeClass("mx-auto w-50");
        }
        if (($('.defworkflow').is(':hidden') && $('.custworkflow').is(':visible')))
        {
            $("#sortable").sortable({ disabled: false });
            $('#defworkflowstep').hide()
            $('#defworkflow, #custbtn, .closewf').show();
            $('#cusT, #undochoWF').hide();
            $('#sortable, #draggable').removeClass("mx-auto w-50");
            $('#cusworkflow').find('ul').show();
            $('#custom-workflow_name').attr('disabled',false);
            $('#custom-workflow_description').attr('disabled',false);
            $('li.custworkflowstep').find('button').show();
            $('#sortable').find('.input-group').remove();

        }
        $('#confirm_activities').show();
        $('#submitworkflow').hide();
        $(this).hide();
        $('#undochocon').show();
    })
    $('#submitworkflow').click(function() {
        $(this).hide();
        $('#undo_activities').hide();
        //TODO
        $('#undochoWF').show();
        $('#choosecro').show();
        var cro_text = "";
        $.each(cro_list, function(k,cro){
            cro_text +="<option value=\""+cro.id+"\">"+cro.name+"</option>";
            });
        $('#croname').html(cro_text);
        workflow_info[workflow_k].activities = [];
        $('#crotable').html();
        //TODO
        // activities_list.order_no
        // activities_list.step_forward
        //while deault
        if ($('.defworkflow').is(':visible') && $('.custworkflow').is(':hidden'))
        {
            var order_no = 1;
            $('#default_workflow').find(".card-body").each(function(){
                var activities_list = {};
                $(this).find(".card-title").each(function(){
                    activities_list.activity_name = $(this).text();
                });
                $(this).find(".card-text").each(function(){
                    activities_list.activity_description = $(this).text();
                });
                $(this).find(".step_backward").each(function(){
                    activities_list.step_backward = $(this).val();
                });
                activities_list.order_no = order_no;
                workflow_info[workflow_k].activities.push(activities_list);
                order_no++;
            });
            workflow_info[workflow_k].id = $('#default-workflow_id').val();
            workflow_info[workflow_k].workflow_type = 0;
            workflow_info[workflow_k].workflow_name = $('#default-workflow_name').val();
            workflow_info[workflow_k].workflow_description= $('#default-workflow_description').val();
        }
        if (($('.defworkflow').is(':hidden') && $('.custworkflow').is(':visible')))
        {
            var order_no = 1;
            $('#sortable').find(".card-body").each(function(){
                var activities_list = {};
                $(this).find(".card-title").each(function(){
                    activities_list.activity_name = $(this).text();
                });
                $(this).find(".card-text").each(function(){
                    activities_list.activity_description = $(this).text();
                });
                $(this).find(".step_backward").each(function(){
                    console.log($(this))
                    activities_list.step_backward = $(this).val();
                });
                activities_list.order_no = order_no;
                workflow_info[workflow_k].activities.push(activities_list);
                order_no++;
            });
            workflow_info[workflow_k].workflow_type = 1;
            workflow_info[workflow_k].workflow_name = $('#custom-workflow_name').val();
            workflow_info[workflow_k].workflow_description= $('#custom-workflow_description').val();
        }
        //TODO While customized
    });
    $('#addNewWL').click(function() {
        resource_list[workflow_k] = {};
        workflow_info[workflow_k] = {};
        var call_center_text = "<option value=\"\">Select Call Center</option>";
        $.each(call_center_list, function(k,call_center){
            call_center_text +="<option value=\""+k+"\">"+call_center.name+"</option>";
            });
        $("#select-country, #callcenter").prop("disabled", false);
        $("#select-country").val();
        $('#callCenter').html(call_center_text);
        $(this).hide();
        $('#workflowlist').slideUp();
        $('#choworkflow').slideDown();
        $('#exit_workflow').show();
        $('#submitchocountry').show();
        $('#choosewf').hide();
        //TODO
        swal({
            title: "You are adding a New Workflow",
            icon: "success",
          });


    });
    $('#exit_workflow').click(function(){
        $('#choworkflow').slideUp();
        $('#workflowlist').slideDown();
        $('#addNewWL').show();
    });
    $('#submitchocountry').click(function() {
        $('#defworkflowstep').hide()
        $('#defworkflow, #custbtn, .closewf').show();
        $('#cusT, #undochoWF').hide();
        $('#cusworkflow').find('ul').show();
        $('#custom-workflow_name').attr('disabled',false);
        $('#custom-workflow_description').attr('disabled',false);
        $('li.custworkflowstep').find('button').show();
        $('#sortable').find('.input-group').remove();

        $('#cusworkflow').find('input').prop("disabled", false);
        $("#sortable").sortable({ disabled: false });
        $('#sortable, #draggable').removeClass("mx-auto w-50");
        $('#ifdef').removeClass("mx-auto w-50");
        $('.defworkflow').hide();
        $('.custworkflow').hide();
        $('#submitworkflow').hide();
        $('#exit_workflow').hide();
        workflow_info[workflow_k].country = $('#select-country').val();
        workflow_info[workflow_k].sd_company_id = $('#callCenter').val();
        $(this).hide();
        $('#undochocon').show();
        $("#select-country, #callcenter ").prop("disabled", true);
        $('#choosewf').show();
        $('#defworkflow').show();
        $('#cusworkflow').show();
        $('#defT').hide();
        $('#cusT').hide();
        $('#defbtn').show();
        $('#custbtn').show();
        var default_text = "<p>This is default workflow and cannot be changed</p>";
        var customize_text = "";
        var country = $('#select-country').val();
        $('#default-workflow_description').val(workflowInfo[country]['description']);
        $('#default-workflow_name').val(workflowInfo[country]['name']);
        $('#custom-workflow_name').val('customize-'+workflowInfo[country]['name']);
        $('#default-workflow_id').val(workflowInfo[country]['id']);
        $(workflowInfo[country]['sd_workflow_activities']).each(function(k,v){
            default_text +="<li class=\"defworkflowstep\">";
                default_text +="<div class=\"card w-100 h-25 my-2\">";
                    default_text +="<div class=\"card-body p-3\">";
                        default_text +="<h5 class=\"card-title\"><b>"+v.activity_name+"</b></h5>";
                        default_text +="<p class=\"card-text\">"+v.description+"</p>";
                        default_text +="<div class=\"input-group w-25 mx-auto\">";
                            default_text +="<i class=\"fas fa-arrow-up gobackstep\"></i>";
                            default_text +="<input type=\"text\" readonly=\"readonly\" value="+v.step_backward+" class=\"step_backward form-control form-control-sm\" aria-label=\"Back Steps\" aria-describedby=\"backSteps\">"
                        default_text +="</div>"
                    default_text +="</div>";
                default_text +="</div>";
            default_text +="</li>"
            customize_text +="<li class=\"custworkflowstep\">";
                customize_text +="<div class=\"card w-100 h-25 my-2\">";
                    customize_text +="<div class=\"card-body p-3\">";
                        customize_text +="<button class=\"close closewf\">&times;</button>";
                        customize_text +="<h5 class=\"card-title\"><b>"+v.activity_name+"</b></h5>";
                        customize_text +="<p class=\"card-text\">"+v.description+"</p>";
                    customize_text +="</div>";
                customize_text +="</div>";
            customize_text +="</li>"
        });
        $('#default_workflow').html(default_text);
        $('#sortable').html(customize_text);

    });
    $('#undochoWF').click(function() {
        $('#undo_activities').show();
        $('#choosecro').hide();
        $('#submitworkflow').show();
    });
    $('#undochocon').click(function() {
        $('#exit_workflow').show();
        $('#choosewf').hide();
        $('#choosecro').hide();
        $('#confirm_activities').hide();
        $('#submitchocountry').show();
        $("#select-country, #callcenter").prop("disabled", false);
    });
    $('#confirmWFlist').click(function() {
        var text = "";
        var cro_text = "";
        $('[id^=crocompany-').each(function(){
            cro_text +=$(this).text();
            cro_text += " ; "
        });
        if ($('.defworkflow').is(':visible') && $('.custworkflow').is(':hidden'))
        {
            text +="<tr>";
            text +="<td>"+$('#default-workflow_name').val()+"</td>";
            text +="<td>"+$('#default-workflow_description').val()+"</td>";
            text +="<td>"+$('#callCenter option:selected').text()+"</td>";
            text +="<td>"+$('#select-country option:selected').text()+"</td>";
            text +="<td>"+cro_text+"</td>";
            text +="<td>";
            text +="<button class=\"btn btn-sm btn-primary mx-2\" onclick=\"view_workflow("+workflow_k+")\" data-toggle=\"modal\" data-target=\".WFlistView\">View</button>"
            text +="<button class=\"btn btn-sm btn-outline-danger\" onclick=\"$(this).closest('tr').remove();\">Delete</button>";
            text +="</td>";
            text +="<input name=\"workflow["+workflow_k+"][id]\" value="+workflow_info[workflow_k].id+" type=\"hidden\">";
            text +="<input name=\"product_workflow["+workflow_k+"][sd_company_id]\" value="+workflow_info[workflow_k].sd_company_id+" type=\"hidden\">";
            text +="<input name=\"product_workflow["+workflow_k+"][status]\" value=\"1\" type=\"hidden\">";
            $.each(resource_list,function(k,workflow){
                $.each(workflow,function(k,company){
                    $.each(company.team_resources,function(k,personDetail){
                        text +="<input name=\"user_assignment["+workflow_k+"]["+personDetail.id+"][sd_user_id]\" value="+personDetail.id+" type=\"hidden\">";
                    })
                    $.each(company.workflow_manager,function(k,personDetail){
                        text +="<input name=\"product_workflow["+workflow_k+"][sd_user_id]\" value="+personDetail.id+" type=\"hidden\">";
                        workflow_info[workflow_k].sd_user_id = personDetail.id;
                    })
                })
            });

            // text +="<input name=\"user_assignment["+workflow_k+"][sd_user_assignments]\" value="+$('#default-workflow_id').val()+" type=\"hidden\">";
            text +="</tr>";
        }
        if (($('.defworkflow').is(':hidden') && $('.custworkflow').is(':visible')))
        {
            text +="<tr>";
            text +="<td>"+$('#custom-workflow_name').val()+"</td>";
            text +="<td>"+$('#custom-workflow_description').val()+"</td>";
            text +="<td>"+$('#callCenter option:selected').text()+"</td>";
            text +="<td>"+$('#select-country option:selected').text()+"</td>";
            text +="<td>"+cro_text+"</td>";
            text +="<td>";
            text +="<button class=\"btn btn-sm btn-primary mx-2\" data-toggle=\"modal\" onclick=\"view_workflow("+workflow_k+")\" data-target=\".WFlistView\">View</button>"
            text +="<button class=\"btn btn-sm btn-outline-danger\" onclick=\"$(this).closest('tr').remove();\">Delete</button>";
            text +="</td>";

            text +="<input name=\"workflow["+workflow_k+"][name]\" value="+workflow_info[workflow_k].workflow_name+" type=\"hidden\">";
            text +="<input name=\"workflow["+workflow_k+"][description]\" value="+workflow_info[workflow_k].workflow_description+" type=\"hidden\">";
            text +="<input name=\"workflow["+workflow_k+"][country]\" value="+workflow_info[workflow_k].country+" type=\"hidden\">";
            text +="<input name=\"workflow["+workflow_k+"][status]\" value=\"1\" type=\"hidden\">";
            text +="<input name=\"workflow["+workflow_k+"][workflow_type]\" value=\"1\" type=\"hidden\">";
            text +="<input name=\"product_workflow["+workflow_k+"][sd_company_id]\" value="+workflow_info[workflow_k].sd_company_id+" type=\"hidden\">";
            text +="<input name=\"product_workflow["+workflow_k+"][sd_user_id]\" value="+workflow_info[workflow_k].sd_user_id+" type=\"hidden\">";//TODO
            text +="<input name=\"product_workflow["+workflow_k+"][status]\" value=\"1\" type=\"hidden\">";
            $.each(resource_list,function(k,workflow){
                $.each(workflow,function(k,company){
                    $.each(company.team_resources,function(k,personDetail){
                        text +="<input name=\"user_assignment["+workflow_k+"]["+personDetail.id+"][sd_user_id]\" value="+personDetail.id+" type=\"hidden\">";
                    })
                    $.each(company.workflow_manager,function(k,personDetail){
                        text +="<input name=\"product_workflow["+workflow_k+"][sd_user_id]\" value="+personDetail.id+" type=\"hidden\">";
                        workflow_info[workflow_k].sd_user_id = personDetail.id;
                    })
                })
            });
            $.each(workflow_info[workflow_k]['activities'], function(k, activity_detail){
                console.log(activity_detail['activity_name']);
                text +="<input name=\"workflow_activity["+workflow_k+"]["+k+"][activity_name]\" value=\""+activity_detail['activity_name']+"\" type=\"hidden\">";
                text +="<input name=\"workflow_activity["+workflow_k+"]["+k+"][description]\" value=\""+activity_detail['activity_description']+"\" type=\"hidden\">";
                text +="<input name=\"workflow_activity["+workflow_k+"]["+k+"][step_backward]\" value=\""+activity_detail['step_backward']+"\" type=\"hidden\">";
                text +="<input name=\"workflow_activity["+workflow_k+"]["+k+"][order_no]\"  value=\""+activity_detail['order_no']+"\" type=\"hidden\">";

            });
        };
        text +="</tr>";
        $('#addNewWL').show();
        $('#choworkflow, #choosecro').slideUp();
        $('#workflowlist').slideDown();
        swal({
            title: "Your New Workflow has been SET",
            icon: "success",
          });
        $('#workflow_table').append(text);
        $('#no_workflow_notice').hide();
        workflow_k ++;
    });
//TODODDDDDDD
    // Disable selected option if chosed
    $(document).ready(function(){
        $("#croadd").click(function(){
            $("#croname option:selected").remove();
        });
    });
    $(document).ready(function(){
        $("#advsearch").click(function(){
            $("#advsearchfield").slideDown();
        });
    });
    // Defaultworkflow and Custworkflow button control

    $('#defbtn').click(function() {
        $('#confirm_activities').show();
        $('.defworkflow').slideDown();
        $('.custworkflow').slideUp();
    });

    $('#custbtn').click(function() {
        $('#confirm_activities').show();
        $('.custworkflow').slideDown();
        $('.defworkflow').slideUp();
    });

    // Close customworkflow step
    $('.closewf').click(function() {
        $(this).closest('li').remove();
    });
    // Custworkflow Close icon
    $('.close').click(function() {
        $(this).parents('li.custworkflowstep').fadeOut();
    });

// "Confirm Assignment" button message
    $('#conass').click(function() {
        swal({
            title: "Your Assignment has been saved!",
            icon: "success"
          })
    })
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
                    $(this).parents('li.custworkflowstep').remove();
                });
            }
        });
        // $('#comfirm_activity').click(function(){
        //     $(this).hide();
        //     $('#new_activity-name').replaceWith('<b>' + $('#new_activity-name').val() + '</b>');
        //     $('#new_activit-description').replaceWith($('#new_activit-description').val());
        //     $('#customize_activity').attr('id','draggable');
        //     $( "#draggable" ).draggable({
        //         connectToSortable: "#sortable",
        //         cursor: "pointer",
        //         helper: "clone",
        //         opacity: 0.6,
        //         revert: "invalid",
        //         start  : function(event, ui){
        //             $(this).find('.card-body').append( '<button class="close closewf">' +  '&times;' +  '</button>');
        //             $(this).find('.input-group').append('<i class="fas fa-arrow-up gobackstep"></i><input type="text" class="step_backward form-control form-control-sm" aria-label="Back Steps" aria-describedby="backSteps">');

        //                 // $(ui.helper).addClass("w-100 h-75");
        //                 // $(this).find('h5').replaceWith('<h5><input type="text" placeholder="Type your step name here" class="font-weight-bold" /></h5>');
        //         },
        //         // Add "close icon" when drag into new place
        //         create :  function (event, ui) {
        //                 $(this).find('.card-body').append( '<button class="close closewf">' +  '&times;' +  '</button>');
        //                 $(this).find('.input-group').append('<i class="fas fa-arrow-up gobackstep"></i><input type="text" class="step_backward form-control form-control-sm" aria-label="Back Steps" aria-describedby="backSteps">');
        //                 // $(this).change(function() {
        //                 //     $('#new_activity-name').replaceWith('<h5 id>' + $('#new_activity-name').val() + '</h5>');
        //                 // });
        //                 },
        //         // Remove all inputs in original when drag into new place
        //         stop : function (event,ui) {
        //             $(ui.helper).addClass("w-100 h-75");
        //             $(this).find('h5').replaceWith('<h5><input id="new_activity-name" type="text" placeholder="Type your step name here" class="font-weight-bold" /></h5>');
        //             $(this).find('p').replaceWith('<p class="card-text"><textarea type="text" id="new_activit-description" class="form-control" placeholder="Type your step description here" aria-label="With textarea"></textarea></p>')
        //             $(this).attr('id','customize_activity');
        //             $('#comfirm_activity').show();
        //             $('#customize_activity').find('.close').remove();
        //             $('#customize_activity').find('.gobackstep').remove();
        //             $('#customize_activity').find('.step_backward').remove();
        //         }
        //     });
        //     });
        $('#confirm_new_activity').click(function(){
            $('#draggable').addClass('ui-draggable ui-draggable-handle');
        });
        $( "#draggable" ).draggable({
            connectToSortable: "#sortable",
            cursor: "pointer",
            helper: "clone",
            opacity: 0.6,
            revert: "invalid",
            start  : function(event, ui){
                $(ui.helper).addClass("w-100 h-75");
                $(this).find('h5').replaceWith('<h5><input type="text" id="new_activity-name" placeholder="Type step name here FIRST" class="font-weight-bold" /></h5>');
                $(this).find('p').replaceWith('<p class="card-text"><textarea type="text"  id="new_activity-description" class="form-control" placeholder="Type your step description here" aria-label="With textarea"></textarea></p>');
                $(this).find('#confirm_new_activity').show();
            },
            // Add "close icon" when drag into new place
            create :  function (event, ui) {
                $(this).find('.card-body').prepend( '<button class="close closewf">' +  '&times;' +  '</button>');
                $('#confirm_new_activity').click(function(){
                    $('#new_activity-name').replaceWith('<b>'+$('#new_activity-name').val()+'</b>');
                    $('#new_activity-description').replaceWith($('#new_activity-description').val());
                    $(this).hide();
                });

            },
            // Remove all inputs in original when drag into new place
            // stop : function (event,ui) {
            //     $(this).find('input, textarea').val('');
            // }
        });
      });

          // Add CRO, triggered by "Add" button for adding CRO button and CRO resource list
    $('#croadd').click(function() {
        var cro_name = $('#croname option:selected').text();
        var cro_id = $("#croname").val();
        // var newcro = $('<button type="button"class="btn btn-outline-primary"  onclick="selectCro(' + cro_id + ')" data-toggle="modal" data-target=".bd-example-modal-lg">' + cro_name + '</button>');
        $('#crotable').append('<tr id="cro_id_list-'+cro_id+' "><th id = "crocompany-'+cro_id+'">' + cro_name + '</th><td id = "cromanager-'+cro_id+'"></td><td id = "crostaff-'+cro_id+'"></td><td><button class="btn btn-sm btn-outline-info" onclick="selectCro(' + cro_id + ')" data-toggle="modal" data-target="#addper">Edit</button><button class="btn btn-sm btn-danger ml-3" id="removeCRO-' + cro_id + '" onclick="removeCro(' + cro_id + ')">Delete</button></td></tr>');
        // $('#addcroarea').append(newcro);
        var request = {'id':cro_id};
        //TODO
        $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            type:'POST',
            url:'/sd-users/searchResource',
            data:request,
            success:function(response){
                console.log(response);
                var result = $.parseJSON(response);
                var text = "";
                var cro_info = {};
                cro_info.member_list = result;
                cro_info.name = cro_name;
                cro_id.team_resources = [];
                cro_id.workflow_manager = [];
                resource_list[workflow_k][cro_id]=cro_info;
                // $.each(result, function(k,personDetail){
                //     console.log(personDetail);
                //         text +="<div class=\"personnel\" id=\"userid_"+personDetail.id+">"+personDetail.firstname+"</div>";
                //     });
                // $('#personnelDraggable').html(text);
                // croDroppableArea();
            },
            error:function(response){

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
        var activity_description = $(li).find(".card-text").text()
        var step_backward = $(li).find(".step_backward").val()
        var step_name = $(li).find("h5").text().replace(/ /g,'');
        steps.push({
            display_order: display_order,
            activity_name: step_name,
            activity_description: activity_description,
            step_backward: step_backward
        });
        // console.log(display_order);
        // console.log(step_name);

    })
    //console.log(steps);
    return steps;
}
function croDroppableArea(){
    $(".personnel").draggable({
        cursor: "pointer",
        helper: "clone",
        opacity: 0.6,
        revert: "invalid",
        zIndex: 100
    });

    $("#personnelDraggable").droppable({
        tolerance: "intersect",
        accept: ".personnel",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $("#personnelDraggable").append($(ui.draggable));
        }
    });

    $(".stackDrop1").droppable({
        tolerance: "intersect",
        accept: ".personnel",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $(this).append($(ui.draggable));
        }
    });

    $(".stackDrop2").droppable({
        tolerance: "intersect",
        accept: ".personnel",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $(this).append($(ui.draggable));
        }
    });
}
function view_workflow(workflow_k){
    $('#viewWFname').text(workflow_info[workflow_k]['workflow_name']);
    $('#viewCC').text(call_center_list[workflow_info[workflow_k]['sd_company_id']]['name']);
    $('#viewCountry').text(workflow_info[workflow_k]['country']);
    $('#viewDesc').text(workflow_info[workflow_k]['workflow_description']);
    var team_resources_text="";
    $.each(resource_list[workflow_k], function(company_id, company_detail){
        console.log(company_detail);
        $.each(company_detail['team_resources'],function(k,v){
            console.log(v);
            team_resources_text += "<div>"+v['firstname']+" "+v['lastname']+" /"+company_detail['name']+"</div>";
        });
        $.each(company_detail['workflow_manager'],function(k,v){
            console.log(v);
            $('#viewMan').text(v['firstname']+" "+v['lastname']+" /"+company_detail['name']);
        })
    });
    $('#viewRes').html(team_resources_text);
    var activities_text="";
    $(workflow_info[workflow_k]['activities']).each(function(k,activity_detail){
        activities_text +="<span class=\"badge badge-info px-5 py-3 m-3\"><h5>"+activity_detail['activity_name']+"</h5><h8>"+activity_detail['activity_description']+"</h8></span><i class=\"fas fa-long-arrow-alt-right\"></i>";
    })
    activities_text+="<span class=\"badge badge-info px-5 py-3 m-3\"><h5>Complete</h5><h8>End of the case</h8></span>"
    $('#view_activities').html(activities_text);
}