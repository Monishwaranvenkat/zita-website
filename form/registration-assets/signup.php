<?php

//include connection class
function check($phone,$email){
    $err=[];
    include("connect.php");
    $phone_check="select * from workshop where mobile=$phone";
    $email_check="select * from workshop where email='$email'";
    $phone_row=mysqli_query($conn,$phone_check);
    $email_row=mysqli_query($conn,$email_check);
    if(mysqli_num_rows($phone_row)>0)
    {
         $err["phone"]="phone number already exist";
    }
    if(mysqli_num_rows($email_row)>0)
    {
        $err["email"]="Email already exist";
    }
    return $err;
}
function signup($arr){
    include("connect.php");
    $name=$arr["name"];
    $college=$arr["college"];
    $dept=$arr["dept"];
    $year=$arr["year"];
    $gender=$arr["gender"];
    $email=$arr["email"];
    $mobile=$arr["phone"];
    $knowledge=$arr["kno"];
    $query="insert into workshop (name,college,dept,year,gender,email,mobile,knowledge) values ('$name','$college','$dept','$year','$gender','$email',$mobile,'$knowledge')";
    if (mysqli_query($conn, $query)) {
       $flag=send_mail($email,$name);
            $estaus="UPDATE `workshop` SET `estatus` = '$flag' WHERE `workshop`.`email` = '$email'";
            mysqli_query($conn, $estaus);
		echo "<script type='text/javascript'>alert('you have registerd sucesfully');</script>";
	 } else {
		echo "<script type='text/javascript'>alert('sorry someerror occured');</script>";
	 }
	 mysqli_close($conn);
}
function send_mail($email,$name){
    $style='style="
    width:100%;
    height:200px;
    background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
    color:"white";
    "';
    require 'mail/PHPMailerAutoload.php';
    $mail=new PHPMailer;
   // $mail->isSMTP();
    $mail->Host="smtpout.secureserver.net";
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='zita@zitautsaha.in';
    $mail->Password='Utsaha@2020';
    $mail->setFrom("zita@zitautsaha.in");
    $mail->addAddress($email);
    $mail->addReplyTo('');
    $mail->isHTML(true);
    $mail->Subject='Workshop confirmation mail';
    $mail->Body="
    
    
   <html>
<head>
<style>
style='Margin-top:0px;
Margin-bottom:0px;
font-family:'gdsherpa',Helvetica,Arial,sans-serif;
font-size:14px;
line-height:24px'
}
</style>
</head>
<body>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#F5F5F5'>
    <tbody><tr>
	<td bgcolor='#F5F5F5' style='background-color:#f5f5f5;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0'>
		<div style='max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px'>
			
<table bgcolor='#FFFFFF' width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='font-family:sans-serif;color:#111111'>
	<tbody><tr>
	<td bgcolor='#FFFFFF' align='left' style='padding-top:40px;padding-bottom:0;padding-right:40px;padding-left:40px;text-align:left;background-color:#ffffff'>

		<p>
		<b>Dear  $name,</b>
                 <br><br>
                  Thank you for registering  Workshop on <b>'BLOCK CHAIN TECHNOLOGY'</b>. We seek your presence on 21.02.2020 before 9.00AM at IT park,KSRCT.<br>
		</p>
                          <p style='font-size:20px;text-align:center;'><strong >'UTSAHA  2020'</strong></p> 
			<P style='text-align:center; font-size:15px;'><br><b>'ALL THE BEST'&nbsp;Mr/Ms $name </b></p>
   <p>
		For Further Queries:<br>
		Navinkumar  K<br>
		PHONE:8870575314.<br>
		</p>
                        
	</td>
	</tr>
</tbody></table>
            
		</div>
	</td>
	</tr>
</tbody></table>
</body>
</html>
    
    
    ";
    if(!$mail->send()){
        return "unsuccess";
    }else{
        return "success";
    }
}










//sympocode
function sympo_check($phone,$email){
    $err=[];
    include("connect.php");
    $phone_check="select * from student_detail where mobile=$phone";
    $email_check="select * from student_detail where email='$email'";
    $phone_row=mysqli_query($conn,$phone_check);
    $email_row=mysqli_query($conn,$email_check);
    if(mysqli_num_rows($phone_row)>0)
    {
         $err["phone"]="phone number already exist";
    }
    if(mysqli_num_rows($email_row)>0)
    {
        $err["email"]="Email already exist";
    }
    return $err;
}




