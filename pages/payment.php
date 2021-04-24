<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/slick_slider/slick.css" />
    <link rel="stylesheet" href="../assets/slick_slider/slick-theme.css" />
    <link
      rel="stylesheet"
      href="../assets/datepicker/css/bootstrap-datetimepicker.min.css"
    />
    <link rel="stylesheet" href="../style.css" />
    <title>Bahak car servicess</title>
  </head>

  <body>
    <header>
      <!-- Navbar start -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="../index.html" title="www.bahak.com.bd">
            <img
              src="../assets/images/logo.png"
              width="80"
              height=""
              class="d-inline-block align-top"
              alt=""
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">
              <li class="nav-item">
                <a class="nav-link" href="#">ড্যাসবোর্ড</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#aboutUs">আমাদের সম্পর্কে</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactUs">যোগাযোগ করুণ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar ends -->
    </header>

    <section>
      <div
        class="input-append date form_datetime"
        data-date="2012-12-21T15:25:00Z"
      >
        <input size="16" type="text" value="" readonly />
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
      </div>
      <div class="btn-group mx-auto payment-select" data-toggle="buttons">
        <label class="btn btn-success active">
          বিকাশ পেমেন্ট
          <input
            type="radio"
            name="payment"
            class="bkash-payment"
            data-value="bkash"
            autocomplete="off"
            checked
          />
        </label>
        <label class="btn btn-success">
          <input type="radio" name="payment" data-value="" autocomplete="off" />
          ডিরেক্ট পেমেন্ট
        </label>
      </div>
      <div class="col-sm-10">
        <div class="card-body bkash-payment-card">
          <span class="d-block text-center"
            ><strong>+88017149005002</strong> পারসোনাল</span
          >
          <h5 class="text-center">OR</h5>
          <div class="qr-code row mx-0 justify-content-center">
            <img
              width="300px"
              src="../assets/images/bkash_qr_1.png"
              class="img-fluid"
              alt="bksh-qr-code"
            />
          </div>
          <div class="form-group">
            <label for="number">টাকার পরিমান</label>
            <input
              type="text"
              name="tr-number"
              class="form-control"
              placeholder="টাকার পরিমান লিখুন"
            />
          </div>
          <div class="form-group">
            <label for="number">ট্রাঞ্জিকশন নাম্বারটি লিখুন</label>
            <input
              type="text"
              name="tr-number"
              class="form-control"
              placeholder="ট্রাঞ্জিকশন নাম্বারটি লিখুন"
            />
            <small id="helpId-tr-number" class="text-muted"
              >সতর্কতার সাথে নাম্বারটি লিখুন, ভুলহলে কর্তৃপক্ষ দায়ী
              থাকবেনা</small
            >
          </div>
        </div>
      </div>
    </section>

    <footer class="mt-5 px-5 pb-3">
      <div class="container">
        <div class="footer-content row">
          <div class="card text-left col-md mb-1 p-1 mx-1 col-sm-12 my-1 pl-0">
            <div class="card-body">
              <h4 class="card-title border-bottom">আমাদের কথা</h4>
              <p class="card-text">
                লোরেম ইপসাম বা লিপসাম এটি কখনও কখনও জানা যায়, এটি ছদ্মবেশী
                পাঠ্য যা প্রিন্ট, গ্রাফিক বা ওয়েব ডিজাইন তৈরিতে ব্যবহৃত হয়।
                প্যারাংশটি 15 ম শতাব্দীর এক অজানা টাইপসেটরকে দায়ী করা হয়েছে
                যাকে সিসেরোর ডি ফিনিবাস বোনারিয়াম এবং ম্যালোরামের এক ধরণের
                নমুনার বইয়ের জন্য স্ক্র্যাম্বলড অংশ রয়েছে বলে মনে করা হয়।
                <br />
                <br />
                লোরেম ইপসাম বা লিপসাম এটি কখনও কখনও জানা যায়, এটি ছদ্মবেশী
                পাঠ্য যা প্রিন্ট, গ্রাফিক বা ওয়েব ডিজাইন তৈরিতে ব্যবহৃত হয়।
                প্যারাংশটি 15 ম শতাব্দীর এক অজানা টাইপসেটরকে দায়ী করা হয়েছে
                যাকে সিসেরোর ডি ফিনিবাস বোনারিয়াম
              </p>
            </div>
          </div>

          <div class="card text-left col-md mb-1 p-1 mx-1 col-sm-12 my-1 pl-0">
            <div class="card-body">
              <h4 class="card-title border-bottom">বাহক নিতীমালা</h4>
              <ul class="footer-list pl-2">
                <li><a href="#">লোরেম ইপসাম বা লিপসাম এটি কখনও </a></li>
                <li>
                  <a href="#">গ্রাফিক বা ওয়েব ডিজাইন তৈরিতে ব্যবহৃত হয়।</a>
                </li>
                <li>
                  <a href="#">বোনারিয়াম এবং ম্যালোরামের এক ধরণের নমুনা</a>
                </li>
                <li>
                  <a href="#"
                    >প্যারাংশটি 15 ম শতাব্দীর এক অজানা টাইপসেটরকে দায়ী
                  </a>
                </li>
                <li>
                  <a href="#">দ্রুত মাল পৌছে দেয়ার কিছু গুরুত্বপূর্ণ কথা</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="card text-left col-md mb-1 p-1 mx-1 col-sm-12 my-1 pl-0">
            <div class="card-body">
              <h4 class="card-title border-bottom">ধন্যবাদান্তে</h4>
              <img
                class="card-img-top w-50"
                src="../assets/images/my.jpg"
                alt=""
              />
              <p class="card-text">
                লোরেম ইপসাম বা লিপসাম এটি কখনও কখনও জানা যায়, এটি ছদ্মবেশী
                পাঠ্য যা প্রিন্ট, গ্রাফিক বা ওয়েব ডিজাইন তৈরিতে ব্যবহৃত হয়।
                প্যারাংশটি 15 ম শতাব্দীর এক অজানা টাইপসেটরকে দায়ী করা হয়েছে
                যাকে সিসেরোর ডি ফিনিবাস বোনারিয়াম এবং ম্যালোরামের এক ধরণের
                নমুনার বইয়ের জন্য স্ক্র্যাম্বলড অংশ রয়েছে বলে মনে করা হয়।
              </p>
            </div>
          </div>
        </div>

        <small class="copyrights pl-2"
          >All Copyrights reserved by &copy;<a href="www.bahak.com.bd">
            bahak.com.bd</a
          >
          2020</small
        >
      </div>
    </footer>
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../dist/js/typed-js.min.js"></script>
    <script src="../dist/js/bahak.js"></script>
    <script src="../assets/datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assets/slick_slider/slick.js"></script>
    <script>
      // Select which payment
      $(".payment-select").click(function () {
        if ($("input[class='bkash-payment']").is(":checked")) {
          if ($(".bkash-payment").parent("label").hasClass("focus")) {
            $(".bkash-payment-card").css("display", "block");
          } else {
            $(".bkash-payment-card").css("display", "none");
          }
        }
      });
    </script>
  </body>
</html>