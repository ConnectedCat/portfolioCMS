<script type="text/javascript">
function sub_categories(chosen){
	var sub_category = document.image_form.sub_category;
	sub_category.options.length = 0;
	switch(chosen){
		case "photography":
		sub_category.options[0] = new Option('editorial', 'editorial');
		sub_category.options[1] = new Option('fine_art', 'fine_art');
		sub_category.options[2] = new Option('travel', 'travel');
		break;
		case "fine_art":
		sub_category.options[0] = new Option('drawing', 'drawing');
		sub_category.options[1] = new Option('painting', 'painting');
		break;
		case "retouching":
		sub_category.options[0] = new Option('commercial', 'commercial');
		sub_category.options[1] = new Option('fashion', 'fashion');
		sub_category.options[2] = new Option('fine_art', 'fine_art');
		break;
		default:
		sub_category.options[0] = new Option('please select category', 'default');
	}
}

function update_sub_categories(chosen, id){
	var form = document.getElementById(id);
	form.sub_category.options.length = 0;
	switch(chosen){
		case "photography":
		form.sub_category.options[0] = new Option('editorial', 'editorial');
		form.sub_category.options[1] = new Option('fine_art', 'fine_art');
		form.sub_category.options[2] = new Option('travel', 'travel');
		break;
		case "fine_art":
		form.sub_category.options[0] = new Option('drawing', 'drawing');
		form.sub_category.options[1] = new Option('painting', 'painting');
		break;
		case "retouching":
		form.sub_category.options[0] = new Option('commercial', 'commercial');
		form.sub_category.options[1] = new Option('fashion', 'fashion');
		form.sub_category.options[2] = new Option('fine_art', 'fine_art');
		break;
		default:
		sub_category.options[0] = new Option('please select category', 'default');
	}
}
</script>
<div id="image_upload">
<?php
$attributes = array('name' => 'image_form', 'id' => 'image_form');
echo form_open_multipart('admin/image_management', $attributes); 
?>
<h2>Image title</h2>
<?php
echo form_input('title');
?>
<h2>Commentary</h2>
<?php
echo form_textarea('comment');
echo form_upload('userfile');
?>
<p>Please keep file size under 8Mb</p>
<h2>Category</h2>
<?php
$js = 'id = "category" onChange="sub_categories(this.value)"';
echo form_dropdown('category', $categories, 'default', $js);
?>
<h2>Sub-Category</h2>
<?php
echo form_dropdown('sub_category');
?>
<h2>Use image for front page?</h2>
<?php
echo form_dropdown('front_page', $front_page);
?>
<h2>Display order number</h2>
<?php
echo form_input('display_order', 'last');
?>
<h2>Image options</h2>
<?php
echo form_dropdown('options', $options, '0');
?>
<h2>Upload file for zoom/swap option</h2>
<?php
echo form_upload('userfile_option');
?>
<p>Please keep file size under 8Mb</p>
<?php
echo form_submit('upload', 'Upload');
echo form_close();
?>
</div> <!-- end of image upload -->

<div id="gallery">
<?php
echo form_open('admin/image_management');
?>
Select the category of images
<?php
$js = 'onchange="this.form.submit()"';
echo form_dropdown('display_select',$display_select, '', $js);
echo form_close();
?>
  <?php
  foreach($images as $image){
  ?>
  	<div id="gallery_image">
    
	<?php
	$attributes = array('name' => 'image_update_form'.$image->id, 'id' => $image->id);
	echo form_open('admin/image_management', $attributes); 
	?>
      <img src="<?php echo $image->thumb_path; ?>"/>
      <?php 
	  echo form_hidden('id', $image->id);
	  ?>
      <p>Image Title</p>
      <?php 
	  echo form_input('title', $image->title); 
	  ?>
      <p>Image Comments</p>
      <?php 
	  echo form_textarea('comment', $image->comment); 
	  ?>
      <p>Image Category</p>
      <?php
	  $js = 'id = "category'.$image->id.'" onclick="update_sub_categories(this.value, '.$image->id.' )" onchange="update_sub_categories(this.value, '.$image->id.' )"';
	  echo form_dropdown('category', $categories, $image->category, $js);
	  ?>
      <p>Image Subcategory</p>
      <?php
	  echo form_dropdown('sub_category');
	  ?>
      <p>Used for front page</p>
      <?php
	  echo form_checkbox('front_page', '1', $image->front_page);
	  ?>
      <p>Display order</p>
      <?php
	  echo form_input('display_order', $image->display_order);
	  ?>
	  <?php if($image->options == 1){ ?>
          <p>Image Zoomable</p>
      <?php } ?>
      <?php if($image->options == 2){ ?>
      	<p>Image Swappable</p>
      <?php }?>
      <?php if($image->options > 0){ ?>
      <p>Change options</p>
      <?php echo form_dropdown('options', $options, '0'); ?>
      <?php } ?>
      <?php if($image->options == 0){ ?>
      	  <p>Upload image for zoom/swap:</p>
          <?php echo form_upload('userfile_zoom'); ?>
      <?php } ?>
      
     <?php echo form_submit('update', 'Update'); ?>
     <?php echo form_close(); ?>
     <?php 
	 	echo form_open('admin/image_management');
		echo form_hidden('id', $image->id);
	 	echo form_submit('delete', 'Delete Image');
		echo form_close();
	?>
    </div>
 <?php }//end foreach image?>
</div>