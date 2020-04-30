<?php   session_start();
        include ('processreg.php');
        session_destroy();
        ?>
   <?php if(!empty($_SESSION['message1'])){
         echo"<span style= 'color:red'>". $message= $_SESSION['message1']."</span>";
         }
    ?>
<form action="reg.php" method="POST" >
    <p>
        Firstame:<br><input type="text" name="firstname" placeholder="Enter firstname"
       <?php  if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['firstname'];
     };?>><?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>   
    </p>
    <p>
        <label>Lastame:</label><br>
        <input type="text" name="lastname" placeholder="Enter lastname"
        <?php  if(isset($_SESSION['lastname']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['lastname'];
     };?>> <?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?><br>
    </p>
    </p>
        phone number:<br><input type="text" name="phone" placeholder="Enter phone Offered"
        <?php  if(isset($_SESSION['phone']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['phone'];
     };?>><br> 
    </p>
    </p>
        Region :<br><input type="text" name="region" placeholder="Enter region"
        <?php  if(isset($_SESSION['region']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['region'];
     };?>><br> 
    </p>
    </p>
        Province:<br><input type="text" name="province" placeholder="Enter province"
        <?php  if(isset($_SESSION['province']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['province'];
     };?>><br> 
    </p>
    <p>  
        <label>Email:</label><br>
        <input type="text" name="email" placeholder="Enter email"
        <?php  if(isset($_SESSION['email']) && !empty($_SESSION['firstname'])){
        echo "value=".$_SESSION['email'];
     }?>><?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror."</span>";?><br>
    </p>
    <p>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Enter password">
    </p>
    <p>
        <label>Select gender:</label><br>
        <select name="gender">
            <label>Select Department:</label><br>
            <option>Select Gender</option>
            <option <?php if(isset($_SESSION['female']) && !empty($_SESSION['gender'])){
           echo "Female";
        };?>>Female</option>
            <option <?php if(isset($_SESSION['male']) && !empty($_SESSION['gender'])){
           echo "Male";
        };?>>Male</option>
        </select><br>
    </p>
    <p>
        <label>Select Department:</label><br>
        <select name="department">
            <label>Select Department:</label><br>
            <option>Select your department</option>
            <option <?php if(isset($_SESSION['Social Media']) && !empty($_SESSION['department'])){
           echo "selected"."Social Media";
        };?>>Social Media</option>
            <option <?php if(isset($_SESSION['Frontend Design']) && !empty($_SESSION['department'])){
           echo "selected"."Frontend Design";
        };?>>Frontend Design</option>
            <option <?php if(isset($_SESSION['Backend/Coding']) && !empty($_SESSION['department'])){
           echo "selected"."Backend/Coding";
        };?>>Backend/Coding</option>
            <option <?php if(isset($_SESSION['Graphics Design']) && !empty($_SESSION['department'])){
           echo "selected"."Graphics Design";
        };?>>Graphics Design</option>
        </select><br>
    </p>
    <p>
        <label>Select Position:</label><br>
        <select name="position">
            <label>Select</label>
            <option>Select your position</option>
        <option <?php if(isset($_SESSION['HOD']) && $_SESSION['position']){
           echo "selected"."HOD";
        };?>>HOD</option>
            <option <?php  if(isset($_SESSION['REP']) && $_SESSION['position']){
           echo "selected"."REP";
        };?>>REP</option>
            <option <?php  if(isset($_SESSION['MEMBER']) && $_SESSION['position']){
           echo "selected"."MEMBER";
        };?>>MEMBER</option>
        </select><br><br>
        <input type="submit" name="Sign up">
    </p>
       </form>
<p>    
    <label> Click here for forget password</label>
   <a href="forgetpassword.php"><button type="submit">Forget password</button></a>
</p>
