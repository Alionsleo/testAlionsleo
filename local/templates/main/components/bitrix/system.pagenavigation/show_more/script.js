$(document).ready(function(){
    $(document).on('click', '.show__more', function(){
        var targetContainer = $('#news-section'),
            url =  $('.show__more').attr('data-url');
        if (url !== undefined) {
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'html',
                success: function(data){
                    $('.show__more').remove();
                    var elements = $(data).find('.news__item'),
                        pagination = $(data).find('.show__more');
                    targetContainer.append(elements);
                    targetContainer.append(pagination);
                }
            })
        }
    });
});
