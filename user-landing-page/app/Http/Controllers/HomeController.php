<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data untuk section about
        $about = [
            'title' => 'About Us',
            'heading' => 'Ducimus rerum libero reprehenderit cumque',
            'description' => 'Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime.',
            'features' => [
                [
                    'icon' => 'bi-buildings',
                    'title' => 'Eius provident',
                    'description' => 'Magni repellendus vel ullam hic officia accusantium ipsa dolor omnis dolor voluptatem'
                ],
                [
                    'icon' => 'bi-clipboard-pulse',
                    'title' => 'Rerum aperiam',
                    'description' => 'Autem saepe animi et aut aspernatur culpa facere. Rerum saepe rerum voluptates quia'
                ],
                // Tambahkan feature lainnya sesuai kebutuhan
            ]
        ];
        // Data untuk section services
        $services = [
            'title' => 'Services',
            'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            'items' => [
                [
                    'icon' => 'bi-briefcase',
                    'title' => 'Lorem Ipsum',
                    'description' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi',
                    'link' => '#'
                ],
                // Tambahkan service lainnya
            ]
        ];

        // Data untuk section portfolio
        $portfolio = [
            'title' => 'Portfolio',
            'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            'items' => [
                [
                    'image' => 'assets/img/masonry-portfolio/masonry-portfolio-1.jpg',
                    'title' => 'App 1',
                    'category' => 'App',
                    'link' => '#'
                ],
                // Tambahkan portfolio items lainnya
            ]
        ];

        // Data untuk section team
        $team = [
            'title' => 'Team',
            'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            'members' => [
                [
                    'image' => 'assets/img/team/team-1.jpg',
                    'name' => 'Walter White',
                    'position' => 'Chief Executive Officer',
                    'description' => 'Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel'
                ],
                // Tambahkan team members lainnya
            ]
        ];

        // Data untuk section blog
        $blog = [
            'title' => 'Recent Posts',
            'description' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
            'posts' => [
                [
                    'image' => 'assets/img/blog/blog-1.jpg',
                    'category' => 'Politics',
                    'title' => 'Dolorum optio tempore voluptas dignissimos',
                    'author' => 'Maria Doe',
                    'date' => 'Jan 1, 2022'
                ],
                // Tambahkan blog posts lainnya
            ]
        ];

        return view('home', [
            'about' => $about,
            'services' => $services,
            'portfolio' => $portfolio,
            'team' => $team,
            'blog' => $blog,
        ]);

    }
}
