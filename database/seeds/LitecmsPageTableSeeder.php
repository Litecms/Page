<?php

use Illuminate\Database\Seeder;

class LitecmsPageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.page.page.table'))->insert([

            [
                'id'               => 1,
                'name'             => 'Home',
                'slug'             => 'home',
                'heading'          => 'Home',
                'title'            => 'Home',
                'content'          => 'Home Page',
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
                'content'          => '                    <div class="about">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="count-numerics">
                                    <h2>Our mission is to make insurance<br>work better for businesses of all types and sizes.</h2>
                                    <ul class="list-inline row">
                                        <li class="col-md-3 col-xs-6">
                                            <div class="text-center">
                                                <div>
                                                    <figure>1</figure>
                                                    <span>k+</span>
                                                </div>
                                                <h4>Set of pages</h4>
                                          </div>
                                        </li>
                                        <li class="col-md-3 col-xs-6">
                                            <div class="text-center">
                                                <div>
                                                    <figure>53</figure>
                                                </div>
                                                <h4>Categories</h4>
                                            </div>
                                        </li>
                                        <li class="col-md-3 col-xs-6">
                                            <div class="text-center">
                                                <div>
                                                    <figure>10</figure>
                                                    <span>x</span>
                                                </div>
                                                <h4>Save time</h4>
                                            </div>
                                        </li>
                                        <li class="col-md-3 col-xs-6 s-counter-v1">
                                            <div class="text-center">
                                                <div>
                                                    <figure>9</figure>
                                                </div>
                                                <h4>Formats to use</h4>
                                            </div>
                                        </li>
                                      </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="promo-section">
                                    <div class="row mln mrn">
                                        <div class="col-md-6 pl-0 pr-0">
                                            <div class="content-section text-center">
                                                <h2>Creative Digital Agency</h2>
                                                <span>You are in good hands.</span>
                                                <p>It’s important to stay detail oriented with every project we tackle. Staying focused allows us to turn every project we complete into something we love.</p>
                                                <p>The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels.</p>
                                                <h4>— John Doe</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-0 pr-0 image-section">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row features-section">
                            <div class="col-sm-5">
                                <div class="hor-centered-row">
                                    <div class="hor-centered-row-col exp-num"><span>9</span></div>
                                    <div class="hor-centered-row-col exp-year">
                                        <h4>
                                            <span>Years</span>
                                            <span>Experience</span>
                                        </h4>
                                        <p>Front-end Design & Development.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="row mb40">
                                    <div class="col-sm-6">
                                        <div class="feature-item">
                                            <i class="ti-mobile"></i>
                                            <h4>Responsive Layout</h4>
                                            <p>This is where we sit down, grab a cup of coffee and dial in the details.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="feature-item">
                                            <i class="ti-palette"></i>
                                            <h4>Fully Customizable</h4>
                                            <p>This is where we sit down, grab a cup of coffee and dial in the details.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="feature-item">
                                            <i class="ti-cup"></i>
                                            <h4>Endless Possibilities</h4>
                                            <p>This is where we sit down, grab a cup of coffee and dial in the details.</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="feature-item">
                                            <i class="ti-crown"></i>
                                            <h4>Powerful Performance</h4>
                                            <p>This is where we sit down, grab a cup of coffee and dial in the details.</p>
                                        </div>
                                    </div>
                                </div>
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
