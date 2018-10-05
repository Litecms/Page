This is a Laravel 4 package that provides multilingual page interface for litecms framework.

## Installation

Begin by installing this package through Composer.

    composer install litecms/page

## Publishing

Configuration

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="lang"

## Views

Publish to resources\vendor directory

    php artisan vendor:publish --provider="Litecms\Page\PageServiceProvider" --tag="view"

Publishes admin view to admin theme

    php artisan theme:publish --provider="Litecms\Page\PageServiceProvider" --view="admin" --theme="admin"

Publishes public view public theme

    php artisan theme:publish --provider="Litecms\Page\PageServiceProvider" --view="public" --theme="public"
    
You are done!

## Usage

Add pages through `admin/pages`

Browser to get page browse `/{slug}.html`

Calling other pages inside a view or function

```php
{{Page::heading('slug')}}
{{Page::content('slug')}}
{{Page::title('slug')}}
{{Page::keyword('slug')}}
{{Page::description('slug')}}
{{Page::banner('slug')}}
```


