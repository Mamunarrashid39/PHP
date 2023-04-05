
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='student')
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

    $check ="SELECT * FROM user WHERE username ='$username'";

    $check_user=mysqli_query($data ,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1)
    {
        echo "username allready exist. try another one";
    }
    else
    {


        $sql ="INSERT INTO user ('username','email','phone','usertype','password') values
                        ($username,$user_email,$user_phone,$usertype,$user_password)";

        $result =mysqli_query($data,$sql);

        if ($result) {
            echo "<script> console.log(alert(Data update successfull))  </script>";
        } else {
            echo "upload failed";
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Dashboard</title>

 <style type="text/css">
     label{
         display: inline-block;
         text-align: right;
         width: 100px;
         padding-top: 10px;
         padding-bottom: 10px;
     }
     .dev_deg{
         background-color: skyblue;
         width: 400px;
         padding-top: 70px;
         padding-bottom: 70px;
     }
 </style>
    <?php

    include 'admin_css.php';
    ?>


</head>
<body>

<?php
include 'admin_sidebar.php';

?>


<div class="content">

    <center>
        <h1> Add Student</h1>

        <div class="dev_deg">
            <form method="post">
                <div>
                    <label>username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <div>

                    <input type="submit" name="add_student" class="btn btn-primary"  value="Add Student">
                </div>
            </form>
        </div>

    </center>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>