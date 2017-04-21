$(document).on("click", '.delete_comment', function (e) {
    e.preventDefault();
    var isTrue = confirm("Delete comment?");
    if(isTrue==true){
        var href=$(this).attr('href');
        $(this).parent('div').parent('div').parent('div').parent('div').remove();
        $.get( href );
    }
});
