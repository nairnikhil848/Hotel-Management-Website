<html>
    <head>
        <title>SIGN IN</title>
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
    <?php
        if (isset($_POST['email'],$_POST['password'])){
                $email=$_POST['email'];
                $password=$_POST['password'];
                 $dbname="wdexp6";

                 $con=mysqli_connect("localhost","root","","wdexp6");
                 if (mysqli_connect_errno())
                 {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                         $result=mysqli_query($con,"select * from admin where name='$email' and password='$password' ")
                            or die("Failed to query database".mysqli_error());
                         $row=mysqli_fetch_array($result);
                            if($row['name']==$email && $row['password']==$password){
                    ?>
                    <script>
                    window.location.href = "adminlog.php";
                    </script>
                    <?php
                    
               //   header("location:index.php"); 
                 }else{
                             $error="Email or password not right";
                      }
           
        }      
?>
        <div class="error" id="error"></div>
        <script>
            document.getElementById("error").innerHTML="<?php echo $error ?>";
         </script>
        <form action="admin.php" method="POST">    
        <div class="login-box">
           <h1>ADMIN LOGIN!</h1> 
           <div class="textbox">
            <i class="fa fa-user" aria-hidden="true" ></i>
            <input type="text" placeholder="" name="email" value="" required><label>Name</label>
            </div>
            <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type ="password" placeholder="" name="password" value="" required><label>Password</label> 
           </div>
           <br><br>
           <button type="submit" href="submit" onclick="form.submit">SIGN IN</button>
        </div> 
        </form>
    
        
    </body>
</html>


