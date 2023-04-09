
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


$id = $_GET['student_id'];

    $sql=" SELECT * FROM user WHERE id ='$id' ";

    $result=mysqli_query($data,$sql);

    $info = $result->fetch_assoc();


    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $query ="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";





        $result2=mysqli_query($data,$query);

        if ($result2)
        {
            header("location:view_student.php");
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
    <title> Student Dashboard</title>

    <?php

    include 'admin_css.php';
    ?>
    <style type="text/css">
        label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .dev_deg{
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
        }

    </style>


</head>
<body>

<?php
include 'admin_sidebar.php';

?>


<div class="content">
    <center>



    <h1>Student Update</h1>

    <div class="dev_deg">
        <from action="#" method="POST">
            <div>
                <label>username</label>
                <input type="text" name="name"
                       value="<?php  echo " {$info['username']}" ; ?>">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email"  value=" <?php  echo "{$info['email']}"; ?>"
                >

            </div>
            <div>
                <label>Phone</label>
                <input type="number" name="phone"  value=" <?php  echo " {$info['phone']}"; ?>"
                >
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password" value="<?php  echo " {$info['password']}" ; ?>">
            </div>
            <div>
                <input class="btn btn-success" type="submit" name="update" value="Update">
            </div>
        </from>
    </div>
    </center>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>