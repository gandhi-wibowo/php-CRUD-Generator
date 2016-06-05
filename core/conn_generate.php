<?php
function gen_conn(){
$string .="
<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Jakarta');
define (\"HOST\",\"localhost\");
define (\"DB_USER\",\"root\");
define (\"DB_PASSWORD\",\"jakarta\");
define (\"DB_NAME\",\"bioskop88\");

function Connect(){
    \$connect = mysqli_connect(HOST, DB_USER, DB_PASSWORD,DB_NAME);
    if(\$connect){
        return \$connect;
    } else {
        die('Unable to connect to '.HOST);
    }
}
?>
";

mkdir("../config");
createFile($string, "../config/conn.php");
}

?>
