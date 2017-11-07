<?php
$title = 'Vincent Battez Portfolio – Développeur web et Infographiste';
$description = 'Vincent Battez Portfolio – Infographiste, Développeur et Intégrateur Web. Vous avez besoin d’un site web ? d’une carte de visite, dépliant, affiche, logo ?';
$this->assign('title', $title);
$this->assign('description', $description);

// FILES CSS
$this->start('css');
    echo $this->Html->css('/builds/css/general-info.min');
    // echo $this->Html->css('/builds/css/index.min');
$this->end();


// FILES JS
$this->start('script');
    echo $this->Html->script('/builds/js/index/index.min');
$this->end();
?>
<!-- HEADER -->
<section class="header row middle-xs" id="home" style="background-image: url('<?= $this->Url->build('/img/index/header.jpg', true) ?>')">
    <header class="container">
        <?= $this->Html->image('index/photo.jpg', array('alt' => 'photo de vincent battez')); ?>
        <h1 class="display underline">Vincent Battez</h1>
        <h2>Développeur web & Infographiste</h2>
    </header>
    <div class="overlay"></div>
</section>

<!-- NAV -->
<?= $this->element('nav'); ?>
<!-- APROPOS -->
<section class="propos" id="propos">
    <div class="container">
        <h2>Étudiant DUT MMI</h2>
        <p>
            Je m’appelle Vincent Battez et je suis actuellement étudiant en 2ème année de DUT <abbr title="Métiers du Multimédia et de l'Internet">MMI</abbr> 
            à Lens. Passionné d'informatique et de photographie, j’ai créé ce site web de toutes pièces. Vous pourrez ainsi voir toutes mes créations en terme 
            <a href="#infographie">d'infographie</a> (carte de visite, dépliant, affiche, logo...), de <a href="#photographie">photographie</a>, et de 
            <a href="#developpeur">siteweb</a> dans la partie « <a href="#developpeur">Réalisations</a> ».
            <br>
            <br>
            Besoin d'une communication visuelle moderne ? Besoin d'un site web pour vous faire connaître ? Vous pouvez m'envoyer un mail via le 
            <a href="#" class="modal-open create-modal-open modal-open-contact">formulaire de contact.</a>
        </p>
        <div class="btn btn-primary btn-doubleDiv animated" id="cv">
            Télécharger
            <div class="btn-double"><a href="https://drive.google.com/file/d/0B_qtZh6a-s4cVTFkMU42bU9LTU0/view?usp=sharing" target="_blank">CV</a></div>
            <div class="btn-double"><a href="http://fr.calameo.com/read/005088600073b03fa73cb" target="_blank">BOOK</a></div>
        </div>
    </div>
</section>

<!-- Developpeur -->
<section class="developpeur realisations" id="developpeur" style="background-image: url('<?= $this->Url->build('/img/developpeur/background.jpg', true) ?>')">
    <div class="container">
        <div class="text-block">
            <h2 class="display">Développement web</h2>
            <p class="txtimg">
                Le webdesign et le développement web sont mes deux grandes passions.
                <br>
                Vous pouvez voir tous les sites que j'ai réalisés pour des clients ainsi que dans le cadre de mes études.
            </p>
        </div>
        <div class="centerBtn">
            <a href="<?= $this->Url->build([
                'controller' => 'Categories',
                'action' => 'view',
                'developpeur'
                ]); ?>">
                <button role="link" type="button" class="btn btn-img">Voir plus</button>
            </a>
        </div>
        <div class="overlay overlay-dev"></div>
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
</section>

<!-- Infographie -->
<section class="infographie realisations" id="infographie" style="background-image: url('<?= $this->Url->build('/img/infographiste/background.jpg', true) ?>')">
    <div class="container">
        <div class="text-block">
            <h2 class="display">Infographie</h2>
            <p class="txtimg">
                Lors de mon DUT <abbr style="color:white;" title="Métiers du Multimédia et de l'Internet">MMI</abbr>, j'ai appris à créer une identité unique pour une entreprise ou une marque.
                <br>
                Je peux produire tout ce qui touche au design. (cartes de visite, logos, affiches, dépliant, flyers ou même des CV...)
            </p>
        </div>
        <div class="centerBtn">
            <a href="<?= $this->Url->build([
                'controller' => 'Categories',
                'action' => 'view',
                'infographiste'
                ]); ?>">
                <button role="link" type="button" class="btn btn-img">Voir plus</button>
            </a>
        </div>
        <div class="overlay overlay-info"></div>
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </div>
</section>

<!-- Photographie -->
<section class="photographie realisations" id="photographie" style="background-image: url('<?= $this->Url->build('/img/photographie/background.jpg', true) ?>')">
    <div class="container">
        <div class="text-block">
            <h2 class="display">Photographie</h2>
            <p class="txtimg">
                Ma deuxième passion est la photographie. 
                <br>
                Durant mes études et en autodidacte, j'ai pu m'exercer pour obtenir un œil de photographe amateur.
            </p>
        </div>
        <div class="centerBtn">
            <a href="<?= $this->Url->build([
                'controller' => 'Categories',
                'action' => 'view',
                'photographie'
                ]); ?>">
                <button role="link" type="button" class="btn btn-img">Voir plus</button>
            </a>
        </div>
        <div class="overlay overlay-photo"></div>
    </div>
</section>
