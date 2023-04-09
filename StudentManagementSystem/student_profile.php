<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
//elseif ($_SESSION['usertype']!='student')
//{
//    header("location:login.php");
//}

elseif ($_SESSION['usertype']=='admin')
{
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE  username='$name'";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);

if(isset($_POST['update-profle']))
{
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];
    $sql2="UPDATE user SET email='$s_email',phone='$s_phone', password='$s_password' WHERE username='$name'";

    $result2=mysqli_query($data,$sql2);
    if($result2)
    {
        header('location:student_profile.php');
    }
    else{
        echo "Fail Update";
    }
}

?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title> Student Dashboard</title>-->
<!--</head>-->
<!--<body>-->
<!--<h3>Student Home</h3>-->
<!--<a href="logout.php">Logout</a>-->
<!--</body>-->
<!--</html>-->




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Student Dashboard</title>


    <?php
    include 'student_css.php'
    ?>
<style type="text/css">
    .content
    {
        margin-left: 20%;
        margin-top: 5%;
    }
    label{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .dev_deg{
        background-color: skyblue;
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;

    }
</style>

</head>
<body>
<?php
include 'student_sidebar.php'
?>


<div class="content">

    <center>
<h2>Update Profile</h2>
        <br>

    <from action="#" method="POST">
        <div class="dev_deg">


<!--        <div>-->
<!--            <label>Name</label>-->
<!--            <input type="text" name="name" value="--><?php // echo " {$info['username']}"?><!--">-->
<!--        </div>-->
        <div>
            <label>Email</label>
            <input type="email" name="name" value="<?php  echo " {$info['email']}"?>">
        </div>
        <div>
            <label>Phone</label>
            <input type="number" name="phone" value="<?php  echo " {$info['phone']}"?>">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" value="<?php  echo " {$info['password']}"?>">
        </div>
        <div>

            <input type="submit" class="btn btn-primary" name="update-profle">
        </div>
        </div>
    </from>
    </center>

</div>


</body>
</html>