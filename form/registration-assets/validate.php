<?php
function sanitize($arr){

    $sanitize_arr=[];
    foreach($arr as $key => $value){
        if(!is_array($value))
        { 
            $data=trim($value);
            $data=stripslashes($data);
            $data=htmlspecialchars($data,ENT_QUOTES,'UTF-8');
            $sanitize_arr[$key]=$data;
        }else{
           
            foreach($value as $v)
            {   
                
                $data=trim($v);
                $data=stripslashes($data);
                $data=htmlspecialchars($data,ENT_QUOTES,'UTF-8');
                $arry[]=$data;
            }
            //unset($arry["event"]);
            
          $sanitize_arr[$key]=$arry;
        }
    }
      
      return $sanitize_arr;
}
function validate($arr){
    $error=[];
    foreach($arr as $key => $value)
    {
        switch($key)
        {
            case "name":
                if(empty($value)){
                    $error["name"]="please fill the name";
                }
            break;
            case "college":
                 if(empty($value)){
                    $error["college"]="please fill the college";
                }
            break;
            case "dept":
                 if(empty($value)){
                    $error["dept"]="please fill the dept";
                }
            break;
            case "year":
                 if(empty($value)){
                    $error["year"]="please fill the year";
                }
            break;
            case "gender":
                 if(empty($value)){
                    $error["gender"]="please fill the gender";
                }
            break;
            case "email":
                if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $error["email"]="Enter valid Email";
                }
            break;
            case "phone":
                $len=strlen($value);
                 if(empty($value)){
                   $error["phone"]="please fill the phone number";
                 }elseif(!preg_match_all("/^[6-9]+[0-9]/",$value) or $len!=10 ){
                    $error["phone"]="please fill the valid phone number";
                }
            break;
            case "kno":
                 if(empty($value)){
                    $error["kno"]="please provide knowledge about blockchain";
                }
            break;
            case "event":
               
                if(count($value)<2)
                 {
                     $error["event"]="please select atleast one event";
                }
            break;
        }//switch
    }//for
    
    return $error;
}
?>