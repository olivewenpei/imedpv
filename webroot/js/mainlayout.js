// Highlight the section you choose in navmenu
$(function(){
    $('.navMenu > li > a').each(function(){
        if ($(this).prop('href') == window.location.href) {
            $(this).addClass('active');
        }
    });
});

// Datepicker Script
$( function() {
    $( "[id*=date]" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
    $("#section-1-field-355").hide();
} );

// For Additional documents (A.1.8.1) select in General Tab
    // If choose "Yes", show "Choose file"
    $(document).ready(function(){
        $("#section-1-radio-13-option-1").click(function(){
            $("#section-1-field-355").show(1000);
        });
    });
    // If choose "No", hide "Choose file"
    $(document).ready(function(){
        $("#section-1-radio-13-option-2").click(function(){
            $("#section-1-field-355").hide(1000);
        });
    });

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
                    $(this).find('.card-body').prepend( '<button type="button" class="close" aria-label="Close">' + '<span aria-hidden="true">' + '&times;' + '</span>' + '</button>');
                    },
            // Remove all inputs in original when drag into new place
            stop : function (event,ui) {
                $(this).find('input, textarea').val('');
            }
        });


        // CRO Droppable Area
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


      });

// Custworkflow Close icon
    $('.close').click(function() {
        $(this).parents('li.custworkflowstep').fadeOut();
    });

// "Complete" button message
    $('button[type=submit]').click(function() {
        swal({
            title: "Are you sure?",
            text: "Your data is changed, are you sure to complete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("All the data has been saved", {
                icon: "success",
              });
            } else {
              swal("All the input data is safe!");
            }
          });
    })

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
    $('input:checkbox').change(
        function(){
            if ($(this).is(':checked')) {
                var id = $(this).attr('id').split('-');
                var inputElement = $('[id^='+id[0]+'-'+id[1]+'-'+id[2]+'-'+id[3]+'][id$=final]');
                var Value = inputElement.val();
                Value = Value.substring(0, $(this).val()-1) + "1" + Value.substring($(this).val());
                inputElement.val(Value);
            }else{
                var id = $(this).attr('id').split('-');
                var inputElement = $('[id^='+id[0]+'-'+id[1]+'-'+id[2]+'-'+id[3]+'][id$=final]');
                var Value = inputElement.val();
                Value = Value.substring(0, $(this).val()-1) + "0" + Value.substring($(this).val());
                inputElement.val(Value);
            }
        });

// Add Product card
    $(document).ready(function($){
        $('#whodrahint').html($('#whodrabrowser').html());
        $('#addpro').click(function() {
            $('#choosecon').show();
            $("#addpro > div > input").prop("disabled", true);
        });
        $('#submitchocountry').click(function() {
            $('#choosewf').show();
            $("#choosecon > div > div > select").prop("disabled", true);
        });
        $('#submitworkflow').click(function() {
            $('#choosecro').show();
        });
    });


    $(document).ready(paginationReady());

    // Assign human to CROs
    // $(document).ready(function($){
    //     $('#worman,#teres').click(function() {
    //         if($(".checkboxstyle").is(":checked")) {
    //             $(".checkboxstyle:checked").prop("disabled",true);
    //             $("input:disabled").parent().find(".undo").attr('style', 'display: block !important');
    //         };
    //     });
    //     $(".undo").click(function() {
    //         $(this).prevAll().prop("checked",false).prop("disabled",false);
    //         $(this).attr('style', 'display: none !important');
    //     });
    // });

    $(".js-example-responsive").select2({
        width: 'resolve'
    });
});
function level2setPageChange(section_id, pageNo, addFlag=null){
    var child_section =  $("[id^=child_section][id$=section-"+section_id+"]").attr('id').split('-');
    child_section_id = child_section[1].split(/[\[\]]/);
    child_section_id = jQuery.grep(child_section_id, function(n, i){
        return (n !== "" && n != null);
    });
    var max_set_no  = 0 ;
    $(child_section_id).each(function(k, v){
        var sectionKey = $("[id^=add_set-"+v+"]").attr('id').split('-')[3];
        $(section[sectionKey].sd_section_structures).each(function(k,v){
            $.each(v.sd_field.sd_field_values,function(key, value){console.log("v:");console.log(v);console.log(value);console.log(value.set_number);
                max_set_no = Math.max(value.set_number, max_set_no);
            })
        })
    });
    if ((pageNo <= 0)||(pageNo>max_set_no)) {console.log("set_no not avaiable");console.log(max_set_no); return;};
     if(addFlag==1)
    {
        pageNo = max_set_no+1;
        $("[id^=child_section][id$=section-"+section_id+"]").hide();
    }else{$("[id^=child_section][id$=section-"+section_id+"]").show()}
    $(child_section_id).each(function(k,v){
        setPageChange(v, pageNo, addFlag, 1);
    });

    $("[id^=left_set-"+section_id+"]").attr('id', 'left_set-'+section_id+'-setNo-'+pageNo);
    $("[id^=left_set-"+section_id+"]").attr('onclick','level2setPageChange('+section_id+','+Number(Number(pageNo)-1)+')');
    $("[id^=right_set-"+section_id+"]").attr('id', 'right_set-'+section_id+'-setNo-'+pageNo);
    $("[id^=right_set-"+section_id+"]").attr('onclick','level2setPageChange('+section_id+','+Number(Number(pageNo)+1)+')');
    $("[id=section-"+section_id+"-page_number-"+child_section[5]+"]").css('font-weight', 'normal');
    $("[id=section-"+section_id+"-page_number-"+pageNo+"]").css('font-weight', 'bold');
    $("[id^=child_section][id$=section-"+section_id+"]").attr('id',child_section[0]+'-'+child_section[1]+'-'+child_section[2]+'-'+child_section[3]+'-'+child_section[4]+'-'+pageNo+'-'+child_section[6]+'-'+child_section[7]);
}

