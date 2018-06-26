<?php

/*
 * Copyright (c) 2018 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle\Test\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\ManagerPlugin\Config\ContainerBuilder;
use Contao\ManagerPlugin\PluginLoader;
use Contao\TestCase\ContaoTestCase;
use HeimrichHannot\LightboxGalleryBundle\ContaoManager\Plugin;
use HeimrichHannot\LightboxGalleryBundle\HeimrichHannotLightboxGalleryBundle;
use PHPUnit\Framework\MockObject\Matcher\InvokedCount;

/**
 * Test the plugin class
 * Class PluginTest.
 */
class PluginTest extends ContaoTestCase
{
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     * Tests the object instantiation.
     */
    public function testInstantiation()
    {
        static::assertInstanceOf(Plugin::class, new Plugin());
    }

    /**
     * Tests the bundle contao invocation.
     */
    public function testGetBundles()
    {
        $plugin = new Plugin();

        /** @var BundleConfig[] $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        static::assertCount(1, $bundles);
        static::assertInstanceOf(BundleConfig::class, $bundles[0]);
        static::assertSame(HeimrichHannotLightboxGalleryBundle::class, $bundles[0]->getName());
        static::assertSame([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }

    /**
     * Test extend configuration.
     */
    public function testGetExtensionConfigLoadFilterConfig()
    {
        $container = new ContainerBuilder($this->mockPluginLoader($this->never()), []);
        $container->setParameter('kernel.bundles', ['HeimrichHannot\EncoreBundle\HeimrichHannotContaoEncoreBundle']);
        $container->setParameter('kernel.project_dir', '');
        $plugin = new Plugin();

        $extensionConfigs = $plugin->getExtensionConfig('huh_encore', [], $container);

        $this->assertNotEmpty($extensionConfigs);
        $this->assertArrayHasKey('huh', $extensionConfigs);
        $this->assertArrayHasKey('encore', $extensionConfigs['huh']);

        $this->assertArrayHasKey('entries', $extensionConfigs['huh']['encore']);
        $this->assertNotEmpty($extensionConfigs['huh']['encore']['entries']);

        $this->assertContains(['name' => 'contao-lightbox-gallery-bundle', 'file' => 'vendor/heimrichhannot/contao-lightbox-gallery-bundle/src/Resources/public/js/contao-lightbox-gallery-bundle.es6.js', 'requiresCss' => true], $extensionConfigs['huh']['encore']['entries']);
    }

    /**
     * Mocks the plugin loader.
     *
     * @param InvokedCount $expects
     * @param array        $plugins
     *
     * @return PluginLoader|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockPluginLoader(InvokedCount $expects, array $plugins = [])
    {
        $pluginLoader = $this->createMock(PluginLoader::class);

        $pluginLoader->expects($expects)->method('getInstancesOf')->with(PluginLoader::EXTENSION_PLUGINS)->willReturn($plugins);

        return $pluginLoader;
    }
}
