// Alert if changes unsaved
jQuery(function($) {
    $(document).ready(function() {
        var unsaved = false;

        $("input:not(:button,:submit),textarea,select").change(function(){   //triggers change in all input fields including text type
            unsaved = true;
        });

        function unloadPage(){
            if(unsaved){
                return 'Your data is changed, are you sure you want to complete?';
            }
        }
        $('button[type=submit]').click(function() {
            break ;
        });
        window.onbeforeunload = unloadPage;
    });

});


// Files Export
function genPDF() {
    var doc = new jsPDF();

    // select
    var counsele = document.getElementById("section-1-select-2");
    var country = counsele.options[counsele.selectedIndex].text;

    // input text
    var reportid = $('#section-1-text-1').val();

    // radio
    var local = $('input[name="sd_field_values[1][8][field_value]"]:checked').val();

    doc.setFontSize(30);
    doc.text(10,20,'This report country is: ' + country);
    doc.text(10,30,'This report ID is: ' + reportid);
    doc.text(10,40,'This Local expedited is: ' + local);

    doc.save('test.pdf');
}