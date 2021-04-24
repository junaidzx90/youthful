jQuery(document).ready(function ($) {
  $(".header-slide").carousel({ interval: 9000 });
  $("#widget-slider").carousel({ interval: 3000 });
  // Slick slider
  $(".servicess_slider").slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 280,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // reviewa slider
  $(".center").slick({
    centerMode: true,
    centerPadding: "60px",
    slidesToShow: 7,
    autoplay: true,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 600,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 280,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "40px",
          slidesToShow: 1,
        },
      },
    ],
  });

  $(function () {
    $(".hero-title1").typed({
      strings: [
        "গাড়ি এবং চাকরি এখন খুব সহজ!",
        "আর কোন চিন্তা নেই অলস সময়কে নিয়ে",
        "ঘর বদল হবে এখন খুব সহজেই!",
      ],
      typeSpeed: 10,
      backSpeed: 1,
      backDelay: 500,
      showCursor: true,
      loop: true,
    });
  });
});
