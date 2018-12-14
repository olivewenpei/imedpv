jQuery(function($) {
    // Alert if changes unsaved
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

    // Show "Save" button when any input change
    $(document).ready(function() {
        $("input,textarea,select").change(function () {
            $(this).parents('.fieldInput').siblings().find("[id^=save-btn]").show();
         })
    });

    // Auto populate the selected value into next
    // "Product" Form of admin (B.4.k.7)
    $(document).ready(function() {
        $('#section-22-select-191,#section-22-select-192').change(function() {
            var foa = $('#select2-section-22-select-191-container').text();
            var roa = $('#select2-section-22-select-192-container').text();
            $('#section-22-text-347').val(foa);
            $('#section-22-text-286').val(roa);
        });
    });

    $(document).ready(function() {
        $('#section-22-date-199,#section-22-date-205').change(function() {
            var tsd = $('#section-22-date-199').val();
            var ted = $('#section-22-date-205').val();
            $('#section-22-text-288').val(tsd);
            $('#section-22-text-289').val(ted);
        });
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