
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='teacher')
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM user where usertype ='teacher'";

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
<center>

    <div class="content">

        <h1>Teacher Data</h1>

        <?php

        if(isset($_SESSION["message"]))
        {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }


        //        if($_SESSION["message"])
        //        {
        //            echo $_SESSION['message'];
        //
        //        }
        //        unset($_SESSION['message']);

        ?>




        <table border="1px">
            <tr>
                <th class="table_th">UserName</th>
                <th class="table_th">Email</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Password</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>


            </tr>

            <?php

            while ($info=$result->fetch_assoc())

            {

                ?>

                <tr>
                    <td class="table_td">
                        <?php echo " {$info['username']}";  ?>
                    </td>
                    <td class="table_td">
                        <?php echo " {$info['email']}";  ?>
                    </td>
                    <td class="table_td">
                        <?php echo " {$info['phone']}" ; ?>
                    </td>
                    <td class="table_td">
                        <?php echo " {$info['password']}";  ?>
                    </td>
                    <td class="table_td">
                        <?php echo " <a onclick=\"JavaScript:return confirm('Are you sure to delete this');\" class='btn btn-danger' href='delete.php?student_id={$info['id']}'> Delete </a>";  ?>
                    </td>

                    <td class="table_td">
                        <?php echo " <a class='btn btn-primary' href='update_student.php?teacher_id={$info['id']}'> Update </a>";  ?>
                    </td>


                </tr>

                <?php

            }

            ?>

        </table>

    </div>

</center>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>