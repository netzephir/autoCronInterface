<div id="templates" class="hidden">
    <table>
        <tr id="template-add-param" class="js-new-param">
            <td align="center" valign="middle"><input name="paramKey" type="text" class="form-control" placeholder="New key"></td>
            <td align="center" valign="middle"><input name="paramValue" type="text" class="form-control" placeholder="New value"></td>
            <td valign="middle">
                <div class="switch">
                    <input class="cmn-toggle cmn-toggle-round-flat cm-toggle-2x js-param-enabler" type="checkbox" checked>
                    <label data-on="On" data-off="Off"></label>
                </div>
            </td>
            <td align="center" valign="middle">
                <a href="#" class="js-param-saver" ><i class="fa fa-save fa-2x text-warning" style="line-height: 40px;"></i></a>
                <a href="#" class="js-param-remover" ><i class="fa fa-close fa-2x text-danger" style="line-height: 40px;"></i></a>
            </td>
        </tr>
    </table>


    <div class="panel panel-primary" id="template-add-step">
        <div class="panel-heading">
            <h3 class="panel-title" style="display: inline-block;width:70%;cursor: pointer;" data-toggle="collapse" data-target="" aria-expanded="false" aria-controls=""></h3>
            <div class="pull-right">
                <i class="fa fa-expand js-expand-step" style="cursor: pointer;"></i>
                <i class="fa fa-bars js-move-step" style="margin-left: 10px;cursor: pointer;"></i>
            </div>
        </div>
        <div class="panel-body collapse">
            <div class="form-group col-xs-10">
                <div class="checkbox">
                    <span style="font-size: 20px;margin-right: 5px;vertical-align: text-bottom;">Enable/Disable step</span>
                    <input id="enable-step-" class="tgl tgl-skewed js-step-toggle" type="checkbox" checked/>
                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="enable-step-"></label>
                </div>
            </div>
            <h2 class="col-xs-10">Informations</h2>
            <button class="btn btn-danger js-step-delete pull-right">Delete step</button>
            <div class="col-xs-12">
                <div class="form-group col-lg-10 col-md-12">
                    <label class="control-label">Namespace</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="namespace" placeholder="namespace" value="\Core\Autocron" readonly data-datatype="step">
                        <div class="input-group-addon js-stepNamespaceEnabler" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                    </div>
                </div>
                <div class="form-group col-lg-10 col-md-12">
                    <label class="control-label">Class</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="class" placeholder="Class" value="Autocron" readonly data-datatype="step">
                        <div class="input-group-addon js-stepNameEnabler" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-md-12 text-right">
                    <label class="control-label">lastStatus</label>
                    <input type="text" class="form-control text-right" placeholder="Last status" readonly>
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
                    <tr>
                        <td align="center" valign="middle"><input name="key" type="text" class="form-control" placeholder="New key" disabled></td>
                        <td align="center" valign="middle"><input name="value" type="text" class="form-control" placeholder="New value" disabled></td>
                        <td valign="middle">
                            <div class="switch">
                                <input class="cmn-toggle cmn-toggle-round-flat cm-toggle-2x" type="checkbox" disabled>
                                <label data-on="On" data-off="Off"></label>
                            </div>
                        </td>
                        <td align="center" valign="middle"><a class="js-paramAdder" href="#"><i class="fa fa-plus fa-2x text-success" style="line-height: 40px;"></i></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createStepModel" tabindex="-1" role="dialog" aria-labelledby="CreateStepModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New step</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Step name</label>
                    <input type="text" name="stepName" class="form-control" placeholder="New step name" value="">
                </div>
                <input type="hidden" name="jobUid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="CompleteCreateStep" >Create</button>
            </div>
        </div>
    </div>
</div>

