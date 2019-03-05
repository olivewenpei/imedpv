<?php 
if($newQueryCount)
echo  "<a class=\"\" href=\"/sd-queries/queries/unread\"><i class=\"far fa-envelope\"></i><b>You have ".$newQueryCount." New Queries</b></a>";
else echo "<a class=\"\" href=\"/sd-queries/queries/\"><i class=\"far fa-envelope\"></i>My Queries</a>";

?>