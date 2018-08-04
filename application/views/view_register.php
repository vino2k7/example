<!Doctype html>
<html>
<head>
<style type="text/css">
.err_msg
{
	color:#ff0000;
}
</style>	
</head>
<body>
<div class="err_msg">	
<?php echo validation_errors(); ?>	
<?php if(isset($msg)) { echo $msg;} ?>
</div>
<form name="register" id="register" method="POST" action=""  autocomplete="off"/>	
<table width="100%">
<tr>
<td>Username:</td>
<td><input type="text" name="uname" id="uname" value="" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pword" id="pword" value="" /></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" value="" /></td>
</tr>
<tr>
<td>Gender:</td>
<td><input type="radio" name="gender" id="gender" value="Male" checked />Male
<input type="radio"  name="gender" id="gender" value="Female" />Female
</tr>
<tr>
<td>Mobile:</td>
<td><input type="text" name="mob" id="mob" value="" />
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" id="submit" value="Register" /></td>	
</tr>
</table>
</form>
</body>
</html>