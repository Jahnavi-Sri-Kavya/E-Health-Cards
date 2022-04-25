<html>
<head>
<link rel="shortcut icon" type="image/png" href="favicon.png">
<title>Admin Page</title>
<style>
textarea {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 25px;
  line-height: 20px;
  text-decoration: none;
}
button{
  width: 10%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none;
  background-color: #00008b;
  color: white;
  cursor: pointer;
  }
button:hover {
  opacity: 1;
  background-color: #00009b;
  }

label{
font-size:25px;
}

textarea:hover{
  opacity: 1;
}

</style>
</head>
<body>

<br>

      <h2 style="text-align:center;color:#00008b;font-size:50px;">My Profile</h2>
      <form action="" method="post">
      <div align="center">
<?php

$link = mysqli_connect("localhost", "root", "", "admindb");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM admintable";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>=0){
      while($row = mysqli_fetch_array($result)){ ?>
<table>
<tr><td><b><label for id="un">Username: </label></b></td>
<td><textarea id="un" name="username" readonly="readonly"><?php echo $row['username'];?></textarea></td></tr>
<tr><td><b><label for id="name">Name: </label></b></td>
<td><textarea id="name" name="name" readonly="readonly"><?php echo $row['name'];?></textarea></td></tr>
<tr><td><b><label for id="pwd">Password: </label></b></td>
<td><textarea id="pwd" name="password" readonly="readonly"><?php echo $row['password'];?></textarea></td></tr>
<tr><td><b><label for id="ea">Email Address: </label></b></td>
<td><textarea id="ea" name="Email" readonly="readonly"><?php echo $row['emai'];?></textarea></td></tr>


</table>
<button style="width:10%;padding: 12px 20px;margin: 8px 0;display:inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;" ><td><a style="color:white;text-decoration:none;" href="Adminpage.html">Back</a></button>
      </div>
<?php
        }?>

  </form>
<?php
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
</div>



</body>
</html>