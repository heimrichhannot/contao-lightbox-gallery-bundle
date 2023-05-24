<?php

/*
 * Copyright (c) 2023 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle\Asset;

use HeimrichHannot\EncoreContracts\EncoreEntry;
use HeimrichHannot\EncoreContracts\EncoreExtensionInterface;
use HeimrichHannot\LightboxGalleryBundle\HeimrichHannotLightboxGalleryBundle;

class EncoreExtension implements EncoreExtensionInterface
{
    public function getBundle(): string
    {
        return HeimrichHannotLightboxGalleryBundle::class;
    }

    public function getEntries(): array
    {
        return [
            EncoreEntry::create('contao-lightbox-gallery-bundle', 'assets/js/contao-lightbox-gallery-bundle.js')
                ->setRequiresCss(true)
                ->addJsEntryToRemoveFromGlobals('lightbox-gallery')
                ->addJsEntryToRemoveFromGlobals('huh_components_glightbox_gallery')
                ->addCssEntryToRemoveFromGlobals('huh_components_glightbox_gallery'),
        ];
    }
}
