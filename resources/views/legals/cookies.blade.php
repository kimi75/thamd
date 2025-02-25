@extends('layouts.app')

@section('head')
    <title>Politique de gestion des cookies | Déclaration préalable</title>
    <meta name="description" content="Politique de gestion des cookies de notre site et services">
    <meta name="keywords" content="Politique de gestion des cookies">
    <meta name="robots" content="index, follow">
    <meta name="author" content="declaration-prealable-de-travaux.fr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="fr">
@endsection



@section('content')

<section class="wrapper bg-soft-primary">
    <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
        <div class="row">
            <div class="col-md-10 col-xl-8 mx-auto">
                <div class="post-header">
                    <div class="post-category text-line">
                        <span class="hover" rel="category">Apprenez comment nous utilisons les cookies pour améliorer votre expérience sur AM-Drive.com</span>
                    </div>
                    <!-- /.post-category -->
                    <h1 class="display-1 mb-4">Cookies</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wrapper bg-light">
    <div class="container pb-14 pb-md-16">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="blog single mt-n17">
                    <div class="card">
                        <div class="card-body">
                            <div class="classic-view">
                                <article class="post">
                                    <div class="post-content mb-5">                 
                                        <h2>Politique d'Utilisation des Cookies</h2>
                                        <hr>

                                        <h3>1. Introduction</h3>
                                        <p>Bienvenue sur AM-Drive.com. Cette politique a pour objectif de vous expliquer notre utilisation des cookies, leur rôle sur notre site, et comment vous pouvez les gérer ou les désactiver.</p>

                                        <h3>2. Qu'est-ce qu'un cookie ?</h3>
                                        <p>Un cookie est un petit fichier texte stocké sur votre appareil (ordinateur, tablette ou mobile) lors de votre visite sur un site internet. Il permet de mémoriser certaines informations sur vos interactions avec le site pour améliorer votre expérience de navigation.</p>

                                        <h3>3. Pourquoi utilisons-nous des cookies ?</h3>
                                        <p>Nous utilisons des cookies pour :</p>
                                        <ul>
                                            <li>Optimiser votre expérience utilisateur en mémorisant vos préférences et paramètres de navigation.</li>
                                            <li>Analyser les performances de notre site afin d'identifier et corriger d'éventuelles erreurs.</li>
                                            <li>Personnaliser notre communication et nos services en fonction de vos besoins et préférences.</li>
                                        </ul>

                                        <h3>4. Types de cookies utilisés</h3>
                                        <p>Sur AM-Drive.com, nous utilisons plusieurs types de cookies :</p>
                                        <ul>
                                            <li><strong>Cookies essentiels :</strong> Nécessaires pour garantir le bon fonctionnement du site et de ses fonctionnalités de base.</li>
                                            <li><strong>Cookies analytiques :</strong> Utilisés pour analyser l'audience et les interactions des visiteurs avec notre site.</li>
                                            <li><strong>Cookies de performance :</strong> Ces cookies permettent de suivre l'efficacité de nos campagnes marketing.</li>
                                            <li><strong>Cookies de personnalisation :</strong> Utilisés pour mémoriser vos préférences de navigation et vous proposer un contenu personnalisé.</li>
                                        </ul>

                                        <h3>5. Comment gérer ou désactiver les cookies ?</h3>
                                        <p>Vous pouvez configurer votre navigateur pour refuser les cookies ou pour être averti lorsque des cookies sont envoyés. Toutefois, la désactivation de certains cookies peut affecter le bon fonctionnement du site.</p>

                                        <h3>6. Modifications de cette politique</h3>
                                        <p>Nous pouvons mettre à jour cette politique pour refléter les changements relatifs à l'utilisation des cookies. Toute modification sera publiée sur cette page.</p>

                                        <h3>7. Contactez-nous</h3>
                                        <p>Pour toute question relative à notre utilisation des cookies, n'hésitez pas à nous contacter via notre <a href="/{{app()->getLocale()}}/contact">formulaire de contact</a>.</p>

                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection