<?php
function gen_func($table){
$pf = PrimaryField($table);
$string .= "<?php
require_once '../config/conn.php';

function GetAll(){
  \$query = \"SELECT * FROM ".$table."\";
  \$exe = mysqli_query(Connect(),\$query);
  while(\$data = mysqli_fetch_array(\$exe)){
    \$datas[] = array(";
    $fields = AllField($table);
    foreach($fields as $fieldName){
      $string .= "'".$fieldName['column_name']."' => \$data['".$fieldName['column_name']."'],\n\t\t";
    }
$string .= "
    );
  }
  return \$datas;
}
";
$string .="
function GetOne(\$id){
  \$query = \"SELECT * FROM  `$table` WHERE  `$pf` =  '\$id'\";
  \$exe = mysqli_query(Connect(),\$query);
  while(\$data = mysqli_fetch_array(\$exe)){
    \$datas[] = array(";
    $fields = AllField($table);
    foreach($fields as $fieldName){
      $string .= "'".$fieldName['column_name']."' => \$data['".$fieldName['column_name']."'], \n\t\t";
    }
$string .= "
    );
  }
return \$datas;
}
";
$string .="
function Insert(){
  ";
$nopf = NoPrimaryField($table);
foreach($nopf as $fieldName){
  $string .="\$".$fieldName['column_name']."=\$_POST['".$fieldName['column_name']."']; \n\t\t";
}
$string .="
  \$query = \"INSERT INTO `$table` (";
foreach($fields as $fieldName){
  $string .="`".$fieldName['column_name']."`,";
}
$string .=")
VALUES (NULL,";
foreach($nopf as $fieldName){
  $string .="'\$".$fieldName['column_name']."',";
}
$string .=")\";
mysqli_query(Connect(),\$query);
}";
$string .="
function Update(\$id){
  ";
$nopf = NoPrimaryField($table);
foreach($nopf as $fieldName){
  $string .="\$".$fieldName['column_name']."=\$_POST['".$fieldName['column_name']."']; \n\t\t";
}
$string .="
  \$query = \"UPDATE `$table` SET ";
foreach($nopf as $fieldName){
  $string .="`".$fieldName['column_name']."` = '\$".$fieldName['column_name']."',";
}
$string .="WHERE  `$pf` =  '\$id'";
$string .="\";
\$exe = mysqli_query(Connect(),\$query);
}";
$string .="
function Delete(\$id){
  \$query = \"DELETE FROM `$table` WHERE `$pf` = '\$id'\";
  \$exe = mysqli_query(Connect(),\$query);
}

";
$string .="
if(isset(\$_POST['insert'])){
  Insert();
}
else if(isset(\$_POST['update'])){
  Update(\$_POST['$pf']);
}
else if(isset(\$_POST['delete'])){
  Delete(\$_POST['$pf']);
}
?>
";

mkdir("../".$table);
createFile($string, "../".$table."/func.php");
Replace($table,"func",",)",")");
Replace($table,"func",",WHERE"," WHERE");
}
?>
