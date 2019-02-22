<ul
<?php 
foreach($sdQueries as $sdQuery){
    echo "<li><a href=\"/sd-queries/view/".$sdQuery['id']."\">";
    if(empty($sdQuery['read_date']))
    echo "<b>";
    echo "Title:".$sdQuery['title'];
    echo "Send Date:".$sdQuery['send_date'];
    if(empty($sdQuery['read_date']))
    echo "</b>";
    echo "</a></li>";
}
?>