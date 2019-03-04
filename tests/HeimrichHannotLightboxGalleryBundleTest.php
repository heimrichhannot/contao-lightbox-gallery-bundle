<?php

/*
 * Copyright (c) 2019 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle\Tests;

use HeimrichHannot\LightboxGalleryBundle\HeimrichHannotLightboxGalleryBundle;
use PHPUnit\Framework\TestCase;

class HeimrichHannotLightboxGalleryBundleTest extends TestCase
{
    /**
     * Tests the object instantiation.
     */
    public function testCanBeInstantiated()
    {
        $bundle = new HeimrichHannotLightboxGalleryBundle();

        $this->assertInstanceOf('HeimrichHannot\LightboxGalleryBundle\HeimrichHannotLightboxGalleryBundle', $bundle);
    }

    /**
     * Tests the getContainerExtension() method.
     */
    public function testReturnsTheContainerExtension()
    {
        $bundle = new HeimrichHannotLightboxGalleryBundle();

        $this->assertInstanceOf('HeimrichHannot\LightboxGalleryBundle\DependencyInjection\LightboxGalleryExtension', $bundle->getContainerExtension());
    }
}
