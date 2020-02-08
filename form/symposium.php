<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>zita sypmosium reg</title>
    <link rel="stylesheet" href="form/sassets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="form/sassets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="form/sassets/css/styles.css">
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
    <option value="Information Technology" >Information Technology</option><option value="Computer Science">Computer Science</option><option value="Nano Technology">Nano Technology</option>
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
    <option value="Female">Male</option>
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
</body>

</html>