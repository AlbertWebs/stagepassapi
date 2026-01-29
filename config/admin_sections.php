<?php

return [
    'sections' => [
        'navigation' => [
            'label' => 'Navigation',
            'tables' => [
                ['name' => 'navbar_settings', 'label' => 'Navbar Settings', 'single' => true],
                ['name' => 'navbar_links', 'label' => 'Navbar Links'],
                ['name' => 'bottom_nav_links', 'label' => 'Bottom Navigation Links'],
            ],
        ],
        'hero' => [
            'label' => 'Hero',
            'tables' => [
                ['name' => 'hero_sections', 'label' => 'Hero Section', 'single' => true],
            ],
        ],
        'about' => [
            'label' => 'About',
            'tables' => [
                ['name' => 'about_sections', 'label' => 'About Section', 'single' => true],
                ['name' => 'about_highlights', 'label' => 'Highlights'],
            ],
        ],
        'services' => [
            'label' => 'Services',
            'tables' => [
                ['name' => 'services_sections', 'label' => 'Services Section', 'single' => true],
                ['name' => 'services', 'label' => 'Services'],
            ],
        ],
        'stats' => [
            'label' => 'Stats',
            'tables' => [
                ['name' => 'stats_sections', 'label' => 'Stats Section', 'single' => true],
                ['name' => 'stats', 'label' => 'Stats'],
            ],
        ],
        'portfolio' => [
            'label' => 'Portfolio',
            'tables' => [
                ['name' => 'portfolio_sections', 'label' => 'Portfolio Section', 'single' => true],
                ['name' => 'portfolio_items', 'label' => 'Portfolio Items'],
            ],
        ],
        'industries' => [
            'label' => 'Industries',
            'tables' => [
                ['name' => 'industries_sections', 'label' => 'Industries Section', 'single' => true],
                ['name' => 'industries', 'label' => 'Industries'],
            ],
        ],
        'clients' => [
            'label' => 'Clients',
            'tables' => [
                ['name' => 'clients_sections', 'label' => 'Clients Section', 'single' => true],
                ['name' => 'client_logos', 'label' => 'Client Logos'],
            ],
        ],
        'contact' => [
            'label' => 'Contact',
            'tables' => [
                ['name' => 'contact_sections', 'label' => 'Contact Section', 'single' => true],
                ['name' => 'contact_details', 'label' => 'Contact Details'],
            ],
        ],
        'footer' => [
            'label' => 'Footer',
            'tables' => [
                ['name' => 'footer_settings', 'label' => 'Footer Settings', 'single' => true],
                ['name' => 'footer_social_links', 'label' => 'Social Links'],
                ['name' => 'footer_quick_links', 'label' => 'Quick Links'],
                ['name' => 'footer_more_links', 'label' => 'More Links'],
                ['name' => 'footer_service_items', 'label' => 'Service Items'],
            ],
        ],
        'instagram-media' => [
            'label' => 'Instagram Media',
            'tables' => [
                ['name' => 'instagram_media', 'label' => 'Instagram Media', 'no_create' => true, 'no_update' => true],
            ],
        ],
        'contact-messages' => [
            'label' => 'Contact Messages',
            'tables' => [
                ['name' => 'contact_messages', 'label' => 'Contact Messages', 'no_create' => true, 'no_update' => true],
            ],
        ],
        'quote-requests' => [
            'label' => 'Quote Requests',
            'tables' => [
                ['name' => 'quote_requests', 'label' => 'Quote Requests', 'no_create' => true, 'no_update' => true],
            ],
        ],
    ],
];
