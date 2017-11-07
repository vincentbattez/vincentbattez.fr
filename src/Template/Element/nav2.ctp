<nav role="navigation" class="narbar-2" data-nav-content>
    <div class="container">
        <div class="row">
            <div class="fluid-div">
                <div class="fluid-center start-xs">
                    <h3 class="nav-title" role="title">
                        <?php
                            if (empty($category) && !empty($projectsWeb->name)) {
                                echo ucfirst(strtolower(h($projectsWeb->name)));
                            }
                            elseif (empty($category) && !empty($slug->slug)) {
                                echo ucfirst(strtolower(h($slug->slug)));
                            }
                            elseif (empty($category) && !empty($slug)) {
                                echo ucfirst(strtolower($slug));
                            }
                            else {
                                echo ucfirst(strtolower(h($category->name)));
                            }
                        ?>
                    </h3>
                    <i class="fa fa-bars hamburger show hide-md" aria-hidden="true" type="button" aria-label="Menu" aria-controls="navigation" aria-expanded="true/false" data-nav-trigger></i>
                </div>
                <div class="fluid-center end-xs">
                    <ul>
                        <li><a href="<?= $this->Url->build('/#home', true); ?>" role="link">Home</a></li>
                        <li><a href="<?= $this->Url->build('/#propos', true); ?>" role="link">A propos</a></li>
                        <li class="hide-sm"><a href="#" role="link" data-dropdown-trigger>Réalisations <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
                        <li><button type="button" class="btn btn-primary modal-open create-modal-open modal-open-contact" role="button" data-nav-trigger>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- dropdown -->
    <div class="row dropdown">
        <div class="col-xs-12">
            <ul>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'view', 'developpeur']); ?>" role="link">
                        <figure role="icon"><?= $this->Html->image('index/nav/developpeur.svg', array('alt' => 'icon du Développement web')); ?></figure>
                        Développement web
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'view', 'infographiste']); ?>" role="link">
                        <figure role="icon"><?= $this->Html->image('index/nav/infographiste.svg', array('alt' => 'icon de l\'Infographie')); ?></figure>
                        Infographie
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'view', 'photographie']); ?>" role="link">
                        <figure role="icon"><?= $this->Html->image('index/nav/photographie.svg', array('alt' => 'icon de la Photographie')); ?></figure>
                        Photographie
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<div class="overlay overlay-black overlay-full dropdown-overlay" data-dropdown-trigger></div>
