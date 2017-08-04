//todo finish add parameter

function disableInput(input)
{
    input.attr('readonly',true);
    input.unbind('focus');
    input.unbind('keyup');
}

function enableInput(input)
{

    input.removeAttr('readonly');
    input.focus(function(){
        input.select();
    })
        .focus();
}

function editInput(elem)
{
    elem.html('<i class="fa fa-save"></i>').addClass("text-success");
    elem.click(function()
    {
        saveInput(elem)
    });
    elem.parent().find('input').keyup(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code === 13) {e.preventDefault();}
        if (code === 13 || code === 32 || code === 188 || code === 186)
        {
            saveInput(elem)

        }
    });
    enableInput(elem.parent().find('input'));
}

function saveInput(elem)
{
    elem.html('<i class="fa fa-pencil"></i>').removeClass("text-success");
    elem.unbind('click');
    elem.click(function(){
        editInput($(this));
    });
    input = elem.parent().find('input');
    var data = {};
    data[input.attr('name')] = input.val();
    if(input.attr('data-datatype') === 'job')
    {
        updateJob(input.attr('data-uid'), data);
    }
    else if(input.attr('data-datatype') === 'step')
    {
        updateStep(input.attr('data-uid'), data);
    }
    disableInput(elem.parent().find('input'));
}/**
 * Created by jonathan on 03/07/17.
 */
