Karmouche Ismail

# <center> Projet architecture et développement web </center>

Ce projet est hébergé sur le gitlab de l'université a <a href="https://gitlab.univ-lr.fr/ikarmouc/projet_archi_web">cette adresse</a>

# Backlog<a name = "backlog"></a>


| N° | User story                                                                                                   | Valeur/Importance | Note                                                                                                                                                  | Critère d'acceptation                         |  |
| ----- | -------------------------------------------------------------------------------------------------------------- | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------ | -- |
| 1   | En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques afin de découvrir des technologies                         | 1                 | l'affichage des documents doit être ergonomique                                                                                                      | Les articles sont affichés par une image représentative de l'article, leur nom, leur type d'article et un lien vers l'article |  |
| 2   | En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique afin de pouvoir m'informer sur une technologie scientifique                                | 2                 | l'affichage des informations d'un article doit être ergonomique et doit contenir les eventuels evenements a venir                                    | Les articles doivent etre sous forme de liste  |  |
| 3   | En tant qu'administrateur je souhaite pouvoir m'identifier sur le site afin d'administrer le site            | 5                 | Le systeme d'identification est le meme que pour un utilisateur classique                                                                             | L'utilisateur doit faire partie des administrateurs pour acceder aux fonctionalités de gestion du site |  |
| 4   | En tant qu'administrateur je souhaite pouvoir modifier les informations d'un article sur une technologie     | 4                 | Le systeme de modification contiendra un formulaire pré-rempli avec les données de l'article a modifier |  Dans le cas ou un ou plusieurs champs sont modifiés, alors le site mettra a jour l'article dans la base de donnée                                        |  |
| 5   | En tant qu'administrateur, je souhaite pouvoir supprimer des articles sur des technologies scientifiques     | 4                 | Si un article comporte des evenements ainsi que des réservations, alors les evenements et les réservations en lien avec l'article seront supprimés |si l'article est supprimé alors l'administrateur sera redirigé vers la liste des articles|  |
| 6   | En tant qu'administrateur, je souhaite pouvoir ajouter des articles en lien avec les sciences                | 4                 | Un formulaire permet d'ajouter un article composé d'un nom, d'un type d'article, une description, une image et des credits | Si le formulaire est bien complété, la page retournera sur la liste des articles apres avoir ajouté dans la base de donnée du site le nouvel article                 |  |
| 7   | En tant qu'utilisateur, je souhaite pouvoir m'identifier sur le site afin d'acceder a mon compte utilisateur | 5                 | L'utilisateur remplit un formulaire de connexion afin de s'authentifier sur le site. Dans le cas ou l'utilisateur n'as pas de compte, l'utilisateur peut se creer un compte via un autre formulaire|Pour valider la création d'un compte, il sera demandé de renseigner un nom et un prénom, un nom d'utilisateur, une adresse mail et un mot de passe accompagné d'un champ permettant la confirmation du mot de passe. le futur mot de passe doit contenir un minimum de 8 characteres et l'adresse mail fourni dans le formulaire doit etre une adresse mail valide(ex: durant.jean@mail.fr)                                                |  |
| 8   | En tant qu'administrateur, je souhaite pouvoir gérer les utilisateurs du site                               | 3                 |   L'administrateur accede a une liste des utilisateur avec la possibilité de modifier les informations d'un utilisateur,le supprimer de la base de donnée du site, mais aussi la possibilité de creer un nouvel utilisateur  |Les utilisateur sont affichés sous forme de liste avec des boutons permettant de modifier ou supprimer les utilisateurs
| 9   | En tant qu'utilisateur, je souhaite pouvoir reserver une ou plusieurs places pour un evenement               | 3                 | L'utilisateur spécifie dans un formulaire le nombre de places a réserver pour un évenement en lien avec un article scientifique  | Le nombre de place que l'utilisateur sera compris entre le 1 et le nombre de places restantes pour l'evenement          |  |
| 10  | En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement                      | 3                 |   L'administrateur accede aux reservations liés a un evenement en particulier|Les reservations sont mis en forme de liste avec le nom de l'utilisateur ayant réservé ainsi que l'identifiant de la reservation et le nombre de places réservées                                                 |  |
| 11  | En tant qu'utilisateur, je souhaite pouvoir annuler une réservation                                         | 1                 | L'utilisateur pourra supprimer une réservation si besoin via un bouton|L'annulation de la réservation rajoutera des places aux places restantes de l'evenenement cible                                                |  |
| 12  | En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur                        | 1                 |   Dans la consultation des réservations d'un utiliateur, l'administrateur pourra supprimer une réservation cible si besoin                                                                                                                                                    |  La suppression de la réservation entrainera les meme opérations que pour le cas d'une annulation de réservation coté utilisateur|  |
| 13  | En tant qu'utilisateur, je souhaite pouvoir consulter mes réservations                                      | 2                 |  L'utilisateur pourra consulter les réservations qu'il a effectué sur le site via un bouton en haut de page    | Les réservations seront affichés sous forme de liste avec des boutons permettant la modification et la annulation d'une réservation                                                 |  |
| 14  | En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations                                      | 2                 | L'utilisateur pourra modifier le nombre de places réservés pour un evenement|Si le nouveau nombre de places réservées est inferieur ou supérieur au précedent, alors le nombre de places restantes seront augmenté ou diminué en fonction de la difference de place avant et apres la modification de la réservation , dans le cas ou le nombre de réservation est egal au nombre précedent de places, alors aucune modifications ne sera effectué                                                |  |
| 15  | En tant qu'administrateur,  je souhaite pouvoir gerer les evenements                                         | 4                 | L'administrateur peut avoir acces au réservations des utilisateur et peut les modifier ou les supprimer|Les actions effectués pour la gestion des utilisateur auront des résultats similaire au fonctionalités coté utilisateur                                                |  |

