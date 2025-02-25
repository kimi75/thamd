<?php

return [
    'footer' => [
        'description' => 'At Am-drive, we offer a high-end chauffeur transport service, combining comfort and safety. Whether it’s for a business trip or an outing, our experienced drivers and spacious vehicles ensure you have a pleasant journey. Book now for a personalized service tailored to your needs.',
        'contact_info' => [
            'title' => 'Contact Info',
            'address' => 'Address: 3 Rue Gilbert Rousset, Asnières-sur-Seine 92600, France.',
            'phone' => 'Phone: +33 6 50 40 72 70',
            'email' => 'Email: contact@am-drive.com',
            'website' => 'Website: www.am-drive.com',
        ],
        'services' => [
            'title' => 'Our Services',
            'links' => [
                'services' => [
                    'text' => 'Services',
                    'route' => route('services.en'), // Utilisation de la route anglaise
                ],
                'contact' => [
                    'text' => 'Contact',
                    'route' => route('contact.en'), // Utilisation de la route anglaise
                ],
            ],
        ],
        'information' => [
            'title' => 'Information',
            'links' => [
                'legal_notice' => [
                    'text' => 'Legal Notice',
                    'route' => route('mentions.en'), // Utilisation de la route anglaise
                ],
                'privacy_policy' => [
                    'text' => 'Privacy Policy',
                    'route' => route('policies.en'), // Utilisation de la route anglaise
                ],
                'cookie_policy' => [
                    'text' => 'Cookie Policy',
                    'route' => route('cookies.en'), // Utilisation de la route anglaise
                ],
                'terms_of_use' => [
                    'text' => 'Terms of Use',
                    'route' => route('terms.en'), // Utilisation de la route anglaise
                ],
            ],
        ],
        'social_networks' => 'Follow Us',
        'copyright' => '© 2024 AM Drive. All rights reserved.',
    ],
];
