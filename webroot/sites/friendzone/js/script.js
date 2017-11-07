$(document).ready(function() {
//----------------------------------------------------------SCROLL TO
    $('.js-scrollTo').on('click', function() { 
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top - 60 }, speed ); // Go
        return false;
    });

    $('#changeProfil').click(function(){
        $('.divChangeProfil').fadeIn(500);
        $('.divChangeProfil').css('display','flex');
    });
    
    $('.quitProfil').click(function(){
        $('.divChangeProfil').fadeOut(500);
    });
    $('.opacityProfil').click(function(){
        $('.divChangeProfil').fadeOut(500);
    });
    
    
    
    
    //FIN
});