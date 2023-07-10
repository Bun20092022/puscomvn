<div class="row">
   <div class="col-12 col-lg-3">
      <div class="card">
         <div class="card-body">
            <h5 class="my-3">Nhóm Banner</h5>
            <?php foreach ($list as $value): ?>
            <div class="fm-menu">
                  <a href="<?php echo $this->folder.'/list/'; ?><?= $value['id']; ?>" class="list-group-item py-1"><i class='bx bx-beer me-2'></i><span><?= $value['name']; ?></span></a>
            </div>   
            <?php endforeach ?>
            </div>
         </div>
   </div>
   <div class="col-12 col-lg-9">
      <div class="card">
         <div class="card-body">

         </div>
      </div>
   </div>
</div>
