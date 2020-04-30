<?php session_start();
    include('processcheck.php');

    
?>
<h3> CHECK MEMBER SUGGESTION & COMPLAIN</h3>
<p>
<a href="dashboard.php"><button type="submit">Home</button></a>
</p>
<form action="checkfeedback.php" method="POST">
<p>
    <label>Search to Check all member feedback</label><br>
    <input type="text" name="department" placeholder="checkfeedback Department">
    <input type="text" name="email" placeholder="checkfeedback email">
    <input type="submit" value="Search">
</p>
<?php feedback();?>
</form>