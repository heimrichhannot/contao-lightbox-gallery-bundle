(function($) {
    var lightboxGallery = {
        init: function() {

            var links = $('a[data-lightbox]');

            $(links).on('click', function(e) {
                e.preventDefault();

                var current = this;
                var gallery = [];
                var slides = document.querySelectorAll('[data-lightbox="' + current.dataset.lightbox + '"]');
                var index = [].slice.call(slides).indexOf(current);
                var startAt = index > -1 ? index : 0;

                for (var i = 0; i < slides.length; i++) {
                    var link = slides[i];

                    var element = {
                        'href': link.href,
                        'type': 'image',
                    };

                    var caption = $(link).parent('figure').find('figcaption');

                    if (caption.length > 0) {
                        element.description = caption.html();
                    }

                    if ('undefined' !== typeof link.title) {
                        element.title = link.title;
                    }

                    gallery.push(element);
                }

                var myLightbox = GLightbox({'startAt': startAt});
                myLightbox.setElements(gallery);
                myLightbox.open();
            });
        },
    };

    document.addEventListener('DOMContentLoaded', function() {
        lightboxGallery.init();
    });
})(jQuery);