# Us embarqués pour le sprint 1


| N° | User story                                                                           | Valeur/Importance | Note                                                           | Critère                                      |  |
| ----- | -------------------------------------------------------------------------------------- | ------------------- | ---------------------------------------------------------------- | ----------------------------------------------- | -- |
| 1   | En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques afin de découvrir des technologies                         | 1                 | l'affichage des documents doit être ergonomique                                                                                                      | Les articles sont affichés par une image représentative de l'article, leur nom, leur type d'article et un lien vers l'article |  |
| 2   | En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique afin de pouvoir m'informer sur une technologie scientifique                                | 2                 | l'affichage des informations d'un article doit être ergonomique et doit contenir les eventuels evenements a venir                                    | Les articles doivent etre sous forme de liste  |  |

# Organisation de la base de donnée pour le sprint 1

Ci dessous est fourni le schéma de la base de donnée nommée <strong> thescienceplace </strong>necessaire pour le fonctionnement des User stories embarqués ainsi que 2 tuples permettant de montrer la bonne implementation des User stories.

```sql
create table article (  
 id_article  int          not null primary key, nomArticle  varchar(256) not null, description text         not null, typeArticle varchar(256) not null, img         varchar(256) not null, credits     varchar(256) not null);  
 INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/'); INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire', 'https://www.iter.org/fr/proj/inafewlines'); 
```

# Organisation de la base de donnée pour le sprint 2


| N° | User story                                                                                               | Valeur/Importance | Note                                                                                                                                                  | Critère                                       |  |
| ----- | ---------------------------------------------------------------------------------------------------------- | ------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------ | -- |
| 3   | En tant qu'administrateur je souhaite pouvoir m'identifier sur le site afin d'administrer le site            | 5                 | Le systeme d'identification est le meme que pour un utilisateur classique                                                                             | L'utilisateur doit faire partie des administrateurs pour acceder aux fonctionalités de gestion du site |  |
| 4   | En tant qu'administrateur je souhaite pouvoir modifier les informations d'un article sur une technologie     | 4                 | Le systeme de modification contiendra un formulaire pré-rempli avec les données de l'article a modifier |  Dans le cas ou un ou plusieurs champs sont modifiés, alors le site mettra a jour l'article dans la base de donnée                                        |  |
| 5   | En tant qu'administrateur, je souhaite pouvoir supprimer des articles sur des technologies scientifiques     | 4                 | Si un article comporte des evenements ainsi que des réservations, alors les evenements et les réservations en lien avec l'article seront supprimés |si l'article est supprimé alors l'administrateur sera redirigé vers la liste des articles|  |
| 6   | En tant qu'administrateur, je souhaite pouvoir ajouter des articles en lien avec les sciences                | 4                 | Un formulaire permet d'ajouter un article composé d'un nom, d'un type d'article, une description, une image et des credits | Si le formulaire est bien complété, la page retournera sur la liste des articles apres avoir ajouté dans la base de donnée du site le nouvel article                 |  |

