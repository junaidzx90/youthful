<div class="mt-5"></div>
<div class="profile-section mb-5 mt-3">
  <div class="container">

    <!-- Payment alert -->

    <?php 
      if(get_option( "comision_alert" )){
        echo '<div class="alert alert-warning p" role="alert">';
        echo '<strong>';
        echo '<a href="bahak.com.org"><span class="bahak">বাহক&nbsp;</span></a>';
        echo get_option( "comision_alert" );
        echo '</strong>';
        echo '</div>';
      }
    ?>


    <div class="row mx-0">
      <?php require_once("profile_card.php"); ?>

      <div class="profile-info col-md-8 col-sm-12 px-md-0">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="trip-condition-tab" data-toggle="tab" href="#trip-condition" role="tab"
              aria-controls="trip-condition" aria-selected="true">চলমান ট্রিপ</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="payment-history-tab" data-toggle="tab" href="#payment-history" role="tab"
              aria-controls="payment-history" aria-selected="false">পেমেন্ট হিষ্টরি</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="trip-condition" role="tabpanel"
            aria-labelledby="trip-condition-tab">
            <div id="accordianId" role="tablist" aria-multiselectable="true">
              <!-- driver/pertner profile -->
              <div id="driver">
                <!-- ACTIVE TRIP INFORMATION -->
                <div class="active-trip-info mt-2 driver-dashboard">
                  <p class="p-3 text-info">
                    <i class="blockquote">
                      লোরেম ইপসাম বা লিপসাম এটি কখনও কখনও জানা যায়, এটি
                      ছদ্মবেশী পাঠ্য যা প্রিন্ট, গ্রাফিক বা ওয়েব ডিজাইন
                      তৈরিতে ব্যবহৃত হয়। প্যারাংশটি 16 ম শতাব্দীর এক
                      অজানা টাইপসেটরকে দায়ী করা হয়েছে যাকে সিসেরোর ডি
                      ফিনিবাস বোনারিয়াম এবং ম্যালোরামের এক ধরণের নমুনার
                      বইয়ের জন্য স্ক্র্যাম্বলড অংশ রয়েছে বলে মনে করা
                      হয়।
                    </i>
                  </p>

                  <?php
                    global $wpdb;
                    global $current_user;

                    $bidtbl = $wpdb->prefix . 'youthful_bids';

                    $trips = $wpdb->get_results("SELECT * FROM $bidtbl WHERE user_id = $current_user->ID AND bid_status = 'pending' || bid_status = 'inprogress' || bid_status = 'aweting'");
                    
                    if($wpdb->num_rows>0){
                      $i = 0;
                      foreach($trips as $trip){?>
                  <div class="card p-0 mb-2 active-item">
                    <div <?php if($trip->bid_status == 'inprogress') echo 'style="background: #28a79b42;"'; ?> class="card-header" role="tab" id="trip_item_<?php echo $i; ?>">
                      <div class="trip-pending-content d-flex justify-content-between">
                        <p>
                          <?php echo get_post_meta( $trip->post_id, 'load_point_0', true) ?><strong class="bahak">
                            থেকে </strong><?php echo get_post_meta( $trip->post_id, 'unload_point_0', true) ?>
                        </p>

                        <div class="btn-group mb-2">
                          <?php
                          $aweting = $wpdb->get_var("SELECT bid_status FROM $bidtbl WHERE bid_status = 'aweting' AND user_id = $current_user->ID AND post_id = $trip->post_id");
                            if($trip->bid_status == 'inprogress'){
                              echo ' <button data-id="'.intval($trip->post_id).'" data-uid="'.intval($trip->user_id).'" "data-cid="'.intval($trip->client_id).'" type="button" class="btn btn-danger trip-canceled" > বাতিল করুণ </button>';
                            }else if($aweting){
                                echo '<span class="bg-warning rounded py-1 px-3">অপেক্ষায় রয়েছে</span>';
                                
                                echo '<button data-id="'.intval($trip->post_id).'" data-uid="'.intval($trip->user_id).'"  data-cid="'.intval($trip->client_id).'" type="button" class="btn btn-success trip-finished"> ট্রিপ সম্পন্য হয়েছে </button>';
                              }else{
                                echo '<span class="bg-info py-1 px-2 rounded m-0"> অপেক্ষায় আছে </span>';

                                echo ' <button data-id="'.intval($trip->post_id).'" data-uid="'.intval($trip->user_id).'" data-cid="'.intval($trip->client_id).'"type="button" class="btn btn-danger trip-cls" > বাতিল করুণ </button>';
                              }
                          ?>
                        </div>

                      </div>
                      <h5 class="mb-0">
                        <a class="trip-condition-tab" data-toggle="collapse" data-parent="#accordianId"
                          href="#trip_item_link_<?php echo $i; ?>" aria-expanded="true"
                          aria-controls="trip_item_link_<?php echo $i; ?>">
                          <blockquote class="blockquote">
                            <footer class="card-blockquote">
                              <strong>ট্রাক লোডের সময় : </strong>&nbsp;<span
                                title="Source title"><?php echo get_post_meta( $trip->post_id, 'loadtime', true) ?></span>
                                <span class="pricetop float-right">
                                  <?php echo __($trip->price,'youthful') ?> টাকা
                                </span>
                            </footer>
                          </blockquote>
                        </a>
                      </h5>
                    </div>

                    <div id="trip_item_link_<?php echo $i; ?>" class="collapse in" role="tabpanel"
                      aria-labelledby="trip_item_<?php echo $i; ?>">
                      <div class="card-body">
                        <table
                          class="table table-striped table-inverse table-responsive driver-information-on-active-trip">
                          <tbody>
                            <tr>
                              <td class="table-data-head">গাড়ির ধরণ</td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'typeoftruck', true),'youthful') ?></td>
                            </tr>
                            <tr>
                              <td class="table-data-head">লোডের স্থান</td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'load_point_0', true),'youthful') ?>
                                |
                                <?php echo __(get_post_meta($trip->post_id, 'load_point_1', true),'youthful') ?>
                                |
                                <?php echo __(get_post_meta($trip->post_id, 'load_point_2', true),'youthful') ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="table-data-head">
                                আনলোডের স্থান
                              </td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'unload_point_0', true),'youthful') ?>
                                |
                                <?php echo __(get_post_meta($trip->post_id, 'unload_point_1', true),'youthful') ?>
                                |
                                <?php echo __(get_post_meta($trip->post_id, 'unload_point_2', true),'youthful') ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="table-data-head">
                                গাড়ি ছাড়ার সময়
                              </td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'loadtime', true),'youthful') ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="table-data-head">লেবার</td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'need_laborer', true),'youthful') ?></td>
                            </tr>
                            <tr>
                              <td class="table-data-head">মালের ধরণ</td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'typeofgoods', true),'youthful') ?></td>
                            </tr>
                            <tr>
                              <td class="table-data-head">মালের ওজন</td>
                              <td class="table-data-body">
                                <?php echo __(get_post_meta($trip->post_id, 'weights', true),'youthful') ?></td>
                            </tr>
                            <tr>
                              <td class="table-data-head">ভাড়া</td>
                              <td class="table-data-body"><?php echo __($trip->price,'youthful') ?> টাকা</td>
                            </tr>
                            <?php
                                    $total = $trip->price;
                                    if($trip->bid_status == 'inprogress'){
                                      echo '<tr> <td class="table-data-head">কমিশন</td> <td class="table-data-body"> (২০%) -'.($total * 20 / 100).' টাকা </td> </tr>';
                                    }
                                  ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?php 
                      $i++;
                      }
                    }
                  ?>
                </div>

                <!-- IF HAS NOT ACTIVE TRIP -->
                <div class="no-trip row mx-0 justify-content-center d-none">
                  <div class="alert alert-info align-self-center" role="alert">
                    <strong class="mb-2">
                      <span class="bahak">আপনার এখনো কোন ট্রিপ নেই।</span>
                      &nbsp;<i>একটি ট্রিপের জন্য বিড করুণ</i>
                    </strong>
                    <a type="button" href="dashboard.html" class="btn btn-block btn-info">
                      ট্রিপ খুঁজুন
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Profile payment history -->
          <div class="tab-pane fade" id="payment-history" role="tabpanel" aria-labelledby="payment-history-tab">
            <div class="row mx-0 justify-content-end mt-3">
              <div class="form-group">
                <select class="form-control form-control-sm" name="month_search">
                  <option>চলতি মাস</option>
                  <option>গত মাস</option>
                  <option>বিগত তিন মাস</option>
                </select>
              </div>
            </div>

            <div id="payment-doc" role="tablist" aria-multiselectable="true">
              <!-- item 1 -->
              <div class="card p-0 mb-2 payment-hist-item">
                <div class="card-header" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#payment-doc" href="#paymentsection1ContentId"
                      aria-expanded="true" aria-controls="paymentsection1ContentId" class="d-block">
                      কাঁচামাল ৫ টন, ঢাকা থেকে চাঁদপুর, ৫-টন ১-ঘোরা ট্রাক
                      <span class="price-was float-right text-info">১০,৫০০ টাকা</span>
                    </a>
                  </h5>
                </div>
                <div id="paymentsection1ContentId" class="collapse in" role="tabpanel"
                  aria-labelledby="section1HeaderId">
                  <div class="card-body">
                    <h4 class="m-0 d-block">
                      <span class="place-title float-left">ঢাকা
                        <span class="bahak">থেকে</span> চাঁদপুর</span>
                      <span class="float-right">তারিখঃ
                        <span class="date-title">১২/১২/২০</span></span>
                    </h4>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="alert alert-success text-center" role="alert">
                      <strong>টোটাল ১০,০০০ টাকা</strong>
                      <span class="badge badge-danger commision">৫০০ টাকা কমিশন</span>
                    </div>
                    <table class="table table-striped table-inverse table-responsive">
                      <thead class="thead-inverse">
                        <tr>
                          <th>লোডের জায়গা</th>
                          <th>আনলোডের জায়গা</th>
                          <td>ট্রিপ আইডি</td>
                          <th>তারিখ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>#৪৮৭৬৭৬৮৭</td>
                          <td>১২/৩/২০</td>
                        </tr>
                        <tr>
                          <td scope="row">
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>#৪৮৭৬৭৬৮৭</td>
                          <td>১২/৩/২০</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- item 2 -->
              <div class="card p-0 mb-2 payment-hist-item">
                <div class="card-header" role="tab" id="section1HeaderId">
                  <h5 class="mb-0">
                    <a data-toggle="collapse" data-parent="#payment-doc" href="#paymentsection2ContentId"
                      aria-expanded="true" aria-controls="paymentsection2ContentId" class="d-block">
                      কাঁচামাল ৫ টন, ঢাকা থেকে চাঁদপুর, ৫-টন ১-ঘোরা ট্রাক
                      <span class="price-was float-right text-info">১০,৫০০ টাকা</span>
                    </a>
                  </h5>
                </div>
                <div id="paymentsection2ContentId" class="collapse in" role="tabpanel"
                  aria-labelledby="section2HeaderId">
                  <div class="card-body">
                    <h4 class="m-0 d-block">
                      <span class="place-title float-left">ঢাকা
                        <span class="bahak">থেকে</span> চাঁদপুর</span>
                      <span class="float-right">তারিখঃ
                        <span class="date-title">১২/১২/২০</span></span>
                    </h4>
                    <div class="clearfix"></div>
                    <hr />
                    <div class="alert alert-success text-center" role="alert">
                      <strong>টোটাল ১০,০০০ টাকা</strong>
                      <span class="badge badge-danger commision">৫০০ টাকা কমিশন</span>
                    </div>
                    <table class="table table-striped table-inverse table-responsive">
                      <thead class="thead-inverse">
                        <tr>
                          <th>লোডের জায়গা</th>
                          <th>আনলোডের জায়গা</th>
                          <td>ট্রিপ আইডি</td>
                          <th>তারিখ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row">
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>#৪৮৭৬৭৬৮৭</td>
                          <td>১২/৩/২০</td>
                        </tr>
                        <tr>
                          <td scope="row">
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>
                            ঢাকা উত্তরা, সেক্টর ৪, ৫ নাম্বার রাস্তা, বাসা
                            ১০
                          </td>
                          <td>#৪৮৭৬৭৬৮৭</td>
                          <td>১২/৩/২০</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>