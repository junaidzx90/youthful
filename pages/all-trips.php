<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../dist/css/fontawesome/fontawesome.min.css" />
    <link rel="stylesheet" href="../dist/css/fontawesome/brands.min.css" />
    <link rel="stylesheet" href="../dist/css/fontawesome/solid.min.css" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../dist/css/dashboard.css" />
    <link rel="stylesheet" href="../dist/css/all-trips.css" />
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
              <!-- Login users -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdownMenuLink"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  একাউন্ট
                </a>
                <div
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <a class="dropdown-item" href="#">প্রফাইল</a>
                  <a class="dropdown-item" href="#">আমার ট্রিপ</a>
                  <a class="dropdown-item" href="#">সেটিংস</a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    লগ-আউট</a
                  >
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link text-info" href="#contactUs">পেমেন্ট করুণ</a>
              </li>

              <div class="ml-auto intraction-info">
                <li class="nav-item d-inline">
                  <a href="#" class="nav-link noti-info-link">
                    <span class="online-indicator noti-indi">
                      <i class="fas fa-circle"></i>
                    </span>
                    <span class="intraction-info-icon">
                      <i class="fas fa-bell"></i>
                    </span>
                    <span class="intraction-info-name">নটিফিকেশন</span>
                  </a>
                </li>
                <li class="nav-item d-inline">
                  <a href="#" class="nav-link msg-info-link">
                    <span class="online-indicator msg-indi">
                      <i class="fas fa-circle"></i>
                    </span>
                    <span class="intraction-info-icon">
                      <i class="fas fa-envelope"></i>
                    </span>
                    <span class="intraction-info-name">মেসেজ</span>
                  </a>
                </li>
              </div>
              <!-- Login users -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar ends -->
    </header>

    <section>
      <div id="all-trips col-12">
        <div class="container">
          <div class="mb-3 mt-3 w-100 clearfix">
            <span class="float-md-left d-md-inline-block text-center">
              <h3 class="trip-history-title mt-1">
                <span class="bahak dynamic-tittle">সকল</span> ট্রিপ বিবরণ
              </h3>
            </span>
            <div
              class="btns-group w-100 d-flex d-md-block justify-content-center"
            >
              <div
                id="show-trips"
                class="btn-group float-right"
                data-toggle="buttons"
              >
                <label class="btn btn-info active show-trips-cls">
                  সকল
                  <input
                    type="radio"
                    name="1"
                    data-value="all"
                    checked
                    autocomplete="off"
                  />
                </label>
                <label class="btn btn-info show-trips-cls">
                  চলিত
                  <input
                    type="radio"
                    name="1"
                    data-value="running"
                    autocomplete="off"
                  />
                </label>
                <label class="btn btn-info show-trips-cls">
                  সম্পন্য
                  <input
                    type="radio"
                    name="1"
                    data-value="finished"
                    autocomplete="off"
                  />
                </label>
              </div>
            </div>
          </div>

          <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
              <tr>
                <th>থেকে</th>
                <th>গনতব্য</th>
                <th>গনতব্যের সময়</th>
                <th>মালের পরিমাণ</th>
                <th>ট্রাকের ধরণ</th>
                <th>অবস্থা</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <form action="" class="edit">
                  <td scope="row">
                    <span class="trip-info-views"
                      >রাজাপুর,শরণখোলা, বাগেরহাট</span
                    >

                    <input
                      type="text"
                      class="from-inp edit-inp input"
                      name="from"
                      placeholder="রাজাপুর"
                    />
                  </td>
                  <td>
                    <span class="trip-info-views">ঢাকা, গাজীপুর, চৌরাস্তা</span>

                    <input
                      type="text"
                      class="to-inp edit-inp input"
                      name="from"
                      placeholder="ঢাকা, গাজীপুর, চৌরাস্তা"
                    />
                  </td>
                  <td>
                    <span class="trip-info-views"
                      >১২/১২/২০ সকাল ৮ঃ০০
                      <span class="bahak">থেকে</span> ১৩/১২/২০ সকাল ১০ঃ৩০</span
                    >

                    <input
                      type="text"
                      class="address-inp edit-inp input"
                      name="from"
                      placeholder="১২/১২/২০ সকাল ৮ঃ০০ থেকে ১৩/১২/২০ সকাল ১০ঃ৩০"
                    />
                  </td>
                  <td>
                    <span class="trip-info-views">২টন লোহা</span>

                    <input
                      type="text"
                      class="net-weight-inp edit-inp input"
                      name="from"
                      placeholder="২টন লোহা"
                    />
                  </td>
                  <td>
                    <span class="trip-info-views">২টন</span>

                    <input
                      type="text"
                      class="truck-type-inp edit-inp input"
                      name="from"
                      placeholder="২টন"
                    />
                  </td>
                  <td class="status text-success action-btns">
                    <span class="active-status">
                      চালু আছে

                      <div
                        class="save-edit-form edit-inp row mx-0 justify-content-between"
                      >
                        <button
                          type="submit"
                          class="col-5 btn-sm px-0 text-info"
                        >
                          <i class="fas fa-save"></i>
                        </button>
                        <span class="close-edit col-5 btn-sm px-0">
                          <i class="fas fa-times-circle"></i>
                        </span>
                      </div>

                      <div
                        class="row mx-0 justify-content-between action-btns trip-info-views"
                      >
                        <button
                          type="button"
                          class="btn btn-default text-info col-5 btn-sm px-0 edit-btn"
                        >
                          <i class="fas fa-edit"></i>
                        </button>
                        <button
                          type="button"
                          class="btn btn-default col-5 px-0 btn-sm"
                        >
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </span>
                    <span class="pending finish bahak d-none">পেনডিং</span>
                  </td>
                </form>
              </tr>
              <tr>
                <td scope="row">রাজাপুর</td>
                <td>ঢাকা, গাজীপুর, চৌরাস্তা</td>
                <td>
                  ১২/১২/২০ সকাল ৮ঃ০০
                  <span class="bahak">থেকে</span> ১৩/১২/২০ সকাল ১০ঃ৩০
                </td>
                <td>২টন লোহা</td>
                <td>২টন</td>
                <td class="status finish text-danger">সম্পন্য হয়েছে</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <footer class="mt-5 pb-3">
      <div class="container">
        <div class="footer-content row mx-0">
          <div class="card text-left col-md col-sm-12 m-0 p-0">
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

          <div class="card text-left col-md col-sm-12 m-0 p-0">
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

          <div class="card text-left col-md col-sm-12 m-0 p-0">
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
    <script src="../dist/js/sweetalert.js"></script>
    <script src="../dist/js/bahak.js"></script>
    <script src="../dist/js/all-trips.js"></script>
  </body>
</html>
