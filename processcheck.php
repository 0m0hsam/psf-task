<?php 

function feedback(){

          // To check complain feedback
          if(isset($_POST['department'])&&!empty($_POST['department'])&&isset($_POST['email'])&&!empty($_POST['email'])){
            $department=str_replace( ' ','',str_replace('/','',$_POST['department']));
            $email=$_POST['email'];
  
            
             $alllogout= scandir("complainDB");
      $countalllogout= count($alllogout);
      $nextUserid=($countalllogout-2);
    
     
        for($counter=0 ; $counter < $countalllogout; $counter++){
         $currentlogout= $alllogout[$counter];
                
          if($currentlogout == "complain".$department.$email.".json"){
              //check complain file
              @$logoutstring= file_get_contents("complainDB/complain".$department.$email.".json");
              @$userObject= json_decode($logoutstring);
              $firstname= $userObject->firstname;
              $lastname= $userObject->lastname;
              $department= $userObject->department;
              $phone= $userObject->phone;
              $email= $userObject->email;
              $complain= $userObject->complain;
              $gender= $userObject->gender;
              $region= $userObject->region;
              $province= $userObject->province;

            //Printout complain 
              echo "Suggestion or complain for $department department";
              echo '<li> Name: '.$firstname.' '.$lastname.'</li>';
              echo '<li> Phone number: '.$phone.'</li>';
              echo '<li> Email: '.$email.'</li>';
              echo '<li> gender: '.$gender.'</li>';
              echo '<li> Department: '.$department.'</li>';
              echo '<li> Region: '.$region.'</li>';
              echo '<li> Province: '.$province.'</li>';
              echo '<li> Complain: '.$complain.'</li>';
              
            die();
          }

          }
          echo "Please check back! $department  department has no pending suggestion or complain. ";

      }else{
        echo "<span style=color:blue>Fill in both department and complain email</span> ";

      }
    
    }

function checkuser(){
echo '<form action="dashboard.php" method="POST">
             <p>
             <h4>Search for logout time<h4>
             <label>Enter Logout Date:<br>in this format 02/05/2020</label><br> <input type="text" name="date"><br>
             <label> Enter User Email:</label><br> <input type="text" name="email">
             <button type="submit">search</button> </form>
             </p>';
             // Search for user in database
            echo'<form action="dashboard.php" method="POST">
            <p>
            <h4>Search for user in database<h4>
            <label>Enter user email:</label><br> <input type="text" name="searchdb" >
            <button type="submit">search</button> </form>
            </p>';
                if(isset($_POST['searchdb'])&&!empty($_POST['searchdb'])){
                  $searchdb=$_POST['searchdb'];

                  if(@$data= file_get_contents("db/User".$searchdb.".json")){

                  @$userObject= json_decode($data);
                  $firstname= $userObject->firstname;
                  $lastname= $userObject->lastname;
                  $position= $userObject->position;
                  $phone= $userObject->phone;
                  $email= $userObject->email;
                  $region= $userObject->region;
                  $gender= $userObject->gender;
                  $province= $userObject->province;
                  echo '<li> Name: '.$firstname.' '.$lastname.'</li>';
                  echo '<li> Gender: '.$gender.'</li>';
                  echo '<li> Position Held: '.$position.'</li>';
                  echo '<li> Phone number: '.$phone.'</li>';
                  echo '<li> Email: '.$email.'</li>';
                  echo '<li> Region: '.$region.'</li>';
                  echo '<li> province: '.$province.'</li>';
                }die();
              }

                   //check user logout time
                if(isset($_POST['date'])&&!empty($_POST['date'])&&isset($_POST['email'])&&!empty($_POST['email'])){
                  $date=str_replace( ' ','',str_replace('/','',$_POST['date']));
                  $email=$_POST['email'];
        
                  
                   $alllogout= scandir("logtime");
            $countalllogout= count($alllogout);
            $nextUserid=($countalllogout-2);
          
           //check if user already exist
              for($counter=0 ; $counter < $countalllogout; $counter++){
               $currentlogout= $alllogout[$counter];

                if($currentlogout == $date.$email.".json"){
                    //check user logout 
                    @$logoutstring= file_get_contents("logtime/$date".$email.".json");
                    @$userObject= json_decode($logoutstring);
                    $logout_time= $userObject->logout_time;
                    echo '<li>'.$email.' last logout time '.$logout_time.'</li>';
                    

                }

                }
            } 
        }
              
         
?>