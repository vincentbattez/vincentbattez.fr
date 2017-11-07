/*global ScrollMagic*/
/*global TimelineMax*/
/*global Linear*/
jQuery(document).ready(function($) {
    /////////////////////////////////////
    //////////  SCROLLMAGIC  ////////////
    /////////////////////////////////////
    // init controller
    var controller = new ScrollMagic.Controller();
    //loop SCROLLMAGIC
    $(".realisations").each(function() {
        /////////////////////////////////////
        ///////////////  PIN  ///////////////
        /////////////////////////////////////
        // build scene
        new ScrollMagic.Scene({
            triggerElement: this,
            triggerHook: 0,
            duration: "30%"
        })
        .setPin(this)
        .addTo(controller);
        /////////////////////////////////////
        ////////  SHOWTXT & overlay  ////////
        /////////////////////////////////////
        var textBlock = (this.children["0"].children["0"]);
        var link = (this.children["0"].children["1"]);
        var overlay = (this.children["0"].children["2"]);
        // build a tween
        var showTxt = new TimelineMax();
        showTxt
        .from(textBlock, 0.3, {autoAlpha:0, y:"+=20%", ease:Linear.easeNone},0,4)
        .from(overlay, 0.3, {autoAlpha:0, ease:Linear.easeNone},0,4)
        .from(link, 0.3, {autoAlpha:0, ease:Linear.easeNone},0,4);
        // build scene
        new ScrollMagic.Scene({
            triggerElement: this,
            offset: 0,
            triggerHook: 0,
            duration: "20%"
        })
        .setTween(showTxt)
        .addTo(controller);
    }); // FIN EACH
    //////////  Téléchargmeent ////////////
    // build scene
    new ScrollMagic.Scene({
        triggerElement: "#cv",
        reverse:false,
        triggerHook: 0.7,
    })
    .setClassToggle("#cv", "fadeInRight")
    .addTo(controller);
});// FIN JQUERY
