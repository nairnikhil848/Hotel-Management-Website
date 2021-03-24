<html>
<head>
</head>
<body>

<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="wdexp6";

$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
}
else{ 

  $id=$_GET['id'];
   $SQL="DELETE  FROM hnames where id=$id ";
   if(mysqli_query($conn,$SQL)){
       header('location:admin.php');
   }
   else{
       echo "ERROR deleting record";
   }

}

?>
</body>
</html>
