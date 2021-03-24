<html>
    <head>
        <title>HOME</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="home.css">
        <script src="homepage.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>

    <body>
    <?php       
            session_start();        
        if(empty($_SESSION['email'])){
            $nick="ACCOUNT";
            $link="lastlog.php";
            $link2="lastlog.php";
        }
        else{
            $nick=$_SESSION['man'];
            $link="testinreg.php";
            $link2="userupdate.php";
        }
		?>
            
         <header>
             <div class="logo">
                <i class="fa fa-h-square" aria-hidden="true"></i>
            </div>
            <div class="head">
                <span>H</span><span>otel</span>
                <span>M</span><span>anagement</span>
                <span>S</span><span>ystem</span>
            </div>
        </header>
         <nav>
                
                <div class="search-box">
                    <input class="search-txt" type="text" name="" placeholder="Search By Location" onkeyup="sugg(this.value)">
                    <a class="searchbtn" href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
  
                </div> 
                <i id="lines" class="fa fa-bars x2" onclick="menutog()"></i>
                <ul id="navigation">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#booking">BOOKING</a></li>
                    <li><a href="#policy">OUR POLICY</a></li>
                    <li><a href="#aboutus">ABOUT US</a></li>
                    <li><a href="#contactus">CONTACT US</a></li>
                    <li><a id="acc" onclick=window.location.href="<?php echo $link2 ?>" ></a></li>
                    <i id="line" class="fa fa-times x2" onclick="menutog()"></i>
                </ul>
                <script>
                        function menutog(){
                            var ele=document.getElementById("navigation");
                            ele.classList.toggle("show");
                        }
                </script>
                
                
        </nav>
        <div class="serch" id="ps" onclick=window.location.href="testinreg.php" ></div>
            
        <section class="home" id="home">
            
                <video autoplay loop class="video" muted plays-inline>
                    <source src="video.mp4" type="video/mp4">
                </video>
                <h2>BINGO
                    <span>BINGO</span>
                    <span>BINGO</span>
                    <span> 20%off BOOK NOW</span>
                </h2>

                
    
        </section>
            
        <section class="booking" id="booking">
            <div class="container">
                <div class="box">
                    <div class="imgbox">
                         <img src="bg1.jpg">
                    </div>
                    <div class="details">
                        <div class="content">
                            <h4>ibis Bengaluru Hosur</h4>
                            <p>Located in South Bangalore, ibis Bengaluru Hosur Road is within a five-minute walk of both AMR Tech Park and The Oxford College. </p>
                        </div>    
                    </div>
                   
                </div>
                <div class="box">
                        <div class="imgbox">
                                <img src="hotel3.jpg">
                        </div>
                        <div class="details">
                        <div class="content">
                            <h4>Tivoli Grand</h4>
                            <p>Strategically located near GT Karnal Road north of the city centre, Tivoli Grand is a three-star property featuring a full spa and large outdoor grounds. </p>
                        </div>    
                    </div> 
                </div>
                <div class="box">
                        <div class="imgbox">
                                <img src="hotel2.jpg">
                        </div>
                        <div class="details">
                        <div class="content">
                            <h4>Artus Inn</h4>
                            <p>Artun Inns presence in East Andheri provides a comfortable stay without denying access to the prime areas of the city. Rooms are warm and bright. Various basic amenities are offered here.</p> 
                            </div>
                            </div>
                </div>
                <div class="box">
                        <div class="imgbox">
                                <img src="hh.jpg">
                        </div>
                        <div class="details">
                        <div class="content">
                            <h4>Westin Hyderabad Mindspace </h4>
                            <p>On-site restaurants include Prego for Italian cuisine and Casbah for Mediterranean food and outdoor seating. Seasonal Tastes offers breakfast and all-day international gourmet dining. </p>
                           </div>
                           </div>
                </div>
                    
                    <b id="b5" href="#">
                    </b>
                    <b id="b1" onclick=window.location.href="<?php echo $link ?>" >
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            BOOK
                    </b>
                    
                    <b  id="b2" onclick=window.location.href="<?php echo $link ?>" >
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            BOOK
                    </b>
                    <b id="b3" onclick=window.location.href="<?php echo $link ?>">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            BOOK
                    </b>
                    <b id="b4" onclick=window.location.href="<?php echo $link ?>">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            BOOK
                    </b>
            </div>    
        </section>
        
        <section class="policy" id="policy">
        <div class="endthis">
        The end user travel experience is amalgamation of their pre-stay shopping and booking interaction, on-property engagement with the hotel and its staff, their in-room experience, and their sharing of feedback or review on social media post-stay. In this connected world, Hoteliers are challenged with providing a personalized guest experience while operating an effective hotel business.
        ANMsoft Hotel Management System provides property management software for automating hotel or chain of hotels, villas, apartments and resorts. ANMsoft full suite of HMS solutions allows you to help lower costs, increase revenues, and provide better services to the customer who in turn helps you to create exceptional guest experiences & increased loyalty. With this system you will get instant ROI as it will let you get quick returns on your investment.

        OnTra HMS is single technology platform which empowers multiple properties with hotel booking engine integrated with payment gateways & front office applications
                </div>
        </section>

        <section class="aboutus" id="aboutus">
        <div class="p1">
            <h4>ABOUT US</h4>
            <h5>At Bingo we know that online hotel accommodation isn’t easy but we believe it should be. Having to scroll through thousands of websites to find the perfect hotel that suits you isn’t easy. At the end of the day you just want to know that you have booked the best hotel there is available at the best possible price.In one quick and easy search, we show you only the information you want to know and need to know.
            We also guarantee to find you the best hotel price.</h5>
            <h6>Want to partner with us?</h6>
            <h5>If you own or manage a hotel, we can help you with your marketing. Let us get you more direct bookings, own the relationship with your guests, build your brand and lower your distribution costs. Find out more:</h5>
        </div>

        </section> 

        <section class="contactus" id="contactus">
        <video autoplay loop class="video1" muted plays-inline>
                <source src="video1.mov" type="video/mp4">
                </video>
            <div class="container">
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <h3>THANE,421201,India</h3>
                     </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Mobile</h4>
                         <h3>+917715868705</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <h3>nairnikhil848@gmail</h3>
                    </div>
                </div>         
               
            </div>
            
        </section>
        <script> 
        var me="<?php echo $nick ?>"; 
        document.getElementById("acc").innerHTML=me;
        </script>         
    </body>
</html>
