<?php
//debug($sdProductTypes);
?>
<title>Product</title>
<script type="text/javascript">
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
</script>
<div class="container">

    <div class="row my-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add Product</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <!-- Add Product -->
                        <span id="errorMsg" class="alert alert-danger" role="alert" style="display:none"></span>
                        <div id="addpro" class="prodiff form-row">
                            <div class="form-group col-md-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sponsor Company</label>
                                <select class="form-control" id="sd_sponsor_company_id" name="sd_sponsor_company_id">
                                <?php
                                    foreach ($sdSponsors as $eachType)
                                    {
                                        //echo "<option value=\"".$eachType['id']."\">".$eachType['company_name']."</option>";
                                        echo "<option value=\"".$eachType['id']."\">".$eachType['company_name']. ", " .$eachType['country']. "</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Study Number</label>
                                <input type="text" class="form-control" id="study_no" name="study_no" placeholder="Study Number">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Product Type</label>
                                <select class="form-control" name="sd_product_type_id" id="sd_product_type_id">
                                <?php
                                    foreach ($sdProductTypes as $eachType)
                                    {
                                        echo "<option value=\"".$eachType['id']."\">".$eachType['type_name']."</option>";
                                    }
                                ?>
                                </select>
                                <input type="hidden" id="status" name="status" value="1">
                            </div>
                            <div id="addprobtn" class="btn btn-primary w-25 mt-3 mx-auto">Submit</div>
                            <input type="hidden" id="product_id" name="product_id" value="">
                        </div>

                        <!-- Choose Country -->
                        <div id="choosecon" class="prodiff text-center mt-5">
                            <h3>Choose Country</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Choose Country</label>
                                    <select class="form-control" id="country" name="country">
                                    <option value="Global">Global</option>
                                    <option value="Europe">Europe</option>
                                    <option value="Japan">Japan</option>
                                    </select>
                                </div>
                            </div>
                            <div id="submitchocountry" class="btn btn-primary w-25 mt-3">Countinue</div>
                        </div>

                        <!-- Choose Workflow -->
                        <div id="choosewf" class="prodiff text-center mt-5">
                            <h3>Choose Workflow</h3>
                            <hr>
                            <div class="row">
                                <!-- Default Workflow -->
                                <div class="col" id="defworkflow">
                                    <button type="button" id="defbtn" class="btn btn-success btn-sm workflow"><span>Default Workflow</span></button>
                                    <hr class="wfhr">
                                    <ol class="defworkflow">
                                        <p>This is default workflow and cannot be changed</p>
                                        <li class="defworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"><b> Triage</b></h5>
                                                    <p class="card-text">Capture the initial Case information.</p>
                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="defworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"> <b> Data Entry</b></h5>
                                                    <p class="card-text">Entry initial data from call center</p>
                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="defworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"> <b> Quality Check</b></h5>
                                                    <p class="card-text">Check the validation of cases</p>
                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="defworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"> <b> Medical Review</b></h5>
                                                    <p class="card-text">Review cases by doctors.</p>
                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="defworkflowstep">
                                            <div class="card w-100 h-25 my-2">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title"><b> Generate Report</b></h5>
                                                    <p class="card-text">Output a report from system</p>
                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="defworkflowstep">
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
                                    <button type="button" id="custbtn" class="btn btn-success btn-sm workflow"><span>Customize Your Workflow</span></button>
                                    <hr class="wfhr">
                                    <div class="custworkflow" id="customworkflow">
                                        <label>Workflow Name: </label >
                                        <input id="custworkflowname" name="custworkflowname" value=""/>
                                        <div id="errWorkflow" class="invalid-feedback" style="display:none;">Workflow name is required!</div>

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
                                        <ol id="sortable" class="cust">
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
                                                        <h5 class="card-title"> <b> Triage</b></h5>
                                                        <p class="card-text">Capture the initial Case information.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
                                                        <h5 class="card-title"><b> Data Entry</b></h5>
                                                        <p class="card-text">Entry initial data from call center</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
                                                        <h5 class="card-title"> <b> Quality Check</b></h5>
                                                        <p class="card-text">Check the validation of cases</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
                                                        <h5 class="card-title"> <b> Medical Review</b></h5>
                                                        <p class="card-text">Review cases by doctors.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
                                                        <h5 class="card-title"> <b> Generate Report</b></h5>
                                                        <p class="card-text">Output a report from system</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custworkflowstep">
                                                <div class="card w-100 h-25 my-2">
                                                    <div class="card-body p-3">
                                                        <button class="close closewf">&times;</button>
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
                                <div id="submitworkflow" class="btn btn-primary w-25">Countinue</div>
                                <input type="hidden" id="workflow_id" name="workflow_id" value="">
                            </div>
                        </div>

                        <!-- Add CROs -->
                        <div id="choosecro" class="prodiff text-center">
                            <h3 class="mt-5">Add CROs</h3>
                            <hr>
                            <p class="card-text">Add the CRO here and assign personnels</p>
                            <button type="button" class="btn btn-primary w-25 mx-auto mb-3" data-toggle="modal" data-target="#addcromodal">Add CROs</button>
                            <div class="modal fade" id="addcromodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add CRO</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="">Add CRO</label>
                                        <select class="custom-select" id="croname">
                                            <option value="1">Johnson</option>
                                            <option value="2">BMS</option>
                                            <option value="3">G2</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button id="croadd"  class="btn btn-primary"  data-dismiss="modal">ADD</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div id="addcroarea" class="btn-group-vertical w-25">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">A CRO</button>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">B CRO</button>
                                <button type="button" class="btn btn-outline-primary" id ="0" data-toggle="modal" data-target=".bd-example-modal-lg">C CRO</button>
                            </div> -->

                            <div class="modal fade bd-example-modal-lg" id="addper" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <!-- Choose Personnels -->
                                            <div class="card bg-light mb-3 float-left personnelarea">
                                                <div class="card-header">Candidates of Team Resources</div>
                                                <div id="personnelDraggable" class="card-body p-2">
                                                    <div class="personnel">Tom</div>
                                                    <div class="personnel">Jim</div>
                                                    <div class="personnel">Alice</div>
                                                    <div class="personnel">Ziaget</div>
                                                    <div class="personnel">David</div>
                                                    <div class="personnel">David</div>
                                                    <div class="personnel">David</div>
                                                    <div class="personnel">David</div>
                                                </div>
                                            </div>

                                            <!-- Droppable Area -->
                                            <div id="dropZone" class="card bg-light mx-3 mb-3 float-right">
                                                <div class="card-header">Drag Candidates Here for Assignment</div>
                                                <div class="stack border-success">
                                                    <div class="stackHdr">Assign as workflow manager</div>
                                                    <div class="stackDrop1"></div>
                                                </div>
                                                <div class="stack border-info">
                                                    <div class="stackHdr">Assign as team resources</div>
                                                    <div class="stackDrop2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="conass" class="btn btn-outline-success" type="submit" data-dismiss="modal">Confirm Assignment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-block mt-3">


                            <!-- CROs Resources List -->
                            <h3 class="mt-3">CROs Resources List</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">CRO Company</th>
                                        <th scope="col">Workflow Manager</th>
                                        <th scope="col">Team Resources</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="crotable">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
