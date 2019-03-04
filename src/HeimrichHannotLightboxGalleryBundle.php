<?php

/*
 * Copyright (c) 2019 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle;

use HeimrichHannot\LightboxGalleryBundle\DependencyInjection\LightboxGalleryExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotLightboxGalleryBundle extends Bundle
{
    /**
     * @return LightboxGalleryExtension
     */
    public function getContainerExtension()
    {
        return new LightboxGalleryExtension();
    }
}
