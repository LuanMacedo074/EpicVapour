<?php 

class DB extends PDO
{
    public function __construct()
    {
    $confdb = parse_ini_file("./conf/dbconfig.ini");


    $port = $confdb["port"];
    $host = $confdb["host"];
    $password = $confdb["password"];
    $user = $confdb["user"];
    $dbname = $confdb["dbname"];


    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";


    parent::__construct($dsn, $user, $password);


    $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>