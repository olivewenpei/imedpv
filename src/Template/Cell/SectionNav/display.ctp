    <!--     Left Navigation Bar    -->
    <div class="maintab container-fluid">
    <div class="btn-group-vertical" id="sidenav" role="group" aria-label="Button group with nested dropdown">
        <ul class="nav nav-pills nav-fill">
        <?php
        foreach($sdTabs as $sdTabK =>$sdTabV){
            $multiSec = 0;
            if(sizeof($sdTabV->sd_sections)>=3) $multiSec=1;
            echo "<li class=\"nav-item ";
            echo ($sdTabV->id==$tabid)?"selval ":null;
            echo ($multiSec)?"dropright ":null;
            echo "mb-2 bg-outline-primary text-white border border-primary rounded\">";
            echo "<a class=\"nav-link ";
            echo ($multiSec)?"dropdown-toggle\" aria-haspopup=\"true\" aria-expanded=\"false\" data-toggle=\"dropdown ":null;
            echo "\" href=\"/sd-tabs/showdetails/".$sdTabV->id."?caseId=".$caseId."\" >".$sdTabV->tab_name."</a>";
            if($multiSec){
                echo "<div class=\"dropdown-menu\">";
                foreach($sdTabV->sd_sections as $sectionK => $sectionV){
                    echo"<a class=\"dropdown-item\" href=\"/sd-tabs/showdetails/".$sdTabV->id."?caseId=".$caseId."#secdiff-".$sectionV->id."\">";
                    echo $sectionV->section_name;
                    echo"</a>";
                };
                echo "</div>";
            }
            echo"</li>";
        } ?>
        </ul>
    </div>
    </div>