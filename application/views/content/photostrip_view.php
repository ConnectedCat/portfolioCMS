<div id="content">

  <div class="section" style="width: <?php echo $photostrip_width; ?>px">
  <?php
  if($section == 'retouching') 
  {
	  if($sub_section == 'commercial' || $sub_section == 'fashion')
	  { ?>
      		<script type="text/javascript" src="<?php echo base_url(); ?>js/swappable.js"></script>
            <div id="retouch-notice">Please click on the image to compare</div>
	  <?php }
	  if($sub_section == 'fine_art')
	  { ?>
		  <script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
          <link rel="stylesheet" href="<?php echo base_url(); ?>js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
          <script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox.js"></script>
          <div id="retouch-notice">Please click on the image to explore</div>
	  <?php }
  }
  ?>
  <?php
    foreach($images as $image){
    ?>
    <div>
    
	<?php if($image->options == 2 && $image->options_path != 'none') { ?>
    <img src="<?php echo $image->location_path; ?>" height="1000" onclick="toggle(this, '<?php echo $image->options_path; ?>', '<?php echo $image->location_path; ?>')"/>
    <?php } 
	
	elseif($image->options == 1) { ?>
    <a class="various iframe"" href="<?php echo base_url().'index.php/zoom/index/'.$image->id; ?>"><img src="<?php echo $image->location_path; ?>" height="1000"/></a>
    <?php } 
	
	else { ?>
    <img id="theImage" src="<?php echo $image->location_path; ?>" />
    <?php } ?>
    
    <h3><?php echo $image->title; ?></h3>
    <p><?php echo $image->comment; ?></p>
        
    </div>
    <?php
    }
  ?>
  </div>
</div>