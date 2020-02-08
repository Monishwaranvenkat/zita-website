<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Workshop</title>
    <link rel="stylesheet" href="form/wassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="form/wassets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="form/wassets/css/styles.css">
    <style>
        .err{
            color: tomato;
             font-family: Lobster; font-size: 16px; 
        }
        </style>
</head>

<body>
<!-- php !-->
<?php
include("form/registration-assets/validate.php");
include("form/registration-assets/signup.php");
$error=[];
if(isset($_POST["submit"])){
    
    $san=sanitize($_POST);
    $error=validate($san);
    if(empty($error)){
        $error=check($san["phone"],$san["email"]);
        if(empty($error)){
            $flag=signup($san);
        }
    }
    
}
?>
<!-- html!-->
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" action="workshop.php" novalidate>
                <h2 class="text-center"><strong>Registration</strong></h2>
                <div class="form-group"><input class="form-control" type="email" name="name" placeholder="Your Name" id="name"><p class="err"><?php if (array_key_exists("name",$error))
{
echo $error["name"];
}?></p?</div>
                <div class="form-group"><input class="form-control" type="email" name="college" placeholder="College" id="college"><p class="err"><?php if (array_key_exists("college",$error))
{
echo $error["college"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="department" name="dept">
    <optgroup label=" Select Department">
    <option value=""  selected hidden>Department</option>
    <option value="Information Technology" >Information Technology</option><option value="Computer Science">Computer Science</option><option value="Nano Technology">Nano Technology</option>
    </optgroup>
</select><p class="err"><?php if (array_key_exists("dept",$error))
{
echo $error["dept"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="year" name="year">
    <optgroup label="Select year">
    <option value="" selected hidden>Year</option>
    <option value="I Year">I Year</option><option value="II Year">II Year</option><option value="III Year">III Year</option><option value="IV Year">IV Year</option></optgroup></select><p class="err"><?php if (array_key_exists("year",$error))
{
echo $error["year"];
}?></p></div>
                <div class="form-group"><select class="form-control" id="gender" name="gender"><optgroup label=" Select a Gender"><option value="" selected hidden>Gender</option>
    <option value="male">Male</option>
    <option value="Female">Female</option><option value="Others">Others</option></optgroup></select><p class="err"><?php if (array_key_exists("gender",$error))
{
echo $error["gender"];
}?> </p></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" id="email"><p class="err"><?php if (array_key_exists("email",$error))
{
echo $error["email"];
}?></p></div>
                <div class="form-group"><input class="form-control" type="tel" name="phone" placeholder="Phone Number" id="phone">
           <p class="err"><p class="err"> <?php if (array_key_exists("phone",$error))
{
echo $error["phone"];
}?></p></div>
                <div class="form-group">
                    <div><label>Knowledge about Block Chain</label>
                    <input type="hidden" name="kno" value="">
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="kno" value="yes"><label class="form-check-label" for="formCheck-1">Yes</label>
                    </div>
                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="kno" value="no"><label class="form-check-label" for="formCheck-2">No</label></div>
                       <p class="err"> <?php if (array_key_exists("kno",$error))
{
echo $error["kno"];
}?></p>
                    </div>
                </div>
                <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="register" name="submit"></div>
            </form>
        </div>
    </div>
    <script src="form/wassets/js/jquery.min.js"></script>
    <script src="form/wassets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>