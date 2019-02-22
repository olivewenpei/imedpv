<head>
<?= $this->Html->script('cases/duplicate_detection.js') ?>
<head>
<title>Case Registration</title>

<div class="container">

    <div class="row my-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Case Registration / Duplicate Detection</h3>
                </div>
                <?= $this->Form->create();?>
                <div class="card-body">
                    <div class="text-center">
                        <!-- Add Product --><h3>Case General Information</h3><hr>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Product Name:</label>
                                <select type="text" class="form-control" id="product_id">
                                    <option value="">Select Project No</option>
                                    <?php
                                    foreach($productInfo as $k => $productDetail){
                                        echo "<option value=".$productDetail->id.">".$productDetail->product_name."</option>";
                                    };?>
                                    <!-- html->form(project_no) -->
                                </select>
                                <input name="product_id" type="hidden" id="input_product_id">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Country:</label>
                                <select type="text" class="form-control" id="sd_product_workflow_id">
                                    <option value="">Select Country:</option>
                                    <!-- html->form(project_no) -->
                                </select>
                                <input name="sd_product_workflow_id" id="input_product_workflow_id" type="hidden">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Patient Initial:</label>
                                <input type="text" class="form-control" name="field_value[79]" id="patient_initial">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Patient Age:</label>
                                <input type="text" class="form-control" name="field_value[86]" id="patient_age">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Age Unit:</label>
                                <select class="form-control" name="field_value[87]" id="patient_age_unit">
                                    <option value="">select unit</option>
                                    <option value="800">Decade</option>
                                    <option value="801">Year</option>
                                    <option value="802">Month</option>
                                    <option value="803">Week</option>
                                    <option value="804">Day</option>
                                    <option value="805">Hour</option>
                                </select>
                             </div>
                             <div class="form-group col-md-3">
                                <label>Patient Gender:</label>
                                <select type="text" class="form-control" name="field_value[93]" id="patient_gender">
                                    <option value="">Select Patient Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Unknown</option>
                                    <option value="4">Not Specified</option>
                                </select>
                             </div>
                             <div class="form-group col-md-3">
                                <label>Patient Date of Birth:</label>
                                <input type="text" class="form-control" name="field_value[85]" id="patient_dob">
                             </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Reporter First Name:</label>
                                <input type="text" class="form-control" name="field_value[26]" id="reporter_firstname">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Reporter Last name:</label>
                                <input type="text" class="form-control" name="field_value[28]" id="reporter_lastname">
                             </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Event report term:</label>
                                <input type="text" class="form-control" name="field_value[149]" id="report_term">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Reaction Duration:</label>
                                <input type="text" class="form-control" name="field_value[159]" id="reaction_duration">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Reaction First Time:</label>
                                <input type="text" class="form-control" name="field_value[161]" id="reaction_first_time">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Reaction Last Time:</label>
                                <input type="text" class="form-control" name="field_value[163]" id="reaction_last_time">
                             </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Meddra Browser:</label>
                                    <?php
                                    $meddraCell = $this->cell('Meddra');
                                    echo $meddraCell;?>
                             </div>
                             <div class="form-group col-md-3">
                                <label>Meddra PT Term:</label>
                                <input type="text" class="form-control" name="field_value[394]" id="meddraptname">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Meddra LLT Term:</label>
                                <input type="text" class="form-control" name="field_value[392]" id="meddralltname">
                             </div>
                             <div class="form-group col-md-3">
                                <label>Meddra HLT Term:</label>
                                <input type="text" class="form-control" name="field_value[395]" id="meddrahltname">
                             </div>
                        </div>
                    </div>              
                    <?= $this->Form->end()?>      
                    <div id="checkbutton">
                        <a role="button" onclick="checkDuplicate()" id="checkbtn" class="completeBtn btn btn-success d-block m-auto w-25">Seach Duplicate</a>
                    </div>
                    <div class="modal fade CaseDetail" tabindex="-1" role="dialog" aria-labelledby="CaseDetail" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body m-3">
                                    <h5 id="caseLabel"></h5>
                                    <iframe id="iframeDiv" src="" width="700" height="730"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="caseTable"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
var productInfo = <?php $productInfo =$productInfo->toList();
echo json_encode($productInfo);?>;
</script>