<aside class="modal flex-center" id="modal-contact">
    <div class="modal-container container">
        <div class="modal-header">
            <i class="fa fa-times modal-exit" aria-hidden="true"></i>
            <h3 class="modal-titre">Contact</h3>
        </div>
        <?= $this->element('messageImportant'); ?>
        <div class="modal-content row top-xs">
            <div class="right col-xs-6">
                <?= $this->Form->create('contact'); ?>
                <?= $this->Form->input('name', ['label' => 'Nom*', 'disabled']); ?>
                <?= $this->Form->input('email', ['label' => 'Email*', 'disabled']); ?>
                <?= $this->Form->input('subject', ['label' => 'Sujet*', 'disabled']); ?>
                <?= $this->Form->input('content', ['label' => 'Message*', 'type' => 'textarea', 'disabled']); ?>
                <?= $this->Form->submit('Envoyer', ['disabled']); ?>
                <small>Pas encore disponible, contactez moi sur contact@vincentbattez.fr</small>
                <?= $this->Form->end(); ?>
                <hr class="separatorY">
            </div>
            <div class="left col-xs-6">
                <h4>Me joindre</h4>
                <a href="https://www.facebook.com/vincent.battez" target="_blank">
                    <figure class="social fb flex-center">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </figure>
                </a>
                <a href="https://linkedin.com/in/vincent-battez-040072114/" target="_blank">
                    <figure class="social linkedin flex-center">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </figure>
                </a>
                <a href="https://www.flickr.com/photos/146909781@N02" target="_blank">
                    <figure class="social flickr flex-center">
                        <i class="fa fa-flickr" aria-hidden="true"></i>
                    </figure>
                </a>
            </div>
        </div>
    </div>
    <div class="overlay overlay-black modal-exit"></div>
</aside>
