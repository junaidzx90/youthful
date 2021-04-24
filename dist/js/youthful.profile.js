jQuery(document).ready(function ($) {
  // profile image

  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".avatar").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  };

  //Custom Avatar change
  $(".user_avatar").on("change", function () {
    let imgName = $(this)
      .val()
      .replace(/.*(\/|\\)/, "");
    let exten = imgName.substring(imgName.lastIndexOf(".") + 1);
    let expects = ["jpg", "jpeg", "png", "PNG"];

    if (expects.indexOf(exten) == -1) {
      return false;
    }

    readURL(this);

    $("#avatar_form").append(
      "<input type='submit' class='savebtn btn btn-block btn-success' value='save'>"
    );

    $(".savebtn").addClass("savebtn_active");
    $(".file").css("display", "block");
    $(".chnge_btn").css("display", "none");

    $("#avatar_form").submit(function (e) {
      e.preventDefault();
      $(this).ajaxSubmit({
        type: "POST",
        url: profile_ajax_url.ajax_url,
        data: {
          action: "upload_avatar",
        },
        dataType: "json",
        success: function (response) {
          if (response.success) {
            $(".savebtn").removeClass("savebtn_active").hide();
            $(".file").css("display", "");
            $(".chnge_btn").css("display", "block");
          } else {
            swal({
              text: response.error,
              icon: "warning",
            });
          }
        },
        resetForm: true,
      });
    });
  });

  // Popup modal
  $(".create-new-trip").on("click", () => {
    $(".popup-wizered").fadeIn();
    $(".ui-menu").on("scroll touchmove mousewheel", function (e) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    });
    $(".popup-wizered").on("scroll touchmove mousewheel", function (e) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    });
  });

  // Close modal window
  $(document.body).click(function (e) {
    if ($(e.target).hasClass("close-modal")) {
      $(".popup-wizered").hide();
      $("#make_proposal").resetForm();
    } else if ($(e.target).hasClass("popup-wizered")) {
      $(".popup-wizered").hide();
    }
  });

  // modal checkbox
  $(".icon").click(function () {
    $("input[type='checkbox']").attr("checked", false);
    $(this).css("border-color", "none");
  });

  // EXTRA INPUT BOX ADDING
  extra_inp_add();

  function extra_inp_add() {
    let i = 0;
    let u = 0;

    $(".add_inp_box").on("click", function () {
      if ($(".load_inp").children().length >= 2) {
        $(this).addClass("dismish").parent().hide();
      }

      if (!$(this).hasClass("dismish")) {
        i += 1;
        // add inp
        $(".load_inp").append(
          '<span class="mb-2 cls_inp" style="position: relative; display: block;"><input type="text" name="load_point_' +
            i +
            '" class="form-control load_point_' +
            i +
            '" placeholder="স্থান নির্ধারণ করুণ" aria-describedby="load_point1" required /><span style="position:absolute; top:6px; right:6px;color: red;cursor:pointer;"><i class="fas fa-times-circle cls_txt"></i></span></span>'
        );
        // close inp
        $(".cls_txt").on("click", function () {
          $(this).parent().parent().remove();
          if ($(".load_inp").children().length <= 2) {
            $(".add_inp_box").removeClass("dismish").parent().show();
          }
        });
      }
    });

    // Unload points
    $(".add_inp_box2").on("click", function () {
      if ($(".unload_inp").children().length >= 2) {
        $(this).addClass("dismish").parent().hide();
      }

      if (!$(this).hasClass("dismish")) {
        u += 1;
        // add inp
        $(".unload_inp").append(
          '<span class="mb-2 cls_inp" style="position: relative; display: block;"><input type="text" name="unload_point_' +
            u +
            '" class="form-control unload_point_' +
            u +
            '" placeholder="স্থান নির্ধারণ করুণ" aria-describedby="load_point1" required/><span style="position:absolute; top:6px; right:6px;color: red;cursor:pointer;"><i class="fas fa-times-circle cls_txt2"></i></span></span>'
        );
        // close inp
        $(".cls_txt2").on("click", function () {
          $(this).parent().parent().remove();
          if ($(".unload_inp").children().length <= 2) {
            $(".add_inp_box2").removeClass("dismish").parent().show();
          }
        });
      }
    });

    // Laborer
    $(".need_laborer").change(() => {
      let mythis = $(".need_laborer");
      if (mythis.is(":checked")) {
        mythis
          .parent("label")
          .addClass("p-0 border-0")
          .html("কতজন")
          .append(
            "<input name='need_laborer' type='number' placeholder='২ জন' class='form-control' required>"
          );
      }
    });
  }

  // Proposal cretae input box date picker
  $(".form_datetime").datetimepicker({
    format: "dd/mm/yyyy - P HH:ii",
    showMeridian: true,
    appendTo: $(".form_datetime").next(),
    autoclose: true,
  });

  $(".btn-finish").click(function () {
    let post_id = $(this).attr("data-id");
    swal({
      title: "আপনি কি নিশ্চিত?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willPublish) => {
      if (willPublish) {
        $("#make_proposal").ajaxSubmit({
          type: "POST",
          url: profile_ajax_url.ajax_url,
          data: {
            action: "create_proposal",
            post_id: post_id,
          },
          cache: false,
          dataType: "json",
          success: function (response) {
            if (response.success) {
              swal({
                icon: "success",
                buttons: false,
              });
              setTimeout(() => {
                location.reload();
              }, 2000);
            } else {
              swal({
                text: response.error,
                icon: "warning",
              });
            }
          },
          resetForm: true,
        });
      } else {
        $("#make_proposal").resetForm();
      }
    });
  });
  //end popup

  $(".trip-finished").click(function () {
    let item = $(this);
    let tripid = $(this).attr("data-id");
    let client_id = $(this).attr("data-cid");
    let user_id = $(this).attr("data-uid");
    swal({
      title: "আপনি কি নিশ্চিত?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willcancel) => {
      if (willcancel) {
        $.ajax({
          type: "POST",
          url: profile_ajax_url.ajax_url,
          data: {
            action: "finished_trip",
            trip_id: tripid,
            client_id: client_id,
            user_id: user_id,
            sequrity: profile_ajax_url.sequrity,
          },
          success: function (response) {
            location.reload();
          },
        });
      }
    });
  });

  // Trip cancel
  $(".trip-canceled").click(function () {
    let item = $(this);
    let tripid = $(this).attr("data-id");
    let user_id = $(this).attr("data-uid");
    swal({
      title: "আপনি কি নিশ্চিত?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willcancel) => {
      if (willcancel) {
        $.ajax({
          type: "POST",
          url: profile_ajax_url.ajax_url,
          data: {
            action: "cancel_trip",
            trip_id: tripid,
            user_id: user_id,
            sequrity: profile_ajax_url.sequrity,
          },
          success: function (response) {
            item
              .parent()
              .parent()
              .parent()
              .parent()
              .remove();
            let finishedcount = parseInt($(".trip-cancel").text());
            $(".trip-cancel").text(finishedcount + 1);
          },
        });
      }
    });
  });

  // remove trip from cart
  $(".trip-cls").click(function () {
    let item = $(this);
    let tripid = $(this).attr("data-id");
    let user_id = $(this).attr("data-uid");
    let client_id = $(this).attr("data-cid");
    swal({
      title: "আপনি কি নিশ্চিত?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willcancel) => {
      if (willcancel) {
        $.ajax({
          type: "POST",
          url: profile_ajax_url.ajax_url,
          data: {
            action: "removetripfromcart",
            trip_id: tripid,
            client_id: client_id,
            user_id: user_id,
            sequrity: profile_ajax_url.sequrity,
          },
          success: function (response) {
            item
              .parent(".btn-group")
              .parent(".trip-pending-content")
              .parent(".card-header")
              .parent(".card")
              .remove();
          },
        });
      }
    });
  });

  // Approve trip
  $(".trip-approve").click(function () {
    let item = $(this);
    let tripid = $(this).attr("data-id");
    let driver_id = $(this).attr("data-uid");
    swal({
      title: "আপনি কি নিশ্চিত?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willcancel) => {
      if (willcancel) {
        $.ajax({
          type: "POST",
          url: profile_ajax_url.ajax_url,
          data: {
            action: "tripapproved",
            trip_id: tripid,
            driver_id: driver_id,
            sequrity: profile_ajax_url.sequrity,
          },
          success: function (response) {
            location.reload();
          },
        });
      }
    });
  });
});