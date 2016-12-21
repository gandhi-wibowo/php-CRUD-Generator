<?php
function gen_edit($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);

$string .= "
<?php
require_once 'func.php';
\$id = \$_POST['$pf'];
\$one = GetOne(\$id);
?>

<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title> Edit $table </title>
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
        <div class='panel panel-info'>
          <div class='panel-heading'>Form Edit $table </div>
          <div class='panel-body'>
            <form action='func.php' method='POST'>
            <input type='hidden' name='$pf' value=\"<?php echo \$_POST['$pf']; ?>\">
            <?php
            foreach(\$one as \$data){?>
               ";
              foreach($nopf as $field){
                $string .="
                <div class=\"form-group\">
                  <label for=\"".$field['column_name']."\"> ".$field['column_name'].":</label>
                  <input type=\"text\" class=\"form-control\" id=\"".$field['column_name']."\" name='".$field['column_name']."' value=\"<?php echo \$data['".$field['column_name']."']; ?>\">
                </div>
            ";
              }
            $string .="
            <?php } ?>
            ";
            $string .= "<input type='submit' name='update' value='Save' class='btn btn-sm btn-warning'>
            </form>

          </div>
        </div>

      </div>
      <div class='col-sm-1'></div>
    </div>
  </body>
</html>
";

createFile($string, "../".$table."/edit.php");
}
?>
