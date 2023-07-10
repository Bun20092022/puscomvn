<script src="public/backend/codemirror/codemirror.js"></script>
<link rel="stylesheet" href="public/backend/codemirror/codemirror.css">
<script src="public/backend/codemirror/mode/xml/xml.js"></script>
<script src="public/backend/codemirror/addon/edit/closetag.js"></script>
<link rel="stylesheet" href="public/backend/codemirror/theme/dracula.css">
<h6 class="mb-0 text-uppercase"><?php if(isset($title)){ echo $title; } ?></h6>
<hr/>
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title">Nội dung chuyên mục</h6>
            <form action="" method="post">
               <input type="hidden" name="template_type" value="<?= $template_type; ?>">
               <div class="mb-3">
                  <label class="form-label">Tên chuyên mục</label>
                  <input type="text" class="form-control" name="name" value="<?= $view['name']; ?>" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Url hiển thị</label>
                  <input type="text" class="form-control" name="template_link" disabled value="<?= $view['template_link']; ?>">
               </div>
               <div class="mb-3">
                  <label class="form-label">Code File</label>
<textarea class="form-control" rows="30" name="codefile" id="editor">
<?php
    $read = file('application/views/'.$view['template_link']);
    foreach ($read as $line) {
    echo $line;
    }
?>
</textarea>
               </div>   
               <button class="btn btn-primary" type="submit" name="edit">Chỉnh sửa thông tin</button>
         </div>
      </div>
   </div>
</div>
</form>
<script type="text/javascript">
   var editor = CodeMirror.fromTextArea
   (document.getElementById('editor'),{
      mode: "xml",
      theme: "dracula",
      lineNumbers: true,
      autoCloseTags: true,
   });
   editor.setSize("100%","700px");
</script>