<?php

require "sNode.Class.php";

$snode = new sNode("YOUR_API_KEY");

// Getting files list
print_r($snode->list());

// Uploading a new file
print_r($snode->upload("FILE_NAME"));

// Getting stats of a file
print_r($snode->stats("FILE_ID"));

// Deleting a file
print_r($snode->delete("FILE_ID"));

?>