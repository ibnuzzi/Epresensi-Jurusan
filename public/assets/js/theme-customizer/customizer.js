if (localStorage.getItem("color"))
  $("#color").attr(
    "href",
    "../assets/css/" + localStorage.getItem("color") + ".css"
  );
if (localStorage.getItem("dark")) $("body").attr("class", "dark-only");
(function () {})();

//live customizer js
$(document).ready(function () {
  $(".customizer-color li").on("click", function () {
    $(".customizer-color li").removeClass("active");
    $(this).addClass("active");
    var color = $(this).attr("data-attr");
    var primary = $(this).attr("data-primary");
    var secondary = $(this).attr("data-secondary");
    localStorage.setItem("color", color);
    localStorage.setItem("primary", primary);
    localStorage.setItem("secondary", secondary);
    localStorage.removeItem("dark");
    $("#color").attr("href", "../assets/css/" + color + ".css");
    $(".dark-only").removeClass("dark-only");
    location.reload(true);
  });

  $(".customizer-color.dark li").on("click", function () {
    $(".customizer-color.dark li").removeClass("active");
    $(this).addClass("active");
    $("body").attr("class", "dark-only");
    localStorage.setItem("dark", "dark-only");
  });

  if (localStorage.getItem("primary") != null) {
    document.documentElement.style.setProperty(
      "--theme-default",
      localStorage.getItem("primary")
    );
  }
  if (localStorage.getItem("secondary") != null) {
    document.documentElement.style.setProperty(
      "--theme-secondary",
      localStorage.getItem("secondary")
    );
  }
  $(
    ".customizer-links #c-pills-home-tab, .customizer-links #c-pills-layouts-tab"
  ).click(function () {
    $(".customizer-contain").addClass("open");
    $(".customizer-links").addClass("open");
  });

  $(".close-customizer-btn").on("click", function () {
    $(".floated-customizer-panel").removeClass("active");
  });

  $(".customizer-contain .icon-close").on("click", function () {
    $(".customizer-contain").removeClass("open");
    $(".customizer-links").removeClass("open");
  });

  $(".color-apply-btn").click(function () {
    location.reload(true);
  });

  var primary = document.getElementById("ColorPicker1").value;
  document.getElementById("ColorPicker1").onchange = function () {
    primary = this.value;
    localStorage.setItem("primary", primary);
    document.documentElement.style.setProperty("--theme-primary", primary);
  };

  var secondary = document.getElementById("ColorPicker2").value;
  document.getElementById("ColorPicker2").onchange = function () {
    secondary = this.value;
    localStorage.setItem("secondary", secondary);
    document.documentElement.style.setProperty("--theme-secondary", secondary);
  };

  $(".customizer-color.dark li").on("click", function () {
    $(".customizer-color.dark li").removeClass("active");
    $(this).addClass("active");
    $("body").attr("class", "dark-only");
    localStorage.setItem("dark", "dark-only");
  });

  $(".customizer-mix li").on("click", function () {
    $(".customizer-mix li").removeClass("active");
    $(this).addClass("active");
    var mixLayout = $(this).attr("data-attr");
    $("body").attr("class", mixLayout);
  });

  $(".sidebar-setting li").on("click", function () {
    $(".sidebar-setting li").removeClass("active");
    $(this).addClass("active");
    var sidebar = $(this).attr("data-attr");
    $(".sidebar-wrapper").attr("sidebar-layout", sidebar);
  });

  $(".sidebar-main-bg-setting li").on("click", function () {
    $(".sidebar-main-bg-setting li").removeClass("active");
    $(this).addClass("active");
    var bg = $(this).attr("data-attr");
    $(".sidebar-wrapper").attr("class", "sidebar-wrapper " + bg);
  });

  $(".sidebar-type li").on("click", function () {
    $("body").append("");
    console.log("test");
    var type = $(this).attr("data-attr");

    var boxed = "";
    if ($(".page-wrapper").hasClass("box-layout")) {
      boxed = "box-layout";
    }
    switch (type) {
      case "normal-sidebar": {
        $(".page-wrapper").attr(
          "class",
          "page-wrapper horizontal-wrapper " + boxed
        );
        $(".logo-wrapper")
          .find("img")
          .attr("src", "../assets/images/logo/logo.png");
        localStorage.setItem("page-wrapper", "horizontal-wrapper");
        break;
      }
      case "default-body": {
        $(".page-wrapper").attr("class", "page-wrapper  only-body" + boxed);
        localStorage.setItem("page-wrapper", "only-body");
        break;
      }
      case "dark-sidebar": {
        $(".page-wrapper").attr(
          "class",
          "page-wrapper compact-wrapper dark-sidebar" + boxed
        );
        localStorage.setItem("page-wrapper", "compact-wrapper dark-sidebar");
        break;
      }
      case "compact-wrap": {
        $(".page-wrapper").attr(
          "class",
          "page-wrapper compact-sidebar" + boxed
        );
        localStorage.setItem("page-wrapper", "compact-sidebar");
        break;
      }
      case "box-layout": {
        $(".page-wrapper").attr(
          "class",
          "page-wrapper compact-wrapper box-layout " + boxed
        );
        localStorage.setItem("page-wrapper", "compact-wrapper box-layout");
        break;
      }
      default: {
        $(".page-wrapper").attr(
          "class",
          "page-wrapper compact-wrapper " + boxed
        );
        localStorage.setItem("page-wrapper", "compact-wrapper");
        break;
      }
    }
    location.reload(true);
  });

  $(".main-layout li").on("click", function () {
    $(".main-layout li").removeClass("active");
    $(this).addClass("active");
    var layout = $(this).attr("data-attr");
    $("body").attr("class", layout);
    $("html").attr("dir", layout);
  });

  $(".main-layout .box-layout").on("click", function () {
    $(".main-layout .box-layout").removeClass("active");
    $(".sidebar-wrapper").addClass("close_icon");
    $(".page-header").addClass("close_icon");
    $(this).addClass("active");
    var layout = $(this).attr("data-attr");
    $("body").attr("class", "box-layout");
    $("html").attr("dir", layout);
    $(window).resize(function () {
      $(".main-layout .box-layout").removeClass('active');
      $(".sidebar-wrapper").addClass("close_icon");
      $(".page-header").addClass("close_icon");
      $(this).addClass("active");
      var layout = $(this).attr("data-attr");
      $("body").attr("class", "box-layout");
    });
  });
  $('.main-layout .ltr').on('click', function () {
    $(".sidebar-wrapper").removeClass("close_icon");
    $(".page-header").removeClass("close_icon");
    $(window).resize(function () {
       $(".sidebar-wrapper").removeClass("close_icon");
       $(".page-header").removeClass("close_icon");
    });

});
$('.main-layout .rtl').on('click', function () {
   $(".sidebar-wrapper").removeClass("close_icon");
   $(".page-header").removeClass("close_icon");
   $(window).resize(function () {
      $(".sidebar-wrapper").removeClass("close_icon");
      $(".page-header").removeClass("close_icon");
   });
});
  if ($("body").hasClass("box-layout")) {
    $(".sidebar-wrapper").addClass("close_icon");
    $(".page-header").addClass("close_icon");
  }
});

//  responsive sidebar
var $window = $(window);
var widthwindow = $window.width();
var $nav = $(".sidebar-wrapper");
var $header = $(".page-header");
var $toggle_nav_top = $(".toggle-sidebar");

(function ($) {
  "use strict";
  if (widthwindow <= 1400) {
    $toggle_nav_top.attr("checked", false);
    $nav.addClass("close_icon");
    $header.addClass("close_icon");
  }
})(jQuery);
$(window).resize(function () {
  var widthwindaw = $window.width();
  if (widthwindaw <= 1400) {
    $toggle_nav_top.attr("checked", false);
    $nav.addClass("close_icon");
    $header.addClass("close_icon");
  }
  else if (widthwindaw => 1400) {
    $toggle_nav_top.attr("checked", true);
    $nav.removeClass("close_icon");
    $header.removeClass("close_icon");
  }
});
