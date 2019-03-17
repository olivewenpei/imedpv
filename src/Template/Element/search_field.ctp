<!--     Left Navigation Bar    -->
<div class="container-fluid">
<div class="btn-group-vertical" id="sidenav" role="group" aria-label="Button group with nested dropdown">
    <input id="searchFieldKey" placeholder="Type the word you want to search">
    <div id="searchFieldResult"></div>
</div>
</div>
<script>
$("#searchFieldKey").keydown(function(){
      var request={
          'key':$('#searchFieldResult').val()
      };
      $.ajax({
        headers: {
            'X-CSRF-Token': csrfToken
        },
        type:'POST',
        url:'/sd-section-structures/search',
        data:request,
        success:function(response){ 
            console.log(response);

        },
        error:function(response){
            console.log(response.responseText);
        }
    });
});
</script>