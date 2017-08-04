<div id="mass-action-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete <span class="nbElem"></span> job(s)</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button id="mass-action-confirm" type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createJobModel" tabindex="-1" role="dialog" aria-labelledby="createJobModel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Job</h4>
            </div>
            <div class="modal-body">
                <form class="row" action="Jobs/create" method="post" id="formCreateJob">
                    <div class="form-group col-xs-12">
                        <label class="control-label">Job name</label>
                        <input type="text" name="jobName" class="form-control" placeholder="New job name" value="">
                    </div>
                    <div class="form-group col-xs-6">
                        <label class="control-label">Max parrallel execution</label>
                        <input type="text" name="maxParallelExecution" class="form-control" value="0">
                    </div>
                    <div class="form-group col-xs-12">
                        <label class="control-label">Benchmark : </label>
                        <input type="checkbox" name="benchmark" class="" checked value="1">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="CompleteCreateJob" >Create</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EmergencyModal" tabindex="-1" role="dialog" aria-labelledby="EmergencyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-danger">Just in case of emmergency</h3>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-md-6">
                    <button>
                        Lock all Autocron
                    </button>
                </div>
                <div class="col-xs-12 col-md-6">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
