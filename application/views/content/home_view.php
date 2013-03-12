<div id="content">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.cycle.all.js"></script>
<script>
$(document).ready(function () {
$("#slideshow").css("overflow", "hidden");
   
		 $("#slides").cycle({
			fx: 'fade',
			timeout: 4000,
			speed: 200,
			delay: -2000,
			slideResize: false,
			containerResize: false,
		 });
});
</script>

  <div id = "slideshow">
  	<ul id = "slides">
    <?php
  	foreach($images as $image){
  	?>
    <li><img src="<?php echo $image->location_path;?>" /></li>
    <?php } ?>
    </ul>
  </div>
  
  <div id="about">
  <h2><?php echo $text[0]->title; ?></h2>
  <p><?php echo $text[0]->content; ?></p>
  </div>
  
</div>