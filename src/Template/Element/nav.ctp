<nav role="navigation" data-nav-content>

    <div class="container">
        <div class="row">
            <div class="fluid-div">
                <div class="fluid-center start-xs">
                    <?= $this->Html->image('logo/logo-full-RO.svg', ['alt' => 'mon logo', 'class' => 'logoVB']); ?>
                    <i class="fa fa-bars hamburger show hide-md" aria-hidden="true" type="button" aria-label="Menu" aria-controls="navigation" aria-expanded="true/false" data-nav-trigger></i>
                </div>
                <div class="fluid-center end-xs">
                    <ul>
                        <li><a href="<?= $this->Url->build('/#home', true); ?>" role="link">Home</a></li>
                        <li><a href="<?= $this->Url->build('/#propos', true); ?>" role="link">A propos</a></li>
                        <li><a href="<?= $this->Url->build('/#developpeur', true); ?>" role="link">Réalisations</a></li>
                        <li><button type="button" role="button" class="btn btn-primary modal-open modal-open-contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</nav>
