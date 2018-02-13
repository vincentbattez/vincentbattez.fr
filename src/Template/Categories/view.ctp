<?php
$title = h($category->name);
if (h($category->slug == 'developpeur')){
    $description = 'Voici mes créations en terme de développement web.';
    $icon = 'developpeur';
    $color = '#42e8a7';
} elseif (h($category->slug == 'photographie')){
    $description = 'Voici mes photographie.';
    $icon = 'photographie';
    $color = '#5856d6';
} else{
    $description = 'Voici mes créations en terme de d\'inforgraphie.';
    $icon = 'infographiste';
    $color = '#e74c3c';
}
$this->assign('title', $title);
$this->assign('description', $description);
$this->assign('icon', $icon);
$this->assign('color', $color);

// FILES CSS
$this->start('css');
    switch (h($category->slug)) {
        case 'developpeur':
            echo $this->Html->css('/builds/css/general-dev.min');
            break;
        case 'photographie':
            echo $this->Html->css('/builds/css/general-photo.min');
            break;
        default:
            echo $this->Html->css('/builds/css/general-info.min');
            break;
    }
    // echo $this->Html->css('/builds/css/index.min');
    // echo $this->Html->css('/builds/css/categories.min');
$this->end();

// FILES JS
$this->start('script');
    echo $this->Html->script('/builds/js/categories/categories.min');
$this->end();
?>

<!-- HEADER -->
<section class="header row middle-xs" id="home"
 style="background-image: url('<?= $this->Url->build('/img/'.h($category->slug).'/header.jpg', true) ?>')">
    <header class="container">
        <h1 class="display"><?= h($category->name) ?></h1>
    </header>
    <div class="overlay"></div>
</section>

<!-- NAV -->
<?= $this->element('nav2'); ?>


<!-- PROPOS -->
<section class="propos">
    <div class="container">
        <?= html_entity_decode($this->Text->autoParagraph(h($category->content1))); ?>
    </div>
</section>


<!-- CATEGORY -->
<section class="category realisations flex-center" id="category"
 style="background-image: url('<?= $this->Url->build('/img/'.h($category->slug).'/background.jpg', true) ?>')">
    <div class="container">
        <?= html_entity_decode(h($category->content2)); ?>
    </div>
    <div class="overlay"></div>
    <i class="fa fa-angle-down" aria-hidden="true"></i>
</section>

<!-- PROJECT -->
<section class="projects">
    <div class="container">
    <?php if (h($category->slug != 'photographie')): ?>

        <h3 class="projects-title" id="projet-section">Mes projets</h3>
        <div class="projects-row"> <!-- Debut row -->
            <!-- Articles  -->
            <?php foreach ($projects as $project): ?>

                <article class="projects-container">
                        <div class="projects-article article-<?= h($category->slug) ?>" itemscope itemtype="http://schema.org/Article">
                            <meta itemprop="author" content="Vincent Battez">
                            <?php
                                if (h($category->slug) == 'developpeur') { // developpeur
                                    echo '<meta itemprop="articleSection" content="Développement web">';
                /*linkWeb*/        echo '<a itemprop="url" href="'.$this->Url->build(['controller' => 'ProjectsWeb', 'action' => 'view', h($project->slug)]).'">';
                /*img*/            echo $this->Html->image('developpeur/' . h($project->slug) . '/icon.svg',
                                        [
                                            'alt' => 'Icon pour le site ' . h($project->name) . '',
                                            'class' => 'icon'
                                        ]
                                    );
                                    echo '<small class="date" itemprop="datePublished" content="'.h($project->created).'">'.h($project->created->i18nformat('dd MMMM YYYY')).'</small>';
                                } else { // infographiste
                                    echo '<meta itemprop="articleSection" content="Infographie">';
                /*linkInfo*/        echo '<a href="'.$this->Url->build(['controller' => 'ProjectsInfo', 'action' => 'view', h($project->slug)]).'">';
                                }
                            ?>
                            <?php
                            if (h($category->slug == 'developpeur')) // developpeur
                                echo $this->Html->image('' . h($category->slug) . '/' . h($project->slug) . '/site.jpg',
                                    [
                                        'alt' => 'Mockup du site ' . h($project->name) . '',
                                        'class' => 'image',
                                        'itemprop' => 'image'
                                    ]
                                );
                            else // insfographiste
                                echo $this->Html->image('' . h($category->slug) . '/' . h($project->slug) . '/'.h($project->slug).'-header.jpg',
                                    [
                                        'alt' => h($project->name),
                                        'class' => 'image',
                                        'itemprop' => 'image'
                                    ]
                                );
                            ?>
                            <h4 class="projects-article-title" itemprop="name">
                                <?php
                                    if (h($category->slug == 'developpeur')) { // developpeur
                                        echo ucfirst(h($project->name)); // nom du site
                                    } else { // infographiste
                                        echo ucfirst(h($project->slug)); // type de l'infographie (logos)
                                    }
                                ?>
                            </h4>
                            <div class="overlay overlay-black"></div>
                            </a>
                        </div>
                </article>

            <?php endforeach; ?>
        </div> <!-- Fin row -->
    <?php else: ?> <!-- photographie -->
        <a href="https://www.flickr.com/photos/146909781@N02" target="_blank">
            <button type="button" class="btn btn-primary" style="display: block; margin: 80px auto 0 auto; font-size: 2.5rem;">Voir mes photos</button>
        </a>
    <?php endif; ?>

    </div>
</section>
