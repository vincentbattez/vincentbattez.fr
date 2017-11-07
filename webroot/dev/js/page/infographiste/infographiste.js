/*global ScrollMagic*/
/*global TimelineMax*/
/*global Linear*/
jQuery(document).ready(function($) {
    if (window.matchMedia("(max-width: 768px)").matches) { // PHONE
    } else { // PC
        /////////////////////////////////////
        //////////  SCROLLMAGIC  ////////////
        /////////////////////////////////////
        // init controller
        var controller = new ScrollMagic.Controller();


        /////////////  showArticle  /////////////
        $(".article-content").each(function(e) {
            new ScrollMagic.Scene({
                triggerElement: this,
                reverse:false,
                triggerHook: 0.7,
            })
            .setClassToggle(this, "fadeInUp")
            .addTo(controller);
        /////////////  MoveCard  /////////////
            if($("header h1").html() == "Carterie"){
                var floatCard = $(this).find(".recto");
                var deck = $(this).find(".verso");
                // build a tween
                var moveCard = new TimelineMax();
                if (e % 2 === 1) { // paire =
                    moveCard
                    .from($(floatCard)["0"], 3, {y:"-=50px",x:"-=25px", ease:Linear.easeNone},0,4)
                    .from($(deck)["0"], 3, {y:"+=15px",x:"+=15px",ease:Linear.easeNone},0,4);
                }else{ // impaire =
                    moveCard
                    .from($(floatCard)["0"], 3, {y:"+=50px",x:"+=25px", ease:Linear.easeNone},0,4)
                    .from($(deck)["0"], 3, {y:"-=15px",x:"-=15px",ease:Linear.easeNone},0,4);
                }
                // build scene
                new ScrollMagic.Scene({
                    triggerElement: this,
                    offset: -600,
                    triggerHook: 0,
                    duration: "60%"
                })
                .setTween(moveCard)
                .addTo(controller);
            }
        /////////////  Affiche  /////////////
            // if($("header h1").html() == "Affiches"){
            //     var affiches = $(this).find(".affiches");
            //     // build a tween
            //     var moveAffiches = new TimelineMax();
            //     if (e % 2 === 1) // paire =
            //         moveAffiches.from($(affiches)["0"], 3, {y:"-=100px", ease:Linear.easeNone},0,4);
            //     else // impaire =
            //         moveAffiches.from($(affiches)["0"], 3, {y:"+=100px", ease:Linear.easeNone},0,4);

            //     // build scene
            //     ScrollMagic.Scene({
            //         triggerElement: this,
            //         offset: -600,
            //         triggerHook: 0,
            //         duration: "87%"
            //     })
            //     .setTween(moveAffiches)
            //     .addTo(controller);
            // }
            if($("header h1").html() == "Depliants"){
                var ouvert = $(this).find(".recto");
                var fermer = $(this).find(".verso");
                // build a tween
                var moveDepliant = new TimelineMax();
                if (e % 2 === 1) { // paire =
                    moveDepliant
                    .from($(ouvert)["0"], 3, {y:"-=50px",x:"-=25px", ease:Linear.easeNone},0,4)
                    .from($(fermer)["0"], 3, {y:"+=15px",x:"+=15px",ease:Linear.easeNone},0,4);
                }else{ // impaire =
                    moveDepliant
                    .from($(ouvert)["0"], 3, {y:"+=50px",x:"+=25px", ease:Linear.easeNone},0,4)
                    .from($(fermer)["0"], 3, {y:"-=15px",x:"-=15px",ease:Linear.easeNone},0,4);
                }
                // build scene
                ScrollMagic.Scene({
                    triggerElement: this,
                    offset: -600,
                    triggerHook: 0,
                    duration: "87%"
                })
                .setTween(moveDepliant)
                .addTo(controller);
            }
        });
    }

}); // END
