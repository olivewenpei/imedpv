$popover('[data-toggle="popover"]').popover({
    html: true,
    trigger: 'hover focus',
    delay: { show: 100, hide: 500 }
});

$(document).ready(function($){
    // Workflow Resouces
    $(".wfres").draggable({
        appendTo: "body",
        cursor: "grab",
        helper: 'clone',
        revert: "invalid",
        snapTolerance: 30
    });

    // Workflow Resouces Container
    $("#workflowResources").droppable({
        tolerance: "intersect",
        accept: ".wfres",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $("#workflowResources").append($(ui.draggable));
        }
    });

    $(".resourceDropzone").droppable({
        tolerance: "intersect",
        accept: ".wfres",
        activeClass: "ui-state-default",
        hoverClass: "ui-state-hover",
        drop: function(event, ui) {
            $(this).append($(ui.draggable));
        }
    });

});