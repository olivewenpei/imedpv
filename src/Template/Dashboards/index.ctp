<div class="container">
  <div class="row">
    <div class="col">
        <div class="card text-center"> 
            <h5 class="card-header"> <span class="badge badge-pill badge-danger" id="alertNew">3</span> Alert New Cases</h5>
            <div class="card-body">
				<!--
                <h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With additional content.</p>
				-->
					<table class="table table-hover">
						<thead>
							<tr class="table-secondary">
							<th scope="col"> Number</th>
							<th scope="col">Death</th>
							<th scope="col">Life Threat</th>
							<th scope="col">Prolong</th>
							<th scope="col">Disability</th>
							<th scope="col">Anomaly</th>
							<th scope="col">Other</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<th scope="row">1</th>
							<th scope="col"></th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
							<tr>
							<th scope="row">2</th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							<th scope="col"></i></th>
							<th scope="col"></th>
							<th scope="col"></i></th>
							<th scope="col"></th>
							<th scope="col"></th>
							</tr>
							<tr>
							<th scope="row">3</th>
							<th scope="col"></i></th>
							<th scope="col"></th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							<th scope="col"></th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							<th scope="col"><i class="fas fa-exclamation"></i></th>
							</tr>
						</tbody>
					</table>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
        <div class="card text-center">
        <h5 class="card-header">ICSR Case List</h5>
        <div class="card-body">
        <h3 class="card-title">ICSR Case List</h3>
            <p class="card-text">Cases Report Details</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Search Cases</button>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="searchmodal modal-content">
                        <div class="modal-header">
                            <h5 class="modalheader modal-title">Search Cases</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <!-- <label for="recipient-name" class="col-form-label">Recipient:</label> -->
                                    <input type="text" class="form-control form-control-lg" id="pro_name" placeholder="Search by Product Name">
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control form-control-lg" id="icsr_no" placeholder="Select ICSR No.">
                                </div>
                                <div class="form-group col-lg-4">
                                    <input type="text" class="form-control form-control-lg" id="case_status" placeholder="Select Case Status">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="duedate form-group col-lg-2">Search Activity Due Date:</div>
                                <div class="form-group col-lg-1">
                                    <input type="text" class="form-control" id="datepicker1" placeholder="[mm/dd/yyyy]">
                                </div> 
                                <div class="arrow">
                                    <i class="far fa-window-minimize"></i>
                                </div>
                                <div class="form-group col-lg-1">
                                    <input type="text" class="form-control" id="datepicker2" placeholder="[mm/dd/yyyy]">
                                </div>

                                <div class="duedate form-group col-lg-2 float-right">Search Submission Due Date:</div>
                                <div class="form-group col-lg-1">
                                    <input type="text" class="form-control" id="datepicker3" placeholder="[mm/dd/yyyy]">
                                </div> 
                                <div class="arrow">
                                    <i class="far fa-window-minimize"></i>
                                </div>
                                <div class="form-group col-lg-1">
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
                                <div class="form-group col-lg-2">
                                    <a href="/sd-tabs/showdetails" type="submit" class="form-control-lg btn btn-primary rounded p-2 w-100"><i class="fas fa-search"></i> Search</a>
                                </div>
                                <div class="form-group col-lg-1">
                                    <button id="advsearch" class="form-control-lg btn btn-outline-info w-100"><i class="fas fa-keyboard"></i> Advance</button>
                                </div>
                                <div class="form-group col-lg-1">
                                    <button id="clearsearch" class="form-control-lg btn btn-outline-danger w-100"><i class="fas fa-eraser"></i> Clear</button>
                                </div>
                            </div> 
                            <hr>
                            <h3>Search Results</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-secondary">
                                    <th scope="col">ICSR No.</th>
                                    <th scope="col">Documents</th>
                                    <th scope="col">Version</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Project No.</th>
                                    <th scope="col">Product Type</th>
                                    <th scope="col">Activity Due Date</th>
                                    <th scope="col">Submission Due Date</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">16464654654</th>
                                    <td>wg4h5w45</td>
                                    <td>China</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>wg4h5w45</td>
                                    <td>China</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" href="/sd-tabs/showdetails" role="button" title="Edit"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Allocate"><i class="fas fa-users"></i> Allocate</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Data Entry"><i class="fas fa-file-signature"></i> Entry</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Raise Query"><i class="fas fa-plus-circle"></i> Query</a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">164646546542</th>
                                    <td>wg4h5w45</td>
                                    <td>China</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>aeheahrse</td>
                                    <td>USA</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" href="/sd-tabs/showdetails" role="button" title="Edit"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Allocate"><i class="fas fa-users"></i> Allocate</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Data Entry"><i class="fas fa-file-signature"></i> Entry</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Raise Query"><i class="fas fa-plus-circle"></i> Query</a>
                                    </tr>
                                    <tr>
                                    <th scope="row">316464654654</th>
                                    <td>wg4h5w45</td>
                                    <td>China</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>d324fga4ag</td>
                                    <td>Canada</td>
                                    <td>01/01/2018</td>
                                    <td>01/01/2018</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" href="/sd-tabs/showdetails" role="button" title="Edit"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Allocate"><i class="fas fa-users"></i> Allocate</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Data Entry"><i class="fas fa-file-signature"></i> Entry</a>
                                        <a class="btn btn-outline-info btn-sm" href="#" role="button" title="Raise Query"><i class="fas fa-plus-circle"></i> Query</a>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
	</div>
	<!-- 
    <div class="col">
        <div class="card">
            <h5 class="card-header">Featured</h5>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
	</div>
	-->
  </div>
</div>
