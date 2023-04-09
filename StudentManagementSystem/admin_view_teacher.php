

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

$sql="SELECT * FROM teacher ";

$result=mysqli_query($data,$sql);

?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Dashboard</title>

    <?php

    include 'admin_css.php';
    ?>


    <style type="text/css">
        .table_th
        {
            padding: 20px;
            font-size: 20px;
        }
        .table_td
        {
            padding: 20px;
            background-color: skyblue;
        }
    </style>

</head>
<body>

<?php
include 'admin_sidebar.php';

?>


<div class="content">
<center>


    <h1>View All Teacher Data</h1>
    <table border="1px">
        <tr>
            <th class="table_th">Teacher Name</th>
            <th class="table_th">About Teacher</th>
            <th class="table_th">Image</th>
        </tr>

        <?php
        while($info=$result->fetch_assoc())
        {


        ?>
        <tr>
            <td class="table_td">
                <?php   echo " {$info['name']}"?>
            </td>
            <td class="table_td">
                <?php   echo " {$info['description']}"?>
            </td>
            <td class="table_td">

             <img  height="100px"width="100px" src=" <?php   echo " {$info['image']}" ?>">
            </td>

        </tr>

        <?php
        }
        ?>
    </table>


</center>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>