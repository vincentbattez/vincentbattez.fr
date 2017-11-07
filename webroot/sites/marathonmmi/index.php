<?php include_once 'divers/head.php'; ?>
<meta name="description" content="Post.it" />
<title>Post.it</title>
</head>
<body>
    <?php include_once 'divers/nav.php'; ?>
    <!-- HEADER -->
    <header>
        <div class="content">
            <h1>Nos histoires</h1>
            <div class="separator"></div>
            <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua</p>
            </div>
            <div class="overlay">
                <div class="background" style="background-image: url('img/histoire/header-bg.jpg');"></div>
            </div>
        </header>
    <!-- ALL HISTOIRE -->
    <section class="container" id="histoire">
      <!-- Story #1 -->
      <article>
          <a href="storyDetail.php" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 histoire-background" style="background-image: url('img/histoire/histoire1.jpg');">
              <div class="overlay">
              </div>
          </a>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 description">
              <h2 class="histoire-title">Carlzone - Les frères
                  <h4>écrit par <a class="auteur" href="#">Jonathan Masson</a></h4>
              </h2>
              <div class="separator"></div>
              <p class="histoire-description">Sed sed vestibulum purus. Integer vitae arcu est. Sed ut orci non velit efficitur gravida sit amet id ex. Nullam placerat, risus eget malesuada laoreet, purus ligula pharetra ligula, vitae tempus mi lorem eu elit. Nullam nec mattis augue. Cras eu viverra massa. Maecenas porttitor quam dui, ac accumsan arcu fringilla et.
              </p>
              <a href="storyDetail.php" class="histoire-btn">
                  <button class="btn btn-primary">Lire l'histoire</button>
              </a>
          </div>
      </article>
      <!-- Story #2 -->
      <article>
          <a href="#" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 histoire-background" style="background-image: url('img/histoire/histoire2.jpg');">
              <div class="overlay">
              </div>
          </a>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 description">
              <h2 class="histoire-title">Voyage inattendu
                  <h4>écrit par <a class="auteur" href="#">Jonathan Masson</a></h4>
              </h2>
              <div class="separator"></div>
              <p class="histoire-description">Pellentesque pellentesque porttitor viverra. Sed egestas felis quis vehicula fringilla. Mauris in
                  accumsan turpis, in semper mi. Nam auctor quis nisl in ultrices. Cras a nibh sed nisl posuere
                  porttitor. Ut non nisl quis dolor tincidunt porta id a massa.
              </p>
              <a href="#" class="histoire-btn">
                  <button class="btn btn-primary">Lire l'histoire</button>
              </a>
          </div>
      </article>
  </section>
  <?php include_once 'divers/footer.php'; ?>
