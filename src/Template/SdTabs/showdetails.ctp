<?php
//echo "I am here<br>";
//debug($sdTabs);
//foreach ($sdTabs as $eachTab){  debug($eachTab->tab_name);  }

// Call to use widget
echo $this->element('widget');
?>

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
            <a class="dropdown-item" href="#">FDA</a>
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
    <!--     Left Navigation Bar    -->
    <div class="btn-group-vertical" id="sidenav" role="group" aria-label="Button group with nested dropdown">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item mb-2 bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/1">General</a>
            </li>
            <li class="nav-item mb-2 bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/2">Reporter</a>
            </li>
            <li class="nav-item dropright mb-2 bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="/sd-tabs/showdetails/3" aria-haspopup="true" aria-expanded="false">Patient</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/sd-tabs/showdetails/3">Patient</a>
                    <a class="dropdown-item" href="/sd-tabs/showdetails/3#Parent">Parent</a>
                    <a class="dropdown-item" href="/sd-tabs/showdetails/3#Socioeconomic">Socioeconomic</a>
                    <a class="dropdown-item" href="/sd-tabs/showdetails/3#Pregnancy">Pregnancy</a>
                    <a class="dropdown-item" href="/sd-tabs/showdetails/3#Death">Death</a>
                </div>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/4">Product</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/5">Event</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/6">Narratives</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/7">Serious Criteria</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/8">Casuality</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/9">Labeling</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/10">Lab</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/11">Study</a>
            </li>
            <li class="nav-item mb-2  bg-outline-primary text-white border border-primary rounded">
                <a class="nav-link" href="/sd-tabs/showdetails/12">Submission</a>
            </li>
        </ul>
    </div>

<!-- Data Entry Body -->
<!-- General Tab -->
<div class="dataentry">
 <?= $this->Form->create($sdSections);?>
<?php
    $setNo = $this->request->getQuery('setNo');
    if(empty($setNo)) $setNo = "1";
    $exsitSectionNo = [];
    for($i = 0; $i < sizeof($sdSections->toarray()); $i++){
        $exsitSectionNo[$i] = $sdSections->toarray()[$i]->id;
    }
    foreach($sdSections->toarray() as $sdSectionKey => $sdSection_detail){
        $exsitSectionNo = displaySection($sdSection_detail, $exsitSectionNo, $sdSections, $setNo);
    }
    ?>
            <button type="submit" class="btn btn-success float-right p-2 w-25">Complete "General Tab"</button> 
            <hr class="d-inline-block w-100">
            <?= $this->Form->end() ?>  
</div>

<?php
function displaySection($section, $exsitSectionNo, $sdSections, $setNo){
    if(empty($exsitSectionNo)) return null;
    if(in_array($section->id,$exsitSectionNo)){
        displaySingleSection($section, $setNo);
        $exsitSectionNo[array_search($section->id,$exsitSectionNo)]= null;
        if(!empty($section->child_section)){ 
            $child_array = explode(",",$section->child_section);
            foreach($child_array as $Key => $sdSectionKey){
                $exsitSectionNo=displaySection($sdSections->toarray()[array_search($sdSectionKey,$exsitSectionNo)],$exsitSectionNo,$sdSections, $setNo);
            }
        }
        return $exsitSectionNo;
        
    }
}

