<?php
if($newQueryCount)
// echo  "<a class=\"\" href=\"/sd-queries/queries/unread\"><i class=\"far fa-envelope\"></i><b>You have ".$newQueryCount." New Queries</b></a>";
// else echo "<a class=\"\" href=\"/sd-queries/queries/\"><i class=\"far fa-envelope\"></i>My Queries</a>";
echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href=\"/sd-queries/queries/unread\" style=\"position: absolute;right: 240px;\" data-toggle=\"tooltip\" data-html=\"true\" title=\"You have ".$newQueryCount." New Queries\"><i class=\"fas fa-envelope\"></i> $newQueryCount</a>";
else echo "<a role=\"button\" class=\"btn btn-info btn-lg\" href=\"/sd-queries/queries/\" style=\"position: absolute;right: 240px;\" data-toggle=\"tooltip\" data-html=\"true\" title=\"You have 0 New Queries\"><i class=\"fas fa-envelope\"></i></a>";
?>