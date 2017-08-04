/**
 * Created by jonathan on 03/07/17.
 */
$(document).ready(function()
{
    initStepsBaseStates();
    initStepsAllEvents()
});

function initStepsBaseStates()
{
    $('.js-step-toggle').each(function()
    {
        var stepUid = $(this).attr("data-stepUid");
        if($(this).is(':checked'))
        {
            enableStep(stepUid, true);
        }
    });
    $('.collapse').collapse('toggle');
}

function initStepsAllEvents()
{
    $('.js-step-toggle').each(function()
    {
        $(this).unbind('change').change(function()
        {
            var stepUid = $(this).attr("data-stepUid");
            if($(this).is(':checked'))
            {
                enableStep(stepUid);
            }
            else
            {
                disableStep(stepUid);
            }
        });
    });

    $('.js-expand-step').unbind('click').click(function(){
        var elem = $(this).parents('.panel');
        elem.find('.collapse').collapse('toggle');
    });

    //input edition binder
    $('.js-stepNameEnabler').each(function(){
        $(this).unbind('click').click(function(){
            editInput($(this));
        });
    });
    $('.js-stepNamespaceEnabler').each(function(){
        $(this).unbind('click').click(function(){
            editInput($(this));
        });
    });

    $('.js-step-delete').each(function(){
        $(this).unbind('click').click(function(){
            deleteStep($(this));
        });
    });

    //step add
    $('#step-adder').unbind('click').click(function(){
    var elem = $('#createStepModel');
        elem.find('input[name="jobUid"]').val($(this).attr('data-jobUid'));
        elem.modal('show');
    });
    //clear modal on each hide
    $('#createStepModel').unbind('hidden.bs.modal').on('hidden.bs.modal',function(){
        $(this).find('input[name="jobUid"]').val('');
        $(this).find('input[name="stepName"]').val('');
    });

    $('#CompleteCreateStep').unbind('click').click(function(){
        var elem = $('#createStepModel');
        var jobUid = elem.find('input[name="jobUid"]').val();
        var stepName = elem.find('input[name="stepName"]').val();
        //todo add positionà
        //var position = $('.js-list-param').children('tr');
        createStep({'uidJob':jobUid,'stepName':stepName},function(data){
            insertNewStepDom(data);
        });
        elem.modal('hide');

    });
}

function enableStep(stepUid, init)
{
    var elem = $('#panel-step-'+stepUid);
    elem.removeClass('panel-default').addClass('panel-primary');
    if(!init)
    {
        updateStep(stepUid,{'enabled':1});
    }
}

function disableStep(stepUid, init)
{
    var elem = $('#panel-step-'+stepUid);
    elem.removeClass('panel-primary').addClass('panel-default');
    if(!init)
    {
        updateStep(stepUid,{'enabled':0});
    }
}

function deleteStep(elem)
{
    var uid = elem.attr('data-uid');
    if(uid != '' && typeof uid != 'undefined')
    {
        console.log('delete step : '+uid);
        $.ajax({
            method: "POST",
            url: "/Job-steps/delete/"+uid
        })
            .done(function( msg ) {
                console.log(msg);
                if(!msg.result)
                {
                    console.error('Step delete fail :'+uid);
                }
            });
    }
    elem.parents('.panel-body').on('hidden.bs.collapse', function () {
        elem.parents('.panel').remove();
    });
   elem.parents('.panel-body').collapse('hide');
}

function updateStep(uid,toSave)
{
    console.log('update step : '+uid);
    console.log(toSave);
    $.ajax({
        method: "POST",
        url: "/Job-steps/update/"+uid,
        data: {'data':toSave}
    })
    .done(function( msg ) {
        console.log(msg);
        if(!msg.result)
        {
            console.error('Step update fail :'+uid);
            console.error(toSave);
        }
    });
}

function insertNewStepDom(data)
{
    console.log('apply step !');
    console.log(data);
    var template = $('#template-add-step').clone();
    template.removeAttr('id').attr('id','panel-step-'+data.newStep.uid);

    template.find('.panel-body').attr('id','step-'+data.newStep.uid);
    template.find('.panel-title').attr('data-target', '#step-'+data.newStep.uid).html(data.newStep.stepName);
    template.find('.panel-title').attr('aria-controls', '#step-'+data.newStep.uid);
    template.find('.panel-body').attr('id', 'step-'+data.newStep.uid);

    template.find('.js-step-toggle').attr('data-stepUid',data.newStep.uid).attr('id','enable-step-'+data.newStep.uid);
    template.find('.js-step-toggle').next().attr('for','enable-step-'+data.newStep.uid);
    template.find('.js-paramAdder').attr('data-stepUid', data.newStep.uid);

    template.find('.js-step-delete').attr('data-uid', data.newStep.uid);
    template.find('input[name="namespace"]').attr('data-uid', data.newStep.uid);
    template.find('input[name="class"]').attr('data-uid', data.newStep.uid);
    template.find('.collapse').collapse('show');
    $('#step-adder').before(template);
    initStepsAllEvents();
    initParameterAllEvents();
}

function createStep(toSave,callback)
{
    console.log('create step : ');
    console.log(toSave);
    $.ajax({
        method: "POST",
        url: "/Job-steps/create/",
        data: {'data':toSave}
    })
    .done(function( msg ) {
        console.log(msg);
        if(!msg.result)
        {
            console.error('Step create fail :');
            console.error(toSave);
        }
        else
        {
            if(typeof callback != 'undefined')
            {
                callback(msg);
            }
        }
    });
}