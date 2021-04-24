jQuery(function ($) {
  $(".loadmore").click(function () {
    var button = $(this),
      data = {
        action: "offer_loadmore",
        query: offer_loadmore_param.posts,
        page: offer_loadmore_param.current_page,
        // filterdata: $(".projectfilter").val(),
      };
      
      $.ajax({
        url: offer_loadmore_param.ajaxurl,
        data: data,
        type: "POST",
        beforeSend: function () {
          button.text("Loading...");
        },
        success: function (data) {
          if (data) {
            button.text("Load More").prev().append(data);
            offer_loadmore_param.current_page++;

            if (
              offer_loadmore_param.current_page ==
              offer_loadmore_param.max_page
            ) {
              button.remove();
            }
          } else {
            button.remove();
          }
        },
      });
    
  });
});