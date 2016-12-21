<?php
require_once 'function.php';

if(isset($_POST['genConf'])){
  require_once 'conn_generate.php';
  $host = $_POST['host'];
  $dbUser = $_POST['dbuser'];
  $dbName = $_POST['dbname'];
  $dbPassword = $_POST['dbpwd'];
  $urlBase = $_POST['baseurl'];
  if(!empty($host) || !empty($dbUser) || !empty($dbName) || !empty($dbPassword)){
    gen_conn($host,$dbUser,$dbName,$dbPassword,$urlBase);
    header("Location: ../");
  }
  else{
    header("Location: ../");
  }

}
else if(isset($_POST['generate'])){
  if($_POST['table'] != NULL){
    $table = $_POST['table'];

    require_once 'generate_function.php';
    gen_func($table);

    require_once 'read_generate.php';
    gen_read($table);

    require_once 'create_generate.php';
    gen_create($table);

    require_once 'edit_generate.php';
    gen_edit($table);

    header("Location: ../index.php");
  }
  else{
    header("Location: ../index.php");
  }

}
else if(isset($_POST['all'])){
  $Table = Table();
  foreach ($Table as $key) {
    $table = $key['table_name'];

    require_once 'generate_function.php';
    gen_func($table);

    require_once 'read_generate.php';
    gen_read($table);

    require_once 'create_generate.php';
    gen_create($table);

    require_once 'edit_generate.php';
    gen_edit($table);

  }
  header("Location: ../index.php");
}
?>
