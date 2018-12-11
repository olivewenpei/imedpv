<div class="card mt-1 mb-5">
        <div class="card-header">
            <h3 class="d-inline">Reporter List </h3>
            <a class="btn btn-outline-primary float-right" href="#" role="button" title="add"><i class="fas fa-plus"></i> Add</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                    <?php
                    foreach($sdFields as $fieldId => $fieldLabel)
                        echo "<th scope=\"col\">".$fieldLabel."</th>"
                    ?>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                    <?php
                    foreach($sourceFields as $setNo => $setValue){
                        echo "<tr>";
                        echo "<td scope=\"row\">";
                        echo (!empty($setValue['26']))?$setValue['26']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['28']))?$setValue['28']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['36']))?$sdFieldLookUps[0][$setValue['36']]:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo (!empty($setValue['232']))?$setValue['232']:null;
                        echo "</td>";
                        echo "<td scope=\"col\">";
                        echo "<div><a class=\"btn btn-outline-danger\" onclick=\"setPageChange(55,".$setNo.")\" role=\"button\" title=\"show\"><i class=\"fas fa-trash-alt\"></i></a></div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
        </div>
</div>