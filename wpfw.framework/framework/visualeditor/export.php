<?php
$external="true";
include('visual-editor-functions.php');

header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".$_GET['filename'].".wpfw");
 
echo wpfw_get_export_data($_GET['post_id']);

?>