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
                    <h3>Search Product</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <!-- Search Product -->
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
                            <div id="addprobtn" class="btn btn-primary w-25 mt-3 mx-auto">Search</div>
                            <input type="hidden" id="product_id" name="product_id" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
