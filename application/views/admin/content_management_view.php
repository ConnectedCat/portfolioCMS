<div id="content_management">

  <div id="front_page_admin">
  <h2>Front Page content</h2>
  <?php
  echo form_open('admin/content_management');
  echo form_hidden('destination', 'front_page');
  ?>
  <h2>Title</h2>
  <?php
  echo form_input('title', $text[0]->title);
  ?>
  <h2>Content</h2>
  <?php
  echo form_textarea('content', $text[0]->content);
  echo form_submit('update', 'Update');
  echo form_close();
  ?>  
  </div>
  <br />
  
  <div id="press_page_admin">
  <h2>Press Page content</h2>
  <?php
  echo form_open('admin/content_management');
  echo form_hidden('destination', 'press_page');
  ?>
  <h2>Title</h2>
  <?php
  echo form_input('title', $text[1]->title);
  ?>
  <h2>Content</h2>
  <?php
  $params = array(
              'name'        => 'content',
              'id'          => 'ckeditor',
            );
  echo form_textarea($params, $text[1]->content);
  echo display_ckeditor($ckeditor);
  echo form_submit('update', 'Update');
  echo form_close();
  ?>
  </div>
  <br />
  
  <div id="clients_page_admin">
  <h2>Clients Page content</h2>
  <?php
  echo form_open('admin/content_management');
  echo form_hidden('destination', 'clients_page');
  ?>
  <h2>Title</h2>
  <?php
  echo form_input('title', $text[2]->title);
  ?>
  <h2>Content</h2>
  <?php
  $params = array(
              'name'        => 'content',
              'id'          => 'ckeditor_2',
            );
  echo form_textarea($params, $text[2]->content);
  echo display_ckeditor($ckeditor_2);
  echo form_submit('update', 'Update');
  echo form_close();
  ?>
  </div>
  
</div>