<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Savage Inc.</title>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script>
	Array.prototype.sum = function() {
		for (var i = 0, L = this.length, sum = 0; i < L; sum += this[i++]);
		return sum;
	}
	var imgControl = function(){
	
			$('img').each(function (){
				var winH = $(window).height();
				
				/*if(winH >= 1200)
				{
					$('img').css("height", 1000);
					$('img').css("width", "auto");
				}
				else
				{*/
					var elHeight = Math.round(winH*0.7);
					$('img').css("height", elHeight);
					$('img').css("width", "auto");
					$('#slides').css("height", elHeight);
					$('#slides').css("width", elHeight*1.6);
				//}
			});
	};
	
	var widthSet = function(){
		var widths = new Array();
		var width;
		
		$('img').each(function(){
			widths.push($(this).width());
		});
		
		widths.push(200);
		
		$('.section').css('width', widths.sum());
	}
	
	$(document).ready(function () {
		imgControl();
	});
	
	$(window).load(function() {
		widthSet();
	});
	
	$(window).resize(function() {
		imgControl();
		widthSet();
	});
</script>
    
<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>images/favicon.ico" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/style.css" />

</head>

<body>
<div id='menu'>
<ul>   
      <li <?php if($this->uri->segment(1) == 'home'){ echo 'class="selected"'; }?>>
      	<?php echo anchor('home', 'Savage Inc.');?>
      </li>
      
      <li <?php if($this->uri->segment(3) == 'photography'){ echo 'class="selected"'; }?>>
      	<a href="#">Photography</a>
          <ul>
              <li>
                <?php echo anchor('photo_viewer/index/photography/editorial', 'editorial');?>
              </li>
              <li>
                <?php echo anchor('photo_viewer/index/photography/fine_art', 'fine art');?>
              </li>
              <li>
                <?php echo anchor('photo_viewer/index/photography/travel', 'travel');?>
              </li>
          </ul>
      </li>
      
      <li <?php if($this->uri->segment(3) == 'fine_art'){ echo 'class="selected"'; }?>>
        <a href="#">Fine Art</a>
          <ul>
              <li>
                  <?php echo anchor('photo_viewer/index/fine_art/drawing','drawings');?>
              </li>
              <li>
                  <?php echo anchor('photo_viewer/index/fine_art/painting', 'paintings');?>
              </li>
          </ul>
      </li>
      
      <li <?php if($this->uri->segment(3) == 'retouching'){ echo 'class="selected"'; }?>>
      <a href="#">Retouching</a>
		<ul>
			<li>
                <?php echo anchor('photo_viewer/index/retouching/commercial', 'commercial');?>
			</li>
			<li>
                <?php echo anchor('photo_viewer/index/retouching/fashion', 'fashion');?>
			</li>
			<li>
                <?php echo anchor('photo_viewer/index/retouching/fine_art', 'fine art');?>
			</li>
		</ul>
      </li>
      
      <li <?php if($this->uri->segment(1) == 'clients'){ echo 'class="selected"'; }?>>
      <?php echo anchor('clients', 'clients');?>
      </li>
      
      <li <?php if($this->uri->segment(1) == 'press'){ echo 'class="selected"'; }?>>
      <?php echo anchor('press', 'press');?>
      </li>
      
      <!-- <li>
      <?php //echo anchor('store', 'store');?>
      </li> -->
      
      <li <?php if($this->uri->segment(1) == 'contact'){ echo 'class="selected"'; }?>>
      <?php echo anchor('contact', 'contact');?>
      </li>
      
</ul>
</div>