a:5:{i:0;s:82:"<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>";s:5:"title";N;i:1;s:1896:"</title>
        <link rel="stylesheet" href="<?= $this->url->getStatic('css/lib/bootstrap.min.css') ?>" />
        <link rel="stylesheet" href="<?= $this->url->getStatic('css/lib/font-awesome.min.css') ?>" />
        <link rel="stylesheet" href="<?= $this->url->getStatic('css/main.css') ?>" />
        <?= $this->assets->outputCss() ?>
        <script src="<?= $this->url->getStatic('js/lib/jquery-3.2.1.min.js') ?>"></script>
        <script src="<?= $this->url->getStatic('js/lib/bootstrap.min.js') ?>"></script>
        <script src="<?= $this->url->getStatic('js/main.js') ?>"></script>
    </head>
    <body>
        <div class="row">
                <nav class="navbar navbar-default navbar-fixed-top navbar-custom-centered col-xs-6 col-xs-offset-3">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        </button>
                        <?= $this->tag->linkTo(['', 'Dev', 'class' => 'navbar-brand']) ?>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><?= $this->tag->linkTo(['', 'list <span class="sr-only">(current)</span>']) ?></li>
                            <li><?= $this->tag->linkTo(['Monitoring', 'Monitoring']) ?></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
        </div>
        <div id="main" class="container-fluid" style="padding-top: 100px;min-height: 800px;">
            ";s:7:"content";N;i:2;s:146:"
        </div>
        <hr/>
        <div id="footer" class="footer">

        </div>
        <?= $this->assets->outputJs() ?>
    </body>
<html>";}