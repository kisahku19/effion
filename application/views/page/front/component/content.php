<?php
    if ($this->session->flashdata('pesan') != '') { ?>
        <div class="alert alert-info">
            <?= $this->session->flashdata('pesan')?>
        </div>
   <?php }
?>
<div class="services-wrap" style="margin-bottom:30px">
	<div class="container no-padding">
        <?php
        if ($content) {
            $this->load->view($content);
        }
        ?>
	</div>
</div>
<!-- Services -->

