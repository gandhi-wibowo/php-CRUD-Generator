<?php
require_once 'core/function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PHP CRUD Generator</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/jumbotron-narrow.css">
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav>
        <h3 class="text-muted"> PHP CRUD Generator</h3>
      </div>
    </div>
    <div class="container">
      <div class="col-sm-12">
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              One By One
            </div>
            <div class="panel-body">
              <form action="core/generate.php" method="post">
                <select  name="table" class="form-control">
                  <option value="">Please Select</option>
                  <?php
                    $Table = Table();
                    foreach ($Table as $key) {
                      echo "<option value='".$key['table_name']."'> ".$key['table_name']."</option>";
                    }
                  ?>
                </select>
                <br>
                <input type="submit" name="generate" value="Generate" class="btn btn-info">
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              Generate All
            </div>
            <div class="panel-body">
              <form action="core/generate.php" method="post">
                <input type="submit" name="all" value="Generate All" class="btn btn-danger ">
              </form>
            </div>
          </div>
        </div>
      </div>      

    </div>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" />
  </body>
</html>
