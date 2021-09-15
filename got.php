
<html>
<body>

<?php

$conn = mysqli_connect("sql210.epizy.com", "epiz_29356999", "sfxDmwAYbTTiH", "epiz_29356999_practice");
$name= $_POST['name'];
$gender= $_POST['gender'];
$img= $_POST['img'];
$country= $_POST['country'];

$sql= "INSERT INTO testing(name, gender, country) VALUE ('{$name}', '{$gender}', '{$country}')";
 if (mysqli_query($conn, $sql)) {
   echo "Hello your {$name} record saved";
 }else {
   echo "Hello {$name} your record cannot saved";
 }


?>
<?php  
/*$conn = mysqli_connect("localhost", "root", "", "practice");
$query = "select * From student";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
if($total!=0){
?>
 
<ul>
<li><?php echo $result['id']  ?><?php echo $result['name'] ?><br>
<?php echo $result['gender'] ?><br>
<?php echo $result['country'] ?><br>
<?php echo $result['date'] ?>
</ul>

<?php  
}*/

 ?>