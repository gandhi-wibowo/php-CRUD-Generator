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
<form action='func.php' method='POST'>
<input type='hidden' name='$pf' value=\"<?php echo \$_POST['$pf']; ?>\">
<?php
foreach(\$one as \$data){?>
   ";
  foreach($nopf as $field){
    $string .=
    $field['column_name']." <input type='text' name='".$field['column_name']."' value=\"<?php echo \$data['".$field['column_name']."']; ?>\">
    <br>";
  }
$string .="
<?php } ?>
";
$string .= "<input type='submit' name='update' value='Save'>
</form>
";

createFile($string, "../".$table."/edit.php");
}
?>
