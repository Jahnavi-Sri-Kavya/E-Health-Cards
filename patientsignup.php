<?php
$con=mysqli_connect('localhost','root','');

if (!$con)
{
echo 'Not Connected To Server';
}

if (!mysqli_select_db($con,'patientdb'))
{
echo 'Database Not Selected';
}
		
    $pname = $_POST['username'];
    $phone = $_POST['telno'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $sql = "INSERT INTO patienttable(username,email,password,phonenumber) VALUES ('$pname','$email','$pwd','$phone')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo "Records added successfully.";
    }

header("refresh:2; url=HMS.html");
?>
