<?php
/**
  * $projectsWeb->
  * @var id
  * @var name
  * @var slogan
  * @var slug
  * @var content
  * @var url
  * @var type_avis
  * @var avis
  * @var rating
  * @var created
  *
  */

  $title_page = ucfirst(h($projectsWeb->name));

$title = $title_page.' - Développement web';
$description = 'Développement du site '.h($projectsWeb->name);
$this->assign('title', $title);
$this->assign('description', $description);

$this->assign('icon', 'developpeur');
$this->assign('color', '#42e8a7');

$nbLivrable = 0;
foreach ($allInfo as $v) {
    $livrableInfo = h($v->name_slug);
    if (h($projectsWeb->slug) == $livrableInfo) $nbLivrable++;
}
foreach ($allWeb as $v) {
    $livrableWeb = h($v->slug);
    if (h($projectsWeb->slug) == $livrableWeb) $nbLivrable++;
}

// FILES CSS
$this->start('css');
    echo $this->Html->css('/builds/css/general-dev.min');
    // echo $this->Html->css('/builds/css/categories.min');
    // echo $this->Html->css('/builds/css/index.min');
    // echo $this->Html->css('/builds/css/developpeur.min');
$this->end();

// FILES JS
$this->start('script');
    echo $this->Html->script('/builds/js/developpeur/developpeur.min');
$this->end();
?>


<!-- HEADER -->
<section class="header row middle-xs" id="home"
 style="background-image: url('<?= $this->Url->build('/img/developpeur/'.h($projectsWeb->slug).'/header.jpg', true) ?>')">
    <header class="container">
        <h1 class="display" itemprop="name"><?= h($projectsWeb->name) ?></h1>
    </header>
    <div class="overlay"></div>
</section>
<!-- NAV -->
<?= $this->element('nav2'); ?>

<!-- PROJECT -->
<div class="gradiant" itemscope itemtype="http://schema.org/Article">
    <section class="projectDev one-site container">
        <div class="row">
            <p>Site réalisé le <span class="projectDev-date" itemprop="datePublished" content="<?= $projectsWeb->created ?>"><?= $projectsWeb->created->i18nformat('dd MMMM YYYY') ?></span></p>
            
            <div class="projectDev-title-block">
                <h2>
                    <span class="projectDev-title" itemprop="articleSection"><?= h($projectsWeb->name) ?></span>
                    <span class="projectDev-slogan" itemprop="headline"><?= h($projectsWeb->slogan) ?></span>
                </h2>
                <a class="projectDev-link" target="_blank" href="<?= h($projectsWeb->url) ?>" itemprop="url">
                    Voir le site
                </a>
            </div>
            <div class="projectDev-mockup-block">
                <?=
                    $this->Html->image("/img/developpeur/".h($projectsWeb->slug)."/iMac.png",
                    [
                        "alt" => "Mockup du site ".h($projectsWeb->slug)." sur un PC",
                        "class" => "projectDev-mockup-image",
                        "itemprop" => "image"
                    ]);
                ?>
                <div class="overflowhidden">
                    <?=
                        $this->Html->image("/img/developpeur/".h($projectsWeb->slug)."/site.jpg",
                        [
                            "alt" => "Suite du site ".h($projectsWeb->slug)."",
                            "class" => "site animated",
                            "itemprop" => "image"
                        ]);
                    ?>
                </div>
            </div>
            <p class="projectDev-content one-site" itemprop="articleBody"><?= html_entity_decode(h($projectsWeb->content)) ?></p>
        </div>
    </section>

    <meta itemprop="author" content="Vincent Battez">
</div>

