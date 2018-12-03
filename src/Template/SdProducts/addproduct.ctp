<title>Product</title>

<div class="container">

    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="firstpage">Add Product</h5>
                    <h5 class="thirdpage">Choose Workflow</h5>
                    <h5 class="fourthpage">Choose CROs</h5>
                </div>
                <div class="card-body">

                    <div class="firstpage text-center">
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

                        <div id="addpro" class="btn btn-primary w-25 mt-3">Submit</div>

                        <div id="choosecon" class="mt-3">
                            <h3>Choose Country</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Choose Country</label>
                                    <select class="form-control" id="">
                                    <option>Global</option>
                                    <option>Europe</option>
                                    <option>Japan</option>
                                    </select>
                                </div>
                            </div>
                            <div id="submitchocountry" class="btn btn-primary w-25 mt-3">Countinue</div>
                        </div>
                    </div>

                    <div class="thirdpage text-center">
                        <div class="row">
                            <!-- Default Workflow -->
                            <div class="col">
                                <button type="button" id="defbtn" class="btn btn-success btn-lg">Default Workflow</button>
                                <hr>
                                <ol class="defworkflow">
                                    <p>This is default workflow and cannot be changed</p>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"><b> Triage</b></h5>
                                                <p class="card-text">Capture the initial Case information.</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"> <b> Data Entry</b></h5>
                                                <p class="card-text">Entry initial data from call center</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"> <b> Quality Check</b></h5>
                                                <p class="card-text">Check the validation of cases</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"> <b> Medical Review</b></h5>
                                                <p class="card-text">Review cases by doctors.</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"><b> Generate Report</b></h5>
                                                <p class="card-text">Output a report from system</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                    <li class="custworkflowstep">
                                        <div class="card w-100 h-25 my-2">
                                            <div class="card-body p-3">
                                                <h5 class="card-title"><b> Complete</b></h5>
                                                <p class="card-text">Case information gathered and reviewed.</p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>

                            <!-- Customize Workflow -->
                            <div class="col">
                                <button type="button" id="custbtn" class="btn btn-success btn-lg">Customize Your Workflow</button>
                                <hr class="custhr">
                                <div class="custworkflow">
                                    <p>You can edit the workflow here and please drag the yellow box to anywhere in the workflow for customization</p>
                                    <ul>
                                        <li id="draggable" class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"><input type="text" placeholder="Type your step name here" class="font-weight-bold" /> </h5>
                                                    <p class="card-text"><textarea type="text"  class="form-control" placeholder="Type your step description here" aria-label="With textarea"></textarea></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ol id="sortable">
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"> <b> Triage</b></h5>
                                                    <p class="card-text">Capture the initial Case information.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"><b> Data Entry</b></h5>
                                                    <p class="card-text">Entry initial data from call center</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"> <b> Quality Check</b></h5>
                                                    <p class="card-text">Check the validation of cases</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"> <b> Medical Review</b></h5>
                                                    <p class="card-text">Review cases by doctors.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"> <b> Generate Report</b></h5>
                                                    <p class="card-text">Output a report from system</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="custworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <button type="button" class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="card-title"> <b> Complete</b></h5>
                                                    <p class="card-text">Case information gathered and reviewed.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="d-block mt-3">
                            <button type="button" id="goback2" class="btn btn-outline-warning mr-3">Go Back</button>
                            <div type="submit" id="submitworkflow" class="btn btn-primary w-25">Countinue</div>
                        </div>
                    </div>

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
                                        <button id="worman" class="btn btn-outline-success" type="submit">Assign as workflow manager</button>
                                        <button id="teres" class="btn btn-outline-success" type="submit">Assign as team resources</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-block mt-3">
                            <button type="button" id="goback3" class="btn btn-outline-warning mr-3">Go Back</button>
                            <div id="" class="btn btn-primary w-25 mx-auto" type="submit">Add CROs</div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
