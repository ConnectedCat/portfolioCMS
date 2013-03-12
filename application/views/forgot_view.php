<div id="forgot">
<h2>If you do not remember your Username or Password please fill out the form. <br />
The information will be sent to your email.</h2>
<?php

echo form_open('admin/login/send_info');
echo form_input('first_name', set_value('first_name', 'First Name'));
echo form_input('last_name', set_value('last_name', 'Last Name'));
echo form_submit('send_email', 'Send email');

?>

<?php echo validation_errors('<div class="error">', '</div'); ?>
</div>