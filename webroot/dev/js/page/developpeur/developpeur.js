/*global ScrollMagic*/
/*global TimelineMax*/
/*global Linear*/
jQuery(document).ready(function($) {
    if (window.matchMedia("(max-width: 768px)").matches) { // PHONE
    } else { // PC
        /////////////////////////////////////
        //////////  SCROLLMAGIC  ////////////
        /////////////////////////////////////
        //////////  Project ////////////
        // init controller
        var controller = new ScrollMagic.Controller();
        // build scene
        new ScrollMagic.Scene({
            triggerElement: ".site",
            reverse:false,
            triggerHook: 0,
            offset: 200,
        })
        .setClassToggle(".site", "showSite")
        .addTo(controller);
        /////////////////////////////////////
        /////////////  SHOWTXT  /////////////
        /////////////////////////////////////
        var tabletImg = ($(".tablet"));
        var phoneImg = ($(".phone"));
        // build a tween
        var tablet = new TimelineMax();
        tablet
        .from(tabletImg, 0.3, {y:"+=15%", ease:Linear.easeNone},0,4)
        .from(phoneImg, 0.3, {y:"+=-15%", ease:Linear.easeNone},0,4);
        // build scene
        new ScrollMagic.Scene({
            triggerElement: ".tablet",
            offset: -900,
            triggerHook: 0,
            duration: "150%"
        })
        .setTween(tablet)
        .addTo(controller);
    }
    // note-bar
    var rating = parseInt($("#ValueRating").html());
    var noteID;
    var noteTxt;
    if (rating >= 0 && rating < 16){
        noteID = "note1";
        noteTxt = "Très décevant";
    }
    else if(rating >= 16 && rating < 32){
        noteID = "note2";
        noteTxt = "Décevant";
    }
    else if(rating >= 32 && rating < 48){
        noteID = "note3";
        noteTxt = "Moyen";
    }
    else if(rating >= 48 && rating < 64){
        noteID = "note4";
        noteTxt = "Bien";
    }
    else if(rating >= 64 && rating < 80){
        noteID = "note5";
        noteTxt = "Très bien";
    }
    else if(rating >= 80 && rating <= 100){
        noteID = "note6";
        noteTxt = "Parfait";
    }
    $(".note-bar .note-fill").each(function(){
        if (noteID === undefined) { // si c'est undefined on sort :
            return false;
        } else {
            $(this).addClass("active");
            if ($(this).is("#"+noteID)){
                $(".note-texte").html(noteTxt);
                return false;
            }
        }
    });
}); // END