//symposignup
function sypmo_signup($arr){
    
    include("connect.php");
    $flag=true;
    $name=$arr["name"];
    $college=$arr["college"];
    $dept=$arr["dept"];
    $year=$arr["year"];
    $gender=$arr["gender"];
    $email=$arr["email"];
    $mobile=$arr["phone"];
    $event=$arr["event"];
    $query="insert into student_detail (name,college,dept,year,gender,email,mobile) values ('$name','$college','$dept','$year','$gender','$email',$mobile)";
    if (mysqli_query($conn, $query)) {
       $id=mysqli_insert_id($conn);
       
        foreach ($event as $e)
        {   if($e !="")
            {
                $listevent=$listevent.", ".$e;
             $equery="insert into eventlist (id,event) values ($id,'$e');";
             if(!mysqli_query($conn,$equery))
             {
                   echo "<script type='text/javascript'>alert('sorry someerror occured');</script>";
                   $flag=false;
                  
                 break;
             }}
        }if($flag)
        {
         
            $eflag=sympo_mail($email,$name,$listevent);
            $estaus="UPDATE `student_detail` SET `estatus` = '$eflag' WHERE `student_detail`.`email` = '$email'";
            mysqli_query($conn, $estaus);
            echo "<script type='text/javascript'>alert('you have registerd sucesfully');</script>";
        }
	 } else {
		echo "<script type='text/javascript'>alert('sorry someerror occured');</script>";
	 }
	 mysqli_close($conn);

}

function sympo_mail($email,$name,$listevent){
    $style='style="
    width:100%;
    height:200px;
    background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
    color:"white";
    "';
    require 'mail/PHPMailerAutoload.php';
    $mail=new PHPMailer;
   // $mail->isSMTP();
    $mail->Host="smtpout.secureserver.net";
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='zita@zitautsaha.in';
    $mail->Password='Utsaha@2020';
    $mail->setFrom("zita@zitautsaha.in");
    $mail->addAddress($email);
    $mail->addReplyTo('');
    $mail->isHTML(true);
    $mail->Subject='Symposium confirmation mail';
    $mail->Body="
    
    <html>
<head>
<style>
style='Margin-top:0px;
Margin-bottom:0px;
font-family:'gdsherpa',Helvetica,Arial,sans-serif;
font-size:14px;
line-height:24px'
}
</style>
</head>
<body>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#F5F5F5'>
    <tbody><tr>
	<td bgcolor='#F5F5F5' style='background-color:#f5f5f5;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0'>
		<div style='max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px'>
			
<table bgcolor='#FFFFFF' width='100%' align='center' border='0' cellspacing='0' cellpadding='0' style='font-family:sans-serif;color:#111111'>
	<tbody><tr>
	<td bgcolor='#FFFFFF' align='left' style='padding-top:40px;padding-bottom:0;padding-right:40px;padding-left:40px;text-align:left;background-color:#ffffff'>

		<p>
		<b>Dear  $name,</b>
                 <br><br>
                  Your  registration  on &nbsp;$listevent
                  with KSRCT [IT] has been successfully done.We expect your presence on 22.02.2020 on or before 9.00 AM at IT park,KSRCT.<br>
                  For  paper presentation mail the abstract before 20/02/2020 to zitautsaha@gmail.com<br>
		</p>
                          <p style='font-size:20px;text-align:center;'><strong >'UTSAHA  2020'</strong></p>
						  
          <p><strong>You can also further engage with the following events : </strong> <br>
              1.Paper Presentation<br>
              2.Project Presentation<br>
              3.Idea Builder<br>
              4.Web Tech<br>
              5.Blind Coding<br>
              6.Surf Net<br>
              7.Talkathon<br>
              8.Hackathon<br>
                 &nbsp;   &nbsp; *Debugging<br>
                  &nbsp;   &nbsp; *Code Contest<br>
              9.Technical Quiz<br>
             10.Treasure Hunt<br>
             11.Photography&Videography
			 </p>
   <p style='text-align:center;'><b>Spot entries are also available.
   <br>'ALL THE BEST'&nbsp;Mr/Ms&nbsp; $name</b></p>
   <p>
		For Further Queries:<br>
		Sivasangeeth P (9698614119)<br>
		Suhitha V (9952721043)<br>
		Siva S (9443806852)<br>
		Kailash M S (9842707747)<br>
		</p>
                        
	</td>
	</tr>
</tbody></table>
            
		</div>
	</td>
	</tr>
</tbody></table>
</body>
</html>
    
    ";
    if(!$mail->send()){
        return "unsuccess";
    }else{
        return "success";
    }
}

?>