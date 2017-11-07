<!DOCTYPE html>
<html>
    <head>
        <title>Gecko - Tour de France 2016</title><!---------------------------------------------------------------------------------------A CHANGER-->
        <link href="../css/reset.css" rel="stylesheet" type="text/css"/> <!--Remet à Zéro-->
        <link href="../css/style_articles.css" rel="stylesheet" type="text/css"/> <!--Feuille CSS-->
        <link href="../css/responsive_articles.css" rel="stylesheet" type="text/css"/> <!--Responsive-->
        <!--Favicon-->
        <link rel="apple-touch-icon" sizes="57x57" href="../img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="../img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="../img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="../img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="../img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="../img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="../img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="../img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
		<link rel="manifest" href="../img/favicon/manifest.json">
        
        
        <meta charset="UTF-8" />
        <meta name="description" content="Dans quelques mois, l’évènement le plus attendu après l’Euro 2016 au niveau sportif n’est autre que le Tour de France ! Et cette année, il prend une autre tournure : il partira de la Manche, alors que l’année dernière le départ se faisait depuis les Pays – Bas mais passera tout de même à l’étranger : l’Espagne, l’Andorre mais aussi la Suisse." /><!--------changement-->
        <meta name="viewport" content="width=device-width" />
    
    </head>
    <body>           


<!-- <NAV> --> <?php include("../php/nav_articles.php"); ?>
        
<!-- <ARTICLE> -->
        <section>
            <div class="slideshow">
                <ul>
                    <li><div id="article_img1"><style> #article_img1{background-image: url(../img/articles/tour_france_2016/tour_france_20161%20.jpg);} </style></div></li> <!------------------------------------------------------------------A CHANGER-->
                </ul>
            </div>

            
            <div class="w1000p">
                <div id="rond"><style> #rond{background-image: url(../img/articles/tour_france_2016/tour_france_2016_icon.png); }</style></div><!--------------------------A CHANGER-->
                <div id="titre">
                    <h1>Le tour de France 2016</h1> <!------------------------------------------------------------------A CHANGER-->
                    <a href="../pdf/tour_france_2016.pdf" target="_blank"><img alt="Télécharger l'article en PDF" src="../img/articles/pdf.png"/></a><!------------------------------------------------------------------A CHANGER-->
                    <p><strong>07/03/2016</strong></p>
                </div>
                <article><!------------------------------------------------------------------A CHANGER-->
                    <p class="important"> <span class="ligne_important"></span>Dans quelques mois, l’évènement le plus attendu après l’Euro 2016 au niveau sportif n’est autre que le Tour de France ! Et cette année, il prend une autre tournure : il partira de la Manche, alors que l’année dernière le départ se faisait depuis les Pays – Bas mais passera tout de même à l’étranger : l’Espagne, l’Andorre mais aussi la Suisse.</p>
                    

                    <p>Au programme, 9 étapes de plaines, 9 étapes de montagnes dont 4 arrivées en altitude et également deux contre-la-montre. Du Mont St-Michel, en passant par le Massif Central, les Pyrénees et les Alpes, le Tour de France va de nouveau susciter l’attention de nombreux téléspectateurs.</p>
                
                    <p>Cette année, les grands favoris feront leur retour : Vincenzo Nibali, Nairo Quintana, Christopher Froome, Peter Sagan, Alberto Contador ou encore le jeune Romain Bardet côté Français. Par ailleurs, les équipes resteront les mêmes, on y retrouva la Team Sky, la Team FDJ et AG2R le Mondiale en ce qui concerne les équipes françaises mais encore Astana et Tinkoff-Saxo. En ce qui concerne l’édition de 2017, il est quasi officiel que le départ se fera de Düsseldorf en Allemagne, et on parle même de Copenhague pour 2018… pour un Tour de France !</p><br/><br/>
                    
                    <iframe id="video" src="https://www.youtube.com/embed/AZ6YDaoFHTM" frameborder="0" allowfullscreen></iframe><!------------------------------------------------------------------A CHANGER-->
                    <p id="redacteur">Likez et partagez sur vos réseaux sociaux si vous avez aimé l'article écrit par notre rédacteur <a href="../index.php#equipe">Quentin Wulleput</a></p><!-------------------A CHANGER-->
                </article>
            </div>
        </section>
<!-- </ARTICLE> -->   
        
 
        
        
<!-- <CONTACT> -->
    <section>
        <div id="contact">

            <div class="w1000p">
                <p id="lignecontact"></p>
                    <br/><br/>
                <h2>Contacter l'Auteur</h2>
            </div>
<!--................................................-->
            <div class="w1000p">
                <div class="formulaire"> 
                    <form method=POST action=../php/commentaire/formmail_quen.php > 
                        <input type=hidden name=subject value=formmail>             
                            <div id="messagediv">
                                <div>
                                    <h5 id="messagetxt">Message</h5>
                                    <textarea  name=message  placeholder="Ici votre correction" required id="message"></textarea> 
                                </div>
                            </div> 
                        <input class="entre" id="felicitation" title="Envoyer le message" type=submit value=Envoyer> 
                    </form> 
                </div>
            </div>
        </div> 
    </section>
<!-- </CONTACT> -->
        
        
        
<script type="text/javascript">  

    var valid = document.getElementById("felicitation");
    var message = document.getElementById("message");

        function controler() {

            function msgCour(){valid.value="Message trop court";}

            var message = document.getElementById("message");
                if (message.value.length<30) {     
                    message.style.backgroundColor="#E32D40"; 
                    msgCour();
                    return false;
                } 
        }

        document.addEventListener('keydown', function (){
            function msgBien(){
                valid.value="Envoyer";
                message.style.backgroundColor="#FFF";
            }

            if (message.value.length>30) {msgBien();}
        });

    valid.onclick=controler;            

</script> 
        
<!-- <FOOTER> --> <?php include("../php/footer_articles.php"); ?>  
    </body>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript" src="js/script.js"></script>
</html>
