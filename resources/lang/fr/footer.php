<?php

return [
    'footer' => [
        'description' => 'Chez Am-drive, nous offrons un service de transport avec chauffeur haut de gamme, alliant confort et sécurité. Que ce soit pour un trajet professionnel ou une sortie, nos chauffeurs expérimentés et nos véhicules spacieux vous garantissent un voyage agréable. Réservez maintenant pour un service sur-mesure adapté à vos besoins.',
        'contact_info' => [
            'title' => 'Informations de contact',
            'address' => 'Adresse : 3 Rue Gilbert Rousset, Asnières-sur-Seine 92600, France.',
            'phone' => 'Téléphone : +33 6 50 40 72 70',
            'email' => 'Courriel : contact@am-drive.com',
            'website' => 'Site : www.am-drive.com',
        ],
        'services' => [
            'title' => 'Nos services',
            'links' => [
                'services' => [
                    'text' => 'Services',
                    'route' => route('services.fr'), // Utilisation de la route française
                ],
                'contact' => [
                    'text' => 'Contact',
                    'route' => route('contact.fr'), // Utilisation de la route française
                ],
            ],
        ],
        'information' => [
            'title' => 'Informations',
            'links' => [
                'legal_notice' => [
                    'text' => 'Mentions légales',
                    'route' => route('mentions.fr'), // Utilisation de la route française
                ],
                'privacy_policy' => [
                    'text' => 'Politique de confidentialité',
                    'route' => route('policies.fr'), // Utilisation de la route française
                ],
                'cookie_policy' => [
                    'text' => 'Politique de gestion des cookies',
                    'route' => route('cookies.fr'), // Utilisation de la route française
                ],
                'terms_of_use' => [
                    'text' => 'Conditions générales d\'utilisation',
                    'route' => route('terms.fr'), // Utilisation de la route française
                ],
            ],
        ],
        'social_networks' => 'Suivez-nous',
        'copyright' => '© 2024 AM Drive. Tous droits réservés.',
    ],
];
