jQuery(function($) {
    $(document).ready(onQueryClicked());
});


$(document).ready(function(){
    $("#fullSearchBtn").click(function () {
        $('#fullSearch').show();
        $('#basicSearch').hide();
    });
});