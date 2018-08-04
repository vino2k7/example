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
<a href="<?php echo base_url(); ?>home/update" style="float:left;">Edit</a>
<a href="<?php echo base_url(); ?>home/logout" style="float:right;">Logout</a>
<?php foreach($res as $val) : ?>
<form name="profile" id="profile" method="POST" action="" />	
<table width="100%">
<tr>
<td>Username:</td>
<td><?php echo $val['uname']; ?></td>
</tr>
<tr>
<td>Email:</td>
<td><?php echo $val['email']; ?></td>
</tr>
<tr>
<td>Gender:</td>
<td><?php echo $val['gender']; ?></td>
</tr>
<tr>
<td>Mobile:</td>
<td><?php echo $val['mobile'];?></td>
</tr>
</table>
</form>
<?php endforeach; ?>
</body>
</html>