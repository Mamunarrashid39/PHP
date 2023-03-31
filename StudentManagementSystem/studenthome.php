<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif ($_SESSION['usertype']!='student')
{
    header("location:login.php");
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
    <link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



</head>
<body>
<header class="header">
    <a href="">Student Dashboard</a>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">logout</a>
    </div>
</header>


<aside>
    <ul>
        <li>
            <a href="">Admission</a>
        </li>
        <li>
            <a href="">Add Teacher</a>
        </li>
        <li>
            <a href="">view teacher</a>
        </li>
        <li>
            <a href="">Add Student</a>
        </li>
        <li>
            <a href="">View student</a>
        </li>
        <li>
            <a href="">Add Courses</a>
        </li>
        <li>
            <a href="">View Courses</a>
        </li>
    </ul>
</aside>


<div class="content">

    <h1>Sidebar Accordion</h1>

    <p>In this example, we have added an accordion and a dropdown menu inside the side navigation.

        Click on both to understand how they differ from each other. The accordion will push down the content, while the dropdown lays over the content.</p>

    <input type="text" name="">


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>