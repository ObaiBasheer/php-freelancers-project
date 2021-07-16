<?php
$dsn = 'mysql:host=localhost;dbname=servex';
$user     = 'root';
$password = '';

try {
$conn = new PDO($dsn, $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOEXception $e){
echo 'failed to connect' . $e->getMessage();
}
