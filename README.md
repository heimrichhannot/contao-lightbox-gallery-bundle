# Contao Lightbox Gallery Bundle

[![](https://img.shields.io/packagist/v/heimrichhannot/contao-lightbox-gallery-bundle.svg)](https://packagist.org/packages/heimrichhannot/contao-lightbox-gallery-bundle)
[![](https://img.shields.io/packagist/dt/heimrichhannot/contao-lightbox-gallery-bundle.svg)](https://packagist.org/packages/heimrichhannot/contao-lightbox-gallery-bundle)

This bundle offers a contao extension for lightbox-gallery based on mcstudios/glightbox.

## Install

Install with composer or contao manger:

```
composer require heimrichhannot/contao-lightbox-gallery-bundle
```

## Usage

This bundle works out-of-the-box with contao galleries. 

### Encore bundle

If you're using this bundle with encore bundle, assets are blocked by default.
For content elements where fullsize option is checked, the assets are added automatically.


### Extended usage

To add images to an gallery define an unique data lightbox id for the elements.
Each a tag must have the same data lightbox id to be in the same gallery.

To add an title to the gallery simply add a title attribute to the a tag.
If you want to add a caption add an figcaption element after the a tag.

```html
<div class="gallery">
    <a href="img/2-1.jpg" data-caption="Image caption" data-lightbox="193910782" title="Title">
        <img src="img/thumbnails/2-1.jpg" alt="First image">
    </a>
    <figcaption class="caption">Caption</figcaption>
    <a href="img/2-2.jpg" data-lightbox="193910782">
        <img src="img/thumbnails/2-2.jpg" alt="Second image">
    </a>
    ...
</div>
```