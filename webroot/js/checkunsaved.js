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
