/**
 * Created by jonathan on 03/07/17.
 */

$(document).ready(function()
{
    initParameterBaseStates();
    initParameterAllEvents()
});
function initParameterBaseStates()
{
    $('.js-param-enabler').each(function(){
        var paramUid = $(this).attr("data-paramUid");
        if($(this).is(':checked'))
        {
            enableParam(paramUid, true);
        }
    });

}

function initParameterAllEvents(newParam)
{
    if(typeof newParam == 'undefined')
    {
        newParam = false;
    }
    $('.js-param-enabler').unbind('change').change(function(){
        var paramUid = $(this).attr("data-paramUid");
        if($(this).is(':checked'))
        {
            enableParam(paramUid,newParam);
        }
        else
        {
            disableParam(paramUid,newParam);
        }
    });
    $('.js-param-remover').unbind('click').click(function(e){
        e.preventDefault();
        deleteParameter($(this));
    });

    $('.js-paramAdder').unbind('click').click(function(e){
        e.preventDefault();
        addNewParameter($(this));
    });
    $('.js-param-saver').unbind('click').click(function(e){
        e.preventDefault();
        saveParam($(this));
    });
    $('input[type="text"]').unbind('input propertychange').on('input propertychange',function(){
        paramToSave($(this));
    });
}
function paramToSave(elem)
{
    var root = elem.parents('tr');
    root.find('.js-param-saver').removeClass('hidden');
}
function addNewParameter(source)
{
    var elem = $('#template-add-param').clone();
    elem.removeAttr('id');
    elem.attr('data-stepUid',source.attr('data-stepUid'));
    source.parents('.js-list-param').find('tr:last').before(elem);
    initParameterAllEvents(true);
}

function saveParam(elem)
{
    var root = elem.parents('tr');
    var data = {};
    data.paramKey = root.find('input[name="paramKey"]').val();
    data.value = root.find('input[name="paramValue"]').val();
    data.enabled = root.find('input[type="checkbox"]').is(':checked') ? 1 : 0;

    if(root.hasClass('js-new-param'))
    {
        var stepUid = root.attr('data-stepUid');
        createParameter(stepUid, data,function(response){
            root.find('.js-param-remover').attr('data-uid',response.newUid);
            elem.attr('data-uid',response.newUid);
            elem.removeClass('text-warning');
            elem.addClass('text-success');
            elem.addClass('hidden');
        });
        root.removeClass('js-new-param');
    }
    else
    {
        updateParameter(elem.attr('data-uid'),data,function(){
            elem.addClass('hidden');
        });
    }
}
function deleteParameter(elem)
{
    var uid = elem.attr('data-uid');
    if(uid != '' && typeof uid != 'undefined')
    {
        console.log('delete parameter : '+uid);
        $.ajax({
            method: "POST",
            url: "/Job-step-parameters/delete/"+uid
        })
        .done(function( msg ) {
            console.log(msg);
            if(!msg.result)
            {
                console.error('Step delete fail :'+uid);
            }
        });
    }
    elem.parents('tr').remove();
}

function enableParam(paramUid, init)
{
    $('#param-enabled-'+paramUid).parents('tr').find('input[type="text"]').removeAttr('readonly');
    if(!init)
    {
        updateParameter(paramUid,{'enabled':1});
    }
}
function disableParam(paramUid, init)
{
    $('#param-enabled-'+paramUid).parents('tr').find('input[type="text"]').attr('readonly',true);
    if(!init)
    {
        updateParameter(paramUid,{'enabled':0});
    }
}

function updateParameter(uid,toSave,callback)
{
    console.log('update parameter : '+uid);
    console.log(toSave);
    $.ajax({
        method: "POST",
        url: "/Job-step-parameters/update/"+uid,
        data: {'data':toSave}
    })
        .done(function( msg ) {
            console.log(msg);
            if(!msg.result)
            {
                console.error('Step update fail :'+uid);
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

function createParameter(stepUid, toSave,callback)
{
    console.log('create parameter : ');
    console.log(toSave);
    $.ajax({
        method: "POST",
        url: "/Job-step-parameters/create/"+stepUid,
        data: {'data':toSave}
    })
        .done(function( msg ) {
            console.log(msg);
            if(!msg.result)
            {
                console.error('Param create fail :');
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