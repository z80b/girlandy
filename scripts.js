function init() {
    $(document)
    .on('click', '.js-open-form', function() {
        $('.js-page-wrapper').addClass('blur');
        $('.js-popup-form').removeClass('hidden');
    })
    .on('click', '.js-close-form', function(event) {
        event.preventDefault();
        $('.js-page-wrapper').removeClass('blur');
        $('.js-popup-form').addClass('hidden');  
    })
    .on('submit', '.js-page-form', function(event) {
        event.preventDefault();
        var data = {};
        $(':input', this).each(function(ix, el) {
            if (el.value) {
                data[el.name] = el.value;
            }
        });
        $.post('/', data).then(function(data) {
            alert(data.message);
        });
    });
}

$(document).ready(init);