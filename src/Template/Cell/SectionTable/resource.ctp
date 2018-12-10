<table>
    <tr>
        <th>Valid Case?</th>
        <th>Category</th>        
        <th>Initial Received date (A.1.6.b) </th> 
        <th>action</th>
    </tr>
    <?php
    foreach($sourceFields as $setNo => $setValue){
        echo "<tr>";
        echo "<td>";
        echo (!empty($setValue['223']))?$setValue['223']:null;
        echo "</td>";
        echo "<td>";
        echo (!empty($setValue['224']))?$setValue['224']:null;
        echo "</td>";
        echo "<td>";
        echo (!empty($setValue['10']))?$setValue['10']:null;
        echo "</td>";
        echo "<td>";
        echo "<div>show</div>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>