<?php
$q = intval($_GET['q']);

$dsn = 'mysql:host=localhost;dbname=servex';
$user     = 'root';
$password = '';


$conn = new PDO($dsn, $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qy = "SELECT sub_cateogry.*,cateogries.cat_name AS cateogry_name FROM sub_cateogry INNER JOIN cateogries ON cateogries.cat_ID = sub_cateogry.cate_id WHERE cat_ID = '".$q."'";
$stmt = $conn->prepare($qy);
$stmt->execute();


echo "<select>";
while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

  echo "<option value=" . $row->sub_id .">" . $row->sub_name . "</option>";
 
}
echo "</select>";

?>