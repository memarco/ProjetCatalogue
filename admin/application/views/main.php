<?php $this->load->view('templates/header') ?>

<div class="container">
<?php include 'templates/menu_top.php' ?>
<div class="row">
<!-- menuleft-->
<?php include 'templates/menu_left.php' ?>
<!--endmenuleft-->

<!--maincontent-->
<?php $this->load->view('templates/main_head') ?>
<div style="padding-left: 50px;">
<?php foreach ($page_content as $page_content_item):
              echo $page_content_item['page_content'];
      endforeach; ?>
  </div>
</div>
</div>
<!--endmaincontent-->
</div>


<?php $this->load->view('templates/footer') ?>
