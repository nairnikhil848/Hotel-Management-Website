<html>
<head>
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <link rel="stylesheet" href="userupdate.css"> 
 
</head>
<body> 
<?php 
        session_start();
                        if(isset($_POST['chip'])){  
                            session_start();
                            session_destroy();
                            header("location:index.php");
                        }
                        
                        if(isset($_POST['nsub'])){  
                            $host="localhost";
                            $dbusername="root";
                             $dbpassword="";
                            $dbname="wdexp6";
            
                            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
                            if(mysqli_connect_error()){
                             die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
                            }
                            else{    
                                $email=$_SESSION['email'];
                                   $password=$_POST['password'];
                                   $result=mysqli_query($conn,"select * from details where email='$email' and password='$password' ")
                                        or die("Failed to query database".mysqli_error());
                                     $ch=mysqli_fetch_array($result);
                                     if($ch['password']==$password){
                                        $email=$_POST['email'] ;
                                        $user=$_POST['user'] ;
                                        $INSERT="UPDATE details SET email='".$_POST['email']."', username='".$_POST['user']."' WHERE email='".$ch[1]."' ";
                                        $re=mysqli_query($conn,$INSERT);
                                        if($re){
                                                    echo "new record inserted sucessfully";   
                                             } 
                                         else{
                                            echo "new record not inserted sucessfully";
                                         }                                        
                                     }
                                     else{
                                                 echo "password not right";
                                         }    
                                   
                                }
                        } 
                        if(isset($_POST['sub2'])){  
                            $host="localhost";
                            $dbusername="root";
                             $dbpassword="";
                            $dbname="wdexp6";
            
                            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
                            if(mysqli_connect_error()){
                             die('Connect_Error('. mysqli_connect_errno().')'.mysqli_connect_error());
                            }
                            else{    
                                $email=$_SESSION['email'];
                                   $result=mysqli_query($conn,"select * from details where email='$email'")
                                        or die("Failed to query database".mysqli_error());
                                     $ch=mysqli_fetch_array($result);
                                    
                                        $phone=$_POST['phone'] ;
                                        $gst=$_POST['gst'] ;
                                        $bkq=$_POST['bkq'] ;
                                        $ans=$_POST['answer'] ;
                                        $INSERT="UPDATE details SET phoneno='".$_POST['phone']."', gstno='".$_POST['gst']."' , backupquestion='".$_POST['bkq']."' , answer='".$_POST['answer']."' WHERE email='".$ch[1]."' ";
                                        $re=mysqli_query($conn,$INSERT);
                                        if($re){
                                                    echo "new record inserted sucessfully";   
                                             } 
                                         else{
                                            echo "new record not inserted sucessfully";
                                         }                                        
  
                                   
                                }
                        } 
            
?>
    <div class="head">
    <form method="POST" action="userupdate.php">
    <button type="submit" id="sign" name="chip">SIGNOUT</button>
    </form>
    <h1>UPDATE/EDIT PROFILE</h1>
    </div>
    <div class="edit"> 
            <div class="left">
                <h2>ACCOUNT DETAILS</h2>
            <form method="POST" action="userupdate.php">
               <label > EMAIL:</label> <input type="text" id="email" placeholder="" name="email" required><br><br>
               <label id="ee"> USERNAME:</label><input type="text" id="user" placeholder="" name="user" required><br><br>
               <label id="ee"> PASSWORD:</label><input type="password" id="password" placeholder="" name="password" required><br>
                <button type="submit" id="sub1" name="nsub">EDIT</button>
            </form>
            </div>
            <div class="right">
            <h2 >PERSONAL DETAILS</h2>
            <form method="POST" action="userupdate.php">
            <label id="ee">PHONE NUMBER:</label> <input type="text" id="phone" placeholder="" name="phone"><br><br>
            <label id="ee"> GST NUMBER:</label><input type="text" id="gst" placeholder="" name="gst"><br><br>
            <label id="ee">  BACKUP QUESTION:</label><input type="text" id="bkq" placeholder="" name="bkq"><br><br>
             <div class="ans">
             <label id="ee">  ANSWER:</label><input type="text" id="answer" placeholder="" name="answer">
             </div>
             <button type="submit" id="sub2" name="sub2">EDIT</button>
             </form>
            </div>
    </div> 
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
                $email=$_SESSION['email'];
                $SQL="SELECT * FROM details where email='$email'";
                $result=mysqli_query($conn,$SQL);
                $row=mysqli_fetch_row($result);
                
                ?> 
                <script>
                document.getElementById("email").value="<?php echo $row[1]; ?>";
                document.getElementById("user").value="<?php echo $row[2]; ?>";
                document.getElementById("phone").value="<?php echo $row[4]; ?>";
                             document.getElementById("gst").value="<?php echo $row[5]; ?>";
                             document.getElementById("bkq").value="<?php echo $row[6]; ?>";
                             document.getElementById("answer").value="<?php echo $row[7]; ?>";
                </script> 
                <?php     
         }

            if(isset($_POST['sub2'])){
              

            }
            ?>
    <h3>YOUR BOOKING HISTORY</h3>    
     
    <table class="table-box">
            <tr class="table-head">
                <th >HOTEL NAME</th>
                <th >CHECK-IN DATE</th>
                <th >CHECK-OUT DATE</th>
                <th >NO OF GUESTS</th>
                <th >TOTAL AMOUNT</th>
            </tr>
            
    </table>
    <?php     
        $email=$_SESSION['email'];
       $SQL="SELECT * FROM profile where email='$email'";
        if ($result=mysqli_query($conn,$SQL))
         {
            while ($row=mysqli_fetch_row($result))  
            {    ?>
                  <script>
                
                   var table=document.getElementsByTagName('table')[0];
                   var newRow=table.insertRow(1);
       
                   var cel1=newRow.insertCell(0);
                   var cel2=newRow.insertCell(1);
                   var cel3=newRow.insertCell(2);
                   var cel4=newRow.insertCell(3);
                   var cel5=newRow.insertCell(4);
                   
                   cel1.innerHTML="<?php echo $row[2] ?>";
                   cel2.innerHTML="<?php echo $row[3] ?>";
                   cel3.innerHTML="<?php echo $row[4] ?>";
                   cel4.innerHTML="<?php echo $row[5] ?>";
                   cel5.innerHTML="<?php echo $row[6] ?>";
                   </script>
                    <?php     
             }
        }   

        
    ?>

</body>  
</html> 