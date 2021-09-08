<?php

namespace Litecms\Page\Seeds;

use DB;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.page.page.model.table'))->insert([

            [
                'id'               => 1,
                'name'             => 'Home',
                'slug'             => 'home',
                'heading'          => 'Build, Website or Web Application!',
                'title'            => 'Build, Website or Web Application!',
                'content'          => 'Create custom website for your business in Laravel. Or build a robust web application like ERP or CRM for your business that can handle many number user requests and complex business logic.',
                'meta_title'       => 'Home',
                'meta_keyword'     => 'Home',
                'meta_description' => 'Home',
                'images'           => null,
                'abstract'         => null,
                'order'            => 0,
                'banner'           => null,
                'view'             => 'page',
                'compile'          => null,
                'status'           => 'Show',
            ],

            [
                'id'               => 2,
                'name'             => 'About Us',
                'slug'             => 'about-us',
                'heading'          => 'Meet Lavalite',
                'title'            => 'About Us',
                'content'          => '<div class="section-title">
                    <h2 class="title">Our mission is to make your life beautiful.</h2>
                    <div class="right-side">
                        <p>Lavalite (lavalite.org) is a free and open-source which can be used as a content management system (CMS), Enterprise Resource Planning (ERP) &  Customer Relationship Management (CRM) software written in Laravel and it can be pair with a wide range of databases like MySQL or MariaDB etc. Features include a package architecture and a template system.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="content-img">
                            <img src="/assets/img/easy-image-2-1.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="content-img">
                            <img src="/assets/img/easy-image-2-2.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>',
                'meta_title'       => 'About Us',
                'meta_keyword'     => 'About Us',
                'meta_description' => 'This is a started theme for Lavalite cms, you can customize according to your requirement.',
                'images'           => null,
                'abstract'         => null,
                'order'            => 0,
                'banner'           => null,
                'view'             => 'page',
                'compile'          => null,
                'status'           => 'Show',
            ],

            [
                'id'               => 3,
                'name'             => 'Contact Us',
                'heading'          => 'Contact Us',
                'title'            => 'Contact Us',
                'content'          => '<p><br></p>',
                'meta_title'       => 'Contact Us',
                'meta_keyword'     => 'Contact Us',
                'meta_description' => 'Contact Us',
                'images'           => null,
                'abstract'         => null,
                'slug'             => 'contact',
                'order'            => 0,
                'banner'           => null,
                'view'             => 'page',
                'compile'          => null,
                'status'           => 'Show',
            ],

            [
                'id'               => 4,
                'name'             => 'Page Not found',
                'heading'          => 'Page Not found',
                'title'            => 'Page Not found',
                'content'          => '<p><br></p>',
                'meta_title'       => 'Page Not found',
                'meta_keyword'     => 'Page Not found',
                'meta_description' => 'Page Not found',
                'images'           => null,
                'abstract'         => null,
                'slug'             => 404,
                'order'            => 0,
                'banner'           => null,
                'view'             => 'page',
                'compile'          => null,
                'status'           => 'Show',
            ],

        ]);

        DB::table('menus')->insert([
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/page/page',
                'name'        => 'Pages',
                'description' => null,
                'icon'        => 'lab la-product-hunt',
                'target'      => null,
                'order'       => 5,
                'status'      => 1,
            ],

            [
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'about-us.html',
                'name'        => 'About Us',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 8,
                'status'      => 1,
            ],
            [
                'parent_id'   => 5,
                'key'         => null,
                'url'         => 'about-us.html',
                'name'        => 'About Us',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 8,
                'status'      => 1,
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'page.page.view',
                'name' => 'View Page',
            ],
            [
                'slug' => 'page.page.create',
                'name' => 'Create Page',
            ],
            [
                'slug' => 'page.page.edit',
                'name' => 'Update Page',
            ],
            [
                'slug' => 'page.page.delete',
                'name' => 'Delete Page',
            ],
        ]);
    }
}
