function popupAlert(text, type) {
    $('.js-page-wrapper').addClass('blur');
    $('.js-alert')
        .addClass(type || '')
        .removeClass('hidden')
        .find('.js-alert-content')
        .html(text);
}

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
    .on('click', '.js-close-alert', function(event) {
        event.preventDefault();
        $('.js-page-wrapper').removeClass('blur');
        $('.js-alert').addClass('hidden');  
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
            popupAlert(data.message);
        });
    });
}

$(document).ready(init);