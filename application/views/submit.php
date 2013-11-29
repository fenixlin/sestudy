<?php $this->load->helper('url');?>
<form action = <?php echo site_url('forum/submit')?> method = "post">
content: 
    <textarea id="content" name="content"></textarea>
    <input type = "submit"></input>
</form>