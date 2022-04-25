<html>
<head>
<title>Doctor page</title>
<link rel="shortcut icon" type="image/png" href="favicon.png">
<style>
.menuicon {
  width: 35px;
  height: 5px;
  background-color: black;
  margin: 6px 0;
}

.dropbtn {
  background-color: #555;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #777;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #555;
  min-width: 160px;
  overflow: auto;
  
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #777;}

.show {display: block;}

body {font-family: Arial;}

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #555;
}
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
  color: white;
}
.tab button:hover {
  background-color: #777;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

input,
select,.btn {
  width: 50%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none;
}

input:hover,
.btn:hover {
  opacity: 1;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}



</style>
</head>
<body>

<div class="dropdown">
<button  onclick="myFunction()" class="dropbtn">
<div class="menuicon"></div>
<div class="menuicon"></div>
<div class="menuicon"></div></button>
<div id="myDropdown" class="dropdown-content">
    <a href="#">Profile</a>
    <a href="#">Change password</a>
  </div>
</div>
<br>

<div class="tab">
  <button class="tablinks" onclick="opentab(event, 'viewc')">View Complaints</button>
  <button class="tablinks" onclick="opentab(event, 'complaint')">Post The Solution</button>
 
</div>

<div id="viewc" class="tabcontent">

<?php

$link = mysqli_connect("localhost", "root", "", "patientdb");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM patientcomp";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){ ?>
<br>
<table>
<tr><td ><b>Appointment No: </b></td><td><?php echo $row['sno']; ?></td></tr>
<tr><td ><b>Name: </b></td><td><?php echo $row['name']; ?></td></tr>
<tr><td><b>Age: </b></td><td><?php echo $row['age']; ?></td></tr>
<tr><td><b>Date of Birth: </b></td><td><?php echo $row['dateofbirth']; ?></td></tr>
<tr><td><b>Problem: </b></td><td><?php echo $row['complaint']; ?></td></tr><br>
<tr><td><b>Email: </b></td><td><?php echo $row['email']; ?></td></tr>
<tr><td><b>Phone Number: </b></td><td><?php echo $row['phonenumber']; ?></td></tr>

<?php
      } ?>
</table>
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

<div id="complaint" class="tabcontent">
<div class="container">
  <form action="solution.php" method="post">
    <div class="row">
      <h2 style="text-align:center;color:black;">Post the Solution</h2>
      
      <div align="center">
         <input type="text" name="appno" placeholder="Patient Appointment no" required>
        <input type="text" name="prescription" placeholder="Enter the prescription" required>
        <input type="text" name="medicine" placeholder="Enter medicine details"  required>
        <input type="text" name="advice" placeholder="Enter other notes and advice" required>
        <input type="text" name="appdate" placeholder="Appointment Date (format-DD/MM/YYYY)" required>
        <input type="text" name="apptime" placeholder="Appointment Time (format-HH:MM AM/PM)" required>
       
        <input type="submit" name="post" value="Post the Solution">
      </div>
      
    </div>
  </form>
</div>
 
</div>


<script>

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function opentab(evt, Name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}

</script>

</body>
</html>