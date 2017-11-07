<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('/builds/css/error.min') ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background-image: url('<?= $this->Url->build('/img/error-bg.jpg', true) ?>')">
    <div class="container">
        <div class="header">
            <span class="nbError error3"><?= $this->fetch('before1-error') ?></span>
            <span class="nbError error2"><?= $this->fetch('before2-error') ?></span>
            <span class="nbError error1"><?= $this->fetch('before3-error') ?></span>
            <h1><?= $this->fetch('error') ?></h1>
            <span class="nbError error1"><?= $this->fetch('after1-error') ?></span>
            <span class="nbError error2"><?= $this->fetch('after2-error') ?></span>
            <span class="nbError error3"><?= $this->fetch('after3-error') ?></span>
        </div>
        <div class="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div class="footer">
            <a href="javascript:history.back()">
             <?= $this->Html->image("/img/logo/logo-B.svg",["alt" => "Logo",]); ?>
            </a>
        </div>
    </div>
</body>
</html>
