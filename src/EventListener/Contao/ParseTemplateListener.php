<?php

namespace HeimrichHannot\LightboxGalleryBundle\EventListener\Contao;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\FrontendTemplate;
use Contao\Template;
use HeimrichHannot\EncoreBundle\Asset\FrontendAsset;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

/**
 * @Hook("parseTemplate")
 */
class ParseTemplateListener implements ServiceSubscriberInterface
{
    private RequestStack       $requestStack;
    private ScopeMatcher       $scopeMatcher;
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container, RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
        $this->container = $container;
    }

    public function __invoke(Template $template): void
    {
        if (!$this->container->has(FrontendAsset::class)
            || !$template instanceof FrontendTemplate
            || !$this->scopeMatcher->isFrontendRequest($this->requestStack->getCurrentRequest())) {
            return;
        }
        $templateName = ($template->getName() === 'twig_template_proxy' ? $template->twig_template : $template->getName());

        if (!str_starts_with($templateName, 'mod_') && !str_starts_with($templateName, 'ce_')) {
            return;
        }

        $templateData = (object)($template->getName() === 'twig_template_proxy' ? $template->twig_context : $template->getData());

        if ($templateData->fullsize) {
            $this->container->get(FrontendAsset::class)->addActiveEntrypoint('contao-lightbox-gallery-bundle');
        }
    }

    public static function getSubscribedServices()
    {
        return [
            '?'.FrontendAsset::class
        ];
    }
}