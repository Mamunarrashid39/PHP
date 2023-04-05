
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
$user ="root";
$password ="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql= "SELECT * FROM admission";

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


</head>
<body>

<?php
include 'admin_sidebar.php';
?>

<div class="content">

   <center>

       <h1>Applied For Admission</h1>
       <br>
       <table border="1px">
           <tr>
               <th style="padding: 20px; font-size:15px;">Name</th>
               <th style="padding: 20px; font-size:15px;">Email</th>
               <th style="padding: 20px; font-size:15px;">Phone</th>
               <th style="padding: 20px; font-size:15px;">Message</th>

           </tr>

           <?php
           while ($info=$result->fetch_assoc())
           {

               ?>

               <tr>
                   <td style="padding: 20px">
                       <?php echo "{$info['name']}" ; ?>
                   </td>
                   <td style="padding: 20px">
                       <?php echo "{$info['email']}" ; ?>

                   </td>
                   <td style="padding: 20px">
                       <?php echo "{$info['phone']}" ; ?>

                   </td>
                   <td style="padding: 20px;">
                       <?php echo "{$info['message']}" ; ?>
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