jQuery(function ($) {
  // Close modal window
  $(document.body).click(function (e) {
    if ($(e.target).hasClass("clsbtn")) {
      $(".popup-wizered").hide();
      setTimeout(() => {
        location.reload();
      }, 800);
    }
  });

  // Get and open bid window for driver
  $(".bid_btn").click(function () {
    let data_id = $(this).attr("data-id");
    let client_id = $(".bidsubmit").attr("data-client");
    $(".bidsubmit").attr("data-client", $(this).attr("data-client"));

    mythis = $(this);
    $.ajax({
      type: "POST",
      url: dashboard_ajax_url.ajax_url,
      data: {
        action: "get_proposal_places",
        project_id: data_id,
      },
      beforeSend: () => {
        mythis.text("Opening...");
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          $.each(response, (ind, data) => {
            
            $(".loadtime").html(data.loadtime);

            $(".loadplace_0 h6")
              .html(
                data.load_point_0 +
                  "<span class='bahak'>&nbsp;থেকে&nbsp;<i class='fas fa-truck-moving'></i>&nbsp;</span>" +
                  data.unload_point_0
            );
            $(".extra_loadplace_1 h6").html(
              data.load_point_1 +
                "<span class='bahak'>&nbsp;থেকে&nbsp;<i class='fas fa-truck-moving'></i>&nbsp;</span>" +
                data.unload_point_1
            );
            $(".extra_loadplace_2 h6").html(
              data.load_point_2 +
                "<span class='bahak'>&nbsp;থেকে&nbsp;<i class='fas fa-truck-moving'></i>&nbsp;</span>" +
                data.unload_point_2
            );
            $(".bidsubmit").attr("data-id", data.post_id);
            setTimeout(() => {
              $(".popup-wizered").show();
              mythis.text("Wating").css("background", "gray");
            }, 1000);
          });
        } else {
          // Not allowed any critical activities
          if (response.reload || response.error) {
            location.reload();
            return false;
          }
        }
      },
    });
  });

  // Place bid
  $(".bidsubmit").on("click", function (e) {
    let post_id = $(".bidsubmit").attr('data-id');
    let client_id = $(".bidsubmit").attr('data-client');
    let price = $("#bidprice").val();

    $("#bidprice").keyup(function () { 
      $("#bidprice").css("border", "1px solid #ddd");
    })

    e.preventDefault();
    if (post_id != "" && price != "" && client_id != "") {
      $.ajax({
        type: "POST",
        url: dashboard_ajax_url.ajax_url,
        data: {
          action: "placebidondatabase",
          post_id: post_id,
          client_id: client_id,
          price: price,
          sequrity: dashboard_ajax_url.sequrity,
        },
        success: function (response) {
          location.reload();
        },
      });
    } else {
      $("#bidprice").css('border','1px solid red')
    }
  });
});
