<title>Product</title>

<div class="container">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="firstpage">Add Product</h5> 
                    <h5 class="secondpage">Choose Country</h5> 
                    <h5 class="thirdpage">Choose Workflow</h5> 
                    <h5 class="fourthpage">Choose CROs</h5>
                </div>
                <div class="card-body">

                    <form class="firstpage text-center">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="#" placeholder="Product Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Study Number</label>
                                <input type="text" class="form-control" id="#" placeholder="Study Number">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Product Type</label>
                                <input type="text" class="form-control" id="#" placeholder="Product Type">
                            </div>
                        </div>
                        <a href="#" id="submitmsg" class="btn btn-primary w-25 mt-3" role="button" aria-pressed="true">Submit</a>
                    </form>

                    <form class="secondpage text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1">
                            <label class="form-check-label" for="exampleRadios1">USA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1">
                            <label class="form-check-label" for="exampleRadios1">Japan</label>
                        </div>                       
                        <a href="#" id="submitchocountry" class="btn btn-primary w-25 mt-3" role="button" aria-pressed="true">Countinue</a>
                    </form>

                    <form class="thirdpage text-center">
                        <h3>Default Workflow</h3>  
                        <div class="card w-25 h-25 m-3 d-inline-block">
                            <div class="card-body p-5">
                                <h5 class="card-title">First Step: <br> <b> Triage</b></h5>
                                <p class="card-text">Capture the initial Case information.</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>  
                        <div class="card w-25 h-25 m-3 d-inline-block">
                            <div class="card-body p-5">
                                <h5 class="card-title">Second Step: <br> <b> Data Entry</b></h5>
                                <p class="card-text">Entry initial data from call center</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>        
                        <div class="card w-25 h-25 m-3 d-inline-block">
                            <div class="card-body p-5"> 
                                <h5 class="card-title">Third Step: <br>  <b> Quality Check</b></h5>
                                <p class="card-text">Check the validation of cases</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>          
                        <div class="card w-25 m-3 d-inline-block">
                            <div class="card-body p-5">
                                <h5 class="card-title">Forth Step: <br> <b> Medical Review</b></h5>
                                <p class="card-text">Review cases by doctors</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>           
                        <div class="card w-25 m-3 d-inline-block">
                            <div class="card-body p-5">
                                <h5 class="card-title">Fifth Step: <br> <b> Generate Report</b></h5>
                                <p class="card-text">Output a report from system</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>        
                        <div class="card w-25 m-3 d-inline-block">
                            <div class="card-body p-5">
                                <h5 class="card-title">Final Step: <br> <b> Complete</b></h5>
                                <p class="card-text">Case information gathered and reviewed.</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>       
                        <a href="#" id="" class="btn btn-info w-25 mt-3" role="button" aria-pressed="true">Customize</a>
                        <a href="#" id="submitworkflow" class="btn btn-primary w-25 mt-3" role="button" aria-pressed="true">Countinue</a>
                    </form>
                    
                    <form class="fourthpage text-center">
                        <p class="card-text">Click the CRO which you want to assign personnels</p>
                        <div class="btn-group-vertical w-25">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">A CRO</button>   
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">B CRO</button>  
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">C CRO</button>  
                        </div>

                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Assign Personnels</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Assign people as manager or team members.</p>
                                        <div class="form-row">
                                            <div class="custom-control custom-radio custom-control-inline col-md-2">
                                                <input id="a1" class="checkboxstyle" name="a1" value="1" type="checkbox">
                                                <label for="a1">Alice</label>
                                                <button type="button" class="btn btn-outline-danger btn-sm undo">Undo</button>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline col-md-2">
                                                <input id="a2" class="checkboxstyle" name="a1" value="2" type="checkbox">
                                                <label for="a2">John</label>
                                                <button type="button" class="btn btn-outline-danger btn-sm undo">Undo</button>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline col-md-2">
                                                <input id="a3" class="checkboxstyle" name="a1" value="3" type="checkbox">
                                                <label for="a3">Tom</label>
                                                <button type="button" class="btn btn-outline-danger btn-sm undo">Undo</button>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline col-md-2">
                                                <input id="a4" class="checkboxstyle" name="a1" value="4" type="checkbox">
                                                <label for="a4">Tommy</label>
                                                <button type="button" class="btn btn-outline-danger btn-sm undo">Undo</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" type="submit" id="worman" role="button" class="btn btn-outline-success">Assign as workflow manager</a>
                                        <a href="#" id="teres" role="button" class="btn btn-outline-success">Assign as team resources</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#" id="" class="btn btn-primary d-block w-25 mt-3 mx-auto" role="button" aria-pressed="true">Add CROs</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

