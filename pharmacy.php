<?php
$con=mysqli_connect('localhost','root','');

if (!$con)
{
echo 'Not Connected To Server';
}

if (!mysqli_select_db($con,'pharmacydb'))
{
echo 'Database Not Selected';
}
		
    $username = $_POST['username'];
    $phone = $_POST['telno'];
    $quali = $_POST['qualification'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $add = $_POST['address'];


    $sql = "INSERT INTO pharmacytable (username, phonenumber,qualification,email,password,address) VALUES ('$username',$phone,'$quali','$email','$pwd','$add')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo "Records added successfully.";
    }

header("refresh:2; url=Adminpage.html");
?>

