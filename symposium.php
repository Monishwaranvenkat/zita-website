<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Zita|Symposium Registration</title>
    <link rel="stylesheet" href="form/sassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="form/sassets/css/reg.css">
    <link rel="stylesheet" href="form/sassets/css/styles.css">	<title>utsaha 2020:registration</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Sarabun:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet">
	<!-- //Web-Fonts -->

<style>
        .err{
            color: tomato;
             font-family: Lobster; font-size: 16px; 
        }
        </style>

</head>
<!-- php !-->
<?php
$error=[];
include("form/registration-assets/validate.php");
include("form/registration-assets/signup.php");
if(isset($_POST['register']))
{
   
     $san=sanitize($_POST);
      $error=validate($san);
      if(empty($error)){
        $error=sympo_check($san["phone"],$san["email"]);
        if(empty($error)){
            sypmo_signup($san);
        }
      }
}
?>

<!-- html!-->
<body>
    <div class="main-top-2" id="home">
		<!-- header -->
		<header>
			<div class="container-fluid">
				<div class="header d-md-flex justify-content-between align-items-center py-3 px-xl-5 px-lg-3 px-2">
					<!-- logo -->
					<div id="logo">
						<h1><a href="index.html">K.S.Rangasamy college of Technology</a></h1>
					</div>
					<!-- //logo -->
					<!-- nav 
					<div class="nav_w3ls">
						<nav>
							<label for="drop" class="toggle">Menu</label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="index.html" class="active">Home</a></li>
								<li><a href="about.html">About Us</a></li>
								<li><a href="event.html">Events</a></li>
								<li><a href="workshop.html">Workshop</a></li>
								<li><a href="contact.html">Contact Us</a></li>
							</ul>
						</nav>
					</div>
					 //nav -->
				</div>
			</div>
		</header>
		<!-- //header -->
	</div>
	<!-- //main banner -->
		<div class="breadcrumb-w3pvt">
		<ol class="breadcrumb mb-0 text-center">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Registration</li>
		</ol>
	</div>
    <div class="bg-secondary register-photo">
        <div class="border rounded form-container">
            <div class="image-holder"></div>
            <form method="post" action="symposium.php" novalidate>
                <h2 class="text-center"><strong>Registration</strong></h2>
                <div class="form-group"><input type="text" name="name" placeholder="Your Name" class="form-control" id="name"/>
                    <p class="err"><?php if (array_key_exists("name",$error))
                        {
                            echo $error["name"];
                        }?></p>
                </div>
                <div class="form-group"><input class="form-control" type="email" name="college" placeholder="College" id="college"><p class="err"><?php if (array_key_exists("college",$error))
{
echo $error["college"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="department" name="dept">
    <optgroup label=" Select Department">
    <option value=""  selected hidden>Department</option>
    <option value="MECHANICAL ENGINEERING">MECHANICAL ENGINEERING</option>
    <option value="ELECTRICAL AND ELECTRONICS ENGINEERING" >ELECTRICAL AND ELECTRONICS ENGINEERING</option>
    <option value="ELECTRONICS AND COMMUNICATION ENGG">ELECTRONICS AND COMMUNICATION ENGG</option>
    <option value="COMPUTER SCIENCE AND ENGINEERING">COMPUTER SCIENCE AND ENGINEERING</option>
    <option value="CIVIL ENGINEERING">CIVIL ENGINEERING</option>
    <option value="MECHATRONICS ENGINEERING">MECHATRONICS ENGINEERING</option>
    <option value="TEXTILE TECHNOLOGY">TEXTILE TECHNOLOGY</option>
    <option value="BIO TECHNOLOGY">BIO TECHNOLOGY</option>
    <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
    <option value="NANO SCIENCE AND TECHNOLOGY">NANO SCIENCE AND TECHNOLOGY</option>
    <option value="AERONAUTICAL ENGINEERING">AERONAUTICAL ENGINEERING</option>
    <option value="AGRICULTURAL ENGINEERING">AGRICULTURAL ENGINEERING</option>
    <option value="BIOCHEMICAL ENGINEERING">BIOCHEMICAL ENGINEERING</option>
     <option value="OTHERS">OTHERS</option>
    
    </optgroup>
</select><p class="err"><?php if (array_key_exists("dept",$error))
{
echo $error["dept"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="year" name="year">
    <optgroup label="Select year">
    <option value=""  selected hidden>Year</option>
    <option value="I Year">I Year</option><option value="II Year">II Year</option><option value="III Year">III Year</option><option value="IV Year">IV Year</option></optgroup></select>
<p class="err"><?php if (array_key_exists("year",$error))
{
echo $error["year"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="gender" name="gender"><optgroup label=" Select a Gender"><option value=""  selected hidden>Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option><option value="Others">Others</option></optgroup></select>
    <p class="err"><?php if (array_key_exists("gender",$error))
{
echo $error["gender"];
}?> </p>
</div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" id="email"><p class="err"><?php if (array_key_exists("email",$error))
{
echo $error["email"];
}?></p></div>
                <div class="form-group"><input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control" id="phone" /><p class="err"> <?php if (array_key_exists("phone",$error))
{
echo $error["phone"];
}?></p></div>
                <div class="form-group">
                    <div><label>Events</label>
                        <div>
                            <input type="hidden" name="event[]" />
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Hackathon" id="event"><label class="form-check-label" for="formCheck-1">Hackathon</label></div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Paper Presentation" id="event"><label class="form-check-label" for="formCheck-2">Paper Presentation</label></div>
                             <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Project Presentation" id="event"><label class="form-check-label" for="formCheck-2">Project Presentation</label></div>
                        </div>
                        <div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Blind Coding" id="event"><label class="form-check-label" for="formCheck-1">Blind Coding</label></div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Tech Gadget Review" id="event"><label class="form-check-label" for="formCheck-2">Tech Gadget Review</label></div>
                        </div>
                        <div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Surf Net" id="event"><label class="form-check-label" for="formCheck-1">Surf Net</label></div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Talkathon" id="event"><label class="form-check-label" for="formCheck-2">Talkathon</label></div>
                        </div>
                        <div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Web Tech" id="event"><label class="form-check-label" for="formCheck-1">Web Tech</label></div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Idea Builder" id="event"><label class="form-check-label" for="formCheck-2">Idea Builder</label></div>
                        </div>
                        <div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Treasure Hunt" id="event"><label class="form-check-label" for="formCheck-1">Treasure Hunt</label></div>
                            <div class="form-check event"><input class="form-check-input" type="checkbox" name="event[]" value="Photography" id="event"><label class="form-check-label" for="formCheck-2">Photography</label></div>
                        </div>
                    </div>
                    <p class="err"> <?php if (array_key_exists("event",$error))
{
echo $error["event"];
}?></p>
                </div>
                <div class="form-group"><input class="btn btn-primary btn-block" name="register" value="register" type="submit"></div>
            </form>
        </div>
    </div>
    <script src="form/sassets/js/jquery.min.js"></script>
    <script src="form/sassets/bootstrap/js/bootstrap.min.js"></script>
    
	<!-- footer -->
<footer class="py-sm-5 py-4">
		<div class="container-fluid px-sm-5 py-xl-4">
			<div class="row footer-top">
				<div class="col-lg-4 col-md-6 footer-grid_section_1its">
						<h3 class="footer-title mb-lg-4 mb-3">Contact Info</h3>
					<div class="contact-info">
						<div class="footer-style-w3ls mt-4">
							<h4 class="mb-2">Phone</h4>
						<h6>Student Coordinators:</h6>
						    <p>Suhitha V: 9952721043</p>
							<p>RamBharath B: 7010384345</p>
							<h6>Faculty</h6>
							<p>Dr.C.Rajan: 9865090665</p>
						</div>
						<div class="footer-style-w3ls mt-4">
							<h4 class="mb-2">Email </h4>
							<p><a href="mailto:zitautsaha@gmail.com">zitautsaha@gmail.com</a></p>
							<p><a href="mailto:zita@zitautsaha.in">zita@zitautsaha.in</a></p>
						</div>
						<div class="footer-style-w3ls mt-4">
							<h4 class="mb-2">Location</h4>
							<p>K S R Kalvi Nagar,Tiruchengode -637215 TamilNadu,India</p><br>
							
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 footer-grid_section_1its mt-md-0 mt-5">
					<h3 class="footer-title mb-lg-4 mb-3">Navigation</h3>
					<ul class="list-unstyled">
						<li class="mt-3">
							<a href="index.html">Home</a>
						</li>
						<li class="mt-3">
							<a href="about.html">About Us</a>
						</li>
						<li class="mt-3">
							<a href="event.html">Events</a>
						</li>
						<li class="mt-3">
							<a href="workshop.html">Workshop</a>
						</li>
						<li class="mt-3">
							<a href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
				<!-- contact!-->
				<div class="col-lg-3 col-md-6 footer-grid_section_1its mt-lg-0 mt-5">
				<!-- ff-->
					<h2 class="logo-2 mb-lg-4 mb-3">
						
					</h2>
					<!-- social icons -->
					<div class="mobamuinfo_social_icons">
						
						<h4 class="sub-con-fo mt-4 mb-3">Catch us on</h4>
						<ul class="mobamuits_social_list list-unstyled">
							<li class="w3_mobamu_facebook">
								<a href="https://www.facebook.com/zitaitksrct">
									<span class="fa fa-facebook-f"></span>
								</a>
							</li>
							<li class="w3_mobamu_twitter">
								<a href="https://www.instagram.com/zita_it/">
									<span class="fa fa-instagram"></span>
								</a>
							</li>
							
						</ul>
						<!-- social icons -->
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="cpy-right text-center py-4">
		<p>© Copyright 2016 - K.S.Rangasamy College of Technology
		</p>
	</div>
	<!-- //copyright -->
	<!-- move top icon -->
	<a href="#home" class="move-top text-center"></a>
	<!-- //move top icon -->

</body>

</html>