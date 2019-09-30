import GLightbox from 'glightbox';

require('../scss/contao-lightbox-gallery-bundle.scss');

class LightboxGalleryBundle {
    static onReady() {
        document.querySelectorAll('a[data-lightbox]').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                let current = item,
                    gallery = [],
                    slides = document.querySelectorAll('[data-lightbox="' + current.dataset.lightbox + '"]'),
                    index = [].slice.call(slides).indexOf(current),
                    startAt = index > -1 ? index : 0;

                for (let i = 0; i < slides.length; i++) {
                    let link = slides[i],
                        element = {
                            'href': link.href,
                            'type': 'image'
                        },
                        caption = link.closest('figure') !== null ? link.closest('figure').querySelectorAll('figcaption') : '';

                    if (caption !== '') {
                        element.description = caption.html();
                    }

                    if ('undefined' !== typeof link.title && link.title !== '') {
                        element.title = link.title;
                    }

                    gallery.push(element);
                }

                let myLightbox = GLightbox({'startAt': startAt});

                myLightbox.setElements(gallery);
                myLightbox.open();
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', LightboxGalleryBundle.onReady, true);