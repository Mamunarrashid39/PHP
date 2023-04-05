
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

      <h1>Applied For Admission</h1>



  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>