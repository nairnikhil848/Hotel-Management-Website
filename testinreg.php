<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>

<link rel="stylesheet" href="testinreg.css"> 
<style type="text/css">
	
	

	</style>
	

     
</head>

<body>
<?php 
      

        if(isset($_POST['hname']) && isset($_POST['startdate1']) && isset($_POST['enddate1']))
        {   $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="wdexp6";
            
            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if(mysqli_connect_error()){
                die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
            }
            else{    
               $hname=$_POST['hname'];
                $sd=$_POST['startdate1'];
               
                $SQL="SELECT price FROM hnames where hotelname='$hname'";
                if ($result=mysqli_query($conn,$SQL))
                {
                    $row=mysqli_fetch_row($result);
                    $price=$row[0];
                    if(isset($_POST['radio']))
                    {
                        $price=$price+1000;
                    }
            
                }
                else{
                    echo "not connected";
                }


               $SQL="SELECT checkout FROM profile where hname='$hname'";
               $result=mysqli_query($conn,$SQL);
               $row=mysqli_fetch_row($result);
               if($row[0]==NULL)
               {
                 $val=1;
               }
               if ($result=mysqli_query($conn,$SQL))
                 {  
                     // Fetch one and one row
                    while ($row=mysqli_fetch_row($result))
                    {      
                           if ($row[0]>$sd)
                           {
                               $val=0;
                               break;
                           }
                           else{
                               $val=1;

                           }
                     }
                }
                else{
                    $val=1; 
                }
                  
               

            }


        }   
?>
<div id="contenar">
	<div id="r">
	<form action="testinreg.php" method="POST">
    <h3 id="sry"> Welcome <?php if(isset($_SESSION['man'])){ echo $_SESSION['man']; } ?> !!!</h3>
    <br>
        <table>
          <tr>
          <td width="900" class="l1" id="li">HOTEL NAME</td>
          <td width="320" id="li">
          <input type = "text" class="b1" list = "q" placeholder="ENTER HOTEL NAME" name="hname" value="<?php if(isset($_POST['hname'])){ echo $_POST['hname']; }?>"> 
     				<datalist id = "q">
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
    ?>
            <option value = "<?php echo $row[1]?>">
     <?php   
   }
}
}   

           ?>
        	   
                      </datalist>   
                      
        </td>
        </tr>
        <tr>
            <td id="c2">Check in Date</td>
            <td >
              <input id="s1"name="startdate1"  type="date" placeholder="d" value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>" /></td>
          </tr>
          <tr>
            <td id="c1">Check out Date</td>
            <td>
            <label class="container">
            <input type="checkbox"  name="radio" id="tick" checked="checked">AC
            </label>
              <input id="s2"name="enddate1" type="date" placeholder="dd/mm/yy" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1'];}?>" onchange='this.form.submit()';/></td>
          </tr>	
       </table>
       <div class="nbox">
            <div id="jex">No. of Guest</div>
            <div class="error" id="error"></div>
            <br>
              <input id="jex1" name="guest" type="text " size="10" required/>
                 <br>
            <div id="jex">Total Amount To Pay</div>
             <input type="text" id="jex1" name="roomprice"  size="10px" readonly="" value="<?php if(isset($price)){ echo $price; }?>"/>
              <br>
            <input type="submit" class="but" name="sub" value="Pay & Book" />

    </div>    
        
    </div>
    </div>    
    
      <?php 
           if(isset($_POST['hname']) && !empty($_POST['hname']) && isset($_POST['sub']) && ( $val==1))
            {
                   
                $host="localhost";
		        $dbusername="root";
		        $dbpassword="";
		        $dbname="wdexp6";
		        $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
            
                if(mysqli_connect_error()){
                    die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
                }
                else{
                    session_start();
                    $email=$_SESSION['email'];
                    $hname=$_POST['hname'];
                    $sd=$_POST['startdate1'];
                    $ed=$_POST['enddate1'];
                    $amount=$price;
                    $g=$_POST['guest'];


                    $INSERT="INSERT Into profile(email,hname,checkin,checkout,nog,amount)values(?,?,?,?,?,?)";
                    $stmt=$conn->prepare($INSERT);
					$stmt->bind_param("ssssii",$email,$hname,$sd,$ed,$g,$amount);
                    $stmt->execute();
                    header("location:userupdate.php");
                }


            }        
       ?>       
        
                               <script>
                                   var mi=0;
                                   if(mi==<?php echo $val ?>)
                                   document.getElementById('error').innerHTML="Sry no rooms available";
                                </script>
                


			
       </table>  
		</form>
</body>
</html>
