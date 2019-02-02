$(document).ready(function()
{
    $('.subj').on('change', function(e)
    { 
        $val=$(this).val();
        $x=$('.tab');
        $x.empty();
        $('#' + $val + ' option').clone().appendTo($x);
    });
});