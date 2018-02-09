<?php

// Start XML file, create parent node
$doc = new DOMDocument("1.0");
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

//connection
include('bdd.php');

// Select all the rows in the good table
$reponse = $bdd->query('SELECT * FROM good WHERE 1');
header("Content-type: text/xml");

while ($row = $reponse->fetch())
{
  // ADD TO XML DOCUMENT NODE
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
}
$reponse->closeCursor();

echo $doc->saveXML();

?>