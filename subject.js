$(document).ready(function(){
   $('.field1').on('change', '.subj' , function(e)
   { 
        e.preventDefault();
        $val=$(this).val();
        $x=$(this).siblings('select');
        $x.empty();
        $('#' + $val + ' option').clone().appendTo($x);
    });
});
