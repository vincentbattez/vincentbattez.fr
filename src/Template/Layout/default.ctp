<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="google-site-verification" content="zIEmRrGHHkHZx10MQ-M_xPm6Cq3p3sDQ29vMElq_y0U" />
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <meta name="description" content="<?= $this->fetch('description') ?>">
    <?= $this->fetch('meta') ?>
<!-- favicon -->
<?php if (!empty($this->fetch('icon'))): ?>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/<?= $this->fetch('icon')?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon/<?= $this->fetch('icon')?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon/<?= $this->fetch('icon')?>/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/favicon/<?= $this->fetch('icon')?>/manifest.json">
    <link rel="mask-icon" href="/img/favicon/<?= $this->fetch('icon')?>/safari-pinned-tab.svg" color="<?= $this->fetch('color') ?>">
    <link rel="shortcut icon" href="/img/favicon/<?= $this->fetch('icon')?>/favicon.ico" type="image/x-icon">

<?= $this->Html->meta('icon', '/img/favicon/'. $this->fetch('icon').'/favicon.ico') ?>

<?php else: ?>

    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/infographiste/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon/infographiste/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon/infographiste/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/favicon/infographiste/manifest.json">
    <link rel="mask-icon" href="/img/favicon/infographiste/safari-pinned-tab.svg" color="#e74c3c">
    <link rel="shortcut icon" href="/img/favicon/infographiste/favicon.ico" type="image/x-icon">

<?= $this->Html->meta('icon', '/img/favicon/infographiste/favicon.ico') ?>

<?php endif; ?>

<!-- FACEBOOK -->
<meta property="og:image" content="/img/og-image.jpg">
<meta property="og:image:width" content="279">
<meta property="og:image:height" content="279">
<meta property="og:description" content="Vous avez besoin d&rsquo;un site web ? d&rsquo;une carte de visite, d'un d&eacute;pliant, ou un logo pour votre entreprise ? Aller donc voir mon site !">
<meta property="og:title" content="vincentbattez.fr">
<meta property="og:url" content="vincentbattez.fr">

<meta name="google-site-verification" content="zIEmRrGHHkHZx10MQ-M_xPm6Cq3p3sDQ29vMElq_y0U" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111278831-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111278831-1');
</script>


    <?= $this->Html->css('/builds/css/general.min') ?>


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <?= $this->fetch('css') ?>
    <style media="screen">
        .modal{display: none;}
    </style>
    
    <link rel="alternate" hreflang="fr-fr" href="alternateURL">
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-79534416-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
    <?= $this->element('loading'); ?>

    <!-- nav dans Elements/nav.cpt  -->

    <?= $this->Flash->render() ?>
    <main class="content" role="main">
        <div class="message-important">
            <?= $this->element('messageImportant'); ?>
            <i class="fa fa-times exit" aria-hidden="true"></i>
        </div> 
        <?= $this->fetch('content') ?>
    </main>

    <?= $this->element('modalContact'); ?>

    <footer role="contentinfo"><p>Copyright © 2017 - Vincent Battez - Tous droits réservés</p></footer>
    <!-- All -->
    <?= $this->Html->script('/builds/js/general.min') ?>
    <!-- Other script -->
    <?= $this->fetch('script') ?>
</body>
</html>
