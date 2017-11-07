$(document).ready(function(){
    
    
//_____________________________________________________________________DEFILEMENT   

$('a[href^="#"]').click(function() {
    var ou = $(this).attr("href").substr(1);
    var saut = $("a[name='"+ ou +"']");
$('html,body').animate({scrollTop: $(saut).offset().top}, 1500);
return false;
});

//_____________________________________________________________________STOPER L'ANNIMATION EN CAS DE SCOLL 

$('body,html').bind('scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove', function(e){
    if ( e.which > 0 || e.type == "mousedown" || e.type == "mousewheel" || e.type == "touchmove"){
        $("html,body").stop();
    }
})

            
//_____________________________________________________________________INFO PAGE 

if(window.matchMedia("(min-width: 800px)").matches) {
var largeur = $(window).width();
var hauteur = $(window).height();
var posX = $('#logo').offset().top;
var posY = $('#logo').offset().left;

//_____________________________________________________________________CHARGEMENT

$("#nav").fadeOut(0);
$("#logo").css("opacity", 0);
$("#headerdown").css("opacity", 0);
document.getElementById("body").style.overflow = "hidden";
//______________________________________________________________________LOADER

$(window).load(function() {
    $("#pagecharg").delay(1500).fadeOut(1000, function(){
        $("#nav").fadeIn(700);
        $("#logo").delay(700).animate({ "opacity": 1}, 700);
        $("#headerdown").delay(1400).animate({ "opacity": 1}, 400);
        document.getElementById("body").style.overflowY = "scroll";
    });
});
//______________________________________________________________________SI LE TEMPS DEPASSE 8S
setTimeout(function(){ 
    $("#pagecharg").delay(1500).fadeOut(1000, function(){
        $("#nav").fadeIn(700);
        $("#logo").delay(700).animate({ "opacity": 1}, 700);
        $("#headerdown").delay(1400).animate({ "opacity": 1}, 400);
        document.getElementById("body").style.overflowY = "scroll";
        //alert("Attention, l'intégralité du site cn'est peut etre pas charger.")
    });
}, 8000);
//______________________________________________________________________SLIDER
$(function(){
    setInterval(function(){
        $(".slideshow ul").animate({marginLeft:-largeur},2000,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
        })
    }, 1000);
});
//______________________________________________________________________MENU

var lastScrollTop = 0;
 
$( window ).on( "scroll", function(){
   var posscrool = $( this ).scrollTop();
    //scroll vers le bas
   if ( posscrool > lastScrollTop ){

        if(posscrool > hauteur -40 ) {
            $("#nav").css('backgroundColor',"transparent");
            $(".menutitre").css("opacity", 0);
            $("#menuresp").css("opacity", 1);
        }

        if(posscrool > hauteur - 380 ) {
            $("#article1").css("opacity", 1);
            $("#article2").css("opacity", 1);
            $("#article3").css("opacity", 1);    
        }

        if(posscrool > hauteur - 30 ) {
            $("#article4").css("opacity", 1);
            $("#article5").css("opacity", 1);
            $("#article6").css("opacity", 1);    
        }
        if(posscrool > hauteur + 240 ) {
            $("#article7").css("opacity", 1);
            $("#article8").css("opacity", 1);
            $("#article9").css("opacity", 1);    
        }
        if(posscrool > hauteur + 450 ) {
            $("#article10").css("opacity", 1);
            $("#article11").css("opacity", 1);
            $("#article12").css("opacity", 1);    
        }
        if(posscrool > hauteur + 660 ) {
            $("#article13").css("opacity", 1);
   
        }
       
       
        if(posscrool > hauteur + 1340 ) {
            //$("#equipe1").animate({ "opacity": 1}, 200);
            $("#equipe2").animate({ "opacity": 1}, 400);
            $("#equipe3").delay(900).animate({ "opacity": 1}, 400);
            $("#equipe4").delay(400).animate({ "opacity": 1}, 400);
            $("#equipe5").delay(200).animate({ "opacity": 1}, 400);
            $("#equipe6").delay(1000).animate({ "opacity": 1}, 400);
            $("#equipe7").delay(100).animate({ "opacity": 1}, 400);
            $("#equipe8").delay(500).animate({ "opacity": 1}, 400);
            $("#equipe9").delay(700).animate({ "opacity": 1}, 400);
            $("#equipe10").delay(800).animate({ "opacity": 1}, 400);
            $("#equipe11").delay(400).animate({ "opacity": 1}, 400);
            $("#equipe12").delay(200).animate({ "opacity": 1}, 400);
   
        }

   }
   //scroll vers le haut
    else {    
        if(posscrool < hauteur) {        
            $("#nav").css('backgroundColor',"#e42d41");
            $(".menutitre").css("opacity", 1);
            $("#menuresp").css("opacity", 0);
        }    
    }
   lastScrollTop = posscrool;
});



    $("#menuresp").on("click", function(){
            $("#nav").css('backgroundColor',"#e42d41");
            $(".menutitre").css("opacity", 1);
            $("#menuresp").css("opacity", 0);
    });






//______________________________________________________________________PARALLAX

$("#logo").css('background-position', 'top');

(function() {
            
    var documentEl = $(document),
       parallax = $('#logo');
       
    documentEl.on('scroll', function() {
        var currScrollPos = documentEl.scrollTop();
        parallax.css('background-position', 'center ' + - currScrollPos/4.5+ 'px');
    });      
            
})();


//suivant
$("#headerdown").css("top", hauteur-100);





//______________________________________________________________________EQUIPE

$("#equipe1").mouseenter(function(){

    $("#equipe3").css('background-size', '170%');
    $("#equipe3").css('background-position', 'center');
    //$("#jonathan").css('opacity', '1');
        
});

$("#equipe1").mouseleave(function(){

    $("#equipe3").css('background-size', '140%');
    $("#equipe3").css('background-position', 'center');
    //$("#jonathan").css('opacity', '0');
        
});


$("#equipe3").mouseenter(function(){

    $("#equipe3").css('background-size', '170%');
    $("#equipe3").css('background-position', 'center');
    //$("#jonathan").css('opacity', '1');
        
});

$("#equipe3").mouseleave(function(){

    $("#equipe3").css('background-size', '140%');
    $("#equipe3").css('background-position', 'center');
    //$("#jonathan").css('opacity', '0');
        
});

  
    
    
//________________________________________________________________________________POP-UP 

//-------------------------------------------------------FONCTION
  
//RETOURNER UNE VALEUR PRECEDENTE 
function creerChangePresentation(i){
    return function(){
        changePresentation(i); 
    }
}

// DEFINIR LES CHAMPS
function changePresentation(i){
    pop1.innerHTML= equipe[i].nom;
    pop2.innerHTML= equipe[i].job;
    pop3.innerHTML= equipe[i].tache1;
    pop4.innerHTML= equipe[i].tache2;
    pop5.innerHTML= equipe[i].autre;
    
    //pop6.innerHTML= equipe[i].form;
    //pop7.innerHTML= equipe[i].formulaire;
}
    
  
    
//_________________________________________________VARIABLE
    //DEFINITION DE LA STRUCTURE
    function presentation(nom,job,tache1,tache2,autre) {    
        this.nom=nom;
        this.job=job;
        this.tache1=tache1;
        this.tache2=tache2;
        this.autre=autre;
        //this.image=image;
        //this.formulaire=formulaire;
   }
    
    //INSTENSIATION DES CHAMPS
    var pers1= new presentation(
        " Chers lecteurs, soyez les bienvenus.",

        " ",

        "Lorsqu’un groupe de 10 étudiants en Métiers du Multimédia et Internet s’associent pour créer un nouveau magazine, cela donne Gecko ! Après des semaines de travail acharné, l’équipe de Gecko est heureuse et excitée de vous présenter votre nouveau magazine. Encore un, nous direz-vous ? Oui, ce genre de magazine se compte à foison, mais Gecko est différent des autres.",

        "Entièrement rédigé par des jeunes pour les jeunes, et parce-que nous ne voulons laisser personne sur le carreau, parce-que nous voulons toucher et intéresser le plus de jeunes possible, Gecko se veut diversifié. A travers les différents thèmes traités, de la religion au sport, en passant par la télévision et le cinéma, notre désir est de vous informer voire même de vous faire voyager. Mais la diversité est surtout présente au sein même de l’équipe. Tous jeunes, certes, mais à chacun une personnalité différente. Et c’est cette différence de point de vue, d’opinion, de goûts, que nous souhaitons vous faire partager.",
        
        "Jonathan Masson"
    );
    
    
    
    var pers2= new presentation("Jonathan","THE Rédac' Chef","A son actif : la ligne éditoriale ainsi que <br/> la correction de tous les articles du site","et il a lui-même écrit à propos du Top-Séries.","<img width='500px' src='img/equipe/jona.png'/>");
    
    var pers3= new presentation("Thomas","Le Journaliste de Sensations Fortes","Nous transmet sa passion, <br/> La moto, il écrit sur l'Enduropale du Touquet","et comment bien Choisir Sa Moto <br/> en fonction de son profil et de ses envies.","<img width='500px' src='img/equipe/tho.png'/>");
    
    var pers4= new presentation("Florine","Notre Journaliste(eeeee)","Elle enquête sur les différents avis et clichés sur la Religion Catholique et nous fait part des évolutions au cours du temps","Elle nous donne aussi des conseils / astuces <br> pour notre Bien Être.","<img width='500px' src='img/equipe/flo.png'/>");
    
    var pers5= new presentation("Richard","Le Redacteur Cultivé (mais pas que)"," Il décrit l'ensemble de la saga Star Wars,<br/> avec des chiffres plus qu'intéressant ","et il nous parle de La gazette du sorcier.","<img width='500px' src='img/equipe/ri.png'/>");
    
    var pers6= new presentation("Quentin","Le Redacteur Aventureux","Nous vend du rêve avec ses articles écrits <br/> à travers le monde : Globe-Trotters","et nous parle du Tour de France.","<img width='500px' src='img/equipe/quen.png'/>");
    
    var pers7= new presentation("Maxime","Le Redacteur frissonnant","En un coup de vent glacial, il a composé et <br/> réfléchi sur les différentes théories sur le Joker","","<img width='500px' src='img/equipe/maxime.png'/>");
    
    var pers8= new presentation("Odic"," Notre Rédacteur Ultra Connecté","Il s'informe sur toutes les nouvelles technologies, <br/> Il a rédigé l'E-sport","et comment chosir son ordi en fonction de ses besoins.","<img width='500px' src='img/equipe/o.png'/>");
    
    var pers9= new presentation("Baptiste"," Le RédaGraphiste de Ouf","Il s'est renseigné sur les sorties à venir et, <br/>il a écrit sur la série Prison Break","Il a aussi réalisé le magnifique logo de Gecko.","<img width='500px' src='img/equipe/bap.png'/>");
    
    var pers10= new presentation("Vincent","Le Web designer de MALADE","Il a fait le Design & la Maquette de Gecko"," et a fait la totalité de l'intégration des articles <br/> écrits par nos Rédacteurs et Journalistes","<img width='500px' src='img/equipe/vin.png'/>");
    
    var pers11= new presentation("Maxime","Le PRO du Web","De façon dynamique il a fait l'intégration <br/> de la page d'accueil, le responsive du site","Et permet le Contact entre vous, les lecteurs et nous.","<img width='500px' src='img/equipe/max.png'/>");

    
    //NOUVEAU TABLEAU
    var equipe=new Array;

    equipe[1]=pers1;
    equipe[2]=pers2;
    equipe[3]=pers3;
    equipe[4]=pers4;
    equipe[5]=pers5;
    equipe[6]=pers6;
    equipe[7]=pers7;
    equipe[8]=pers8;
    equipe[9]=pers9;
    equipe[10]=pers10;
    equipe[11]=pers11;
    
    var pop1 = document.getElementById("popUpInfo1");
    var pop2 = document.getElementById("popUpInfo2");
    var pop3 = document.getElementById("popUpInfo3");
    var pop4 = document.getElementById("popUpInfo4");
    var pop5 = document.getElementById("popUpInfo5");
    //var pop6 = document.getElementById("popUpInfo6");
    //var pop7 = document.getElementById("popUpInfo7");



//-------------------------------------------------------au click

    
$(".pop").on("click", function(){
    $("#popup").slideDown(350);
});  
       
$(window).on("click", function(){
    $("#popup").slideUp(350);
});

    
  
// EVENEMENT AU CLICK -> DONNE LES VARIABLE  
  
for (var n = 2; n <= 12; n++) {
    $("#equipe"+n).on("click", creerChangePresentation(n-1));
}

  
    
    
    
//ANCIENNE METHODE
     
/* 
$("#equipe1").on("click", function(){  var i= 1; changePresentation(i); }); 
$("#equipe3").on("click", function(){  var i= 2; changePresentation(i); }); 
$("#equipe4").on("click", function(){  var i= 3; changePresentation(i); }); 
$("#equipe5").on("click", function(){  var i= 4; changePresentation(i); });
$("#equipe6").on("click", function(){  var i= 5; changePresentation(i); });
$("#equipe7").on("click", function(){  var i= 6; changePresentation(i); });
$("#equipe8").on("click", function(){  var i= 7; changePresentation(i); });
$("#equipe9").on("click", function(){  var i= 8; changePresentation(i); });
$("#equipe10").on("click", function(){  var i= 9; changePresentation(i);}); 
$("#equipe11").on("click", function(){  var i= 10; changePresentation(i);});
$("#equipe12").on("click", function(){  var i= 11 ;changePresentation(i);});    
*/  
    
    

//______________________________________________________________________FORMULAIRE

var nom=0;
var prenom=0;
var email=0;
var message=0;


$(function(){
    $("#nom").keyup(function(){ $("#nom").css("background-color","#59b390"); });
    $("#prenom").keyup(function(){ $("#prenom").css("background-color","#59b390"); });
    $("#email").keyup(function(){ $("#email").css("background-color","#59b390"); });
    $("#message").keyup(function(){ $("#message").css("background-color","#59b390"); });
    
});
  
//________________Verification
$(function(){ 

    $("#check").on("click", function(){

            
            if(!$("#nom").val().match(/^[a-z. ]+$/i)){
                $("#nom").css("background-color","#E32D40");
            }
            
            else{nom = 1;}
        //_____________________________________
            
            if(!$("#prenom").val().match(/^[a-z.-]+$/i)){
                $("#prenom").css("background-color","#E32D40");
            }
            
            else{prenom = 1;}

        //_____________________________________
        
            if(!$("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
                $("#email").css("background-color","#E32D40");
            }
            
            else{email = 1;}

        //_____________________________________
        
            if(!$("#message").val().match(/^[\s\S]{20,}/)){
                $("#message").css("background-color","#E32D40");
            }
            
            else{message = 1;}
        
        
         if((nom==1)&&(prenom==1)&&(email==1)&&(message==1)){

                $("#check").css('display', 'none')
    			
    			$("#felicitation").css('display', 'block').animate({ 
    			 marginLeft: "300px",
    			}, 600 );
            }
    });

});



}
//----------------------------------------------------------------------------------


if(window.matchMedia("(max-width: 800px)").matches) {


var largeur = $(window).width();
var hauteur = $(window).height();

        
$("#menuresp").hide();
$("#nav").hide();
    
    
$(".articles").css("opacity", 1);





    
    
    
    
    
    
    
    
    
    
    
    
//________________________________________________________________________________POP-UP 

//-------------------------------------------------------FONCTION
  
//RETOURNER UNE VALEUR PRECEDENTE 
function creerChangePresentation(i){
    return function(){
        changePresentation(i); 
    }
}

// DEFINIR LES CHAMPS
function changePresentation(i){
    pop1.innerHTML= equipe[i].nom;
    pop2.innerHTML= equipe[i].job;
    pop3.innerHTML= equipe[i].tache1;
    pop4.innerHTML= equipe[i].tache2;
    pop5.innerHTML= equipe[i].autre;
    
    //pop6.innerHTML= equipe[i].form;
    //pop7.innerHTML= equipe[i].formulaire;
}
    
  
    
//_________________________________________________VARIABLE
    //DEFINITION DE LA STRUCTURE
    function presentation(nom,job,tache1,tache2,autre) {    
        this.nom=nom;
        this.job=job;
        this.tache1=tache1;
        this.tache2=tache2;
        this.autre=autre;
        //this.image=image;
        //this.formulaire=formulaire;
   }
    
    //INSTENSIATION DES CHAMPS
    var pers1= new presentation(
        " Chers lecteurs, soyez les bienvenus.",

        " ",

        "Lorsqu’un groupe de 10 étudiants en Métiers du Multimédia et Internet s’associent pour créer un nouveau magazine, cela donne Gecko ! Après des semaines de travail acharné, l’équipe de Gecko est heureuse et excitée de vous présenter votre nouveau magazine. Encore un, nous direz-vous ? Oui, ce genre de magazine se compte à foison, mais Gecko est différent des autres.",

        "Entièrement rédigé par des jeunes pour les jeunes, et parce-que nous ne voulons laisser personne sur le carreau, parce-que nous voulons toucher et intéresser le plus de jeunes possible, Gecko se veut diversifié. A travers les différents thèmes traités, de la religion au sport, en passant par la télévision et le cinéma, notre désir est de vous informer voire même de vous faire voyager. Mais la diversité est surtout présente au sein même de l’équipe. Tous jeunes, certes, mais à chacun une personnalité différente. Et c’est cette différence de point de vue, d’opinion, de goûts, que nous souhaitons vous faire partager.",
        
        "Jonathan Masson"
    );
    
    
    
    var pers2= new presentation("Jonathan","THE Rédac' Chef","A son actif : la ligne éditoriale ainsi que <br/> la correction de tous les articles du site","et il a lui-même écrit à propos du Top-Séries.","<img width='85%' src='img/equipe/jona.png'/>");
    
    var pers3= new presentation("Thomas","Le Journaliste de Sensations Fortes","Nous transmet sa passion, <br/> La moto, il écrit sur l'Enduropale du Touquet","et comment bien Choisir Sa Moto <br/> en fonction de son profil et de ses envies.","<img width='85%' src='img/equipe/tho.png'/>");
    
    var pers4= new presentation("Florine","Notre Journaliste(eeeee)","Elle enquête sur les différents avis et clichés sur la Religion Catholique et nous fait part des évolutions au cours du temps","Elle nous donne aussi des conseils / astuces <br> pour notre Bien Être.","<img width='85%' src='img/equipe/flo.png'/>");
    
    var pers5= new presentation("Richard","Le Redacteur Cultivé (mais pas que)"," Il décrit l'ensemble de la saga Star Wars,<br/> avec des chiffres plus qu'intéressant ","et il nous parle de La gazette du sorcier.","<img width='85%' src='img/equipe/ri.png'/>");
    
    var pers6= new presentation("Quentin","Le Redacteur Aventureux","Nous vend du rêve avec ses articles écrits <br/> à travers le monde : Globe-Trotters","et nous parle du Tour de France.","<img width='85%' src='img/equipe/quen.png'/>");
    
    var pers7= new presentation("Maxime","Le Redacteur frissonnant","En un coup de vent glacial, il a composé et <br/> réfléchi sur les différentes théories sur le Joker","","<img width='85%' src='img/equipe/maxime.png'/>");
    
    var pers8= new presentation("Odic"," Notre Rédacteur Ultra Connecté","Il s'informe sur toutes les nouvelles technologies, <br/> Il a rédigé l'E-sport","et comment chosir son ordi en fonction de ses besoins.","<img width='85%' src='img/equipe/o.png'/>");
    
    var pers9= new presentation("Baptiste"," Le RédaGraphiste de Ouf","Il s'est renseigné sur les sorties à venir et, <br/>il a écrit sur la série Prison Break","Il a aussi réalisé le magnifique logo de Gecko.","<img width='85%' src='img/equipe/bap.png'/>");
    
    var pers10= new presentation("Vincent","Le Web designer de MALADE","Il a fait le Design & la Maquette de Gecko"," et a fait la totalité de l'intégration des articles <br/> écrits par nos Rédacteurs et Journalistes","<img width='85%' src='img/equipe/vin.png'/>");
    
    var pers11= new presentation("Maxime","Le PRO du Web","De façon dynamique il a fait l'intégration <br/> de la page d'accueil","Et permet le Contact entre vous, les lecteurs et nous.","<img width='85%' src='img/equipe/max.png'/>");

    
    //NOUVEAU TABLEAU
    var equipe=new Array;
    equipe[1]=pers1;
    equipe[2]=pers2;
    equipe[3]=pers3;
    equipe[4]=pers4;
    equipe[5]=pers5;
    equipe[6]=pers6;
    equipe[7]=pers7;
    equipe[8]=pers8;
    equipe[9]=pers9;
    equipe[10]=pers10;
    equipe[11]=pers11;
    
    
    var pop1 = document.getElementById("popUpInfo1");
    var pop2 = document.getElementById("popUpInfo2");
    var pop3 = document.getElementById("popUpInfo3");
    var pop4 = document.getElementById("popUpInfo4");
    var pop5 = document.getElementById("popUpInfo5");
    //var pop6 = document.getElementById("popUpInfo6");
    //var pop7 = document.getElementById("popUpInfo7");



//-------------------------------------------------------au click

    
$(".pop").on("click", function(){
    $("#popup").slideDown(350);
});  
       
$("#popup").on("click", function(){
    $("#popup").slideUp(350);
});

    
  
// EVENEMENT AU CLICK -> DONNE LES VARIABLE  
  
for (var n = 2; n <= 12; n++) {
    $("#equipe"+n).on("click", creerChangePresentation(n-1));
}
    
    
    
 //---------------------------------------------------------------------------------------------   
    
    
var nom=0;
var prenom=0;
var email=0;
var message=0;


$(function(){
    $("#nom").keyup(function(){ $("#nom").css("background-color","#59b390"); });
    $("#prenom").keyup(function(){ $("#prenom").css("background-color","#59b390"); });
    $("#email").keyup(function(){ $("#email").css("background-color","#59b390"); });
    $("#message").keyup(function(){ $("#message").css("background-color","#59b390"); });
    
});
  
//________________Verification
$(function(){ 

    $("#check").on("click", function(){

            
            if(!$("#nom").val().match(/^[a-z. ]+$/i)){
                $("#nom").css("background-color","#E32D40");
            }
            
            else{nom = 1;}
        //_____________________________________
            
            if(!$("#prenom").val().match(/^[a-z.-]+$/i)){
                $("#prenom").css("background-color","#E32D40");
            }
            
            else{prenom = 1;}

        //_____________________________________
        
            if(!$("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
                $("#email").css("background-color","#E32D40");
            }
            
            else{email = 1;}

        //_____________________________________
        
            if(!$("#message").val().match(/^[\s\S]{20,}/)){
                $("#message").css("background-color","#E32D40");
            }
            
            else{message = 1;}
        
        
         if((nom==1)&&(prenom==1)&&(email==1)&&(message==1)){

                $("#check").css('display', 'none')
    			
    			$("#felicitation").css('display', 'block').animate({ 
    			 marginLeft: "25%",
    			}, 600 );
            }
    });

});

    
  
    
    
    

}



});