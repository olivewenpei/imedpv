<?php
//debug($sdProductTypes);
?>
<title>Search Product</title>
<script type="text/javascript">
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
</script>
<div class="container">
    <div class="row my-3 searchProductContainer">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Search Product</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <!-- Search Product -->
                        <span id="errorMsg" class="alert alert-danger" role="alert" style="display:none"></span>
                        <div id="addpro" class="form-row">
                            <div class="form-group col-md-3">
                                <label>Key Word</label>
                                <input type="text" class="form-control" id="key_word" name="key_word" placeholder="Search Key Word">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Product Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sponsor Study Number (A.2.3.2)</label>
                                <input type="text" class="form-control" id="study_no" name="study_no" placeholder="Search Study Number">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <input type="text" class="form-control" id="status" name="status" placeholder="Search Status">
                            </div>
                        </div>
                        <div id="advsearchfield" style="display:none;">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Study Type (A.2.3.3)</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Study Type">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Product Flag (B.4.k.1)</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Product Flag">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Product Type</label>
                                    <select class="form-control" name="sd_product_type_id" id="sd_product_type_id">
                                    <?php
                                        echo "<option value=''>Select Product Type</option>";
                                        foreach ($sdProductTypes as $eachType)
                                        {
                                            echo "<option value=\"".$eachType['id']."\">".$eachType['type_name']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <input type="hidden" id="status" name="status" value="1">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Study Name (A.2.3.1)</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Study Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Sponsor Company</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Sponsor Company">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>CRO</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search CRO">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Call Center</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Search Call Center">
                                </div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-lg-3">
                                <div onclick="searchProd()" class="btn btn-primary w-100"><i class="fas fa-search"></i> Search</div>
                            </div>
                            <div class="form-group col-lg-2">
                                <div id="advsearch" class="btn btn-outline-info w-100"><i class="fas fa-keyboard"></i> Advanced Search</div>
                            </div>
                            <div class="form-group col-lg-1">
                                <div class="clearsearch form-control btn btn-outline-danger w-100"><i class="fas fa-eraser"></i> Clear</div>
                            </div>
                            <input type="hidden" id="product_id" name="product_id" value="">
                        </div>
                        <div class="modal fade WFlistView" tabindex="-1" role="dialog" aria-labelledby="WFlistView" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body m-3">
                                            <h4>Workflow Details</h4>
                                            <table class="table table-hover" id="ifram_view">
                                                <thead>
                                                    <tr>
                                                        <th scope="row" class="w-25">Workflow Name</th>
                                                        <td id="viewWFname"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="w-25">Call Center</th>
                                                        <td id="viewCC"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Country</th>
                                                        <td id="viewCountry"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Description</th>
                                                        <td id="viewDesc"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Workflow Manager</th>
                                                        <td id="viewMan"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="w-25">Team Resources</th>
                                                        <td id="viewRes"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                                <h4>Workflow Steps</h4>
                                                <div id="view_activities"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div id="searchProductlist" class="my-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
