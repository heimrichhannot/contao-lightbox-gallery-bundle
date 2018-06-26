<?php

if (\Contao\System::getContainer()->get('huh.utils.container')->isFrontend()) {
    $GLOBALS['TL_JAVASCRIPT']['lightbox-gallery'] = 'bundles/heimrichhannotlightboxgallery/js/contao-lightbox-gallery-bundle.min.js|static';
}