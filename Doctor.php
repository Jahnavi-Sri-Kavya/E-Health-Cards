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
		
    $docname = $_POST['dname'];
    $phone = $_POST['telno'];
    $quali = $_POST['qualification'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $add = $_POST['address'];
    $spec = $_POST['specialist'];


    $sql = "INSERT INTO doctortable(doctorname, phonenumber,qualification,email,password,address,specialist) VALUES ('$docname',$phone,'$quali','$email','$pwd','$add','$spec')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo "Records added successfully.";
    }

header("refresh:1; url=Adminpage.html");
?>

