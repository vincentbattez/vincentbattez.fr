/*global ScrollMagic*/
jQuery(document).ready(function ($) {
    // init controller
    var controller = new ScrollMagic.Controller();

    $("body").on("click", "button.hide", function (event) { // click to hide
        event.preventDefault();
        $(".navFollow").addClass("hide").removeClass("show");
        $(this).addClass("show").removeClass("hide");
        $(".navFollow .fa").removeClass("fa-eye-slash").addClass("fa-eye");
    });

    $("body").on("click", "button.show", function (event) { // click to show
        event.preventDefault();
        $(".navFollow").removeClass("hide").addClass("show");
        $(this).removeClass("show").addClass("hide");
        $(".navFollow .fa").removeClass("fa-eye").addClass("fa-eye-slash");
    });


    /////////////////////////////////////
    //////////  SCROLLMAGIC  ////////////
    /////////////////////////////////////
    //////////  navFollow WEB ////////////
    // build scene
    var hSelector = $("#web").height();
    new ScrollMagic.Scene({
            duration: hSelector,
            triggerElement: "#web",
            triggerHook: 0.6,
        })
        .on("enter", function() {
            $(".nav-web li").addClass("active").removeClass("inactive");
        })
        .on("leave", function() {
            $(".nav-web li").addClass("inactive").removeClass("active");
        })
        .addTo(controller);

    //////////  navFollow link highlight ////////////
    $(".article-content").each(function() {
        var type = $(this).attr("id");
        var selector = ".nav-" + type + " li";
        var hSelector = $("#" + type).height() + 160;
        new ScrollMagic.Scene({
                duration: hSelector,
                triggerElement: "#" + type,
                triggerHook: 0.8,
            })
            .on("enter", function() {
                $(selector).addClass("active").removeClass("inactive");
            })
            .on("leave", function() {
                $(selector).addClass("inactive").removeClass("active");
            })
            .addTo(controller);
    });
    //////////  Show navFollow  ////////////
    // build scene
    new ScrollMagic.Scene({
            triggerElement: "nav",
            triggerHook: 0,
            duration: 0
        })
        .setPin(".navFollow")
        .on("enter", function() {
            $(".navFollow").addClass("show").removeClass("hide");
        })
        .addTo(controller);

}); // END
