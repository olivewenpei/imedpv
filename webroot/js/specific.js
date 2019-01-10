jQuery(function($) {
    // Alert if changes unsaved
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

    // Show "Save" button when any input change
    $(document).ready(function() {
        $("input,textarea,select").change(function () {
            $(this).parents('.fieldInput').siblings().find("[id^=save-btn]").show();
         })
    });

    // Auto populate the selected value into next
    $(document).ready(function() {
        $('#section-22-select-191').change(function() {
            var foa = $("option:selected", this).text();
            $('#section-22-text-347').val(foa).prop( "disabled", true );
        });

        $('#section-22-select-192').change(function() {
            var roa = $("option:selected", this).text();
            $('#section-22-text-286').val(roa).prop( "disabled", true );
        });

    });

});
