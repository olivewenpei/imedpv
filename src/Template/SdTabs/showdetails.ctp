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
            $("[id$=page_number-1]").css('background-color', '#cacaca');
    });
    })
</script>
<title>Data Entry</title>
<head>
    <!-- For checking unsaved contents JS link -->
    <?= $this->Html->script('specific.js') ?>
    <!-- For export pdf -->
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js') ?>
    <!-- For select add input  -->
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') ?>
    <?= $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js") ?>
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
    $sectionNavCell = $this->cell('SectionNav',[$tabid,$caseNo = $this->request->getQuery('caseNo')]);
    echo $sectionNavCell;

    $WhoddCell = $this->cell('Whodd');
    echo $WhoddCell;
?>

<!-- Data Entry Body -->
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


            $exsitSectionNo = displaySection($sdSection_detail, $exsitSectionNo, $sdSections, $setNo);
        }

    ?>

    <button type="submit" class="completeBtn btn btn-success">Complete "General Tab"</button>
    <hr class="d-inline-block w-100">
    <?= $this->Form->end() ?>
    <?php
        if($tabid==1){
            $sectionTableCell = $this->cell('SectionTable::general', [$caseNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }elseif($tabid==2)
        {
            $sectionTableCell = $this->cell('SectionTable::reporter', [$caseNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }elseif($tabid==3)
        {
            $sectionTableCell = $this->cell('SectionTable::patient', [$caseNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }elseif($tabid==4)
        {
            $sectionTableCell = $this->cell('SectionTable::product', [$caseNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }elseif($tabid==5)
        {
            $sectionTableCell = $this->cell('SectionTable::event', [$caseNo = $this->request->getQuery('caseNo')]);
            echo $sectionTableCell;
        }
    ?>
</div>

<?php
function displaySection($section, $exsitSectionNo, $sdSections, $setNo){
    if(empty($exsitSectionNo)) return null;
    if(in_array($section->id,$exsitSectionNo)){
        $sectionKey = array_search($section->id,$exsitSectionNo);
        echo"<div class=\"secdiff\" id=\"secdiff-".$section->id."\">";
        displaySingleSection($section, $setNo, $sectionKey);
        echo"</div>";
        $exsitSectionNo[$sectionKey]= null;
        if(!empty($section->child_section)){
            $child_array = explode(",",$section->child_section);
            foreach($child_array as $Key => $sdSectionKey){
                $exsitSectionNo=displaySection($sdSections[array_search($sdSectionKey,$exsitSectionNo)],$exsitSectionNo,$sdSections, $setNo);

            }
        }
        return $exsitSectionNo;

    }
    return $exsitSectionNo;
}

function displaySingleSection($section, $setNo, $sectionKey){
    $i = 0;
    if($section->section_level == 2){
        echo "<div id=\"section_label-".$section->id."\" class=\"subtabtitle col-md-12\">".$section->section_name."</div>";
        if($section->is_addable == 1)
        {
            echo "<div id=\"pagination-l2-section-".$section->id."\">";
            echo "<div role=\"button\" id=\"child_section-";
            $child_array = explode(",",$section->child_section);
            foreach($child_array as $Key => $sdSectionKey) echo "[".$sdSectionKey."]";
            echo "-sectionKey-".$sectionKey."-setNo-1-section-".$section->id."\" onclick=\"level2setPageChange(".$section->id.",1,1)\" class=\"float-right px-3 mx-3 btn btn-outline-info\" title=\"Add new\">Add</div>";
            echo "<div id=\"showpagination\"></div>";
            echo "</div>";
        }
    }    elseif($section->section_level ==1 ){
        echo "<div class=\"fieldInput\">";
        echo "<hr class=\"my-2\">";
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
                            echo "<select class=\"form-control js-example-responsive\" id=\"section-".$section->id."-select-".$sd_section_structure_detail->sd_field->id."\" name=".$field_value_nameHolder.">";
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
                            echo "<div class=\"form-row\" id=\"section-".$section->id."-checkbox-".$sd_section_structure_detail->sd_field->id."\">";
                            foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                                echo "<div class=\"custom-control custom-radio custom-control-inline col-md-4\">";
                                echo "<input id=\"section-".$section->id."-checkbox-".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" class=\"checkboxstyle\"  name=".$field_value_nameHolder." value=";
                                echo $option_detail['value'];
                                if(!empty($sd_section_structure_detail->sd_field->sd_field_values[$j])&&$sd_section_structure_detail->sd_field->sd_field_values[$j]->field_value==$option_detail['value'])
                                echo " checked=\"true\"";
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
        if($i!=0) echo"</div>";
        echo "</div>";
        echo "<div class=\"header-section\">";
        echo "<h3 id=\"section_label-".$section->id."\"class=\"secspace\">".$section->section_name;
        // Pagination
        echo "</h3>";
        echo "<div id=\"addbtnalert-".$section->id."\" class=\"addbtnalert mx-3 alert alert-danger\" role=\"alert\" style=\"display:none;\">You are adding a new record</div>";
        if($section->is_addable == 1)
        {

            if($max_set_No == 0){
                // echo " NO PAGINATION NEEDED";
            }else{
                echo "<div id=\"pagination-section-".$section->id."\" class=\"ml-3\">";
                echo "<nav class=\"secpag\" title=\"Pagination\" aria-label=\"Page navigation example\">";
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
                echo "<div role=\"button\" id=\"add_set-".$section->id."-sectionKey-".$sectionKey."-setNo-".$max_set_No."\" onclick=\"setPageChange(".$section->id.",1,1)\" class=\"px-3 mx-3 btn btn-outline-info\" title=\"Add new\">Add</div>";
                echo "</div>";
            }

        }
        echo "<div role=\"button\" id=\"save-btn".$section->id."\" class=\"ml-3 px-5 btn btn-outline-secondary\" style=\"display:none;\" aria-pressed=\"true\">Save</div>";
        echo"</div>";
    }
}
?>