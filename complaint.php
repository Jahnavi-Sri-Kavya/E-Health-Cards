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
		
    $patname = $_POST['name'];
    $phone = $_POST['telno'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $add = $_POST['address'];
    $comp=$_POST['comp'];
    $spec = $_POST['specialist'];


    $sql = "INSERT INTO patientcomp(name, phonenumber,age ,email,dateofbirth,address,complaint,specialist) VALUES ('$patname',$phone,'$age','$email','$dob','$add','$comp','$spec')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo "Records added successfully.";
    }
header("refresh:2; url=Patientpage.php");
?>

