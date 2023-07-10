<?php
$view_url_website = $this->Model_backend->view_setup(1);
$view_url = json_decode($view_url_website['info']);
$show_tempalte_type = $this->Model_backend->show_all('qh_post_template_type');  
?>
<h6 class="mb-0 text-uppercase"><?php if(isset($title)){ echo $title; } ?></h6>
<hr/>
<a href="<?= $this->folder; ?>/add/<?= $template_type; ?>"><button type="button" class="btn btn-primary btn-sm px-5 mb-3">Thêm giao diện</button></a>
<div class="row">
</div>
<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Tên</th>
                     <th>Đường dẫn</th>
                     <th>Đặt làm mặc định</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list_templates as $value): ?>
                     <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['name']; ?></td>
                        <td><?= $value['template_link']; ?></td>
                        <td>
                           <a href="<?= $this->folder; ?>/keyselect/<?= $value['id']; ?>/<?= $template_type; ?>">
                              <?php if($value['keyselect'] == 0){ ?>
                                 <button type="button" class="btn btn-primary btn-sm">Đặt làm mặc định</button>
                              <?php }else{ ?>
                                 <button type="button" class="btn btn-success btn-sm">Mặc định chọn</button>
                              <?php } ?>
                           </a>
                        </td>
                        <td>
                           <a href="<?= $view_url->{'url'}; ?>/<?= $value['template_link']; ?>" target="_blank" style="margin-right: 10px;"><i class="fas fa-rss-square"></i></a>
                           <?php if (isset($linkupdate)){ ?>
                              <a href="<?= $linkupdate; ?><?= $value['id']; ?>/<?= $template_type; ?>" style="margin-right: 10px;"><i class="fas fa-pencil-alt"></i></a>
                           <?php } ?>                                               
                           <?php if (isset($linkdelete)){ ?>
                             <a href="<?= $linkdelete; ?><?= $value['id']; ?>/<?= $template_type; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa <?= $value['name'];?>?')"><i class="far fa-trash-alt"></i></a>
                          <?php } ?> 
                          
                       </td>
                    </tr>
                 <?php endforeach ?>
              </tbody>
           </table>
        </div>
     </div>
  </div>  
</div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
     $("#selecctall").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
   });
  });
</script>