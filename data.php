<?php
include("connection.php");

$conn = connect();
$query = "select * from imagen";
$results = $conn->query($query);
$out = array();
while ($data = $results->fetch_assoc()) {
  array_push($out, $data);
}
$readable_json = json_encode(
  $out,
  JSON_UNESCAPED_SLASHES,
  JSON_PRETTY_PRINT
);
$results->free();
$conn->close();
echo($readable_json);
?>