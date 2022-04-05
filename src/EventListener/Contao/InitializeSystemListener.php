<?php

namespace HeimrichHannot\LightboxGalleryBundle\EventListener\Contao;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @Hook("initializeSystem")
 */
class InitializeSystemListener
{
    private RequestStack $requestStack;
    private ScopeMatcher $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }

    public function __invoke(): void
    {
        if ($this->scopeMatcher->isFrontendRequest($this->requestStack->getCurrentRequest())) {
            $GLOBALS['TL_JAVASCRIPT']['huh_components_glightbox_gallery'] = 'assets/glightbox-gallery/js/glightbox.min.js|static';
            $GLOBALS['TL_JAVASCRIPT']['lightbox-gallery']                 = 'bundles/heimrichhannotlightboxgallery/js/contao-lightbox-gallery-bundle.min.js|static';
            $GLOBALS['TL_CSS']['huh_components_glightbox_gallery']        = 'assets/glightbox-gallery/css/glightbox.min.css|static';
        }
    }
}