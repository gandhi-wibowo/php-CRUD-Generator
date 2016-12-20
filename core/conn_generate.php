<?php
function gen_conn($host,$dbUser,$dbName,$dbPassword){
$string .="
<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
define (\"HOST\",\"$host\");
define (\"DB_USER\",\"$dbUser\");
define (\"DB_PASSWORD\",\"$dbPassword\");
define (\"DB_NAME\",\"$dbName\");

function Connect(){
    \$connect = mysqli_connect(HOST, DB_USER, DB_PASSWORD,DB_NAME);
    if(\$connect){
        return \$connect;
    } else {
      return FALSE;
    }
}
?>
";
if(mkdir("../config")){
  createFile($string, "../config/conn.php");
}
}

?>
