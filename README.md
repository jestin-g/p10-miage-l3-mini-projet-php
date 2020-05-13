# Mini projet PHP L3 APP 2019-2020 

Application web Laravel permettant de gérer les candidatures à des formations

## Installation

Vérifier les pré-requis sur la documentation officiel de Laravel avant de commencer. [Documentation](https://laravel.com/docs/7.x/installation#installation)


Cloner le dépôt

    git clone https://github.com/jestin-g/gestionnaire-groupes-php-l3-miage.git

Se placer dans le dossier créé

    cd mini-projet-php-l3-miage

Installer les dépendances avec [Composer](https://getcomposer.org/)

    composer install

Copier le fichier env exemple et effectuer les changements requis dans le fichier copié

    cp .env.example .env

Générer une clef pour l'application

    php artisan key:generate

Lancer les migrations pour la base de données (**Paramétrer la connexion à la base dans le fichier .env avant de lancer les migrations**)

    php artisan migrate
    
Lancer les Seeder de la base de données

    php artisan db:seed
    
Lancer le serveur de développement local

    php artisan serve

Si tout s'est bien passé vous pouvez accéder à l'application depuis: http://localhost:8000
