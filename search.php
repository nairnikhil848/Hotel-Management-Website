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
        $a[]=$row[1];
   }
}
}   


/*

$a[] = "Hotel Novotel -Hyderabad ";
$a[] = "Park Plaza- Delhi";
$a[] = "J W Marriott- Delhi";
$a[] = "The Crown -Goa.";
$a[] = "Hotel Novotel- Ahmedabad";
$a[] = "The Gateway Hotel- Vadodara";
$a[] = "Fortune Landmark- Ahmedabad";
$a[] = "Dream Hotel Cochin- Kochi";
$a[] = "Hotel Marine Plaza- Mumbai";
$a[] = "Fortune Select Palms-Chennai";
$a[] = "Crowne Plaza- Noida";
$a[] = "Park Plaza- Kolkata";
$a[] = "Fortune Select Metropolitan-Jaipur";
$a[] = "Sterlings Mac Hotel- Bangalore";
$a[] = "THE CHANCERY PAVILION- Bangalore";
*/

$q = $_REQUEST["q"];

$hint = "";
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

echo $hint === "" ? "no suggestion" : $hint;
?>