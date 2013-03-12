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
<div id='cms_menu'>
<ul>
  <li>
  <?php echo anchor('admin/image_management', 'Image Management');?>
  </li>
  <li>
  <?php echo anchor('admin/content_management', 'Content Management');?>
  </li>
  <li>
  <?php echo anchor('', 'user view', 'target = "_blank"');?>
  </li>
</ul>
</div>