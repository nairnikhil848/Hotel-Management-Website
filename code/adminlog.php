<html>
<head>

<link rel="stylesheet" href="admin.css">
</head>
<body>


<table class="table-box">
   <tr class="table-head">
       <th >ID</th>
       <th >HOTEL NAMES</th>
       <th >PRICE</th>
       <th >ROOMS</th>
   </tr>
   
</table>
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
$SQL="SELECT * FROM hnames ";



if ($result=mysqli_query($conn,$SQL))
{
    // Fetch one and one row
   while ($row=mysqli_fetch_row($result))  
   {  
if(isset($_POST['edit'])){
    $host="localhost";
    $dbusername="root";
     $dbpassword="";
    $dbname="wdexp6";

    $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
     die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
         $INSERT="UPDATE hnames SET id='".$_POST['id']."', hotelname='".$_POST['hname']."', price='".$_POST['price']."', rooms='".$_POST['room']."' WHERE id='".$row[0]."'";
        mysqli_query($conn,$INSERT);
    }
}
   }
}



if ($result=mysqli_query($conn,$SQL))
{
    // Fetch one and one row
   while ($row=mysqli_fetch_row($result))  
   {   
       ?>
       <form action="adminlog.php" method="POST">
    <input type="text" id="ID" placeholder="" name="id" value="<?php echo $row[0]; ?>">
    <input type="text" id="HNAME" placeholder="" name="hname" value="<?php echo $row[1]; ?>">
    <input type="text" id="PRICE" placeholder="" name="price" value="<?php echo $row[2]; ?>">
    <input type="text" id="ROOM" placeholder="" name="room" value="<?php echo $row[3]; ?>">
    <button type="submit" name="edit">EDIT</button>
    <a name="delete" href='delete.php?id=<?php echo $row[0] ?>'>DELETE</a>
    </form>
    <?php 

    }
       


    }   
}

?>
</body>
</html>
