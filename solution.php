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
		
    $ano = $_POST['appno'];
    $pres = $_POST['prescription'];
    $med= $_POST['medicine'];
    $adv = $_POST['advice'];
    $appd = $_POST['appdate'];
    $appt= $_POST['apptime'];

    $sql = "INSERT INTO docsolution(appno,prescription, medicine,advice ,appdate,apptime) VALUES ($ano,$pres,'$med','$adv','$appd','$appt')";

    if(!mysqli_query($con,$sql))
    {
        echo 'Not Inserted';
    }
    else
    {
        echo "Records added successfully.";
    }
header("refresh:2; url=doctorpage.php");
?>

