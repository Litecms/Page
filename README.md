Laravel package that provides page management facility for lavalite CMS.

## Installation

Require this package with composer. 

    composer require litecms/page

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.


## Publishing

**Configuration**

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="config"

**Language**

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="lang"

**Files**

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="storage"

### Views

Publish views to resources\views\vendor directory

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="view"

Publishes admin view to admin theme

    php artisan theme:publish --provider="Litecms\Page\PageServiceProvider" --view="admin" --theme="admin"

Publishes public view to public theme

    php artisan theme:publish --provider="Litecms\Page\PageServiceProvider" --view="public" --theme="public"