This is a Laravel 4 package that provides multilingual page interface for litecms framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/page`.

    "litecms/page": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider and page alias. Open `app/config/app.php`, and add a new item to the providers array.

```php
'Litecms\Page\PageServiceProvider'
```

And also add it to alias

```php
'Page'  => 'Litecms\Page\Facades\Page',
```

Use the below commands for publishing

Configuration

    php artisan vendor:publish --provider="Litecms\Page\Providers\PageServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Page\Providers\PageServiceProvider" --tag="lang"

Views

    php artisan vendor:publish --provider="Litecms\Page\Providers\PageServiceProvider" --tag="view"

**Publishing views to theme**

Publishes admin view
    php artisan theme:publish --provider="Litecms\Page\Providers\PageServiceProvider" --view=="admin" --theme=="admin"

Publishes client view
    php artisan theme:publish --provider="Litecms\Page\Providers\PageServiceProvider" --view=="default" --theme=="client"

Publishes user view
    php artisan theme:publish --provider="Litecms\Page\Providers\PageServiceProvider" --view=="default" --theme=="user"

Publishes public view
    php artisan theme:publish --provider="Litecms\Page\Providers\PageServiceProvider" --view=="public" --theme=="public"
    
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


