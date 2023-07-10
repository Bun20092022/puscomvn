<?php $view_extend = $this->Model_main->view_id('qh_posts_extend',$id_extend); ?>
<pre data-enlighter-language="javascript">
  <?php echo $view_extend['text_code']; ?>
</pre>
<script type="text/javascript" src="public/frontent/enlighterjs/dist/enlighterjs.min.js"></script>

<!-- Init Code -->
<script type="text/javascript">
  EnlighterJS.init('pre', 'code', {
    language : 'javascript',
    theme: 'godzilla',
    indent : 2
  });
</script>
<style>
  .code_demo{
    display: inline-block;
    text-align: center;
    color: #fff;
    background-color: #555;
    text-decoration: none;
    white-space: nowrap;
    padding: 5px 30px;
    cursor: pointer;
  }
  .demo_web a:hover{
    color: #fff;
  }
</style>
<?php if($view_extend['show_demo'] == 1){ ?>
<div class="demo_web">
<a class="code_demo" style="background: red;" target="_blank" href="code-<?= $view_extend['id']; ?>"><i class="fa-solid fa-play"></i> Xem Demo</a>
</div>
<?php } ?>