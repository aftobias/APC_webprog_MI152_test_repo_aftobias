<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add New User</title>
<style>
@charset "utf-8";
/* CSS Document */

*
{
 margin:0;
 padding:0;
}
body
{
 background-color: lightblue;
 font-family:"Courier New", Courier, monospace;
}
#header
{
 width:100%;
 height:50px;
 background:#4CAF50;
 color:lightblue;
 font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
 font-size:35px;
 text-align:center;
}

#header a
{
 color:#fff;
 text-decoration:blink;
}
#body
{
 margin-top:50px;
}
table
{
 width:80%;
 font-family:Tahoma, Geneva, sans-serif;
 font-weight:bolder;
 color:lightblue;
 margin-bottom:80px;
}
table a
{
 text-decoration:none;
 color:lightblue;
}
table,td,th
{
 border-collapse:collapse;
 border:solid lightblue 1px;
 padding:20px;
}
table td input
{
 width:97%;
 height:35px;
 border:dashed lightblue 1px;
 padding-left:15px;
 font-family:Verdana, Geneva, sans-serif;
 box-shadow:0px 0px 0px rgba(1,0,0,0.2);
 outline:none;
}
table td input:focus
{
 box-shadow:inset 1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
}
table td button
{
 border:solid #4CAF50 0px;
 box-shadow:1px 1px 1px rgba(1,0,0,0.2);
 outline:none;
 background:lightblue;
 padding:9px 15px 9px 15px;
 color:white;
 font-family:Arial, Helvetica, sans-serif;
 font-weight:bolder;
 border-radius:3px;
 width:49.5%;
}
table td button:active
{
 position:relative;
 top:1px;
}
</style>
</head>

<body background="http://127.0.0.1/Exercise6/uploads/background1.jpg">

	<form method="post" action="<?php echo base_url();?>index.php/users/insert_users_db">
<div id="header">
 <div id="content">
    <label>Add Data</label>
    </div>
</div>
<div id="body" style="margin-left: 220px;">
 <div id="content">
<table align="center">
    <tr>
		<td align="center"><a href="<?php echo base_url();?>index.php/users/">back to main page</a></td>
    </tr>
    <tr>
    <td><input type="text" name="name" placeholder="Complete Name" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="nickname" placeholder="Nickname" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="email" placeholder="Email Address" required /></td>
    </tr>
	<tr>
    <td><input type="text" name="address" placeholder="Address" required /></td>
    </tr>
	<tr>
    <td>
	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
	</td>
    </tr>
	<tr>
    <td><input type="number" name="cp_number" placeholder="Cellphone Number" required /></td>
	</tr>
	<tr>
    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>

</form>
    </div>
</div>

</body>

</html>