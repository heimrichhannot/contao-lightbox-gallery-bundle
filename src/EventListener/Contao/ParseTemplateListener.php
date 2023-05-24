<?php

/*
 * Copyright (c) 2023 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\LightboxGalleryBundle\EventListener\Contao;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\FrontendTemplate;
use Contao\Template;
use HeimrichHannot\EncoreContracts\PageAssetsTrait;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @Hook("parseTemplate")
 */
class ParseTemplateListener
{
    use PageAssetsTrait;

    private RequestStack       $requestStack;
    private ScopeMatcher       $scopeMatcher;

    public function __construct(ContainerInterface $container, RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
        $this->container = $container;
    }

    public function __invoke(Template $template): void
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request || !$this->scopeMatcher->isFrontendRequest($request) || !$template instanceof FrontendTemplate) {
            return;
        }

        $templateName = ('twig_template_proxy' === $template->getName() ? $template->twig_template : $template->getName());

        if (!str_starts_with($templateName, 'mod_') && !str_starts_with($templateName, 'ce_')) {
            return;
        }

        $templateData = (object) ('twig_template_proxy' === $template->getName() ? $template->twig_context : $template->getData());

        if ($templateData->fullsize ?? false) {
            $this->addPageEntrypoint('contao-lightbox-gallery-bundle');
        }
    }
}
