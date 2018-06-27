<?php

if (\Contao\System::getContainer()->get('huh.utils.container')->isFrontend()) {
    $GLOBALS['TL_JAVASCRIPT']['mcstudios-glightbox'] = 'dist/js/glightbox.min.js|static';
    $GLOBALS['TL_JAVASCRIPT']['lightbox-gallery']    = 'bundles/heimrichhannotlightboxgallery/js/glightbox.min.js|static';
    // css
    $GLOBALS['TL_USER_CSS']['lightbox-gallery'] = 'dist/css/glightbox.css|static';
}