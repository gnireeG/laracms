<?php

namespace Laracms\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Laracms\Core\Models\Page;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // HOME PAGE
        // ========================================
        $home = Page::create([
            'title' => 'Home',
            'slug' => 'home',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Welcome to LaraCMS! A modern, flexible content management system built with Laravel and Livewire.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // ========================================
        // ABOUT SECTION
        // ========================================
        $about = Page::create([
            'title' => 'About Us',
            'slug' => 'about',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Learn more about our company and what we do.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // About > Team
        $team = Page::create([
            'title' => 'Our Team',
            'slug' => 'team',
            'parent_id' => $about->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Meet our amazing team of professionals.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // About > Team > Leadership
        Page::create([
            'title' => 'Leadership',
            'slug' => 'leadership',
            'parent_id' => $team->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Our executive leadership team.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /about/team/leadership

        // About > Team > Developers
        Page::create([
            'title' => 'Developers',
            'slug' => 'developers',
            'parent_id' => $team->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Meet our talented development team.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /about/team/developers

        // About > History
        Page::create([
            'title' => 'Our History',
            'slug' => 'history',
            'parent_id' => $about->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Founded in 2024, we have been innovating ever since.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /about/history

        // About > Mission
        Page::create([
            'title' => 'Our Mission',
            'slug' => 'mission',
            'parent_id' => $about->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'To build amazing software that makes a difference.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /about/mission

        // ========================================
        // SERVICES SECTION
        // ========================================
        $services = Page::create([
            'title' => 'Services',
            'slug' => 'services',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Discover our range of professional services.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // Services > Web Development
        $webDev = Page::create([
            'title' => 'Web Development',
            'slug' => 'web-development',
            'parent_id' => $services->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Custom web applications built with modern technologies.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/web-development

        // Services > Web Development > Laravel
        Page::create([
            'title' => 'Laravel Development',
            'slug' => 'laravel',
            'parent_id' => $webDev->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Expert Laravel development services.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/web-development/laravel

        // Services > Web Development > React
        Page::create([
            'title' => 'React Development',
            'slug' => 'react',
            'parent_id' => $webDev->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Modern React applications and SPAs.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/web-development/react

        // Services > Mobile Development
        $mobileDev = Page::create([
            'title' => 'Mobile Development',
            'slug' => 'mobile-development',
            'parent_id' => $services->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Native and cross-platform mobile apps.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/mobile-development

        // Services > Mobile Development > iOS
        Page::create([
            'title' => 'iOS Development',
            'slug' => 'ios',
            'parent_id' => $mobileDev->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Beautiful iOS apps with Swift.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/mobile-development/ios

        // Services > Mobile Development > Android
        Page::create([
            'title' => 'Android Development',
            'slug' => 'android',
            'parent_id' => $mobileDev->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Powerful Android apps with Kotlin.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/mobile-development/android

        // Services > Consulting
        Page::create([
            'title' => 'Consulting',
            'slug' => 'consulting',
            'parent_id' => $services->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Technical consulting and architecture guidance.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /services/consulting

        // ========================================
        // BLOG SECTION
        // ========================================
        $blog = Page::create([
            'title' => 'Blog',
            'slug' => 'blog',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Read our latest articles and insights.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // Blog > 2024
        $blog2024 = Page::create([
            'title' => '2024',
            'slug' => '2024',
            'parent_id' => $blog->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Articles from 2024'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // Blog > 2024 > November
        $blogNov = Page::create([
            'title' => 'November',
            'slug' => 'november',
            'parent_id' => $blog2024->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'November 2024 posts'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // Blog > 2024 > November > Post 1
        Page::create([
            'title' => 'Getting Started with LaraCMS',
            'slug' => 'getting-started-with-laracms',
            'parent_id' => $blogNov->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Learn how to build your first site with LaraCMS in this comprehensive guide.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /blog/2024/november/getting-started-with-laracms

        // Blog > 2024 > November > Post 2
        Page::create([
            'title' => 'Livewire 4 Features',
            'slug' => 'livewire-4-features',
            'parent_id' => $blogNov->id,
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Exploring the new features in Livewire 4 beta.'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);
        // URL: /blog/2024/november/livewire-4-features

        // ========================================
        // CONTACT PAGE
        // ========================================
        Page::create([
            'title' => 'Contact',
            'slug' => 'contact',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'Get in touch with us!'
                        ]
                    ]
                ]
            ],
            'is_published' => true,
        ]);

        // ========================================
        // DRAFT PAGE (unpublished example)
        // ========================================
        Page::create([
            'title' => 'Coming Soon',
            'slug' => 'coming-soon',
            'content' => [
                'components' => [
                    [
                        'type' => 'text',
                        'properties' => [
                            'content' => 'This page is still in development.'
                        ]
                    ]
                ]
            ],
            'is_published' => false,  // ← Nicht veröffentlicht!
        ]);
    }
}