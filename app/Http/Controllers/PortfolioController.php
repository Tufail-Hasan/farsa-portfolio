<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $skills = [
            'PHP',
            'Laravel',
            'MySQL',
            'HTML5',
            'CSS3',
            'Bootstrap',
            'JavaScript',
            'Git',
            'GitHub',
        ];

        $projects = [

            // Project 1: Smart Multi-Vendor eCommerce
            [
                'title' => 'Smart Multi-Vendor eCommerce Management System',
                'category' => 'Full Stack Web Application',
                'description' => 'A complete multi-vendor marketplace with vendor management, product management, orders, payments, reports and Filament Admin Panel.',
                'image' => 'images/projects/marketpro-home.png',
                'technologies' => [
                    'Laravel 12',
                    'PHP',
                    'MySQL',
                    'Filament 5',
                    'Bootstrap'
                ],
                'github' => 'https://github.com/Tufail-Hasan/Smart-Multi_Vendor-eCommerce-Management-System',
                'featured' => true,
            ],

            // Project 2: Fashion eCommerce
            [
                'title' => 'Fashion eCommerce Website',
                'category' => 'eCommerce Website',
                'description' => 'An online fashion shopping platform with product, category, brand, cart and order management.',
                'image' => 'images/projects/fashion-home.png',
                'technologies' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'Bootstrap'
                ],
                'github' => 'https://github.com/Tufail-Hasan',
                'featured' => false,
            ],

            // Project 3: Student Management System
            [
                'title' => 'Student Management System',
                'category' => 'Management Application',
                'description' => 'A web application for managing student information and academic records.',
                'image' => 'images/projects/student-dashboard.png',
                'technologies' => [
                    'Laravel',
                    'PHP',
                    'MySQL'
                ],
                'github' => 'https://github.com/Tufail-Hasan',
                'featured' => false,
            ],

        ];

        return view('portfolio.home', compact('skills', 'projects'));
    }
}
