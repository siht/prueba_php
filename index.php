<?php
include("connection.php");

$conn = connect();
$query = "select * from imagen";
$results = $conn->query($query);
$out = array();
while ($data = $results->fetch_assoc()) {
  array_push($out, $data);
}
$results->free();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="http://getbootstrap.com/favicon.ico">

  <title>Profiles</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        sitio de muestra
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2>imágenes</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
            $index = 0;
            foreach($out as $elem){
              $active = !$index ? "class=\"active\"" : "";
              echo("<li data-target=\"#myCarousel\" data-slide-to=\"$index\" $active></li>\n");
              $index++;
            }
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $index = 0;
            foreach($out as $elem){
              $active = !$index ? "active" : "";
              $img = $elem['imagen'];
              $alt = $elem['titulo'];
              echo("<div class=\"item $active\"><img src=\"$img\" alt=\"$alt\"></div>\n");
              $index++;
            }
            ?>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>