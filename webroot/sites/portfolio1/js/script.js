var ouiclick = false; Boolean(ouiclick);

$(document).ready(function(){
    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <Parallax>
    $(window).scroll(function(){
        
        var wScroll = $(this).scrollTop();
        
        $('header nav').css({'transform' : 'translate(0px, '+ wScroll /2 +'%)'});
        $('header #vincent').css({'transform' : 'translate(0px, '+ wScroll /2 +'%)'});
        $('header aside ul').css({'transform' : 'translate(0px, '+ -wScroll /8 +'%)'});
        $('header #fleche').css({'transform' : 'translate(0px, '+ wScroll /8 +'%)'});
    });
    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <Ancre>
$('a[href^="#"]').click(function() {
    var ou = $(this).attr("href").substr(1);
    var saut = $("a[name='"+ ou +"']");
    $('html,body').animate({
        
        scrollTop: $(saut).offset().top-50
    
    }, 1000);
    return false;
});
    //_____________________________________________________________________________________________________________________________________________STOPER L'ANNIMATION EN CAS DE SCOLL 

$('body,html').bind('scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove', function(e){
    if ( e.which > 0 || e.type == "mousedown" || e.type == "mousewheel" || e.type == "touchmove"){
        $("html,body").stop();
    }
})

    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <LOADER> 

$(document).ready(function() {
    $(window).load(function() {
        $("#pagecharg").delay(0).fadeOut(1000);
        $("header nav ul").delay(0).fadeIn(1000); //3100
        $("#vincent").delay(0).fadeIn(1000); //4100
    });
});

    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <Scroll> 

var lastScrollTop = 985;
$(window).scroll(function(event){
    var st = $(this).scrollTop();
//
 // navscrool
//
    if (st < lastScrollTop){
        $("#navscrool").css("top","-200px");
    } 
    else {
        $("#navscrool").css("top","0px");
    }
    
     if (st < lastScrollTop+130){
        $("#hamburger_content").css('transform', 'translateX(-100%)');}
//
//
});
    
$(window).scroll(function(){
    posScroll = $(document).scrollTop();
//
//
 // A propos
//
//    
    if(posScroll >=550) {
        $("#fb-propos").css("transform","scale(1)");

        setTimeout(function(){
            $("#in-propos").css("transform","scale(1)");
        },300)

        setTimeout(function(){
            $("#insta-propos").css("transform","scale(1)");
        },600)
    }
//
//
 // Compétences
//
//
    if(posScroll >=1600) {
        $(".html1").css("transform","scale(1)");
        setTimeout(function(){$(".html2").css("transform","scale(1)");},300)
        setTimeout(function(){$(".html3").css("transform","scale(1)");},600)
        setTimeout(function(){$(".html4").css("transform","scale(1)");},900)
        setTimeout(function(){$(".html5").css("transform","scale(1)");},1200)
        
        $(".css1").css("transform","scale(1)");
        setTimeout(function(){$(".css2").css("transform","scale(1)");},300)
        setTimeout(function(){$(".css3").css("transform","scale(1)");},600)
        setTimeout(function(){$(".css4").css("transform","scale(1)");},900)
        setTimeout(function(){$(".css5").css("transform","scale(1)");},1200)
        
        $(".jq1").css("transform","scale(1)");
        setTimeout(function(){$(".jq2").css("transform","scale(1)");},300)
        setTimeout(function(){$(".jq3").css("transform","scale(1)");},600)
        setTimeout(function(){$(".jq4").css("transform","scale(1)");},900)
        setTimeout(function(){$(".jq5").css("transform","scale(1)");},1200)
        
        setTimeout(function(){$(".img_comp").css("opacity","1");},1500)
    }
});
//
 // Compétences rond rouge POP
//
$(window).scroll(function(){
    posScroll = $(document).scrollTop();
    if(posScroll >=550) {
        
        $("#fb-propos").css("transform","scale(1)");
        
        setTimeout(function(){
            $("#in-propos").css("transform","scale(1)");
        },300)
        
        setTimeout(function(){
            $("#insta-propos").css("transform","scale(1)");
        },600)
    }
});
    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <a propos>
$("#fb-propos").mouseenter(function(){
    $(this).css("transform", "scale(1.3)");
});
$("#fb-propos").mouseleave(function(){
    $(this).css("transform", "scale(1)");
});
    
$("#in-propos").mouseenter(function(){
    $(this).css("transform", "scale(1.3)");
});
$("#in-propos").mouseleave(function(){
    $(this).css("transform", "scale(1)");
});
    
$("#insta-propos").mouseenter(function(){
    $(this).css("transform", "scale(1.3)");
});
$("#insta-propos").mouseleave(function(){
    $(this).css("transform", "scale(1)");
});
//_____________________________________________________________________________________________________________________________________________ <Smooth> 
//jQuery.scrollSpeed(100, 800);
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <NEXT>
$(".next").click(function(){
    
    $("#comp1").slideToggle(1000);
    
    setTimeout(function(){
        $(".next2").fadeToggle();
        $(".next1").fadeToggle();
    },1000)
});
    
$("#hamburger").click(function(){
    $("#hamburger_content").css('transform', 'translateX(0%)');
});
$("#hamburger_content a").click(function(){
    $("#hamburger_content").css('transform', 'translateX(-100%)');
});
    
$("#hamburger_content .exit").click(function(){
    $("#hamburger_content").css('transform', 'translateX(-100%)');
});
    //
    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <REALISATION>
            
$("#infographie").click(function(){
    ouiclick = true; 
    if(ouiclick == true){
        
      //Les DIV se redimensionne 
        $(this).css("width","94%");
        $("#photographie").css("width","3%");
        $("#web").css("width","3%");  
        
      //Les images disparaissent et this apparait 
        $("#web .divweb").fadeOut();
        $("#photographie .img").fadeOut();
        $("#infographie .img").fadeIn(100);
        $("#infographie .img").css("height","30%");
        
      //Les textes disparaissent et this apparait
        $("#web p").fadeOut();
        $("#photographie p").fadeOut();
        $("#infographie p").fadeIn(100);
    
      //Les titres disparaissent et this apparait
        $("#web h3").fadeOut();
        $("#photographie h3").fadeOut();
        $("#infographie h3").fadeIn(100);
    
      //Les Croix disparaissent et this apparait
        $("#web .croix").fadeOut();
        $("#photographie .croix").fadeOut();
        $("#infographie .croix").fadeIn();
      //La croix de THIS suit 
        $(this).scroll(function(){
            var divScroll = $(this).scrollTop();
        
            $("#infographie .croix").css({'transform' : 'translate(0px, '+ divScroll +'px)'});
        });
        
      //Le curseur redevient normal
        $(this).css("cursor","default");
        $("#photographie").css("cursor","pointer");
        $("#web").css("cursor","pointer");
                 
      //Scrool
        var saut = $("a[name=realisation]");
        $('html,body').animate({scrollTop: $(saut).offset().top-50}, 500);
    }
});
    
$("#photographie").click(function(){
    ouiclick = true; 
    if(ouiclick == true){
        
      //Les DIV se redimensionne 
        $(this).css("width","94%");
        $("#web").css("width","3%");
        $("#infographie").css("width","3%");
        
        
      //Les images disparaissent et this apparait 
        $("#infographie .img").fadeOut();
        $("#web .divweb").fadeOut();
        $("#photographie .img").fadeIn(100);
        $("#photographie .img").css("height","30%");
        
      //Les textes disparaissent et this apparait
        $("#infographie p").fadeOut();
        $("#web p").fadeOut();
        $("#photographie p").fadeIn(100);
    
      //Les titres disparaissent et this apparait
        $("#infographie h3").fadeOut();
        $("#web h3").fadeOut();
        $("#photographie h3").fadeIn(100);
        
      //Les Croix disparaissent et this apparait
        $("#web .croix").fadeOut();
        $("#infographie .croix").fadeOut();
        $("#photographie .croix").fadeIn();
        
      //La croix de THIS suit 
        $(this).scroll(function(){
            var divScroll = $(this).scrollTop();
        
            $("#photographie .croix").css({'transform' : 'translate(0px, '+ divScroll +'px)'});
        });
      //Le curseur redevient normal
        $(this).css("cursor","default");
        $("#web").css("cursor","pointer");
        $("#infographie").css("cursor","pointer");
                
      //Scrool
        var saut = $("a[name=realisation]");
        $('html,body').animate({scrollTop: $(saut).offset().top-50}, 500);
    }
    
});
$("#web").click(function(){
    ouiclick = true; 
    if(ouiclick == true){
        
      //Les DIV se redimensionne 
        $(this).css("width","94%");
        $("#photographie").css("width","3%");
        $("#infographie").css("width","3%");

      //Les images disparaissent et this apparait 
        $("#infographie .img").fadeOut();
        $("#photographie .img").fadeOut();
        $("#web .divweb").fadeIn(100);
        $("#web .divweb").css("height","30%");
        
      //Les textes disparaissent et this apparait
        $("#infographie p").fadeOut();
        $("#photographie p").fadeOut();
        $("#web p").fadeIn(100);
    
      //Les titres disparaissent et this apparait
        $("#infographie h3").fadeOut();
        $("#photographie h3").fadeOut();
        $("#web h3").fadeIn(100);
        
      //Les Croix disparaissent et this apparait
        $("#web .croix").fadeIn();
        $("#photographie .croix").fadeOut();
        $("#infographie .croix").fadeOut();
      //La croix de THIS suit 
        $(this).scroll(function(){
            var divScroll = $(this).scrollTop();
        
            $("#web .croix").css({'transform' : 'translate(0px, '+ divScroll +'px)'});
        });
        
      //Le curseur redevient normal
        $(this).css("cursor","default");
        $("#photographie").css("cursor","pointer");
        $("#infographie").css("cursor","pointer");

      //Scrool
        var saut = $("a[name=realisation]");
        $('html,body').animate({scrollTop: $(saut).offset().top-50}, 500);
    }
});
    

//______________________________________________________________ CROIX
$(".croix").click(function(){
    $("#web").css("width","33.3%");
    $("#photographie").css("width","33.3%");
    $("#infographie").css("width","33.3%");

  //Les images disparaissent
    $("#web .divweb").fadeOut();
    $("#photographie .img").fadeOut();
    $("#infographie .img").fadeOut();

  //Les textes disparaissent
    $("#web p").fadeOut();
    $("#photographie p").fadeOut();
    $("#infographie p").fadeOut();

  //Les titres disparaissent
    $("#web h3").fadeIn();
    $("#photographie h3").fadeIn();
    $("#infographie h3").fadeIn();

  //Les Croix disparaissent
    $("#web .croix").fadeOut();
    $("#photographie .croix").fadeOut();
    $("#infographie .croix").fadeOut();
        
      //Le curseur redevient normal
    $("#web").css("cursor","pointer");
    $("#photographie").css("cursor","pointer");
    $("#infographie").css("cursor","pointer");
});
    
//______________________________________________________________ plus d'info
//__________________________________________ bloc scrool
$(".more").click(function(){
    // lock scroll position, but retain settings for later
    var scrollPosition = [
      self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
      self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
    ];
    var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
    html.data('scroll-position', scrollPosition);
    html.data('previous-overflow', html.css('overflow'));
    html.css('overflow', 'hidden');
    window.scrollTo(scrollPosition[0], scrollPosition[1]);
        $(".exit_more, .opacite_more").click(function(){
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        });
});
//__________________________________________ Site de favoris
$("#sitefav #more_sitefav").click(function(){
    
    alert(document.getElementById("web").style.width); 
    
    
    $("#sitefav_more_content").fadeIn(300);
    $("#sitefav_more_content").css("transform","scale(1)");
    $("#sitefav_more_content").css("transform","translate(37%,40%)");
    $(".opacite_more").fadeIn(300);
    
});
//__________________________________________ Gecko
$("#gecko #more_gecko").click(function(){
    $("#gecko_more_content").fadeIn(300);
    $("#gecko_more_content").css("transform","scale(1)");
    $("#gecko_more_content").css("transform","translate(-23%,40%)");
    $(".opacite_more").fadeIn(300);
});
//__________________________________________ Site de favoris 2
$("#sitefav2 #more_sitefav2").click(function(){
    $("#sitefav2_more_content").fadeIn(300);
    $("#sitefav2_more_content").css("transform","scale(1)");
    $("#sitefav2_more_content").css("transform","translate(-40%,40%)");
    $(".opacite_more").fadeIn(300);
});
//__________________________________________ Site Partiel
$("#partiel #more_partiel").click(function(){
    $("#partiel_more_content").fadeIn(300);
    $("#partiel_more_content").css("transform","scale(1)");
    $("#partiel_more_content").css("transform","translate(40%,10%)");
    $(".opacite_more").fadeIn(300);
});
    
    
//______________________________________________________________ Exit de l'info
$(".exit_more").click(function(){
    $(".more_content").fadeOut(300);
    $(".more_content").css("transform","scale(0.1)");
    $(".opacite_more").fadeOut(300);
});
$(".opacite_more").click(function(){
    $(".more_content").fadeOut(300);
    $(".more_content").css("transform","scale(0.1)");
    $(".opacite_more").fadeOut(300);
    });
    //
    //
    //
    //
    //
//_____________________________________________________________________________________________________________________________________________ <Zoom> 
    $(".fancybox_infographie")
        .attr('rel', 'gallery')
        .fancybox({
            padding    : 0,
            margin     : 5,
            nextEffect : 'fade',
            prevEffect : 'none',
            autoCenter : false,
            afterLoad  : function () {
                $.extend(this, {
                    aspectRatio : false,
                    type    : 'html',
                    width   : '95%',
                    height  : '100%',
                    content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
                });
            }
        });
    
    $(".fancybox_photographie")
        .attr('rel', 'gallery')
        .fancybox({
            padding    : 0,
            margin     : 5,
            nextEffect : 'fade',
            prevEffect : 'none',
            autoCenter : false,
            afterLoad  : function () {
                $.extend(this, {
                    aspectRatio : false,
                    type    : 'html',
                    width   : '95%',
                    height  : '100%',
                    content : '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /></div>'
                });
            }
        });
//_____________________________________________________________________________________________________________________________________________FORMULAIRE

var nom=0;
var prenom=0;
var email=0;
var message=0;


$(function(){
    $("#nom").keyup(function(){ $("#nom").css("border-color","#59b390"); });
    $("#prenom").keyup(function(){ $("#prenom").css("border-color","#59b390"); });
    $("#email").keyup(function(){ $("#email").css("border-color","#59b390"); });
    $("#message").keyup(function(){ $("#message").css("border-color","#59b390"); });
    
});
  
//________________Verification
$(function(){ 

    $("#check").on("click", function(){

            
            if(!$("#nom").val().match(/^[a-z. ]+$/i)){
                $("#nom").css("border-color","#E32D40");
            }
            
            else{nom = 1;}
        //_____________________________________
            
            if(!$("#prenom").val().match(/^[a-z.-]+$/i)){
                $("#prenom").css("border-color","#E32D40");
            }
            
            else{prenom = 1;}

        //_____________________________________
        
            if(!$("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
                $("#email").css("border-color","#E32D40");
            }
            
            else{email = 1;}

        //_____________________________________
        
            if(!$("#message").val().match(/^[\s\S]{20,}/)){
                $("#message").css("border-color","#E32D40");
            }
            
            else{message = 1;}
        
        
         if((nom==1)&&(prenom==1)&&(email==1)&&(message==1)){

            $("#check").fadeOut(500);
            setTimeout(function(){
                $("#felicitation").css("display","block");
            },500)
            }
    });
});
    
    
//FIN
});