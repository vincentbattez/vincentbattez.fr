$(document).ready(function() {
    var description = $('p.histoire-description').html();
    var descriptionNbCarac = $('p.histoire-description').html().length;
    var limit = 140;
    if(descriptionNbCarac > limit){
        description = description.substring(0,limit);
        description += "...";
        $('p.histoire-description').replaceWith(description);
    }
});
