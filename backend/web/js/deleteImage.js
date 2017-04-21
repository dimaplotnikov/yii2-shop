
    //клик на удалении
$(document).on("click", '.delete_reshenie_img', function (e) {
    e.preventDefault();
    var isTrue = confirm("Удалить изображение?");
    if(isTrue==true){
        var href=$(this).attr('href');
        $(this).parent('div').parent('div').remove();
        $.get( href );
    }
});