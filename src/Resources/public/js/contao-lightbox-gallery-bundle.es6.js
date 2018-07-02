import GLightbox from 'glightbox';

require('../scss/contao-lightbox-gallery-bundle.scss');

let umbrella = require('umbrellajs');

let u = umbrella.u;

($ => {
    let lightboxGallery = {
        init: function() {

            let links = $('a[data-lightbox]');

            $(links).on('click', function(e) {
                e.preventDefault();

                console.log('test');
                let current = this;
                let gallery = [];
                let slides = document.querySelectorAll('[data-lightbox="' +
                    current.dataset.lightbox + '"]');
                let index = [].slice.call(slides).indexOf(current);
                let startAt = index > -1 ? index : 0;

                for (let i = 0; i < slides.length; i++) {
                    let link = slides[i];

                    let element = {
                        'href': link.href,
                        'type': 'image',
                    };

                    let caption = $(link).parent('figure').find('figcaption');

                    if (caption.length > 0) {
                        element.description = caption.html();
                    }

                    if ('undefined' !== typeof link.title) {
                        element.title = link.title;
                    }

                    gallery.push(element);
                }

                let myLightbox = GLightbox({'startAt': startAt});
                myLightbox.setElements(gallery);
                myLightbox.open();
            });
        },
    };

    document.addEventListener('DOMContentLoaded', function() {
        lightboxGallery.init();
    });
})(u);