<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Basketball.";
	}
	function myFunction2() {
    document.getElementById("demo").innerHTML = "Baked Macaroni.";
	}
	function myFunction3() {
    document.getElementById("demo").innerHTML = "Facebook";
	}
	function myFunction4() {
    document.getElementById("demo").innerHTML = "Dota2.";
	}
	function myFunction5() {
    document.getElementById("demo").innerHTML = "Growly.";
	}
</script>
<style>
a {
	color: red;
	}
body {
    background-color: lightblue;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

h1 {
    color: green;
}
</style>
<script type="text/javascript">
function show_confirm(act,gotoid)
{
if(act=="Users_edit")
var r=confirm("Do you really want to edit?");
else
var r=confirm("Do you really want to delete?");
if (r==true)
{
window.location="<?php echo base_url();?>index.php/users/"+act+"/"+gotoid;
}
}
</script>
</head>
<body background="http://127.0.0.1/Exercise6/uploads/background1.jpg">

<h1>This is my Home Page</h1>

<table>
  <tr>
    <th>Full name</th>
    <th>Nickname</th>
    <th>Interest</th>
	<th>Favorite Website</th>
  </tr>
  <tr>
    <td>Alfredo Tobias Jr</td>
    <td>Tobi</td>
    <td><img src="http://127.0.0.1/Exercise6/uploads/basketball.jpg" alt="basketball" style="width:150px;height:100px;"></td>
	<td><p><a href="http://www.facebook.com">Facebook</a></p></td>
  </tr>
</table>

<div id="body">
	<div id="content">
		<table align="center">
			<tr>
				<th colspan="9" align="center"> <a href="<?php echo base_url();?>index.php/users/add_form">add data here.</a></th>
			</tr>
			<tr>
				<th>Name</th>
				<th>Nickname</th>
				<th>Email</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Cellphone Number</th>
				<th colspan="2">Operations</th>
			</tr>
			
		<?php foreach ($user_list as $u_key){ ?>

			<tr>

				<td><?php echo $u_key->name; ?></td>

				<td><?php echo $u_key->nickname; ?></td>

				<td><?php echo $u_key->email; ?></td>

				<td><?php echo $u_key->address; ?></td>
				
				<td><?php echo $u_key->gender; ?></td>
				
				<td><?php echo $u_key->cp_number; ?></td>

				<td width="40" align="left" ><a href="#" onClick="show_confirm('Users_edit',<?php echo $u_key->user_id;?>)">EDIT</a></td>

				<td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $u_key->user_id;?>)">DELETE</a></td>

			</tr>

<?php }?>
			
			
		</table>
	</div>
</div>
<h1>Answer</h1>
<p id="demo"></p>

    <h4>What is my Hobby?</h4>
	<button type="button" onclick="myFunction()">Try it</button>
    <h4>What is my favorite food?</h4>
	<button type="button" onclick="myFunction2()">Try it</button>
    <h4>What is my favorite app?</h4>
	<button type="button" onclick="myFunction3()">Try it</button>
	<h4>What is my favorite PC Game?</h4>
	<button type="button" onclick="myFunction4()">Try it</button>
	<h4>Who is my bestfriend?</h4>
	<button type="button" onclick="myFunction5()">Try it</button>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>

</html>	