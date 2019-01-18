<head>
<?= $this->Html->script('saeregistration/saeregistration.js') ?>
<head>
<title>SAE Registration</title>

<div class="container">

    <div class="row my-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3>SAE Registration</h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create();?><br>
                    <div class="text-center">
                        <!-- Add Product --><h3>SAE Information</h3><hr>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                                <label>Product Name:</label>
                                <select type="text" class="form-control" id="product_name">
                                    <option value="">Select Project No</option>
                                    <?php
                                    foreach($productInfo as $k => $productDetail){
                                        echo "<option value=".$productDetail->id.">".$productDetail->study_no."</option>";
                                    };?>
                                    <!-- html->form(project_no) -->
                                </select>
                            </div>                            
                            <div class="form-group col-md-4">
                                <label>Workflow Name:</label>
                                <select type="text" class="form-control" name="case[sd_product_workflow_id]" id="workflow_name">
                                    <option value="">Select Workflow Name</option>
                                    <!-- html->form(project_no) -->
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Number of SAE:</label>
                                <input type="text" class="form-control" id="no_of_sae">
                                <div id="show_selected_sae_name"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Priorty:</label>
                                <select class="form-control" id="priority" name=case[priority]>
                                    <option value="null">None</option>
                                    <option value="1">High</option>
                                    <option value="2">Medium</option>
                                    <option value="3">Low</option>
                                    <!-- html->form(priority) -->
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Activity Due Date:</label>
                                <input type="text" class="form-control" id="activity_due_date" name="case[activity_due_date]">
                                <!-- html->form(submission_due_date)  -->
                             </div>
                             <div class="form-group col-md-4">
                                <label>Submission Due Date:</label>
                                <input type="text" class="form-control" id="submission_due_date" name="case[submission_due_date]">
                                <!-- html->form(submission_due_date)  -->
                             </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Product Type:</label>
                                <div class="option_group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="drug_type" value="1" name="case[product_type]" class="custom-control-input">
                                        <label for="drug_type" class="custom-control-label">Drug<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="vaccine_type" value="2" name="case[product_type]" class="custom-control-input">
                                        <label for="vaccine_type" class="custom-control-label">Vaccine<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="device_type" value="3" name="case[product_type]" class="custom-control-input">
                                        <label for="device_type" class="custom-control-label">Device<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="combination_type" value="4" name="case[product_type]" class="custom-control-input">
                                        <label for="combination_type" class="custom-control-label">Combination<label>
                                    </div>
                                </div>
                             </div>
                             <!-- html->form(product_type) -->
                        </div>
                        <div class="form-group col-md-10">
                                <label>Classification:</label>
                                <div class="option_group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="spontaneous_class" value="1">
                                        <label for="spontaneous_class">Spontaneous<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="study_class" value="2">
                                        <label for="study_class">Study<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="literature_class" value="3">
                                        <label for="literature_class">Literature<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="pregnacy_class" value="4">
                                        <label for="pregnacy_class">Pregnacy<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="others_class" value="5">
                                        <label for="others_class">Others<label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="checkbox" id="unknown_class" value="6">
                                        <label for="unknown_class">Unknown<label>
                                    </div>
                                </div>
                                <input type="hidden" id="classification" name="case[classification]" value="000000">
                             </div>
                             <!-- html->form(classification) -->
                        </div>
                        <div class="text-center mt-5">
                            <h3>Source</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Report Type(A.1.4):</label>
                                    <select class="form-control" id="reporter" name="field_value[6]">
                                        <option value="null">Select Reporter Type</option>
                                        <option value="1">Spontaneous</option>
                                        <option value="2">Study</option>
                                        <option value="3">Literature</option>
                                        <option value="4">Pregnacy</option>
                                        <option value="5">Others</option>
                                        <option value="6">Unknown</option>
                                    </select>
                                    <!-- html->form(reporter_type) -->
                                    <input type="checkbox" id="primary_source" value="1" name="field_value[362]">
                                    <label for="primary_source">Primary Source<label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date Received:</label>
                                    <input type="text" class="form-control" id="date_received" name="field_value[380]">
                                </div>
                                <!-- html->form(date_received) -->
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="field_value[363]"></textarea>
                                </div>
                                <!-- html->form(description) -->
                            </div>                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Identification No:</label>
                                    <input class="form-control" id="identification_no" name="field_value[364]">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Company Unit:</label>
                                    <input class="form-control" id="company_unit" name="field_value[365]">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="completeBtn btn btn-success">Complete</button>
                        <!-- Choose Country -->
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
var productInfo = <?php $productInfo =$productInfo->toList();
echo json_encode($productInfo);?>;
var randCaseNo = <?php echo json_encode("ICSR".date("ym").$randNo)?>;
</script>