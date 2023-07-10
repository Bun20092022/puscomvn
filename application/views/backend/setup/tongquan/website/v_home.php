<div class="row">
   <div class="col-lg-3">
      <p style="font-size: 25px;font-weight: 700;">Website</p>
      <div class="card card-body">
         <button class="btn btn-primary px-4 float-right mt-0 mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg"><i class="mdi mdi-plus-circle-outline mr-2"></i>Thêm thuộc tính sản phẩm</button>
         <!--  Modal content for the above example -->
         <h4 class="card-title mt-0">Danh sách Website</h4>
         <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-0" id="myLargeModalLabel">Thêm thuộc tính sản phẩm</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <form action="" method="post">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="NewOppEmail">Thuộc tính sản phẩm</label>
                                 <input type="text" class="form-control" name="url" required="">
                              </div>
                           </div>
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" name="add" value="Save">
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->    
         <!-- in this example the tree is populated from inline HTML -->
         <ul>
            <?php foreach ($listwebiste as $key => $value): ?>
               <li>
                  <a href="<?php echo $update;?><?php echo $value['id'];?>/<?php echo $father;?>" style="font-size: 15px;"><?php echo $value['url'];?></a>
               </li>
            <?php endforeach ?>                                            
         </ul>
      </div>
      <!--end card-->
   </div>
   <!--end col-->
   <div class="col-md-9">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mt-0">Danh sách Website của "<b><?php echo $view['url']; ?></b>"</h4>
                  <div class="table-responsive dash-social">
                     <table id="datatable" class="table">
                        <thead class="thead-light">
                           <tr>
                              <th class="center">ID</th>
                              <th class="center">Website</th>
                              <th class="center">View</th>
                              <th class="center">Hành động</th>
                           </tr>
                           <!--end tr-->
                        </thead>
                        <tbody>
                           <?php foreach ($listwebiste as $value): ?>
                              <tr>
                                 <td><?php echo $value['id'];?></td>
                                 <td><?php echo $value['url'];?></td>
                                 <td><?php echo $value['title'];?></td>
                                 <td>
                                    <a href="<?php echo $update;?><?php echo $value['id'];?>/<?php echo $father;?>" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?php echo $value['id'];?>" class="mr-2"><i class="fas fa-trash-alt text-danger font-16"></i></a>
                                 </td>
                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModalCenter<?php echo $value['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                          <div class="modal-body" style="text-align:center;">
                                             <h2>Bạn có chắc chắn muốn xóa</h2>
                                             <h1><?php echo $value['noidungthuoctinh'];?></h1>
                                             <br><br>
                                             <button class="swal-button swal-button--cancel btn btn-danger">Không, Cảm ơn!</button>
                                             <a href="<?php echo $delete;?><?php echo $value['id'];?>/<?php echo $father;?>">
                                                <button class="swal-button swal-button--confirm btn btn-success">Chắc chắn, Xóa File!</button>
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Modal -->
                              </tr>
                              <!--end tr-->
                           <?php endforeach ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!--end card-body--> 
            </div>
            <!--end card--> 
         </div>
         <!--end col-->                               
      </div>
      <!--end row-->
   </div>
</div>