<!-- AVIS -->
<div class="gradiant">
    <section class="AvisDev container gradiant">
        <div class="row">
            <div class="column-2">
                <div class="left">
                    <?=
                        $this->Html->image("/img/developpeur/".h($projectsWeb->slug)."/iPad.png",
                        [
                            "alt" => "Mockup du site ".h($projectsWeb->slug)." sur une tablette",
                            "class" => "tablet",
                            "itemprop" => "image"
                        ]);
                    ?>
                    <?=
                        $this->Html->image("/img/developpeur/".h($projectsWeb->slug)."/iPhone.png",
                        [
                            "alt" => "Mockup du site ".h($projectsWeb->slug)." sur un smartphone",
                            "class" => "phone",
                            "itemprop" => "image"
                        ]);
                    ?>
                </div>
                <div class="right">
                    <h3 class="AvisDev-title">
                        <?= ($projectsWeb->type_avis == 1) ? 'Avis du client' : 'Avis personnel' ; ?>
                    </h3>
                    <p class="AvisDev-avis"><?= html_entity_decode(h($projectsWeb->avis)) ?></p>
                    <div class="hidden" id="ValueRating"><?= h($projectsWeb->rating) ?></div>
                    <div class="note-bar" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                        <div class="note-fill" id="note1"></div>
                        <div class="note-fill" id="note2"></div>
                        <div class="note-fill" id="note3"></div>
                        <div class="note-fill" id="note4"></div>
                        <div class="note-fill" id="note5"></div>
                        <div class="note-fill" id="note6"></div>
                        <span class="note-texte">Erreur</span>
                        
                        <meta itemprop="ratingValue" content="<?= h($projectsWeb->rating) ?>">
                        <meta itemprop="bestRating" content="<?= h($projectsWeb->rating) ?>">
                        <meta itemprop="worstRating" content="<?= h($projectsWeb->rating) ?>">
                        <meta itemprop="ratingCount" content="1">
                    </div>
                    <?php if ($nbLivrable > 1): ?>

                        <div class="btn btn-primary btn-doubleDiv animated">
                            Voir
                            <div class="btn-double">
                                <a class="projectDev-link" target="_blank" href="<?= h($projectsWeb->url) ?>">
                                    Site
                                </a>
                            </div>
                            <div class="btn-double">
                                <a class="projectDev-link" href=
                                "
                                    <?= $this->Url->build(
                                        [
                                            'controller' => 'Projects',
                                            'action' => 'view',
                                            h($projectsWeb->slug)
                                        ])
                                    ?>
                                ">
                                    Projet
                                </a>
                            </div>
                        </div>

                    <?php else: ?>
                        <a class="projectDev-link" target="_blank" href="<?= h($projectsWeb->url) ?>">
                            <button type="button" class="btn btn-primary">Voir le site</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="listTechno">
                <h3 class="center-align-for-mobile">Langages / technologies utilisées :</h3>
                <ul class="puce">
                    <?php foreach ($technos as $techno): ?>
                        <li>
                            <?= $techno->techno ?> 
                            <?php if (!empty($techno->framework)): ?>
                                <small>( <?= $techno->framework ?> )</small>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
</div>
<!-- PROJECT -->
<section class="projects">
    <div class="container">
        <h3 class="projects-title">Autres projets web</h3>
        <div class="projects-row"> <!-- Debut row -->
            <!-- Articles  -->
            <?php foreach ($otherprojectsWeb as $otherProject): ?>

                <article class="projects-container">
                        <div class="projects-article article-developpeur">
                            <?php
            /*linkWeb*/        echo '<a href="'.$this->Url->build(['controller' => 'ProjectsWeb', 'action' => 'view', h($otherProject->slug)]).'">';
            /*img*/            echo $this->Html->image('developpeur/' . h($otherProject->slug) . '/icon.svg',
                                    ['alt' => 'Icon pour le site ' . h($otherProject->name) . '',
                                        'class' => 'icon']
                                );
                                echo '<small class="date">'.h($otherProject->created->i18nformat('dd MMMM YYYY')).'</small>';
                                ?>
                                <?=
                                    $this->Html->image('developpeur/' . h($otherProject->slug) . '/site.jpg',
                                        ['alt' => 'Mockup du site ' . h($otherProject->name) . '',
                                            'class' => 'image']
                                    );
                                ?>
                                <h4 class="projects-article-title">
                                    <?= ucfirst(h($otherProject->name)) // nom du site ?>
                                </h4>
                                <div class="overlay overlay-black"></div>
                            </a>
                        </div>
                </article>

            <?php endforeach; ?>
            <a href="<?= $this->Url->build([
            'controller' => 'Categories',
            'action' => 'view',
            'developpeur'
            ]); ?>#projet-section" class="back-project-link">
                Voir tous les projets web
            </a>
        </div> <!-- Fin row -->
    </div> <!-- Fin container -->
</section>
