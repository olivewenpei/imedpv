<title>Case List</title>
<script>
var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
var userId = <?= $this->request->session()->read('Auth.User.id')?>;
</script>
<div class="card my-3 w-75 mx-auto">
    <div class="card-header text-center">
        <h5> Case List</h5>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-lg-4">
                <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                <input type="text" class="form-control form-control-lg" id="searchProductName" name="searchProductName" placeholder="Search by Product Name">
            </div>
            <div class="form-group col-lg-4">
                <input type="text" class="form-control form-control-lg"  id="searchName" name="searchName" placeholder="Select Case No.">
            </div>
            <div class="form-group col-lg-4">
                <input type="text" class="form-control form-control-lg" id="case_status" placeholder="Select Case Status">
            </div>
        </div>
        <div class="form-row">
            <div class="duedate form-group col-2">Activity Due Date:</div>
            <div class="form-group col-1">
                <input type="text" class="form-control" id="datepicker1" placeholder="[mm/dd/yyyy]">
            </div>
            <div class="arrow">
                <i class="far fa-window-minimize"></i>
            </div>
            <div class="form-group col-1">
                <input type="text" class="form-control" id="datepicker2" placeholder="[mm/dd/yyyy]">
            </div>

            <div class="duedate form-group col-2 float-right">Submission Due Date:</div>
            <div class="form-group col-1">
                <input type="text" class="form-control" id="datepicker3" placeholder="[mm/dd/yyyy]">
            </div>
            <div class="arrow">
                <i class="far fa-window-minimize"></i>
            </div>
            <div class="form-group col-1">
                <input type="text" class="form-control" id="datepicker4" placeholder="[mm/dd/yyyy]">
            </div>
        </div>
        <div class="form-row" id="advsearchfield" style="display:none;">
            <div class="form-group col-lg-2">
                <input type="text" class="form-control form-control-lg" id="patient_id" placeholder="Search by Patient ID">
            </div>
            <div class="form-group col-lg-2">
                <input type="text" class="form-control form-control-lg" id="datepicker5" placeholder="Choose Date of Birth">
            </div>
            <div class="form-group col-lg-2">
                <select id="inputState" class="form-control form-control-lg">
                    <option selected>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Unknown</option>
                </select>
            </div>
        </div>

        <div class="form-row justify-content-center">
            <div class="form-group col-lg-3">
                <div id="searchBtn" onclick="onQueryClicked()" class="form-control btn btn-primary w-100"><i class="fas fa-search"></i> Search</div>
            </div>
            <div class="form-group col-lg-2">
                <div id="advsearch" class="form-control btn btn-outline-info w-100"><i class="fas fa-keyboard"></i> Advanced</div>
            </div>
            <div class="form-group col-lg-1">
                <div class="clearsearch form-control btn btn-outline-danger w-100"><i class="fas fa-eraser"></i> Clear</div>
            </div>
        </div>
        <div id="textHint" class="d-block w-100 text-center"></div>
    </div>
  </div>