# Organisation de la base de donnée pour le sprint 2

```sql
create table article (  
    id_article int          not null  
 primary key,  nomArticle varchar(256) not null,  
  description text         not null,  
  typeArticle varchar(256) not null,  
  img varchar(256) not null,  
credits varchar(256) not null );  
 INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique.jpg', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/'); INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire.jpg', 'https://www.iter.org/fr/proj/inafewlines');  
 create table user (  
    id_user int auto_increment  
        primary key,  
  nom varchar(255) not null,  
  prenom varchar(255) not null,  
  adresse varchar(255) not null,  
  username varchar(256) not null,  
  password varchar(256) not null,  
email varchar(255) not null ); # le mot de passe par défaut de l'administrateur est "password"  
INSERT INTO thescienceplace.user (id_user, nom, prenom, adresse, username, password, email) VALUES (1, 'Admin', 'The science Place', 'NULL', 'Admin', '$2y$10$FnYItZ3SgntoweH3sAQv6.flgbhMB7/SixYnfXmX72Mu.szsHbRSu', 'admin-thescienceplace@test.com');  
```

# Us embarqués pour le sprint 3


| N° | User story                                                                                                   | Valeur/Importance | Note                                                                                                                                         | Critère |  |
| ----- | -------------------------------------------------------------------------------------------------------------- | ------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------- | -- |
| 7   | En tant qu'utilisateur, je souhaite pouvoir m'identifier sur le site afin d'acceder a mon compte utilisateur | 5                 | L'utilisateur remplit un formulaire de connexion afin de s'authentifier sur le site. Dans le cas ou l'utilisateur n'as pas de compte, l'utilisateur peut se creer un compte via un autre formulaire|Pour valider la création d'un compte, il sera demandé de renseigner un nom et un prénom, un nom d'utilisateur, une adresse mail et un mot de passe accompagné d'un champ permettant la confirmation du mot de passe. le futur mot de passe doit contenir un minimum de 8 characteres et l'adresse mail fourni dans le formulaire doit etre une adresse mail valide(ex: durant.jean@mail.fr)                                                |  |
| 8   | En tant qu'administrateur, je souhaite pouvoir gérer les utilisateurs du site                               | 3                 |   L'administrateur accede a une liste des utilisateur avec la possibilité de modifier les informations d'un utilisateur,le supprimer de la base de donnée du site, mais aussi la possibilité de creer un nouvel utilisateur  |Les utilisateur sont affichés sous forme de liste avec des boutons permettant de modifier ou supprimer les utilisateurs
| 9   | En tant qu'utilisateur, je souhaite pouvoir reserver une ou plusieurs places pour un evenement               | 3                 | L'utilisateur spécifie dans un formulaire le nombre de places a réserver pour un évenement en lien avec un article scientifique  | Le nombre de place que l'utilisateur sera compris entre le 1 et le nombre de places restantes pour l'evenement          |  |
| 10  | En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement                      | 3                 |   L'administrateur accede aux reservations liés a un evenement en particulier|Les reservations sont mis en forme de liste avec le nom de l'utilisateur ayant réservé ainsi que l'identifiant de la reservation et le nombre de places réservées                                                 |  |
| 11  | En tant qu'utilisateur, je souhaite pouvoir annuler une réservation                                         | 1                 | L'utilisateur pourra supprimer une réservation si besoin via un bouton|L'annulation de la réservation rajoutera des places aux places restantes de l'evenenement cible                                                |  |
| 12  | En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur                        | 1                 |   Dans la consultation des réservations d'un utiliateur, l'administrateur pourra supprimer une réservation cible si besoin                                                                                                                                                    |  La suppression de la réservation entrainera les meme opérations que pour le cas d'une annulation de réservation coté utilisateur|  |
| 13  | En tant qu'utilisateur, je souhaite pouvoir consulter mes réservations                                      | 2                 |  L'utilisateur pourra consulter les réservations qu'il a effectué sur le site via un bouton en haut de page    | Les réservations seront affichés sous forme de liste avec des boutons permettant la modification et la annulation d'une réservation                                                 |  |
| 14  | En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations                                      | 2                 | L'utilisateur pourra modifier le nombre de places réservés pour un evenement|Si le nouveau nombre de places réservées est inferieur ou supérieur au précedent, alors le nombre de places restantes seront augmenté ou diminué en fonction de la difference de place avant et apres la modification de la réservation , dans le cas ou le nombre de réservation est egal au nombre précedent de places, alors aucune modifications ne sera effectué                                                |  |
| 15  | En tant qu'administrateur,  je souhaite pouvoir gerer les evenements                                         | 4                 | L'administrateur peut avoir acces au réservations des utilisateur et peut les modifier ou les supprimer|Les actions effectués pour la gestion des utilisateur auront des résultats similaire au fonctionalités coté utilisateur                                                |  |

