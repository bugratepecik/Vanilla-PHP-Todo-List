<?php
$host = "localhost";
$port ="5432";
$dbname = "postgres";
$user = "postgres";
$password = "12ustek";
$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if(!$db){
    die("veri tabanina erisim saglanamadi".pg_last_error() );
}

?>