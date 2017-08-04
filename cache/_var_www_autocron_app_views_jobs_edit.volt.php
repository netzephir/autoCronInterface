<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $customTitle ?></title>
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
                <a class="navbar-brand" href="">Dev</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="">Acceuil <span class="sr-only">(current)</span></a></li>
                    <li><a href="Library">Library</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>
<div id="main" class="container-fluid" style="padding-top: 100px;">
    
    <!-- main config -->
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Informations</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <!-- sup config -->
    <div class="col-xs-12 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Configuration</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Additionnal Configuration</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
    <!-- Steps part -->
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Steps</h3>
            </div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>

</div>
<?= $this->assets->outputJs() ?>
</body>
<html>