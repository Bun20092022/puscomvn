<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h6 class="card-title"><?php if(isset($title)){ echo $title; } ?></h6>
            <form action="" method="post">
               <div class="form-group">
                  <label for="exampleInputText1">Tên nhóm banner</label>
                  <input type="text" class="form-control" name="name" >
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail3">Vị trí</label>
                  <input type="text" class="form-control" name="vitri">
               </div>
               <button class="btn btn-primary" type="submit" name="themthongtin">Thêm thông tin</button>
         </div>
      </div>
   </div>
</div>
</form>