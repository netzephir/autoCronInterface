<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
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
<div id="main" class="container-fluid">
    
    <h1><?= $title ?></h1>

    <table class="table table-primary table-striped table-hover table-bordered">
        <tr>
            <th class="bg-primary">#</th>
            <th class="bg-primary">hashName</th>
            <th class="bg-primary">name</th>
            <th class="bg-primary">lastExecution</th>
            <th class="bg-primary">benchMark</th>
            <th class="bg-primary">lastStatus</th>
            <th class="bg-primary"></th>
        </tr>

        <?php foreach ($jobs as $job) { ?>
        <tr>
            <td><?= $job->id ?></td>
            <td><?= $job->hashName ?></td>
            <td><?= $job->jobName ?></td>
            <td><?= $job->jobName ?></td>
            <td><?= $job->jobName ?></td>
            <td><?= $job->jobName ?></td>
            <td class="text-center " ><i class="fa fa-pencil"></i> <i class="fa fa-close text-danger"></i></td>
        </tr>
        <?php } ?>

    </table>

</div>
<?= $this->assets->outputJs() ?>
</body>
<html>