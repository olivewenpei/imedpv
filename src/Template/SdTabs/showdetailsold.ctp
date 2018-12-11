<?php
//echo "I am here<br>";
//debug($sdTabs);
//foreach ($sdTabs as $eachTab){  debug($eachTab->tab_name);  }

// Call to use widget
echo $this->element('widget');
?>
<script type="text/javascript">
    var section = <?php $sdSections =$sdSections->toList();
    echo json_encode($sdSections)?>;

    jQuery(function($) {
        $(document).ready(function () {
            $("[id$=page_number-1]").css('background-color', 'grey');
    });
    })
</script>
<title>Data Entry</title>
<head>
    <!-- For checking unsaved contents JS link -->
    <?= $this->Html->script('specific.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js') ?>
</head>

<!-- Data Entry Top Bar -->
<ul class="topbar nav justify-content-end pt-2 pb-2" id="topbar">

    <!-- "Case Number" Display -->
    <span class="caseNumber" id="caseNumber" title="Case Number">
        Full Data Entry - <b>IMS18091235600078</b> [protocol ytest]
    </span>

    <!-- "Version Switch" Dropdown Button -->
    <li class="nav-item">
        <a class="btn btn-outline-warning" href="#" title="Version Switch" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-code-branch"></i> Version Switch
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">1</a>
            <a class="dropdown-item" href="#">2</a>
        </div>
    </li>

    <!-- "Compare" Button -->
    <li class="nav-item">
        <a class="btn btn-outline-info" href="#" title="Version Compare"><i class="far fa-copy"></i> Compare</a>
    </li>

    <!-- "Documents" Button -->
    <li class="nav-item">
        <a class="btn btn-outline-info" href="#" title="Documents Check"><i class="far fa-file-alt"></i> Documents</a>
    </li>

    <!-- "Print" Dropdown Button -->
    <li class="nav-item">
        <a class="btn btn-outline-info" href="#" title="Print Out" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-print"></i> Print Out
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">CIOMS</a>
            <a class="dropdown-item" href="#">FDA</a>
            <!-- Add this if location had details
            <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
            -->
        </div>
    </li>

    <!-- "Export" Dropdown Button -->
    <li class="nav-item">
        <a class="btn btn-outline-info" href="#" title="Export" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-export"></i> Export
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">CIOMS</a>
            <a class="dropdown-item" href="javascript: genPDF()">FDA</a>
            <a class="dropdown-item" href="#">XML</a>
            <!-- Add this if location had details
            <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
            -->
        </div>
    </li>

    <!-- "Save All" Button -->
    <li class="nav-item">
        <a class="btn btn-primary" href="#" title="Save All"><i class="far fa-save"></i> Save All</a>
    </li>

</ul>

<div class="maintab container-fluid">
<?php
     $sectionNavCell = $this->cell('SectionNav');
     echo $sectionNavCell;
?>

