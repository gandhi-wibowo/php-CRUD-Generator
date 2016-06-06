<?php
function gen_create($table){
$string .= "<form action='func.php' method='POST'>
";
  $nopf = NoPrimaryField($table);
  foreach($nopf as $field){
    $string .=
    $field['column_name']." <input type='text' name='".$field['column_name']."' placeholder='".$field['column_name']."'>
    <br>";
  }
$string .= "<input type='submit' name='insert' value='Save'>
</form>
";
createFile($string, "../".$table."/create.php");
}
?>
