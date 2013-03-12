<div id="content">
  <div id="mailer">
    <?php echo form_open('contact/index'); ?>
    <?php echo form_input('first_name', 'Your First Name'); ?>
    <?php echo form_input('last_name', 'Your Last Name'); ?>
    <?php echo form_input('email_address', 'Your Email Address'); ?>
    <br />
    <?php echo form_textarea('email_text'); ?>
    <?php echo form_submit('email_submit', 'Send'); ?>
    
    <?php echo form_close(); ?>
    
    <?php echo $message; ?>
  </div>
</div>