
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

if(isset($_POST['add_teacher']))
{
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

$sql="INSERT INTO teacher(name,description,image) VALUES ('$t_name','$t_description','$dst_db')";

$result=mysqli_query($data,$sql);
if($result)
{
    header('location:admin_add_teacher.php');
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
        <h1> Add Teacher</h1>


           <div class="dev_deg">
               <form action="#" method="POST" enctype="multipart/form-data">
                   <div>
                       <label>Teacher Name:</label>
                       <input type="text" name="name">
                   </div>
                   <div>
                       <label>Description:</label>
                       <textarea name="description"></textarea>
                   </div>
                   <div>
                       <label>Image :</label>
                       <input type="file" name="image">
                   </div>

                   <div>

                       <input type="submit" name="add_teacher" class="btn btn-primary"  value="Add teacher">
                   </div>
               </form>
           </div>


    </center>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>