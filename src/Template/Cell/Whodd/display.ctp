<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="position:absolute !important;"><i class="fas fa-search"></i></button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 1175px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">WHODD Browser</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Search field -->
            <div class="container">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="ATC code">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Drug code">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Medicinal Prod ID">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Trade Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Ingredient">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" class="form-control" id="" placeholder="Formulation">
                    </div>
                    <div class="form-group col-md-3">
                        <select id="inputState" class="form-control">
                            <option selected>Choose Country</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-2">
                        <div id="" class="form-control btn btn-primary w-100"><i class="fas fa-search"></i> Search</div>
                    </div>
                    <div class="form-group col-sm-1">
                        <div class="clearsearch form-control btn btn-outline-danger w-100"><i class="fas fa-eraser"></i> Clear</div>
                    </div>
                </div>
            </div>

            <!-- Table field (Should be hidden before search) -->
            <h4 class="text-center">Search Results</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Trade Name</th>
                    <th scope="col">Formulation / Strength</th>
                    <th scope="col">Sales Country</th>
                    <th scope="col">Generic?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>

            <!-- Detail field (Should be hidden before search) -->
            <h4 class="text-center">Drug Details</h4> <hr>
            <div class="container">
                <fieldset disabled>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Trade Name</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">MAH</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Drug Code</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ATC Code</label>
                            <input type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Medicinal Product ID</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="">ATC Description</label>
                            <input type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="">Ingredients</label>
                        <textarea class="form-control" id="" rows="3"></textarea>
                    </div>
                </fieldset>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Select</button>
      </div>
    </div>
  </div>
</div>