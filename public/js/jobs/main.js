/**
 * Created by jonathan on 18/07/17.
 */

$(document).ready(function(){
    $('#globalSelector').change(function()
    {
        toogleAllSelector($(this).is(':checked'))
    });
    $('#actionSelector').change(function(){
        console.log($('.js-jobSelector:checked').length);
        if($('.js-jobSelector:checked').length > 0)
        {
            console.log($('#actionSelector').val());
            switch ($('#actionSelector').val())
            {
                case 'delete':
                    massActionConfirm('<h2 class="text-danger">Are you sure to delete '+$('.js-jobSelector:checked').length+' job(s)</h2>',function(){

                    });
                break;
                case 'disable':
                    massActionConfirm('<h2>Are you sure to disable '+$('.js-jobSelector:checked').length+' job(s)</h2>',function(){

                    });
                break;
                case 'enable':
                    massActionConfirm('<h2>Are you sure to enable '+$('.js-jobSelector:checked').length+' job(s)</h2>',function(){

                    });
                break;
            }
        }
    });
    $('.js-job-adder').click(function(){
        $('#createJobModel').modal('show');
    });
    $('#EmergencyBtn').click(function(){
        $('#EmergencyModal').modal('show');
    });
    $('#CompleteCreateJob').click(function()
    {
        $('#formCreateJob').submit();
    })
});

function toogleAllSelector(checked)
{
    $('.js-jobSelector').each(function(){
        if(checked)
        {
            if(!$(this).is(':checked'))
            {
                $(this).prop('checked',true);
            }
        }
        else
        {
            if($(this).is(':checked'))
            {
                $(this).prop('checked',false);
            }
        }
    });
}

function massActionConfirm(text,callback)
{
    var confirmModal = $('#mass-action-modal');
    var confirm = $('#mass-action-confirm');
    confirmModal.modal('show');
    confirmModal.find('.modal-body').html(text);
    confirmModal.on('hidden.bs.modal',function(){
        confirmModal.find('.modal-body').html('');
        confirm.unbind('click')
    });
    confirm.click(function(){
        callback();
        confirmModal.modal('hide')
    });
}
