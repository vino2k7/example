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
<?php if(isset($msg)) { echo $msg; } ?>
</div>	
<form name="login" id="login" method="POST" action="" autocomplete="off" />	
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
<td></td>
<td><input type="submit" name="submit" id="submit" value="Login" /></td>	
</tr>
</table>
</form>
</body>
</html>