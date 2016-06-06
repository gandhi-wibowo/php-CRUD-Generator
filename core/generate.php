<?php
require_once 'function.php';
$hasil = array();
if(isset($_POST['generate'])){
  if($_POST['table'] != NULL){
    $table = $_POST['table'];

    require_once 'conn_generate.php';
    gen_conn();

    require_once 'generate_function.php';
    gen_func($table);

    require_once 'read_generate.php';
    gen_read($table);

    require_once 'create_generate.php';
    gen_create($table);
  }
  else{
    echo "pilih salah satu table";
  }

}
?>
