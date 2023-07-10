    <!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>CRM</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- App favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico">
      <base href="<?= base_url(); ?>">
      <!-- Layout Js -->
      <script src="assets/js/layout.js"></script>
      <!-- Bootstrap Css -->
      <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
      <!-- Icons Css -->
      <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
      <!-- App Css-->
      <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="auth-maintenance d-flex align-items-center min-vh-100">
         <div class="bg-overlay bg-light"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                     <div class="w-100">
                        <div class="d-flex flex-column h-100 py-0 py-xl-3">
                           <div class="text-center mb-4">
                              <h3>ADMIN</h3>
                              <p class="mt-2">Chương trình quản lý các thông tin Website</p>
                           </div>
                           <div class="card my-auto overflow-hidden">
                              <div class="row g-0">
                                 <div class="col-lg-6">
                                    <div class="bg-overlay bg-primary"></div>
                                    <div class="h-100 bg-auth align-items-end">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                       <div>
                                          <div class="text-center mt-1">
                                             <h4 class="font-size-18">Chào mừng trở lại !</h4>
                                             <p>Đăng nhập để tiếp tục đến trang quản trị.</p>
                                          </div>
                                          <form action="" class="auth-input" method="post">
                                             <?php $this->load->view('backend/layout/v_noti'); ?>
                                             <div class="mb-2">
                                                <label for="username" class="form-label">Tên đăng nhập</label>
                                                <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" name="username" required>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label" for="password-input">Mật khẩu</label>
                                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn" required>
                                             </div>
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Nhớ mật khẩu</label>
                                             </div>
                                             <div class="mt-3">
                                                <button class="btn btn-primary w-100" type="submit" name="login">Đăng nhập</button>
                                             </div>
                                             <div class="mt-4 pt-2 text-center">
                                                <div class="signin-other-title">
                                                   <h5 class="font-size-14 mb-4 title">Đăng nhập với</h5>
                                                </div>
                                                <div class="pt-2 hstack gap-2 justify-content-center">
                                                   <button type="button" class="btn btn-primary btn-sm"><i class="ri-facebook-fill font-size-16"></i></button>
                                                   <button type="button" class="btn btn-danger btn-sm"><i class="ri-google-fill font-size-16"></i></button>
                                                   <button type="button" class="btn btn-dark btn-sm"><i class="ri-github-fill font-size-16"></i></button>
                                                   <button type="button" class="btn btn-info btn-sm"><i class="ri-twitter-fill font-size-16"></i></button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- end card -->
                           <div class="mt-5 text-center">
                              <p class="mb-0">
                                 © <script>document.write(new Date().getFullYear())</script> CRM. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themebun
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
            <!-- end row -->
         </div>
      </div>
      <!-- JAVASCRIPT -->
      <script src="assets/libs/jquery/jquery.min.js"></script>
      <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/libs/metismenu/metisMenu.min.js"></script>
      <script src="assets/libs/simplebar/simplebar.min.js"></script>
      <script src="assets/libs/node-waves/waves.min.js"></script>
      <!-- Icon -->
      <script src="public/backend/release/v2.0.1/script/monochrome/bundle.js"></script>
      <script src="assets/js/app.js"></script>
   </body>
</html>