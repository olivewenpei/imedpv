<div style="position:absolute; top:185px; left:260px; width: 1630px;">
    
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li>Current Location: </li> &nbsp;&nbsp;&nbsp;
        <li class="breadcrumb-item"><a href="#">General</a></li>
        <!-- Add this if location had details
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
        -->
    </ol>
    </nav>
    <button type="button" class="btn btn-primary" style="width: 110px;position: absolute;top: 5px;right: 8px;">Save All</button>
</div>

<div style="position:absolute; top:240px; left:260px; width: 1300px;">
    <div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Valid Case?</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>Yes</option>
                <option>No</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>Adverse Event</option>
                <option></option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Initial Received date (A.1.6.b)</label>
                <input type="text" class="form-control" id="datepicker">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Latest received date (A.1.7.b)</label>
                <input type="text" class="form-control" id="datepicker">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Regulatory clock start date</label>
                <input type="text" class="form-control" id="datepicker">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Additional documents (A.1.8.1)</label> <br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1">Country (A.1.1)</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>Yes</option>
                <option>No</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlSelect1"> Country of detection (A.1.2)</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option></option>
                <option></option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Case level expectedness</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Unexpected</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="customRadioInline3" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Expected</label>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Local expedited (A.1.9)</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Report for nullification/Amendment (A.1.13)</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="" name="customRadioInline3" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Nullification</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="" name="customRadioInline3" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Amendment</label>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"> Medically confirmed (A.1.14)</label> <br>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">No</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputPassword4"> Reason for Nullification/ Amendment (A.1.13.1)</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="">
            </div>
            <div class="form-group col-md-6">
            <label for="inputEmail4"> Safety report ID (A.1.0.1)</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4"> Authority no. (A.1.10.1)</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Company no. (A.1.10.2)</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="">
            </div>
        </div>
    <button type="button" class="btn btn-success" style="width: 280px; float:right;">Complete "General Tab"</button>
    </form>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
$( "#datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true
});
} );
</script>