# Organisation de la base de donnée pour le sprint 3

```sql
create table article (  
    id_article int          not null  
 primary key,  nomArticle varchar(256) not null,  
  description text         not null,  
  typeArticle varchar(256) not null,  
  img varchar(256) not null,  
credits varchar(256) not null );  
 INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique.jpg', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/'); INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire.jpg', 'https://www.iter.org/fr/proj/inafewlines');  
 create table user (  
    id_user int auto_increment  
        primary key,  
  nom varchar(255) not null,  
  prenom varchar(255) not null,  
  adresse varchar(255) not null,  
  username varchar(256) not null,  
  password varchar(256) not null,  
email varchar(255) not null );  
 INSERT INTO thescienceplace.user (id_user, nom, prenom, adresse, username, password, email) VALUES (1, 'Admin', 'The science Place', 'NULL', 'Admin', '$2y$10$FnYItZ3SgntoweH3sAQv6.flgbhMB7/SixYnfXmX72Mu.szsHbRSu', 'admin-thescienceplace@test.com');  
 create table event (  
    id_event int auto_increment  
        primary key,  
  typeEvent varchar(255) not null,  
  article int          not null,  
  description text         not null,  
  remainingPlaces int          not null,  
  placesLimit int          not null,  
  dateEvent datetime     not null,  
 constraint id_article  
foreign key (article) references article (id_article) );  
 create table reservation (  
    id_reservation int auto_increment  
        primary key,  
  id_user int not null,  
  id_event int not null,  
  nbplaces int not null,  
 constraint id_event  
        foreign key (id_event) references event (id_event),  
 constraint id_user  
foreign key (id_user) references user (id_user) );  
```

<strong>Par manque de temps, les user story numéro 10,12 et 14 ont été embarqué dans le prochain sprint.
</strong>

# Us embarqués pour le sprint 4 (sprint final)


| N° | User story                                                                              | Valeur/Importance | Note | Critère |  |
| ----- | ----------------------------------------------------------------------------------------- | ------------------- | ------ | ---------- | -- |
| 10  | En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement                      | 3                 |   L'administrateur accede aux reservations liés a un evenement en particulier|Les reservations sont mis en forme de liste avec le nom de l'utilisateur ayant réservé ainsi que l'identifiant de la reservation et le nombre de places réservées                                                 |  |
| 12  | En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur                        | 1                 |   Dans la consultation des réservations d'un utiliateur, l'administrateur pourra supprimer une réservation cible si besoin                                                                                                                                                    |  La suppression de la réservation entrainera les meme opérations que pour le cas d'une annulation de réservation coté utilisateur|  |
| 14  | En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations                                      | 2                 | L'utilisateur pourra modifier le nombre de places réservés pour un evenement|Si le nouveau nombre de places réservées est inferieur ou supérieur au précedent, alors le nombre de places restantes seront augmenté ou diminué en fonction de la difference de place avant et apres la modification de la réservation , dans le cas ou le nombre de réservation est egal au nombre précedent de places, alors aucune modifications ne sera effectué                                                |  |

<strong>Ce sprint a pour objectif de faire des corrections de bug, mais aussi d'effectuer un nettoyage de code ainsi qu'une préparation en vue d'un changement  l'architecture de ce projet afin de respecter le modele MVC ou Model View Controller
Les users stories 10,12 et 14 ont été embarqué  car elles n'ont pas été réalisé lors du dernier sprint</strong>
