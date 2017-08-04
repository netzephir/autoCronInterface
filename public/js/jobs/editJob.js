/**
 * Created by jonathand on 26/05/17.
 */
$(document).ready(function()
{
    initJobBaseStates();
    initJobAllEvents()
});

function initJobBaseStates()
{

}

function initJobAllEvents()
{
    $('#jobNameEnabler').click(function(){
        editInput($(this));
    });
    $('#jobMPEEnabler').click(function(){
        editInput($(this));
    });
    $('#jobStatusReset').click(function(){

    });
    $('#bench-toggle').change(function()
    {
        if($(this).is(':checked'))
        {
            updateJob($(this).attr('data-uid'), {'benchmark': 1});
        }
        else
        {
            updateJob($(this).attr('data-uid'), {'benchmark': 0});
        }
    });

}

function updateJob(uid, toSave)
{
    console.log('update job : '+uid);
    console.log(toSave);
    $.ajax({
        method: "POST",
        url: "/Jobs/update/"+uid,
        data: {'data':toSave}
    })
        .done(function( msg ) {
            if(!msg.result)
            {
                console.error('job update fail :'+uid);
                console.error(toSave);
            }
        });
}
