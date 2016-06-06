<?php
function gen_read($table){
  $nopf = NoPrimaryField($table);
  $pf   = PrimaryField($table);
$string ="
<?php
require_once 'func.php';
?>
<a href='create.php'>Tambah</a>
<table border=\"1\">
  <tr>
  <th>No</th>
";
    foreach ($nopf as $th) {
     $string .= "<th>".$th['column_name']."</th> \n";
    }
$string .= "
  <th colspan='2'>Opsi</th>
  </tr>
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
            <input type='submit' name='edit' Value='Edit'>
            </form>
          </td>\";
    echo \"<td>
            <form method='POST' action='func.php'>
            <input type='hidden' name='$pf' value='\".\$data['$pf'].\"'>
            <input type='submit' name='delete' Value='Delete'>
            </form>
            </td>\";
}
  ?>
  ";

$string .="
</tr>
</table>
";
createFile($string, "../".$table."/index.php");
}
?>
