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
            
    <div class="hidden alert alert-danger">

    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-10" style="margin-bottom: 20px;">
        <select id="actionSelector" class="form-control" name="actionSelector" >
            <option> Action </option>
            <option value="delete">delete</option>
            <option value="disable">disable</option>
            <option value="enable">enable</option>
        </select>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-6 col-xs-2 text-right" style="margin-bottom: 20px;">
        <button class="btn btn-primary js-job-adder">New</button>
    </div>
    <table class="table table-primary table-striped table-hover table-bordered">
        <tr>
            <th class="bg-primary text-center"><input id="globalSelector" type="checkbox"></th>
            <th class="bg-primary" style="width: 60px;">Status</th>
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
            <td class="text-center"><input class="js-jobSelector" type="checkbox"></td>
            <td class="text-center"><?= $this->tag->linkTo([join(['Jobs/toogleLock/', $job['uid']], ''), '<i class="fa fa-unlock fa-2x"></i>', 'title' => 'lock']) ?></td>
            <td><?= $job['uid'] ?></td>
            <td><?= $job['jobName'] ?></td>
            <td><?= $job['createDate'] ?></td>
            <td><?= $job['lastExecution']['startDate'] ?></td>
            <td><?= $job['lastExecution']['status'] ?></td>
            <td><?= $job['benchmark'] ?></td>
            <td><?= $job['maxParallelExecution'] ?></td>
            <td class="text-center " >
                <?= $this->tag->linkTo([join(['Jobs/edit/', $job['uid']], ''), '<i class="fa fa-pencil fa-2x"></i>', 'title' => 'edit']) ?>
                <?= $this->tag->linkTo([join(['Jobs/delete/', $job['uid']], ''), '<i class="fa fa-close fa-2x text-danger"></i>', 'title' => 'delete']) ?>
            </td>
        </tr>
        <?php } ?>

    </table>
    <div class="col-xs-12 text-right">
        <button class="btn btn-primary js-job-adder">New</button>
    </div>
    <?= $this->partial('Jobs/partials/listTemplates') ?>

        </div>
        <hr/>
        <div id="footer" class="footer">

        </div>
        <?= $this->assets->outputJs() ?>
    </body>
<html>