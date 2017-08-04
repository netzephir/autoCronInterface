<div class="panel panel-primary" id="panel-step-<?= $step['uid'] ?>">
    <div class="panel-heading">
        <h3 class="panel-title" style="display: inline-block;width:70%;cursor: pointer;" data-toggle="collapse" data-target="#step-<?= $step['uid'] ?>" aria-expanded="false" aria-controls="step-<?= $step['uid'] ?>"><?= $step['stepName'] ?></h3>
        <div class="pull-right">
            <i class="fa fa-expand js-expand-step" style="cursor: pointer;"></i>
            <i class="fa fa-bars js-move-step" style="margin-left: 10px;cursor: pointer;"></i>
        </div>
    </div>
    <div class="panel-body collapse"  id="step-<?= $step['uid'] ?>">
        <div class="form-group col-xs-10">
            <div class="checkbox">
                <span style="font-size: 20px;margin-right: 5px;vertical-align: text-bottom;">Enable/Disable step</span>
                <input id="enable-step-<?= $step['uid'] ?>" class="tgl tgl-skewed js-step-toggle" type="checkbox" data-stepUid="<?= $step['uid'] ?>" <?php if ($job['benchmark'] == 1) { ?>checked<?php } ?>/>
                <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="enable-step-<?= $step['uid'] ?>"></label>
            </div>
        </div>
        <button class="btn btn-danger js-step-delete pull-right" data-uid="<?= $step['uid'] ?>">Delete step</button>
        <h2 class="col-xs-10">Informations</h2>
        <div class="col-xs-12">
            <div class="form-group col-lg-10 col-md-12">
                <label class="control-label">Namespace</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="namespace" placeholder="namespace" value="<?= $step['namespace'] ?>" readonly data-uid="<?= $step['uid'] ?>" data-datatype="step">
                    <div class="input-group-addon js-stepNamespaceEnabler" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                </div>
            </div>
            <div class="form-group col-lg-10 col-md-12">
                <label class="control-label" for="stepClass-<?= $step['uid'] ?>">Class</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="class" placeholder="Class" value="<?= $step['class'] ?>" readonly data-uid="<?= $step['uid'] ?>" data-datatype="step">
                    <div class="input-group-addon js-stepNameEnabler" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                </div>
            </div>
            <div class="form-group col-lg-2 col-md-12 text-right">
                <label class="control-label">lastStatus</label>
                <input type="text" class="form-control text-right" placeholder="Last status" value="<?= (empty($step['lastExecution']['status']) ? ($step['lastExecution']['status']) : ($step['lastExecution']['status'])) ?>" readonly>
            </div>
        </div>
        <h2 class="col-xs-10">Params</h2>
        <div class="col-xs-12">
            <table class="js-list-param table table-bordered">
                <tr>
                    <th style="width: 20%;">Key</th>
                    <th>Value</th>
                    <th width="80px">Enabled</th>
                    <th class="text-center" stype="width: 10%;">Delete</th>
                </tr>
                <?php foreach ($step['parameters'] as $parameter) { ?>
                    <?= $this->partial('Jobs/partials/editParameter', ['parameter' => $parameter, 'stepUid' => $step['uid']]) ?>
                <?php } ?>
                <tr>
                    <td align="center" valign="middle"><input name="key" type="text" class="form-control" placeholder="New key" disabled></td>
                    <td align="center" valign="middle"><input name="value" type="text" class="form-control" placeholder="New value" disabled></td>
                    <td valign="middle">
                        <div class="switch">
                            <input class="cmn-toggle cmn-toggle-round-flat cm-toggle-2x" type="checkbox" disabled>
                            <label data-on="On" data-off="Off"></label>
                        </div>
                    </td>
                    <td align="center" valign="middle"><a class="js-paramAdder" href="#" data-stepUid="<?= $step['uid'] ?>"><i class="fa fa-plus fa-2x text-success" style="line-height: 40px;"></i></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>