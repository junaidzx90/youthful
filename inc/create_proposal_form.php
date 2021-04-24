<!-- Create proposal popup -->
<div class="popup-wizered">
  <div class="wizard-container popup-wizered-modal pt-0 col-md-8 col-sm-12">
    <div class="card wizard-card" data-color="orange" id="wizardProfile">
      <form action="" method="post" class="modal-form" id="make_proposal">
        <button type="button" class="btn btn-danger close-modal">
          <i class="fas fa-times-circle close-modal"></i>
        </button>
        <div class="wizard-header">
          <h3>
            <span class="modal-title"><span class="bahak">বাহকের</span> সাথে থাকুন</span>
            <br />
            <small>আপনার দেয়া সমস্ত তথ্য আমাদের কাছে সুরক্ষীত থাকবে।</small>
          </h3>
        </div>

        <div class="wizard-navigation">
          <ul>
            <li>
              <a href="#load-address-modal" class="d-block" data-toggle="tab">লোড স্থান</a>
            </li>
            <li>
              <a href="#unload-addr-modal" class="d-block" data-toggle="tab">আনলোড স্থান</a>
            </li>
            <li>
              <a href="#goods-info-modal" class="d-block" data-toggle="tab">মালের বিবরণ</a>
            </li>
          </ul>
        </div>

        <div class="tab-content">
          <div class="tab-pane" id="load-address-modal">
            <div class="row mx-0 justify-content-center">
              <div class="col-sm-10">

                <!-- load point -->
                <div class="form-group auto_rel">
                  <label for="load_point">লোডের জায়গা নির্ধারণ করুণ<small>&nbsp;(প্রয়োজন)</small></label>
                  <input type="text" name="load_point_0" class="form-control load_point_0"
                    placeholder="সঠিক স্থান নির্ধারণ করুণ" aria-describedby="load_point1" />
                  <small id="load_point1" class="text-muted auto_wraps"></small>
                </div>

                <div class="form-group auto_rel load_inp">
                </div>
                <!-- extra load point -->
                <div class="form-group">
                  <label>
                    <button type="button" class="btn btn-primary add_inp_box rounded-circle"><i class="fas fa-plus"></i></button>
                    স্থান যোগ করুণ
                  </label>
                </div>
                <!-- load-time -->
                <div class="form-group">
                  <label for="load_time"><span class="bahak">লোডের</span> সময় নির্ধারণ
                    করুণ<small>&nbsp;(প্রয়োজন)</small></label>

                  <div class="input-append date form_datetime" id="datetimepicker" data-date="12-02-2012"
                    data-date-format="-yyyy-dd-mm">
                    <input name="load_time" type="text" class="form-control load_time" placeholder="সময় সঠিকভাবে লিখুণ"
                      readonly />
                    <span class="add-on"><i class="icon-th"></i></span>
                  </div>
                  <small class="form-text text-muted"></small>
                </div>


              </div>
            </div>
          </div>

          <div class="tab-pane" id="unload-addr-modal">
            <div class="row mx-0 justify-content-center">
              <div class="col-sm-10">
                <!-- unload point -->
                <div class="form-group auto_rel">
                  <label for="unload_point">আনলোডের জায়গা নির্ধারণ করুণ<small>&nbsp;(প্রয়োজন)</small></label>
                  <input type="text" name="unload_point_0" class="form-control unload_point_0"
                    placeholder="সঠিক স্থান নির্ধারণ করুণ" aria-describedby="unload_point1" />
                  <small id="unload_point1" class="text-muted auto_wraps"></small>
                </div>

                <div class="form-group auto_rel unload_inp">
                </div>

                <div class="row">

                  <!-- extra unload point -->
                  <div class="form-group col-6">
                    <label>
                      <button type="button" class="btn btn-primary add_inp_box2 rounded-circle"><i class="fas fa-plus"></i></button>
                      স্থান যোগ করুণ
                    </label>
                  </div>


                  <!-- laborer -->
                  <div class="form-check col-6">
                    <label class="form-control">
                      <input type="checkbox" class="form-check-input need_laborer" name="need_laborer" value="1" />
                      লেবার লাগবে
                    </label>
                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="tab-pane" id="goods-info-modal">
            <div class="row mx-0 justify-content-center">
              <!--  -->

              <div class="col-sm-10">
                <div class="row mx-0 justify-content-ceter">
                  <div class="col-6 p-0">
                    <div class="form-group mr-1">
                      <label for="type_of_goods">মালের ধরণ<small>&nbsp;(প্রয়োজন)</small></label>
                      <input type="text" class="form-control type_of_goods" name="type_of_goods"
                        placeholder="ঘর পরিবর্তন" />
                      <small class="form-text text-muted"></small>
                    </div>
                  </div>

                  <div class="col-6 p-0">
                    <div class="form-group ml-1 auto_rel">
                      <label for="type_of_truck">ট্রাকের ধরণ<small>&nbsp;(প্রয়োজন)</small></label>
                      <input type="text" class="form-control form-control-sm type_of_truck" name="type_of_truck"
                        placeholder="ট্রাক নির্বাচণ করুণ">
                      <small class="form-text text-muted auto_wraps"></small>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="goods_quantity">মালের পরিমান<small>&nbsp;(প্রয়োজন)</small></label>
                  <input type="number" class="form-control goods-quantity" name="goods_quantity" placeholder="১ টন" />
                  <small class="form-text text-muted"></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wizard-footer height-wizard">
          <div class="float-right">
            <input type="button" class="btn btn-next btn-fill btn-warning btn-wd btn-sm" name="next" value="পরবর্তি" />
            <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish"
              value="সাবমিট করুণ" />
          </div>

          <div class="float-left">
            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm" name="previous"
              value="আগের অবস্থা" />
          </div>
          <div class="clearfix"></div>
        </div>
        <input type="hidden" class="create_proposal_nonces" name="create_proposal_nonces"
          value="<?php echo wp_create_nonce( "proposal_nonces_val" ) ?>">
      </form>
    </div>
  </div>
</div>
