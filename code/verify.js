	function validate(){


					var alt="";

					var y=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,4}$;
					var x=document.getElementById("email").value;
					if( x.match(y))
    					{	
    					}
					else{ 
							alt +="\nYou have entered an invalid email address!\n";
						}	
					var x=document.getElementById("pas").value;
					var y=document.getElementById("cpass").value;
					if(x != y)
					{
					
						alt +="Password didnt matched";
					}


					var x=document.getElementById("user").value;
					var y=/^[a-zA-Z\-]+$/;
					if(x.match(y))
					{
					}
					else{	
						alt +="Username is not valid. Only characters A-Z, a-z and '-' are  acceptable.";
					}
				  

					var x=document.getElementById("pas").value;
					var y=/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/;
					if(x.match(y))
					{
					}
					else{	
						alt +="Your password should contain atleast 1 uppercase 1 lower case 1 numeric and 1 nonword without any spaces";
					}
				
			
					var regex = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/;
					var x=document.getElementById("gst").value;
					if( x.match(regex))
    					{			
    					}
					else{ 
						alt +="noThe first two digits of this number will represent the state code as per Indian Census 2011The next ten digits will be the PAN number of the taxpayerThe thirteenth digit will be assigned based on the number of registration within a stateThe fourteenth digit will be Z by defaultThe last digit will be for check code";
					}
				
					
					var x=document.getElementById("phone").value;
					if(x.length<10)
					{
						alt +="phone number seems incorrect";
					}

					if (alt != "")
            		 {
             	 			 document.getElementById("error").innerHTML=alt;
           		   			return false;
					 }
					 else {
			 				form.Submit();
						 }
				
			}