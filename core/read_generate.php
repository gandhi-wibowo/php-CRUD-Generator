<?php
function gen_read($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);
$string ="
<?php
require_once 'func.php';
session_start();
?>

<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title> Read $table </title>
    <link rel=\"stylesheet\" href=\"<?php echo BASE_URL; ?>/bootstrap-3.3.7-dist/css/bootstrap.min.css\" >
    <link rel=\"stylesheet\" href=\"<?php echo BASE_URL; ?>/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css\">
    <link rel=\"stylesheet\" href=\"<?php echo BASE_URL; ?>/bootstrap-3.3.7-dist/css/jumbotron-narrow.css\">
    <script src=\"<?php echo BASE_URL; ?>/bootstrap-3.3.7-dist/js/jquery.min.js\"></script>
    <script src=\"<?php echo BASE_URL; ?>/bootstrap-3.3.7-dist/js/bootstrap.min.js\"></script>
  </head>

  <body>
  <div class='container'>
    <div class='col-sm-1'></div>
    <div class='col-sm-10'>
    <?php
    if(!empty(\$_SESSION['message'])){ ?>
      <div class=\"alert alert-<?php echo \$_SESSION['mType'];?> alert-dismissable\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
        <strong>Notif !</strong> <?php echo \$_SESSION['message']; ?>
      </div>
      <br>
      <?php session_unset(array('message','mType')); ?>
    <?php } ?>
    <a href='create.php' class='btn btn-info btn-sm'>Tambah</a>
    <br>
    <div class='table-responsive'>
    <table class='table table-hover'>
    <thead>
      <tr>
      <th>No</th>
    ";
        foreach ($nopf as $th) {
         $string .= "<th>".$th['column_name']."</th> \n";
        }
    $string .= "
      <th colspan='2'>Opsi</th>
      </tr>
      </thead>
      <tbody>
    <?php
      \$ga = GetAll();
      \$no = 1;
      foreach(\$ga as \$data){
        echo \"<tr>\";
        echo \"<td>\".\$no++.\"</td>\"; \n";
        foreach ($nopf as $field) {
          $string .="echo \"<td>\".\$data['".$field['column_name']."'].\"</td>\"; \n";
        }
    $string .= "
        echo \"<td>
                <form method='POST' action='edit.php'>
                <input type='hidden' name='$pf' value='\".\$data['$pf'].\"'>
                <input type='submit' name='edit' Value='Edit' class='btn btn-warning btn-sm'>
                </form>
              </td>\";
        echo \"<td>
                <form method='POST' action='func.php'>
                <input type='hidden' name='$pf' value='\".\$data['$pf'].\"'>
                <input type='submit' name='delete' Value='Delete' class='btn btn-danger btn-sm'>
                </form>
                </td></tr>\";
    }
      ?>
      ";

    $string .="

    </tbody>
    </table>
    </div>

    </div>
    <div class='col-sm-1'></div>
  </div>

  </body>
</html>



";
createFile($string, "../".$table."/index.php");
}
?>
