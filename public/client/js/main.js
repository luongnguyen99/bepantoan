$(function() {
    $('.buy_now').on('click',function () {
        $(this).parents('form').submit();
    });

    $('.clickDelete').on('click',function(){
        $(this).parents('form').submit();
    });
    
    $('.updateQty').on('change',function(){
        if ($(this).val() < 1) {
            $(this).val(1);
        };

        if ($(this).val() > 0) {
            $(this).parents('form').submit();
        }
    })
})