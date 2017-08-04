<div class="col-md-12 col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Configuration</h3>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group col-xs-12 col-lg-6">
                    <label class="control-label" for="maxPE">Max parallel execution</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="maxPE" name="maxParallelExecution" placeholder="Max parallel execution" value="{{ job['maxParallelExecution'] }}" readonly data-datatype="job" data-uid="{{ job['uid'] }}">
                        <div id="jobMPEEnabler" class="input-group-addon" style="cursor: pointer;"><i class="fa fa-pencil"></i></div>
                    </div>
                </div>
                <div class="form-group col-xs-12 col-lg-6">
                    <label class="control-label">lastStatus</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Last status" value="{{ job['status'] | default('0') }}" readonly>
                        <div id="jobStatusReset" class="input-group-addon" style="cursor: pointer;"><i class="fa fa-unlock"></i></div>
                    </div>
                </div>
                <div class="checkbox col-lg-12 col-md-12">
                    <div class="switch">
                        <span style="font-size: 20px;margin-right: 5px;vertical-align: text-bottom;">Benchmark</span>
                        <input id="bench-toggle" class="tgl tgl-skewed" type="checkbox" data-uid="{{ job['uid'] }}" {% if job['benchmark'] == 1 %}checked{% endif  %}/>
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="bench-toggle"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>