<?php

/*
 * Copyright (c) 2019 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotLightboxGalleryBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
