<?php

$con=mysqli_connect('localhost','root','');

if (!$con)
{
echo 'Not Connected To Server';
}

if (!mysqli_select_db($con,'doctorregistration'))
{
echo 'Database Not Selected';
}

if(isset($_POST['submit2'])){

    $uname = mysqli_real_escape_string($con,$_POST['username2']);
    $password = mysqli_real_escape_string($con,$_POST['password2']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from doctortable where doctorname='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('refresh:1;url=doctorpage.php');
            
        }else{
            echo "Invalid username and password";
            header('refresh:2;url=HMS.html');
        }

    }

}?>