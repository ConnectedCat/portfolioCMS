<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Savage Inc.</title>

<script language="javascript" type="text/javascript">
function sendData(location, value)
{
  window.location = 'http://connectedcatmedia.com/savage/' + location + '?' + value;
}
</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/style.css" />

</head>
<body>
<div id="admin_login">
<h2>Please log-in</h2>

<?php

echo form_open('admin/login/validate');
echo form_input('username', 'Username');
echo form_password('password', 'Password');
echo form_submit('submit', 'Login');
echo anchor('admin/login/forgot', 'Forgot password/username');

?>

<?php
echo validation_errors('<p class="errors"');
?>
</div>
</body>
</html>