<!-- Data Entry Body -->
<!-- General Tab -->
<div class="dataentry">
    <?= $this->Form->create($sdSections);?>
    <?php
        $setNo = $this->request->getQuery('setNo');
        if(empty($setNo)) $setNo = "1";
        $exsitSectionNo = [];
        for($i = 0; $i < sizeof($sdSections); $i++){
            $exsitSectionNo[$i] = $sdSections[$i]->id;
        }
        foreach($sdSections as $sdSectionKey => $sdSection_detail){
            ($sdSection_detail->id);
            $exsitSectionNo = displaySection($sdSection_detail, $exsitSectionNo, $sdSections, $setNo);
        }

    ?>

    <button type="submit" class="completeBtn btn btn-success">Complete "General Tab"</button>
    <hr class="d-inline-block w-100">
    <?= $this->Form->end() ?>
    <?php
            if($tabid==1){
            $sectionTableCell = $this->cell('SectionTable::resource', [$setNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }
    ?>

        <div class="card mt-1 mb-5">
        <div class="card-header">
            <h3 class="d-inline">Source </h3>
            <a class="btn btn-outline-primary float-right" href="#" role="button" title="add"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">Report type (A.1.4)</th>
                        <th scope="col">Primary Source</th>
                        <th scope="col">Date received</th>
                        <th scope="col">Description</th>
                        <th scope="col">Identification no.</th>
                        <th scope="col">Company unit</th>
                        <th scope="col">Company unit decode</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"><a class="btn btn-outline-danger" href="#" role="button" title="delete"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"><a class="btn btn-outline-danger" href="#" role="button" title="delete"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php
function displaySection($section, $exsitSectionNo, $sdSections, $setNo){
    if(empty($exsitSectionNo)) return null;
    ($exsitSectionNo);
    ($section->id);
    if(in_array($section->id,$exsitSectionNo)){
        $sectionKey = array_search($section->id,$exsitSectionNo);

        displaySingleSection($section, $setNo, $sectionKey);
        $exsitSectionNo[$sectionKey]= null;
        if(!empty($section->child_section)){
            $child_array = explode(",",$section->child_section);
            foreach($child_array as $Key => $sdSectionKey){

                $exsitSectionNo=displaySection($sdSections[array_search($sdSectionKey,$exsitSectionNo)],$exsitSectionNo,$sdSections, $setNo);

            }
        }


    }return $exsitSectionNo;
}

function displaySingleSection($section, $setNo, $sectionKey){
    $i = 0;
    if($section->section_level == 2){
        echo "<div id=\"section_label-".$section->id."\" class=\"subtabtitle\">".$section->section_name."</div>";
        if($section->is_addable == 1)
        {        echo"<div role=\"button\" id=\"add_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",1,1)\" class=\"float-right px-3 mx-3 btn btn-outline-info\" title=\"Add new\">Add</div>";
            if($max_set_No == 0){
                echo " NO PAGINATION NEEDED";
            }else{
                echo "<nav class=\"d-inline-block float-right\" title=\"Pagination\" aria-label=\"Page navigation example\">";
                echo "<ul class=\"pagination mb-0\">";
                echo    "<li class=\"page-item\">";
                echo    "<a id=\"left_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",0)\" class=\"page-link\" aria-label=\"Previous\">";
                echo        "<span aria-hidden=\"true\">&laquo;</span>";
                echo        "<span class=\"sr-only\">Previous</span>";
                echo    "</a>";
                echo    "</li>";
                for($pageNo = 1; $pageNo<=$max_set_No; $pageNo++ ){
                    echo    "<li class=\"page-item\"><a id=\"section-".$section->id."-page_number-".$pageNo."\" onclick=\"setPageChange(".$section->id.",".$pageNo.")\" class=\"page-link\">".$pageNo."</a></li>";
                }
                echo    "<li class=\"page-item\">";
                echo    "<a id=\"right_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",2)\" class=\"page-link\" aria-label=\"Next\">";
                echo        "<span aria-hidden=\"true\">&raquo;</span>";
                echo        "<span class=\"sr-only\">Next</span>";
                echo    "</a>";
                echo    "</li>";
                echo "</ul>";
                echo "</nav>";
            }
        }
    }
    elseif($section->section_level ==1 ){


    // Each Section field input start
    echo"<div class=\"secdiff\" id=\"secdiff-".$section->id."\">";
    echo "<div class=\"fieldInput\">";

    $max_set_No = 0;
    $length_taken = 0;
    $cur_row_no = 0;
    foreach($section->sd_section_structures as $sd_section_structureK =>$sd_section_structure_detail){
        if($i == 0){
            $length_taken = 0;
            $cur_row_no = $sd_section_structure_detail->row_no;
            echo"<div class=\"form-row\">";
        }
        elseif($cur_row_no != $sd_section_structure_detail->row_no){
            $length_taken = 0;
            $cur_row_no = $sd_section_structure_detail->row_no;
            echo"</div><div class=\"form-row\">";
        }
        $j = -1;
        $jflag = 0;
        foreach ($sd_section_structure_detail->sd_field->sd_field_values as $key_detail_field_values=>$value_detail_field_values){
            $jflag ++;
            if($value_detail_field_values->set_number==$setNo){
                $j = $key_detail_field_values;
            }
            if($value_detail_field_values->set_number>=$max_set_No)
                $max_set_No = $value_detail_field_values->set_number;
        }
        if ($j==-1) $j = $jflag;
        echo "<div id=\"section-".$section->id."-field-".$sd_section_structure_detail->sd_field->id."\" class=\"form-group col-md-".$sd_section_structure_detail->field_length." offset-md-".($sd_section_structure_detail->field_start_at-$length_taken)."\">";
        echo "<label id= \"section-".$section->id."-field_label-".$sd_section_structure_detail->sd_field->id."\" >".$sd_section_structure_detail->sd_field->field_label;
        echo " <a id=\"field_helper-".$sd_section_structure_detail->sd_field->id."\" tabindex=\"0\" role=\"button\" data-toggle=\"popover\" title=\"Field Helper\" data-content=\"<div>".$sd_section_structure_detail->sd_field->comment."</div>\"><i class=\"qco fas fa-info-circle\"></i></a></label>";
        // if(!empty($sd_section_structure_detail->sd_section_values)) print_r($section->sd_section_sets[0]->set_no);
            $id_idHolder = 'section-'.$section->id.'-sd_section_structures-'.$i.'-sd_field_values-'.$j.'-id';
            $id_nameHolder = 'sd_field_values['.$section->id.']['.$sd_section_structureK.'][id]';
            $field_value_nameHolder = 'sd_field_values['.$section->id.']['.$sd_section_structureK.'][field_value]';
            if(!empty($sd_section_structure_detail->sd_field->sd_field_values[$j])){
                echo"<input id= ".$id_idHolder." name=".$id_nameHolder." value=".$sd_section_structure_detail->sd_field->sd_field_values[$j]->id." type=\"hidden\">";
            }else{
                echo"<input id= ".$id_idHolder." name=".$id_nameHolder." value=\"\" type=\"hidden\">";
            }
            echo "<input id= \"section-".$section->id."-set_number-".$sd_section_structure_detail->sd_field->id."\" name=\"sd_field_values[".$section->id."][".$sd_section_structureK."][set_number]\" value=".$setNo." type=\"hidden\">";
            echo "<input id= \"section-".$section->id."-sd_structure_id-".$sd_section_structure_detail->sd_field->id."\" name=\"sd_field_values[".$section->id."][".$sd_section_structureK."][sd_field_id]\" value=".$sd_section_structure_detail->sd_field->id." type=\"hidden\">";
                switch($sd_section_structure_detail->sd_field->sd_element_type->type_name){
                    case 'select':
                        echo "<select class=\"form-control\" id=\"section-".$section->id."-select-".$sd_section_structure_detail->sd_field->id."\" name=".$field_value_nameHolder.">";
                            echo"<option id=\"section-".$section->id."-select-".$sd_section_structure_detail->sd_field->id."-option-null\" value=\"null\" ></option>";
                            foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                                echo "<option id=\"section-".$section->id."-select-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" value=".$option_detail['value'];

                                if(!empty($sd_section_structure_detail->sd_field->sd_field_values[$j])&&$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value==$option_detail['value'])
                                echo " selected=\"true\"";
                                echo ">".$option_detail['caption']."</option>";
                            };
                        echo"</select>";
                        continue;
                    case 'text':
                        echo "<input id=\"section-".$section->id."-text-".$sd_section_structure_detail->sd_field->id."\" class=\"form-control\" name=".$field_value_nameHolder." type=\"text\"";
                        echo (!empty($sd_section_structure_detail->sd_field->sd_field_values[$j]))?"value=".$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value:null;
                        echo " >";
                        continue;
                    case 'radio':
                        echo "<div id=\"section-".$section->id."-radio-".$sd_section_structure_detail->sd_field->id."\">";
                        foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                            echo "<div class=\"custom-control custom-radio custom-control-inline\">";
                            echo "<input class=\"custom-control-input\" id=\"section-".$section->id."-radio-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" name=".$field_value_nameHolder." type=\"radio\" value=";
                            echo $option_detail['value'];
                            if(!empty($sd_section_structure_detail->sd_field->sd_field_values[$j])&&$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value==$option_detail['value'])
                            echo " checked";
                            echo "><label class=\"custom-control-label\" for=\"section-".$section->id."-radio-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" >".$option_detail['caption']."</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                        continue;
                    case 'checkbox':
                        echo "<div class=\"form-row\" id=\"section-".$section->id."-radio-".$sd_section_structure_detail->sd_field->id."\">";
                        foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                            echo "<div class=\"custom-control custom-radio custom-control-inline col-md-4\">";
                            echo "<input id=\"section-".$section->id."-checkbox-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" class=\"checkboxstyle\"  name=".$field_value_nameHolder." value=";
                            echo $option_detail['value'];
                            if(!empty($sd_section_structure_detail->sd_field->sd_field_values[$j])&&$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value==$option_detail['value'])
                            echo " checked";
                            echo " type=\"checkbox\"><label for=\"checkbox-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\">".$option_detail['caption']."</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                        continue;
                    case 'textarea':
                        echo "<textarea id=\"section-".$section->id."-textarea-".$sd_section_structure_detail->sd_field->id."\" class=\"form-control\" name=".$field_value_nameHolder;
                        echo " rows=".$sd_section_structure_detail->field_height.">";
                        echo (!empty($sd_section_structure_detail->sd_field->sd_field_values[$j]))?$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value:null;
                        echo "</textarea>";
                        continue;
                    case 'date':
                        echo "<input type=\"text\" class=\"form-control\" name=".$field_value_nameHolder." id=\"section-".$section->id."-date-".$sd_section_structure_detail->sd_field->id."\" value=";
                        echo (!empty($sd_section_structure_detail->sd_field->sd_field_values[$j]))?$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value:null;
                        echo ">";
                }
            echo"</div>";
        $i++;
        $length_taken = $sd_section_structure_detail->field_length + $sd_section_structure_detail->field_start_at;
    }
    // Each Section field input End
    echo "</div>";

    if($i!=0) echo"</div>";
    echo"<div class=\"row px-3\">";
    if($section->is_addable == 1)
    {        echo"<div role=\"button\" id=\"add_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",1,1)\" class=\"order-3 px-3 mx-3 btn btn-outline-info\" title=\"Add new\">Add</div>";
        if($max_set_No == 0){
            // echo " NO PAGINATION NEEDED";
        }else{
            echo "<nav class=\"d-inline-block float-right\" title=\"Pagination\" aria-label=\"Page navigation example\">";
            echo "<ul class=\"pagination mb-0\">";
            echo    "<li class=\"page-item\">";
            echo    "<a id=\"left_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",0)\" class=\"page-link\" aria-label=\"Previous\">";
            echo        "<span aria-hidden=\"true\">&laquo;</span>";
            echo        "<span class=\"sr-only\">Previous</span>";
            echo    "</a>";
            echo    "</li>";
            for($pageNo = 1; $pageNo<=$max_set_No; $pageNo++ ){
                        echo    "<li class=\"page-item\"><a id=\"section-".$section->id."-page_number-".$pageNo."\" onclick=\"setPageChange(".$section->id.",".$pageNo.")\" class=\"page-link\">".$pageNo."</a></li>";
            }
            echo    "<li class=\"page-item\">";
            echo    "<a id=\"right_set-".$section->id."-sectionKey-".$sectionKey."-setNo-1\" onclick=\"setPageChange(".$section->id.",2)\" class=\"page-link\" aria-label=\"Next\">";
            echo        "<span aria-hidden=\"true\">&raquo;</span>";
            echo        "<span class=\"sr-only\">Next</span>";
            echo    "</a>";
            echo    "</li>";
            echo "</ul>";
            echo "</nav>";
        }
    }
    echo "<h3 id=\"section_label-".$section->id."\"class=\"order-1\">".$section->section_name."</h3>";
    echo"<div role=\"button\" id=\"save-btn".$section->id."\" class=\"order-3 px-5 btn btn-outline-secondary\" aria-pressed=\"true\">Save</div>";
    echo "<hr class=\"my-2 order-2\"></div>";
    echo"</div>";
}
}
?>