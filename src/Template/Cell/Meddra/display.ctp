<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm" style="position:absolute !important;top: 230px;left: 540px; z-index:20;"><i class="fas fa-search"></i> MedDRA Browser</button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 1175px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">MedDRA Browser (Version: MedDRA 18.1)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Search field -->
            <div class="container">
                <div class="form-row">
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-5">
                    <label for="">MedDRA SMQ</label>
                        <select id="inputState" class="form-control">
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                    <label for="">Search LLT</label>
                        <select id="inputState" class="form-control">
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-2">
                        <div id="whoddsea" onclick="meddrasea()" class="form-control btn btn-primary w-100"><i class="fas fa-search"></i> Search</div>
                    </div>
                    <div class="form-group col-sm-1">
                        <div class="clearsearch form-control btn btn-outline-danger w-100"><i class="fas fa-eraser"></i> Clear</div>
                    </div>
                </div>
            </div>

            <!-- Table field (Should be hidden before search) -->
            <div id="meddratable"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Select</button>
      </div>
    </div>
  </div>
</div>


<script>
    function meddrasea() {
        var result = [{name:'Abalgiin',fs:'Unspecified / Unspecified',con:'China',ge:'N'},
                      {name:'Abalgiin',fs:'LIQUIDS, DROPS / Unspecified',con:'USA',ge:'N'}];

        var text = "";
        text +="<h4 class=\"text-center\">Search Results</h4>";
        text +="<table class=\"table table-hover table-striped\">";

        text += "<thead>";
        text +="<tr class=\"table-secondary\">";
        text +="<th scope=\"col\">Trade Name</th>";
        text +="<th scope=\"col\">Formulation / Strength</th>";
        text +="<th scope=\"col\">Sales Country</th>";
        text +="<th scope=\"col\">Generic?</th>";

        text +="</tr>";
        text +="</thead>";
        text +="<tbody>";
        $.each(result, function(k,v){
            text += "<tr>";
            text += "<td>" + v.name + "</td>";
            text += "<td>" + v.fs + "</td>";
            text += "<td>" + v.con + "</td>";
            text += "<td>" + v.ge + "</td>";
            text += "</tr>";
        })
        text +="</tbody>";
        text +="</table>";
        $("#meddratable").html(text);


    }
</script>