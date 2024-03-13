<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="lib/imgs/favicon.png" rel="icon">
  <link href="lib/imgs/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="lib/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="lib/css/style1.css" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="lib/imgs/logo.png" alt="">
                  <span class="d-none d-lg-block">BookStore</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Đăng ký tài khoản</h5>
                    <p class="text-center small">Vui lòng nhập thông tin để tạo tài khoản</p>
                  </div>

                  <form class="row g-3 needs-validation" action="login.php" method="post" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Họ và tên</label>
                      <input type="text" name="txtName" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Vui lòng, nhập họ và tên!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Số điện thoại</label>
                      <input type="text" name="txtPhone" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Vui lòng, nhập số điện thoại!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tên tài khoản</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="txtUserName" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Vui lòng nhập tên tài khoản!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mật khẩu</label>
                      <input type="password" name="txtPass1" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Vui lòng nhập mật khẩu!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Xác nhận mật khẩu</label>
                      <input type="password" name="txtPass2" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Vui lòng nhập lại mật khẩu!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Tôi đồng ý với <a href="#">điều khoản và dịch vụ</a></label>
                        <div class="invalid-feedback">Bạn phải đồng ý trước khi tạo tài khoản</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="dangky" type="submit">Tạo tài khoản</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Bạn đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                  Designed by <a href="#">Nhóm 10</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="lib/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="lib/js/main.js"></script>

</body>

</html>