<?php
$email=$_POST['email'];
$user=$_POST['user'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
$gst=$_POST['gst'];
$phone=$_POST['phone'];
$bkq=$_POST['bkq'];
$answer=$_POST['recover'];
	

	if(!empty($email) || !empty($user) || !empty($password) || !empty($cpassword) || !empty($gst) || !empty($phone) || !empty($bkq) || !empty($recover))
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
			$SELECT="SELECT email from details where email= ? LIMIT 1";
			$INSERT="INSERT Into details(email,username,password,gstno,phoneno,backupquestion,answer)values(?,?,?,?,?,?,?)";
			
			$stmt=$conn->prepare($SELECT);
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			
			if($rnum==0){
					$stmt->close();
					$stmt=$conn->prepare($INSERT);
					$stmt->bind_param("ssssiss",$email,$user,$pass,$gst,$phone,$bkq,$answer);
					$stmt->execute();
			session_start();
                    $_SESSION['email']=$email;
                    $_SESSION['man']=$user;
					echo "new record inserted sucessfully";
					 header("location: index.php"); 
				}
				else{
					echo"Someone already register using this email";
				
				}
				$stmt->close();
				$conn->close();
		   }
		
	}
	else{
		echo"ALL fields are required";
		die();
	}

?>