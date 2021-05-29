<?php
ob_start();
require("admin/layouts/db.php");

// Start XML file, create parent node
$doc = new DOMDocument('1.0','UTF-8');
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

// Select all the rows in the bins table from database(mysql)
$select=$conn->query("SELECT *FROM bins",PDO::FETCH_OBJ);
$select->execute();
header("Content-type: text/xml");


while($row=$select->fetch()){
    // Add to XML document node
    $node = $doc->createElement("marker");
    $newnode = $parnode->appendChild($node);
    
    $newnode->setAttribute("bins_id", $row->bins_id);
    $newnode->setAttribute("bins_name", $row->bins_name);
    $newnode->setAttribute("bins_address", $row->bins_adress);
    $newnode->setAttribute("bins_lat", $row->bins_lat);
    $newnode->setAttribute("bins_lng", $row->bins_lng);
    $newnode->setAttribute("type", $row->type);
    $newnode->setAttribute("status", $row->status);

 }
  
  $xmlfile = $doc->saveXML() ;
  print_r($xmlfile);
  ob_end_flush();
  ?>