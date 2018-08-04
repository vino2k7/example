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
<a href="<?php echo base_url(); ?>home/logout" style="float:right;">Logout</a>
<?php if(!empty($res)) { ?>
<?php foreach($res as $value): ?>
<form name="update" id="update" method="POST" action="" />	
<table width="100%">
<tr>
<td>Username:</td>
<td><input type="text" name="uname" id="uname" value="<?php echo $value['uname'];?>" /></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" value="<?php echo $value['email'];?>" /></td>
</tr>
<tr>
<td>Gender:</td>
<td><input type="radio" name="gender" id="gender" value="Male" <?php if($value['gender'] == 'Male') { ?>checked <?php } ?> />Male
<input type="radio"  name="gender" id="gender" value="Female" <?php if($value['gender'] == 'Female') { ?> checked <?php }  ?> />Female
</tr>
<tr>
<td>Mobile:</td>
<td><input type="text" name="mob" id="mob" value="<?php echo $value['mobile'];?>" />
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" id="submit" value="Update" /></td>	
</tr>
</table>
</form>
<?php endforeach; ?>
<?php } ?>
</body>
</html>