<h3>PSF SUGGESSTION & COMPLAIN FORM<br></h3>
<?php
@session_start();

$errorcount = 0;
@$firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorcount++;
@$lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorcount++;
@$phone = $_POST['phone'] != "" ? $_POST['phone'] : $errorcount++;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$region = $_POST['region'] != "" ? $_POST['region'] : $errorcount++;
@$province = $_POST['province'] != "" ? $_POST['province'] : $errorcount++;
@$department = $_POST['department'] != "" ? $_POST['department'] : $errorcount++;
@$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorcount++;
@$complain = $_POST['complain'] != "" ? $_POST['complain'] : $errorcount++;

$_SESSION['firstname']= str_replace(" ",'',ucfirst($firstname));
$_SESSION['lastname']=str_replace(" ",'',ucfirst($lastname));
$_SESSION['phone']= $phone;
$_SESSION['email']=$email;
$_SESSION['region']= $region;
$_SESSION['province']= $province;
$_SESSION['department']=str_replace(" ",'',ucfirst($department));
$_SESSION['gender']=$gender;
$_SESSION['complain']= $complain;

  //remove for whitespace and check numeric input
  if (!empty($firstname)&&!empty($lastname)&&!empty($phone)&&!empty($email)&&!empty($region)&&!empty($province)&&!empty($department)&&!empty($gender)&&!empty($complain)){
    
    if(strlen($firstname)>=2 && strlen($lastname)>=2){
    
      if (ctype_alpha($firstname) && ctype_alpha($lastname) ){
        
        if (preg_match("/[@]/",$email)){
                   
           if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
      //Checking database
      $allUsers= scandir("complainDB");
      $countallUsers= count($allUsers);
      $nextUserid=($countallUsers-2);
      //complain data
     $complain_file=[
      'id'=> $nextUserid,
      'firstname'=>$firstname,
      'lastname'=>$lastname,
      'phone'=>$phone,
      'email'=>$email,
      'region'=>$region,
      'province'=>$province,
      'department'=>$department,
      'gender'=>$gender,
      'complain'=>$complain,
     ];
              

              //save complain data into file
              file_put_contents("complainDB/complain".$department.$email. ".json",json_encode($complain_file));
              $_SESSION['message']="You have Succesfully booked your complain ";
                  header("Location: dashboard.php");
                  die();
            
            }
        }else{
          $emailerror= "$email incorrect email <br>";
        }
     }else{
      $alphanumerror= "Enter only alphabet ";
     }
    }else{
      $nameerror= "Name enter less than 2";  
    }
  }else{
        echo "fill in all fields in the form";
  }
   
    //}else{
    //  echo "Welcome";
   // } 
?>