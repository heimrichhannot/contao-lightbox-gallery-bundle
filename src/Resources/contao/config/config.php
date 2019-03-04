<?php

if (\Contao\System::getContainer()->get('huh.utils.container')->isFrontend()) {
    $GLOBALS['TL_JAVASCRIPT']['huh_components_glightbox_gallery'] = 'assets/glightbox-gallery/js/glightbox.min.js|static';
    $GLOBALS['TL_JAVASCRIPT']['lightbox-gallery']                 = 'bundles/heimrichhannotlightboxgallery/js/contao-lightbox-gallery-bundle.min.js|static';
    $GLOBALS['TL_CSS']['huh_components_glightbox_gallery']        = 'assets/glightbox-gallery/css/glightbox.min.css|static';
}