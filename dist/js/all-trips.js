jQuery(document).ready(function ($) {
  // edit trip
  $(".edit-btn").click(() => {
    $(".trip-info-views").addClass("hide-inp");
    $(".edit-inp").show();
  });
  $(".close-edit").click(() => {
    $(".trip-info-views").removeClass("hide-inp");
    $(".edit-inp").hide();
  });
  // show trips
  $(".show-trips-cls").click(function () {
    if ($(this).hasClass("active")) {
      console.log($(this).children().attr("data-value"));
      return;
    }
  });
  $(".show-trips-cls input").click(function () {
    $(".dynamic-tittle").text($(this).parent("label").text());
  });
});
