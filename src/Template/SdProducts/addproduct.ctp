<title>Product</title>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Add Product</h5> 
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="#" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label>Study Number</label>
                            <input type="text" class="form-control" id="#" placeholder="Study Number">
                        </div>
                        <!-- <a href="#" role="submit" class="btn btn-primary p-2 w-25">Submit</a> -->
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Submit</button>

                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="conhead">Choose Country</h5>
                                    <h5 class="modal-title workhead" id="workhead">Choose Workflow</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body chocty" id="chocty">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                        <label class="form-check-label" for="exampleRadios1">USA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                        <label class="form-check-label" for="exampleRadios1">Japan</label>
                                    </div>
                                </div>

                                <div class="modal-body workflow" id="workflow">
                                    <h3>Default</h3>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="choctybtn">Countinue</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

