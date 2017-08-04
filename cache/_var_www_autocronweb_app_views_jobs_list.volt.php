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
                    <li class="active"><a href="">List <span class="sr-only">(current)</span></a></li>
                    <li><?= $this->tag->linkTo(['Monitoring', 'Monitoring']) ?></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>
<div id="main" class="container-fluid" style="padding-top: 100px;">
    

    <table class="table table-primary table-striped table-hover table-bordered">
        <tr>
            <th class="bg-primary">#</th>
            <th class="bg-primary">name</th>
            <th class="bg-primary">Creation date</th>
            <th class="bg-primary">lastExecution</th>
            <th class="bg-primary">lastStatus</th>
            <th class="bg-primary">benchMark enabled</th>
            <th class="bg-primary">Max PE</th>
            <th class="bg-primary"></th>
        </tr>

        <?php foreach ($jobs as $job) { ?>
        <tr>
            <td><?= $job['uid'] ?></td>
            <td><?= $job['jobName'] ?></td>
            <td><?= $job['createDate'] ?></td>
            <td><?= $job['lastExecution']['startDate'] ?></td>
            <td><?= $job['lastExecution']['status'] ?></td>
            <td><?= $job['benchmark'] ?></td>
            <td><?= $job['maxParallelExecution'] ?></td>
            <td class="text-center " > <?= $this->tag->linkTo([join(['jobs/edit/', $job['uid']], ''), '<i class="fa fa-pencil"></i>']) ?><?= $this->tag->linkTo([join(['jobs/delete/', $job['uid']], ''), '<i class="fa fa-close text-danger"></i>']) ?></td>
        </tr>
        <?php } ?>

    </table>

</div>
<?= $this->assets->outputJs() ?>
</body>
<html>