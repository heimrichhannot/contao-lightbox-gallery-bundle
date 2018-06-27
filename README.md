# Contao Lightbox Gallery Bundle

[![](https://img.shields.io/packagist/v/heimrichhannot/contao-lightbox-gallery-bundle.svg)](https://packagist.org/packages/heimrichhannot/contao-lightbox-gallery-bundle)
[![](https://img.shields.io/packagist/dt/heimrichhannot/contao-lightbox-gallery-bundle.svg)](https://packagist.org/packages/heimrichhannot/contao-lightbox-gallery-bundle)
[![Build Status](https://travis-ci.org/heimrichhannot/contao-lightbox-gallery-bundle.svg?branch=master)](https://travis-ci.org/heimrichhannot/contao-lightbox-gallery-bundle)
[![Coverage Status](https://coveralls.io/repos/github/heimrichhannot/contao-lightbox-gallery-bundle/badge.svg?branch=master)](https://coveralls.io/github/heimrichhannot/contao-lightbox-gallery-bundle?branch=master)


## Usage

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