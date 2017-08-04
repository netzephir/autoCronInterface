<div class="col-md-12 col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Informations </h3>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group col-md-12">
                    <label class="control-label" for="jobUid">Job uid</label>
                    <div class="input-group">
                        <div class="input-group-addon">#</div>
                        <input type="text" class="form-control" id="jobUid" placeholder="Job uid" value="<?= $job['uid'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label" for="jobName">Job name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="jobName" name="jobName" placeholder="Job name" value="<?= $job['jobName'] ?>" readonly data-datatype="job" data-uid="<?= $job['uid'] ?>">
                        <div id="jobNameEnabler" class="input-group-addon" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12">
                    <label class="control-label" for="jobCreateDate">Create Date</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control" id="jobCreateDate" placeholder="Create date" value="<?= $job['createDate'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-12">
                    <label class="control-label" for="jobUpdateDate">Update date</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control" id="jobUpdateDate" placeholder="Update date" value="<?= $job['updateAt'] ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>