function displaySingleSection($section, $setNo){
    $i = 0;
    if($section->section_level == 2)
        echo "<div class=\"subtabtitle col-md-12\">".$section->section_name."</div>";
    elseif($section->section_level ==1 ){
        echo "<h3 class=\"secspace\">".$section->section_name;
        echo"<button type=\"button\" id=\"save-btn".$section->id."\" class=\"float-right px-5 btn btn-outline-secondary\">Save</button>";
        echo"<button type=\"button\"  class=\"float-right px-3 mx-3 btn btn-outline-info\" title=\"Add new\">Add</button>";

        // Pagination
        echo "<nav class=\"d-inline-block float-right\" title=\"Pagination\" aria-label=\"Page navigation example\">";
        echo "<ul class=\"pagination mb-0\">";
        echo    "<li class=\"page-item\">";
        echo    "<a class=\"page-link\" href=\"#\" aria-label=\"Previous\">";
        echo        "<span aria-hidden=\"true\">&laquo;</span>";
        echo        "<span class=\"sr-only\">Previous</span>";
        echo    "</a>";
        echo    "</li>";
        echo    "<li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>";
        echo    "<li class=\"page-item\"><a class=\"page-link\" href=\"#\">2</a></li>";
        echo    "<li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>";
        echo    "<li class=\"page-item\">";
        echo    "<a class=\"page-link\" href=\"#\" aria-label=\"Next\">";
        echo        "<span aria-hidden=\"true\">&raquo;</span>";
        echo        "<span class=\"sr-only\">Next</span>";
        echo    "</a>";
        echo    "</li>";
        echo "</ul>";
        echo "</nav>";
        echo "</h3><hr class=\"my-2\">";
    } 

    $length_taken = 0;  
    $cur_row_no = 0;     
    foreach($section->sd_section_structures as $sd_section_structure =>$sd_section_structure_detail){
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
        foreach ($sd_section_structure_detail->sd_section_values as $key_detail_section_values=>$value_detail_section_values){
            $jflag ++;
            if($value_detail_section_values->set_number==$setNo){
                $j = $key_detail_section_values; 
                break;
            }
        }
        if ($j==-1) $j = $jflag;
        echo "<div id=\"field".$sd_section_structure_detail->sd_field->id."\" class=\"form-group col-md-".$sd_section_structure_detail->field_length." offset-md-".($sd_section_structure_detail->field_start_at-$length_taken)."\">";
        echo "<label id= \"field-label".$sd_section_structure_detail->sd_field->id."\" >".$sd_section_structure_detail->sd_field->field_label;//loop by value set
        echo " <a title=\"Field Helper\" data-toggle=\"popover\" data-trigger=\"hover\" data-content=".$sd_section_structure_detail->sd_field->comment."><i class=\"qco fas fa-info-circle\"></i></a></label>";
        $q = 'sdSections.sd_section_structures.'.$i.'.sd_section_values.'.$j.'.id';
        $p = 'sdSections.sd_section_structures.'.$i.'.sd_section_values.'.$j.'.field_value';
        $id_idHolder = 'sdsections-sd-section-structures-'.$i.'-sd-section-values-'.$j.'-id'; 
        $id_nameHolder ='sdSections[sd_section_structures]['.$i.'][sd_section_values]['.$j.'][id]';
        $field_value_nameHolder = 'sdSections[sd_section_structures]['.$i.'][sd_section_values]['.$j.'][field_value]'; 
        $section_structure_id_nameHolder = 'sdSections[sd_section_structures]['.$i.'][sd_section_values]['.$j.'][sd_section_structure_id]';
        echo"<input id= ".$id_idHolder." name=".$section_structure_id_nameHolder." value=".$sd_section_structure_detail->id." type=\"hidden\">";
        foreach($sd_section_structure_detail->sd_section_values as $sd_section_values_detail_no=>$sd_section_values)
        if(!empty($sd_section_structure_detail->sd_section_values[$j])){
            echo"<input id= ".$id_idHolder." name=".$id_nameHolder." value=".$sd_section_structure_detail->sd_section_values[$j]->id." type=\"hidden\">";
        }
        ?>
            <?php 
            switch($sd_section_structure_detail->sd_field->sd_element_type->type_name){
                case 'select':
                    echo "<select class=\"form-control\" id=\"select".$sd_section_structure_detail->sd_field->id."\" name=".$field_value_nameHolder.">";
                        echo"<option id=\"select".$sd_section_structure_detail->sd_field->id."-option-null\" value=\"null\" ></option>";
                        foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                            echo "<option id=\"select".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" value=".$option_detail['value'];
                            
                            if(!empty($sd_section_structure_detail->sd_section_values[$j])&&$sd_section_structure_detail->sd_section_values[$j]->field_value==$option_detail['value'])
                            echo " selected";               
                            echo ">".$option_detail['caption']."</option>   ";
                        };
                    echo"</select>";    
                    continue;
                case 'text':
                    echo "<input id=\"text".$sd_section_structure_detail->sd_field->id."\" class=\"form-control\" name=".$field_value_nameHolder." type=\"text\"";
                    echo (!empty($sd_section_structure_detail->sd_section_values[$j]))?"value=".$sd_section_structure_detail->sd_section_values[$j]->field_value:null;
                    echo " >";  
                    continue;   
                case 'radio':
                    echo "<div id=\"radio".$sd_section_structure_detail->sd_field->id."\">";
                    foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                        echo "<div class=\"custom-control custom-radio custom-control-inline\">";
                        echo "<input class=\"custom-control-input\" id=\"radio".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" name=".$field_value_nameHolder." type=\"radio\" value=";
                        echo $option_detail['value'];
                        if(!empty($sd_section_structure_detail->sd_section_values[$j])&&$sd_section_structure_detail->sd_section_values[$j]->field_value==$option_detail['value'])
                        echo " checked";                            
                        echo "><label class=\"custom-control-label\" for=\"radio".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" >".$option_detail['caption']."</label>";
                        echo "</div>";      
                    }   
                    echo "</div>";                  
                    continue;
                case 'checkbox':
                    echo "<div class=\"form-row\" id=\"radio".$sd_section_structure_detail->sd_field->id."\">";
                    foreach($sd_section_structure_detail->sd_field->sd_field_value_look_ups as $option_no=>$option_detail){
                        echo "<div class=\"custom-control custom-radio custom-control-inline col-md-4\">";
                        echo "<input id=\"checkbox".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\" name=".$field_value_nameHolder." value=";
                        echo $option_detail['value'];
                        if(!empty($sd_section_structure_detail->sd_section_values[$j])&&$sd_section_structure_detail->sd_section_values[$j]->field_value==$option_detail['value'])
                        echo " checked";                            
                        echo " type=\"checkbox\"><label for=\"checkbox".$sd_section_structure_detail->sd_field->id."-option-".$option_detail['value']."\">".$option_detail['caption']."</label>";
                        echo "</div>";
                    }
                    echo "</div>";
                    continue;
                case 'textarea':
                    echo "<textarea id=\"textarea".$sd_section_structure_detail->sd_field->id."\" class=\"form-control\" name=".$field_value_nameHolder;
                    echo " rows=".$sd_section_structure_detail->field_height.">";
                    echo (!empty($sd_section_structure_detail->sd_section_values[$j]))?$sd_section_structure_detail->sd_section_values[$j]->field_value:null;
                    echo "</textarea>";  
                    continue;  
                case 'date':
                    echo "<input type=\"text\" class=\"form-control\" name=".$field_value_nameHolder." id=\"date".$sd_section_structure_detail->sd_field->id."\" value=";
                    echo (!empty($sd_section_structure_detail->sd_section_values[$j]))?$sd_section_structure_detail->sd_section_values[$j]->field_value:null;
                    echo ">";
            }
        echo"</div>";        
        $i++;
        $length_taken = $sd_section_structure_detail->field_length + $sd_section_structure_detail->field_start_at;
    }
    if($i!=0) echo"</div>";
}
?>