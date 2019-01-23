$(document).ready(function(){
    
    $('input:checkbox').change(
        function(){
            if ($(this).is(':checked')) {
                var inputElement = $('#classification');
                var Value = inputElement.val();
                Value = Value.substring(0, $(this).val()-1) + "1" + Value.substring($(this).val());
                inputElement.val(Value);
            }else{
                var inputElement = $('#classification');
                var Value = inputElement.val();
                Value = Value.substring(0, $(this).val()-1) + "0" + Value.substring($(this).val());
                inputElement.val(Value);
            }
        });
    /**
     * 
     * change Workflow Name according to Product selection
     */
    $('#product_name').change(function(){
        var text = "<option>Select Workflow Name</option>";
        $(productInfo).each(function(k,v){
            if(v.id == $('#product_name').val()){
                $(v.sd_product_workflows).each(function(k,v){
                    text +="<option value=\""+v.id+"\">"+v.sd_workflow.name+"</option>"
                });
            }
        });
        $('#workflow_name').html(text);
    })

    /**
     *show caseNo 
     */
    $('#no_of_sae').change(function(){console.log($('#no_of_sae').val());
        var text = "";
        for(i = 1;i <= $('#no_of_sae').val();i++){
            text += "<input class=\"form-control\" type=\"text\" readonly=\"readonly\" id=\"caseNO-"+i+"\" name=\"case[caseNo]["+i+"]\"value=\""+randCaseNo+str_pad(i,5)+"\">";
        }
        $('#show_selected_sae_name').html(text);
    })
});

function str_pad(str, max){
    return str.length>=max?str:str_pad("0"+str, max);
}