<?php
//debug($sdProductTypes);
?>
<title>Product</title>
<head>
<?= $this->Html->script('product/addproduct.js') ?>
<head>
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
                <div class="prodiff card-body">
                    <div class="text-center">
                        <!-- Add Product -->
                        <span id="errorMsg" class="alert alert-danger" role="alert" style="display:none"></span>
                        <?= $this->Form->create();?>
                        <div id="addpro" class="form-row">
                            <div class="form-group col-md-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product[product_name]" placeholder="Product Name" required oninvalid="this.setCustomValidity('Product Name is REQUIRED')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sponsor Company</label>
                                <select class="form-control" id="sd_sponsor_company_id" name="product[sponsor_company]" required oninvalid="this.setCustomValidity('Sponsor Company is REQUIRED')" oninput="this.setCustomValidity('')">
                                <?php
                                    echo "<option value=''>Select Sponsor Company</option>";
                                    foreach ($sdSponsorCompanies  as $eachType)
                                    {
                                        //echo "<option value=\"".$eachType['id']."\">".$eachType['company_name']."</option>";
                                        echo "<option value=\"1\">".$eachType['company_name']."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Product flag (B.4.k.1)</label>
                                <select class="form-control" id="sd_product_flag" name="product[sd_product_flag]" required oninvalid="this.setCustomValidity('Product flag is REQUIRED')" oninput="this.setCustomValidity('')">
                                    <option value="1">Suspect</option>
                                    <option value="2">Concomitant</option>
                                    <option value="3">Interacting</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Study Name</label>
                                <input type="text" class="form-control" id="study_name" name="product[study_name]" placeholder="Study Name" required oninvalid="this.setCustomValidity('Study Name is REQUIRED')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Study Number</label>
                                <input type="text" class="form-control" id="study_no" name="product[study_no]" placeholder="Study Number" required oninvalid="this.setCustomValidity('Study Number is REQUIRED')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mfr. name</label>
                                <input type="text" class="form-control" id="mfr_name" name="product[mfr_name]" placeholder="Mfr. name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Study type (A.2.3.3)</label>
                                <select class="form-control" id="sd_study_type_id" name="product[study_type]" required oninvalid="this.setCustomValidity('Study Type is REQUIRED')" oninput="this.setCustomValidity('')">
                                    <option value="1">Clinical trials</option>
                                    <option value="2">Individual patient use</option>
                                    <option value="3">Other studies</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Blinding technique</label>
                                <select class="form-control" id="blinding_tech" name="product[blinding_tech]">
                                    <option value="1">Single blind</option>
                                    <option value="2">Open-label</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>WHODD Code</label>
                                <input type="text" class="form-control" id="WHODD_code" name="product[WHODD_code]" placeholder="WHODD Code">
                            </div>
                            <div class="form-group col-md-3">
                                <label>WHODD Name</label>
                                <input type="text" class="form-control" id="WHODD_name" name="product[WHODD_name]" placeholder="WHODD Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Preferred WHO DD decode</label>
                                <input type="text" class="form-control" id="WHODD_decode" name="product[WHODD_decode]" placeholder="Preferred WHO DD decode">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Start Date</label>
                                <input type="text" class="form-control" name="product[start_date]" id="start_date">
                            </div>
                            <div class="form-group col-md-3">
                                <label>End Date</label>
                                <input type="text" class="form-control" name="product[end_date]" id="end_date">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <select class="form-control" id="status" name="product[status]" required oninvalid="this.setCustomValidity('Status is REQUIRED')" oninput="this.setCustomValidity('')">
                                    <option value="1">Active</option>
                                    <option value="2">Close</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Short Description</label>
                                <input type="text" class="form-control" id="short_desc" name="product[short_desc]" placeholder="Short Description">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Product Description (B.4.k.2.1)</label>
                                <input type="text" class="form-control" id="product_desc" name="product[product_desc]" placeholder="Product Description" required oninvalid="this.setCustomValidity('Product Description is REQUIRED')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>

                        <!-- Workflow List and Add New -->
                        <button id="addNewWL" type="button" class="btn btn-outline-info float-right">Add New Workflow <i class="far fa-plus-square"></i></button>

                        <!-- Hide this when triggered "Add New" -->
                        <div id="workflowlist" class="mt-3">
                            <h3>Workflow List</h3>

                            <table class="table table-hover mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Workflow Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Call Center</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="workflow_table">
                                    <!-- <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".WFlistView">View</button>
                                            <button class="btn btn-sm btn-outline-danger" onclick="$(this).closest('tr').remove();">Delete</button>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>

                            <!-- View Workflow List Detail Modal -->
                            <div class="modal fade WFlistView" tabindex="-1" role="dialog" aria-labelledby="WFlistView" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body m-3">
                                            <h4>Workflow List Details</h4>
                                            <table class="table table-hover" id="ifram_view">
                                                <thead>
                                                    <tr>
                                                        <th scope="row" class="w-25">Workflow Name</th>
                                                        <td id="viewWFname">WWW1</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="w-25">Call Center</th>
                                                        <td id="viewCC">China</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Country</th>
                                                        <td id="viewCountry">China</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Description</th>
                                                        <td id="viewDesc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum unde assumenda quo consequatur, alias soluta eum placeat eius maxime odit, odio sint, iste veniam omnis!</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Workflow Manager</th>
                                                        <td id="viewMan">Mark</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Team Resources</th>
                                                        <td id="viewRes">Mark</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                                <h4>Workflow Steps</h4>
                                                <div id="view_activities">
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    <span class="badge badge-info px-5 py-3 m-3"><h5>Info</h5></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="no_workflow_notice"><h3>There is no workflow linked to this product, please add workflow first;</h3></div>
                            <input type="submit" class="btn btn-success w-25 mt-3 mx-auto">
                            <?= $this->Form->end() ?>

                        </div>

                        <!-- Show this when triggered "Add New" -->
                        <!-- Choose Workflow -->
                        <div id="choworkflow" class="prodiff text-center mt-1" style="display:none;">
                        <!-- Title for "Add New" -->
                            <div class="jumbotron jumbotron-fluid bg-warning">
                                <div class="container">
                                    <h1 class="display-4">Add New Workflow</h1>
                                    <p class="lead">You can edit the specific info in the following steps</p>
                                </div>
                            </div>
                            <!-- Choose Country  id="choosecon"-->
                            <div class="prodiff text-center mt-1">
                                <h3>Choose Country and Call Center</h3>
                                <hr>
                                <div class="form-row justify-content-md-center">
                                    <div class="form-group col-md-3">
                                    <label for="">Select Country</label>
                                        <select class="form-control" id="select-country" name="product_workflow[0][country]">
                                        <option value="">Select Country</option>
                                        <?php
                                        $country_list=[
                                            'USA'=>'Unitied States',
                                            'Global'=>'Global',
                                            'CHN'=>'China'
                                        ];
                                        foreach($workflow_structure as $workflow_structure_detail){
                                            echo "<option value=".$workflow_structure_detail->country.">".$country_list[$workflow_structure_detail->country]."</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                    <label for="">Select Call Center</label>
                                        <select class="form-control" id="callCenter" name="product_workflow[0][callCenter]">
                                        <option value="Global">Global</option>
                                        <option value="Europe">Europe</option>
                                        <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                </div>
                                <button id="exit_workflow" type="button" class="btn btn-secondary">Exit</button>
                                <div id="submitchocountry" class="btn btn-primary w-25">Countinue</div>
                            </div>
                            <div id="choosewf">
                                <div class="row" style="min-height: 740px;">
                                    <!-- Default Workflow -->
                                    <div class="col" id="defworkflow">
                                        <button type="button" id="defbtn" class="btn btn-success btn-sm workflow"><span>Default Workflow</span></button>
                                        <h3 id="defT" style="display:none;">Default Workflow</h3>
                                        <hr class="wfhr">
                                        <ol id="default_workflow" class="defworkflow">
                                        </ol>
                                        <input type="hidden" id="default-workflow_name"/>
                                        <input type="hidden" id="default-workflow_id"/>
                                        <input type="hidden" id="default-workflow_description"/>
                                    </div>

                                    <!-- Customize Workflow -->
                                    <div class="col" id="cusworkflow">
                                        <button type="button" id="custbtn" class="btn btn-success btn-sm workflow"><span>Customize Your Workflow</span></button>
                                        <h3 id="cusT" style="display:none;">Customize Workflow</h3>
                                        <hr class="wfhr">
                                        <div class="custworkflow" id="cusworkflow">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Workflow Name: </label >
                                                    <input type="text" id="custom-workflow_name" value=""/>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Workflow Description </label >
                                                    <input type="text" id="custom-workflow_description" value=""/>
                                                </div>
                                            </div>

                                            <div id="errWorkflow" class="invalid-feedback" style="display:none;">Workflow name is required!</div>

                                            <p>You can edit the workflow here and please drag the yellow box to anywhere in the workflow for customization</p>
                                            <ul>
                                                <li id="draggable" class="custworkflowstep">
                                                    <div class="card w-100 h-25 my-2">
                                                        <div class="card-body p-3">
                                                            <h5 class="card-title"><input type="text" id="new_activity-name" placeholder="Type step name here FIRST" class="font-weight-bold" /> </h5>
                                                            <p class="card-text"><textarea type="text"  id="new_activity-description" class="form-control" placeholder="Type your step description here" aria-label="With textarea"></textarea></p>
                                                        </div>
                                                        <button id="confirm_new_activity">confirm</button>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ol id="sortable" class="cust">
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-block mt-3">
                                    <button id="confirm_activities" class="btn btn-primary w-25" style="display:none;">Countinue</button>
                                    <button id="undochocon" type="button" class="btn btn-secondary" style="display:none;">Go back to last step</button>
                                    <button id="submitworkflow" class="btn btn-primary w-25" style="display:none;">Countinue</button>
                                    <button id="undo_activities" type="button" class="btn btn-secondary" style="display:none;">Go back to last step</button>
                                </div>
                            </div>
                        </div>

                        <!-- Add CROs -->
                        <div id="choosecro" class="prodiff text-center">
                            <h3 class="mt-2">Add CROs</h3>
                            <hr>
                            <p class="card-text">Add the CRO here and assign personnels</p>
                            <button type="button" class="btn btn-outline-info w-25 mx-auto mb-3" data-toggle="modal" data-target="#addcromodal">Add CROs</button>
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
                                        </select>
                                    </div>
                                    <div class="modal-footer">
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
                                                </div>
                                            </div>

                                            <!-- Droppable Area -->
                                            <div id="dropZone" class="card bg-light mx-3 mb-3 float-right">
                                                <div class="card-header">Drag Candidates Here for Assignment</div>
                                                <div class="stack border-success">
                                                    <div class="stackHdr">Assign as workflow manager</div>
                                                    <div class="stackDrop1" id="workflow_manager-add"></div>
                                                </div>
                                                <div class="stack border-info">
                                                    <div class="stackHdr">Assign as team resources</div>
                                                    <div class="stackDrop2" id="team_resources-add"></div>
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
                        <button id="undochoWF" type="button" class="btn btn-secondary mt-3">Reselect workflow</button>
                        <button id="confirmWFlist" type="button" class="btn btn-primary w-25 mt-3 mx-auto">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
var workflowInfo = <?php echo json_encode($workflow_structure);?>;
</script>
