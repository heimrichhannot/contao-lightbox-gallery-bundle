<?php

if (\Contao\System::getContainer()->get('huh.utils.container')->isFrontend()) {
    $GLOBALS['TL_JAVASCRIPT']['huh_components_glightbox_gallery'] = 'assets/glightbox/js/glightbox.min.js|static';
    $GLOBALS['TL_JAVASCRIPT']['lightbox-gallery']                 = 'bundles/heimrichhannotlightboxgallery/js/glightbox.min.js|static';
    $GLOBALS['TL_USER_CSS']['huh_components_glightbox_gallery']   = 'assets/glightbox/css/glightbox.css|static';
}