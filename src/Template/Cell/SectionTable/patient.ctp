<div class="card mt-1 mb-5">
        <div class="card-header">
            <h3 class="d-inline">Patient Record </h3>
            <a class="btn btn-outline-primary float-right" href="#" role="button" title="add"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                    <?php
                    echo "<th scope=\"col\">".$patientInfoFields[4]."</th>";
                    echo "<th scope=\"col\">".$patientInfoFields[0]."</th>";
                    echo "<th scope=\"col\">".$patientInfoFields[1]."</th>";
                    echo "<th scope=\"col\">".$patientInfoFields[2]."</th>";
                    echo "<th scope=\"col\">".$patientInfoFields[3]."</th>";
                    ?>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                    <?php
                    foreach($patientInfoValues as $setNo => $setValue){
                        echo "<tr>";
                        echo "<td>";
                        if(!empty($setValue['236'])){
                            echo ($setValue['236']!=null)?$patientInfoLookUps[0][$setValue['236']]:null;
                        }
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['80']))?$setValue['80']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['81']))?$setValue['81']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['82']))?$setValue['82']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['83']))?$setValue['83']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo "<button class=\"btn btn-outline-danger\" onclick=\"setPageChange(55,".$setNo.")\" role=\"button\" title=\"show\"><i class=\"fas fa-trash-alt\"></i></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
</div><div class="card mt-1 mb-5">
        <div class="card-header">
            <h3 class="d-inline">Congential Anomaly Record </h3>
            <a class="btn btn-outline-primary float-right" href="#" role="button" title="add"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                    <?php
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[3]."</th>";
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[2]."</th>";
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[0]."</th>";
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[1]."</th>";
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[4]."</th>";
                    echo "<th scope=\"col\">".$patientDiseaseInfoFields[5]."</th>";
                    ?>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                    <?php
                    foreach($patientDiseaseInfoValues as $setNo => $setValue){
                        echo "<tr>";

                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['239']))?$setValue['239']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        if(!empty($setValue['237'])){
                            echo ($setValue['237']!='null')?$patientDiseaseInfoLookUps[0][$setValue['237']]:null;
                        }
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['99']))?$setValue['99']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['102']))?$setValue['102']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['240']))?$setValue['240']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        if(!empty($setValue['241'])){
                            echo ($setValue['241']!='null')?$patientDiseaseInfoLookUps[1][$setValue['241']]:null;
                        }
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo "<button class=\"btn btn-outline-danger\" onclick=\"setPageChange(55,".$setNo.")\" role=\"button\" title=\"show\"><i class=\"fas fa-trash-alt\"></i></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
</div>

<div class="card mt-1 mb-5">
        <div class="card-header">
            <h3 class="d-inline">Patient Disease Record </h3>
            <a class="btn btn-outline-primary float-right" href="#" role="button" title="add"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                    <?php
                    echo "<th scope=\"col\">".$congentialAnomalyFields[0]."</th>";
                    echo "<th scope=\"col\">".$congentialAnomalyFields[2]."</th>";
                    echo "<th scope=\"col\">".$congentialAnomalyFields[1]."</th>";
                    echo "<th scope=\"col\">".$congentialAnomalyFields[3]."</th>";
                    echo "<th scope=\"col\">".$congentialAnomalyFields[4]."</th>";
                    ?>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                    <?php
                    foreach($congentialAnomalyValues as $setNo => $setValue){
                        echo "<tr>";
                        echo "<td scope=\"col\">";
                        if(!empty($setValue['273'])){
                            echo ($setValue['273']!='null')?$congentialAnomalyLookUps[0][$setValue['273']]:null;
                        }
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        if(!empty($setValue['275'])){
                            echo ($setValue['275']!='null')?$congentialAnomalyLookUps[1][$setValue['275']]:null;
                        }
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        if(!empty($setValue['274'])){
                            echo ($setValue['274']!='null')?$congentialAnomalyLookUps[2][$setValue['274']]:null;
                        }
                        echo "</td>";

                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['276']))?$setValue['276']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['277']))?$setValue['277']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo "<button class=\"btn btn-outline-danger\" onclick=\"setPageChange(55,".$setNo.")\" role=\"button\" title=\"show\"><i class=\"fas fa-trash-alt\"></i></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
</div>