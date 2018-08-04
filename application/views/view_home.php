<!Doctype html>
<html>
<head>
<style type="text/css">
	.msg
	{
	  text-align: center;	
      color:#007eff;
	}
</style>	
</head>
<body>
<div class="msg">	
<?php
  if(isset($msg)) { echo $msg; }
?>	
</div>
<a href="<?php echo base_url();?>home/register">Register</a>
<a style="float:right;" href="<?php echo base_url();?>home/login">Login</a>
</body>
</html>