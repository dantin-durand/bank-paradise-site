# Bank Paradise

# Installation

1.  `composer install`
2.  `npm install`
3.  `php artisan migrate`
4.  `php artisan db:seed`
5.  `php artisan serve`

# Liens du site

https://bank-paradise-site.herokuapp.com/

# Technologies:

-   Laravel
-   Fortify
-   Mailtrap
-   Stripe

# Architecture:

-   MVC
-   Templating blade pour la scalabilité du projet

# URL du site web

### Visiteurs

|    URL     | Method | Description                                             | Payload attendue                                                                                                     |
| :--------: | :----: | ------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
|     /      |  GET   | Page d'accueil                                          | ----------------                                                                                                     |
|   /news    |  GET   | Page avec la liste des articles                         | ----------------                                                                                                     |
| /news/{id} |  GET   | Page avec les détails d'un article                      | ----------------                                                                                                     |
| /services  |  ---   | Page avec une description des services de Bank-Paradise | ----------------                                                                                                     |
|  /contact  |  GET   | Page de contact avec le service client                  | ----------------                                                                                                     |
| /send-mail |  POST  | URL d'envoi de mail                                     | `{ object: 'sujet',email: 'adresseMail@gmail.com', lastname: 'nomDeFamille', firstname: 'prénom', body: 'message' }` |

### Membres

|        URL        | Method | Description                                     | Payload attendue                                                                  |
| :---------------: | :----: | ----------------------------------------------- | --------------------------------------------------------------------------------- |
|     /service      |  GET   | URL de redirection après login                  | ----------------                                                                  |
|  /register/step2  |  ---   | Page de l'étape 2 de l'enregistrement           | ----------------                                                                  |
|  /register/step3  |  GET   | Page de l'étape 3 de l'enregistrement           | ----------------                                                                  |
|  /register/step3  |  POST  | URL de paiement d'abonnement                    | `{name: 'UnNom', payment_method: 'tokenDeStripe', plan: 1, coupon: 'WEBSTART10'}` |
|  /register/step4  |  ---   | Page de l'étape 4 de l'enregistrement           | ----------------                                                                  |
|  /payment/error   |  ---   | Page d'information des erreurs lors du paiement | ----------------                                                                  |
|     /account      |  GET   | Page de description du compte de l'utilisateur  | ----------------                                                                  |
| /account/settings |  GET   | Page d'édition du compte utilisateur            | ----------------                                                                  |
|     /account      |  GET   | URL d'édition du compte utilisateur             | ``                                                                                |
|    /community     |  POST  | URL de création de communauté                   | `{name: 'communityName', description: 'communityDescription}`                     |
|    /dashboard     |  ---   | Page dashboard de l'utilisateur                 | ----------------                                                                  |

### Admin

|              URL              | Method | Description                                                 | Payload attendue                                                                                          |
| :---------------------------: | :----: | ----------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- |
|         /admin/users          |  GET   | Page de listing des utilisateurs                            | ----------------                                                                                          |
|       /admin/user/{id}        |  GET   | Page de détail d'un utilisateur sélectionné                 | ----------------                                                                                          |
|   /admin/user/settings/{id}   |  GET   | Page de modification d'un utilisateur sélectionné           | ----------------                                                                                          |
|       /admin/users/{id}       |  PUT   | URL de modification d'un utilisateur via son ID             | `{firstname: 'prénom', lastname: 'nom', email: 'fausseAdresse@gmail.com', password: 'UnMoTdEpAsSe123!' }` |
|       /admin/users/{id}       | DELETE | URL de suppression d'un utilisateur via son ID              | ----------------                                                                                          |
|          /admin/news          |  GET   | Page de listing des articles                                | ----------------                                                                                          |
|        /admin/addnews         |  GET   | Page d'ajout d'articles                                     | ----------------                                                                                          |
|       /admin/news/{id}        |  GET   | Page de consultation d'un article                           | ----------------                                                                                          |
|          /admin/news          |  POST  | URL d'ajout d'un article                                    | `{ title: 'titre' , banner: imageChoisie, body: 'blablablabla' }`                                         |
|       /admin/news/{id}        |  PUT   | URL de mise à jour d'un article via son ID                  | `{ title: "Un Titre",banner: IMAGE,body: "Un Texte",releaseDate: "2021-05-07 00:00:00" }`                 |
|   /admin/news/{id}/visible    |  PUT   | URL de mise à jour de la visibilité d'un article via son ID | ----------------                                                                                          |
|       /admin/news/{id}        | DELETE | URL de suppression d'un article via son ID                  | ----------------                                                                                          |
| /admin/subscriptions{filter?} |  GET   | Page avec la liste des abonnements potentiellement filtré   | ----------------                                                                                          |