function setPageChange(section_id, pageNo, addFlag=null, pFlag) {
    $("[id^=save-btn"+section_id+"]").hide();
    if($("[id^=right_set-"+section_id+"]").length){

        var sectionIdOriginal =  $("[id^=right_set-"+section_id+"]").attr('id');
        var sectionId = sectionIdOriginal.split('-');
        var setNo = sectionId[5];

        var max_set_no = 0;
        $("[id^=section-"+sectionId[1]+"-page_number").each(function() {
            max_set_no = Math.max(Number($(this).attr('id').split('-')[3]), max_set_no);
        });
        // if ((Number(setNo)+Number(steps) <= 0)||(Number(setNo)+Number(steps)>max_set_no)) {console.log("set_no not avaiable"); return;};

        if ((((pageNo <= 0)&&(addFlag!=1))||pageNo>max_set_no)&&pFlag!=1) {console.log("set_no not avaiable"); return;};
        if(addFlag == 1){
            $("[id=addbtnalert-"+sectionId[1]+"]").show();
        }else{
            $("[id=addbtnalert-"+sectionId[1]+"]").hide()
        }
        if((addFlag == 1)&&(pFlag!=1)) {
            pageNo = max_set_no+1;
            $("[id^=add_set-"+sectionId[1]+"]").hide();
            }else {$("[id^=add_set-"+sectionId[1]+"]").show();}
        $("[id^=section-"+sectionId[1]+"][name$=\\[id\\]]").each(function(){
            var sectionStructureK = $(this).attr('name').split(/[\[\]]/)[3];
            var valueFlag = false;
            var thisElement = $(this);
            var idholder = thisElement.attr('id').split('-');
            var maxindex=0;
            if (section[sectionId[3]].sd_section_structures[sectionStructureK].sd_field.sd_field_values.length>=1){
                $.each(section[sectionId[3]].sd_section_structures[sectionStructureK].sd_field.sd_field_values, function(index, value){
                    if ((typeof value != 'undefined')&&value.set_number== pageNo){
                        thisElement.val(value.id);
                        thisElement.attr('id',idholder[0]+'-'+idholder[1]+'-'+idholder[2]+'-'+idholder[3]+'-'+idholder[4]+'-'+index+'-'+idholder[6]);
                        valueFlag = true;
                    }
                    maxindex = maxindex+1;
                });
            }
            if(valueFlag == false) {
                $(this).val(null);
                var idholder = thisElement.attr('id').split('-');
                thisElement.attr('id',idholder[0]+'-'+idholder[1]+'-'+idholder[2]+'-'+idholder[3]+'-'+idholder[4]+'-'+maxindex+'-'+idholder[6]);
            };
        });
        $("[id^=section-"+sectionId[1]+"][name$=\\[set_number\\]]").each(function(){
            var newSetNumber = pageNo;
            $(this).val(newSetNumber);
        });
        $("[id^=section-"+sectionId[1]+"][name$=\\[field_value\\]]").each(function(){
            var sectionStructureK = $(this).attr('name').split(/[\[\]]/)[3];
            var thisId = $(this).attr('id').split('-');
            var valueFlag = false;
            var thisElement = $(this);
            if (section[sectionId[3]].sd_section_structures[sectionStructureK].sd_field.sd_field_values.length>=1){
                $.each(section[sectionId[3]].sd_section_structures[sectionStructureK].sd_field.sd_field_values, function(index, value){
                    if ((typeof value != 'undefined')&&(value.set_number== pageNo)){
                        if(thisElement.attr('id').split('-')[2] == 'date'||thisElement.attr('id').split('-')[2] == 'select'||thisElement.attr('id').split('-')[2] == 'whodraname'||thisElement.attr('id').split('-')[2] == 'whodracode'||thisElement.attr('id').split('-')[2] == 'text'||thisElement.attr('id').split('-')[2] == 'textarea'){
                            thisElement.val(value.field_value);
                            valueFlag = true;
                        }else{
                            if(thisElement.attr('id').split('-')[2]=='radio'){
                                if(thisElement.val()==value.field_value) {
                                    thisElement.prop('checked',true);
                                    valueFlag = true;
                                }else thisElement.prop('checked',false);
                            }if(thisElement.attr('id').split('-')[2]=='checkbox'){
                                valueFlag = true;
                                if(value.field_value.charAt(Number(thisElement.val())-1) == 1){
                                    thisElement.prop('checked',true);
                                }else thisElement.prop('checked',false);
                                if((typeof thisId[5] != 'undefined')&&(thisId[5]=="final")) {thisElement.val(value.field_value); }
                            }
                        }
                    }
                });
            }
            if(valueFlag == false) {
                if(thisElement.attr('id').split('-')[2] == 'select'||thisElement.attr('id').split('-')[2] == 'text'||thisElement.attr('id').split('-')[2] == 'textarea'){
                    thisElement.val(null);
                }else{
                    thisElement.prop('checked',false);
                    if((typeof thisId[5] != 'undefined')&&(thisId[5]=="final")) {
                        val = "";
                        for (i = 0; i < thisId[4]; i++){
                            val = val+"0";
                        }
                        thisElement.val(val);
                    }
                }
            };
        });
        $("[id^=left_set-"+sectionId[1]+"]").attr('id', 'left_set-'+sectionId[1]+'-'+sectionId[2]+'-'+sectionId[3]+'-'+sectionId[4]+'-'+pageNo);
        $("[id^=left_set-"+sectionId[1]+"]").attr('onclick','setPageChange('+sectionId[1]+','+Number(Number(pageNo)-1)+')');
        $("[id^=right_set-"+sectionId[1]+"]").attr('id', 'right_set-'+sectionId[1]+'-'+sectionId[2]+'-'+sectionId[3]+'-'+sectionId[4]+'-'+pageNo);
        $("[id^=right_set-"+sectionId[1]+"]").attr('onclick','setPageChange('+sectionId[1]+','+Number(Number(pageNo)+1)+')');
        $("[id=section-"+sectionId[1]+"-page_number-"+sectionId[5]+"]").css('font-weight', 'normal');
        $("[id=section-"+sectionId[1]+"-page_number-"+pageNo+"]").css('font-weight', 'bold');
    }
};

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
            $.each(result, function(k,caseDetail){
                text += "<tr>";
                text += "<td>" + caseDetail.caseNo + "</td>";
                text += "<td></td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.start_date + "</td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.sd_product_workflow.sd_product.study_no + "<td>";
                text += "<td></td>";
                text += "<td>" + caseDetail.end_date + "</td>";
                text += "<td><a class=\"btn btn-outline-info\" href=\"/sd-tabs/showdetails/1?caseNo="+caseDetail.id+"\">Data Entry</a> <a class=\"btn btn-outline-info\" href=\"#\">More</a></td>";
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
function searchWhoDra(){
    var request = {
        'atc-code': $("#atc").val(),
        'drug-code':$("#drugcode").val(),
        'medicinal-prod-id':$('#medicalProd').val(),
        'trade-name':$('#tradename').val(),
        'ingredient':$('#ingredient').val(),
        'formulation':$('#formulation').val(),
        'country':$('#inputState').val(),
    };
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/who-dra/search',
        data:request,
        success:function(response){
            console.log(response);

        },
        error:function(response){
                console.log(response.responseText);

            $("#textHint").html("Sorry, no case matches");

        }
    });
}
function paginationReady(){
    $("[id^=pagination-l2").each(function(){
        var hsectionid = $(this).attr('id').split('-')[3];
        var child_section_element = $("[id^=child_section][id$=section-"+hsectionid+"]").attr('id');
        var child_section_id = child_section_element.split('-')[1];
        child_section_id = child_section_id.split(/[\[\]]/);
        child_section_id = jQuery.grep(child_section_id, function(n, i){
            return (n !== "" && n != null);
        });
        var max_set_no  = 0 ;
        $(child_section_id).each(function(k, v){
            var sectionKey = $("[id^=add_set-"+v+"]").attr('id').split('-')[3];
            $(section[sectionKey].sd_section_structures).each(function(k,v){
                $.each(v.sd_field.sd_field_values,function(key, value){console.log("v:");console.log(v);console.log(value);console.log(value.set_number);
                    max_set_no = Math.max(value.set_number, max_set_no);
                })
            })
            // section[section_Id[2]].sd_section_structures[sectionStructureK].sd_field.sd_field_values
            $("[id^=pagination-section-"+v+"]").hide();
        });
        if (max_set_no==0) {
            $("[id^=child_section][id$=section-"+hsectionid+"]").hide();
            max_set_no = 1;
        }else {
            $("[id^=child_section][id$=section-"+hsectionid+"]").show();
            $("[id=delete_section-"+hsectionid+"]").show();
        }
        var text= "";
        text += "<nav class=\"d-inline-block float-right\" title=\"Pagination\" aria-label=\"Page navigation example\">";
        text += "<ul class=\"pagination mb-0\">";
        text +=    "<li class=\"page-item\" id=\"left_set-"+hsectionid+"-setNo-1\" onclick=\"level2setPageChange("+hsectionid+",0)\" >";
        text +=    "<a  class=\"page-link\" aria-label=\"Previous\">";
        text +=        "<span aria-hidden=\"true\">&laquo;</span>";
        text +=        "<span class=\"sr-only\">Previous</span>";
        text +=    "</a>";
        text +=    "</li>";
        for(pageNo=1; pageNo<=max_set_no; pageNo++){
                    text +=    "<li class=\"page-item\" id=\"l2section-"+hsectionid+"-page_number-"+pageNo+"\" ><a id=\"section-"+hsectionid+"-page_number-"+pageNo+"\" onclick=\"level2setPageChange("+hsectionid+","+pageNo+")\" class=\"page-link\">"+pageNo+"</a></li>";
        }
        text +=    "<li class=\"page-item\" id=\"right_set-"+hsectionid+"-setNo-1\" onclick=\"level2setPageChange("+hsectionid+",2)\">";
        text +=    "<a class=\"page-link\" aria-label=\"Next\">";
        text +=        "<span aria-hidden=\"true\">&raquo;</span>";
        text +=        "<span class=\"sr-only\">Next</span>";
        text +=    "</a>";
        text +=    "</li>";
        text += "</ul>";
        text += "</nav>";
        $("#showpagination-"+hsectionid).html(text);
    })
}
function l2deleteSection(sectionId){
    pageNo = $("#showpagination-"+sectionId).find("[id^=right_set]").attr('id').split('-setNo-')[1];
    child_section = $("[id^=child][id$=section-"+sectionId+"]").attr('id').split('-');
    child_section_id = child_section[1].split(/[\[\]]/);
    child_section_id = jQuery.grep(child_section_id, function(n, i){
        return (n !== "" && n != null);
    });
    $(child_section_id).each(function(k,v){
        deleteSection(v);
    });
    $("[id=l2section-"+sectionId+"-page_number-"+pageNo+"]").remove();
    $("[id^=l2section-"+sectionId+"-page_number]").each(function(){
        if($(this).attr('id').split('-page_number-')[1]>pageNo){

            $pageIdHolder=$(this).attr('id').split('-page_number-');
            $(this).attr('id',$pageIdHolder[0]+'-page_number-'+Number($pageIdHolder[1]-1));
            $pageaIdHolder = $(this).children().attr('id').split('-page_number-');
            $(this).children().attr('id',$pageaIdHolder[0]+'-page_number-'+Number($pageaIdHolder[1]-1));
            $(this).children().attr('onclick',"level2setPageChange("+sectionId+","+Number($pageIdHolder[1]-1)+")");
            $pageNo = Number($(this).text()-1);
            $(this).children("a").text($pageNo);
        }
    })
    if(pageNo!=1){
        pageNo --;
    }
    level2setPageChange(sectionId,pageNo);
    $("[id=section-"+sectionId+"-page_number-"+pageNo+"]").css('font-weight', 'bold');
}
function deleteSection(sectionId, pcontrol=false){

    var request = {};
    var savedArray = [];

    $("div[id^=section-"+sectionId+"-field]").each(function(){
        if($(this).find("[name$=\\[field_value\\]]").length){
            var field_id = $(this).attr('id').split('-')[3];
            var field_request =
            {
                'id': $(this).children("[name$=\\[id\\]]").val(),
                'sd_field_id':$(this).children("[name$=\\[sd_field_id\\]]").val(),
                'set_number':$(this).children("[name$=\\[set_number\\]]").val(),
            };
            request[field_id] = field_request;
        }

    });
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-sections/deleteSection/'+caseNo,
        data:request,
        success:function(response){
            alert("This set has been deleted");
            savedArray = $.parseJSON(response);
            console.log(savedArray);
            var sectionIdOriginal =  $("[id^=save-btn"+sectionId+"]").attr('id');
            var section_Id = sectionIdOriginal.split('-');

            var max_set_no = 0
            for(var k in request){
                var setNum = $("[id$=field-"+k+"]").children("[id^=section-"+sectionId+"-set_number]").val();
                var fieldvalueK = $("[id$=field-"+k+"]").children("[id^=section-"+sectionId+"-sd_section_structures]").attr('id').split('-')[5];
                var sectionStructureK = $("[id^=section-"+sectionId+"-set_number-"+k+"]").attr('name').split(/[\[\]]/)[3];
                section[section_Id[2]].sd_section_structures[sectionStructureK].sd_field.sd_field_values = savedArray[k];
                $(section[section_Id[2]].sd_section_structures[sectionStructureK].sd_field.sd_field_values).each(function(k,v){
                    if(typeof v != 'undefined')
                    max_set_no = Math.max(v.set_number, max_set_no);
                });
            }
            if (max_set_no!=0){
                $("[id^=right_set-"+sectionId+"]").prev().remove();
                var previousPageNo = $("[id^=right_set-"+sectionId+"]").prev().attr('id').split('-page_number-')[1];
                if(setNum>max_set_no) setNum = max_set_no;
                if(pcontrol==false) setPageChange(sectionId,setNum);
            }else{
                if(pcontrol==false) setPageChange(sectionId, 1, 1);
            }
            $addId = $("[id^=add_set-"+sectionId+"]").attr('id').split('-setNo-');
            if(typeof previousPageNo !='undefined'){
            $("[id^=add_set-"+sectionId+"]").attr('id',$addId[0]+'-setNo-'+previousPageNo);}
            else{$("[id^=add_set-"+sectionId+"]").attr('id',$addId[0]+'-setNo-0');}
            // paginationReady();
            //TODO
            // $("[id^=child_section]").each(function(){

            //     child_section = $(this).attr("id").split('-');
            //     child_section_id = child_section[1].split(/[\[\]]/);
            //     child_section_id = jQuery.grep(child_section_id, function(n, i){
            //         return (n !== "" && n != null);
            //     });
            //     if($.inArray(sectionId,child_section_id)){
            //         console.log(Number(max_set_no)-1);
            //         console.log(child_section[7]);
            //         level2setPageChange(child_section[7], setNum);
            //     }
            // });
        },
        error:function(response){
            console.log(response.responseText);

            // $("#textHint").html("Sorry, no case matches");

        }
    });

}
function saveSection(sectionId){
    var request = {};
    var savedArray = [];

    $("div[id^=section-"+sectionId+"-field]").each(function(){
        var field_value = null;
        if($(this).find("[name$=\\[field_value\\]]").length){
            field_type = $(this).find("[name$=\\[field_value\\]]").attr('id').split('-')[2];
            if((field_type!="radio")&&(field_type!="checkbox")){
                 field_value = $(this).find("[name$=\\[field_value\\]]").val();
            }else{
                if(field_type=="radio"){
                    $(this).find("[name$=\\[field_value\\]]").each(function(){
                        if($(this).prop('checked')){
                            field_value = $(this).val();}
                    });
                }else{
                    field_value = $(this).find("[id$=final]").val();
                }
            }
            var field_id = $(this).attr('id').split('-')[3];
            var field_request =
            {
                'sd_field_id' : $(this).children("[name$=\\[sd_field_id\\]]").val(),
                'id': $(this).children("[name$=\\[id\\]]").val(),
                'set_number':$(this).children("[name$=\\[set_number\\]]").val(),
                'field_value': field_value
            };
            request[field_id] = field_request;
        }

    });
    console.log(request);
    $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-sections/saveSection/'+caseNo,
        data:request,
        success:function(response){
            alert("This section has been saved");
             savedArray = $.parseJSON(response);
             console.log(response);
            var sectionIdOriginal =  $("[id^=save-btn"+sectionId+"]").attr('id');
            var section_Id = sectionIdOriginal.split('-');
            var max_set_no  = 0
            for(var k in savedArray){
                var sectionStructureK = $("[id^=section-"+sectionId+"-set_number-"+k+"]").attr('name').split(/[\[\]]/)[3];
                var fieldvalueK = $("[id$=field-"+k+"]").children("[id^=section-"+sectionId+"-sd_section_structures]").attr('id').split('-')[5];
                var setNum = $("[id$=field-"+k+"]").children("[id^=section-"+sectionId+"-set_number]").val();
                if(savedArray[k]!=''){
                    
                    $(section[section_Id[2]].sd_section_structures[sectionStructureK].sd_field.sd_field_values).each(function(k,v){
                        if(typeof v != 'undefined')
                        max_set_no = Math.max(v.set_number, max_set_no);
                    });
                    section[section_Id[2]].sd_section_structures[sectionStructureK].sd_field.sd_field_values = savedArray[k];
                }
            }
            console.log(max_set_no);console.log(setNum);
            setPageChange(sectionId,setNum);
            if(max_set_no<setNum){
                pageNew = 0;
                if($("[id^=add_set-"+sectionId+"]").length){
                    add_set_id = $("[id^=add_set-"+sectionId+"]").attr('id').split('-');
                    pageNew=setNum;
                    if(pageNew!=1)
                    $("<li class=\"page-item\" id=\"section-"+sectionId+"-page_number-"+pageNew+"\" onclick=\"setPageChange("+sectionId+","+pageNew+")\"><a class=\"page-link\">"+pageNew+"</a></li>").insertBefore("[id^=right_set-"+sectionId+"]");
                    $("[id^=add_set-"+sectionId+"]").show();
                    $("[id^=add_set-"+sectionId+"]").attr('id', add_set_id[0]+'-'+add_set_id[1]+'-'+add_set_id[2]+'-'+add_set_id[3]+'-'+add_set_id[4]+'-'+pageNew);
                }else{
                    $("#pagination-section-"+sectionId).show();
                }
                paginationReady();
                $("[id=section-"+sectionId+"-page_number-"+pageNew+"]").css('font-weight', 'bold');
                $("[id^=l2section]").find("[id$=page_number-"+pageNew+"]").css('font-weight', 'bold');
            };
            $("[id=addbtnalert-"+sectionId+"]").hide();
        },
        error:function(response){
            console.log(response.responseText);

            // $("#textHint").html("Sorry, no case matches");

        }
    });


};
