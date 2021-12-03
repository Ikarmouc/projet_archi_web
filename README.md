Karmouche Ismail
# <center> Projet architecture et développement web </center>

Ce projet est hébergé sur le gitlab de l'université a <a href="https://gitlab.univ-lr.fr/ikarmouc/projet_archi_web">cette adresse</a>


# Backlog<a name = "backlog"></a>
|N°|User story|Valeur/Importance|Note|Critère|  
|-----|----------|--|--|--|--|  
|1|En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques|1|l'affichage des documents doit être ergonomique|Les articles doivent etre sous forme de liste|  
|2|En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique|1|l'affichage des informations doit être ergonomique et épuré|Les articles doivent etre sous forme de liste|  
|3|En tant qu'administrateur je souhaite pouvoir m'identifier sur le site|1||L'interface de connexion|  
|4|En tant qu'administrateur je souhaite pouvoir modifier les informations d'une technologie|1|||  
|5|En tant qu'administrateur, je souhaite pouvoir supprimer des technologies scientifiques|1|||  
|6|En tant qu'administrateur, je souhaite pouvoir ajouter des technologies scientifiques|1|||  
|7|En tant qu'utilisateur, je souhaite m'identifier sur le site|3|||
|8|En tant qu'administrateur, je souhaite pouvoir gérer les utilisateurs du site |1|||  
|9|En tant qu'utilisateur, je souhaite pouvoir reserver une ou plusieurs places pour un evenement |3|||  
|10|En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement |3|||  
|11|En tant qu'utilisateur, je souhaite pouvoir annuler une réservation |1|||  
|12|En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur |1|||  
|13|En tant qu'utilisateur, je souhaite pouvoir consulter mes réservations|1|||
|14|En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations|1|||
|15|En tant qu'administrateur,  je souhaite pouvoir gerer les evenements|1|||





# Us embarqués pour le sprint 1<a name ="Sprint1"></a>

|N°|User story|Valeur/Importance|Note|Critère|  
|-----|----------|--|--|--|--|  
|1|En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques|1|l'affichage des documents doit être ergonomique|Les articles doivent etre sous forme de liste|  
|2|En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique|1|l'affichage des informations doit être ergonomique et épuré|Les articles doivent etre sous forme de liste|

# Organisation de la base de donnée pour le sprint 1


Ci dessous est fourni le schéma de la base de donnée nommée <strong> thescienceplace </strong>necessaire pour le fonctionnement des User stories embarqués ainsi que 2 tuples permettant de montrer la bonne implementation des User stories.

```sql  
create table article  
(  
 id_article  int          not null primary key, nomArticle  varchar(256) not null, description text         not null, typeArticle varchar(256) not null, img         varchar(256) not null, credits     varchar(256) not null);  
  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/');  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire', 'https://www.iter.org/fr/proj/inafewlines');  
```  
# Us embarqués pour le sprint 2<a name = "Sprint2"></a>

|N°|User story|Valeur/Importance|Note|Critère|  
|-----|----------|--|--|--|--|  
|3|En tant qu'administrateur, je souhaite pouvoir m'identifier sur le site|1|||  
|4|En tant qu'administrateur,je souhaite pouvoir modifier les informations d'une technologie|1|||  
|5|En tant qu'administrateur, je souhaite pouvoir supprimer des technologies scientifiques|1|||  
|6|En tant qu'administrateur, je souhaite pouvoir ajouter des technologies scientifiques|1|||

# Organisation de la base de donnée pour le sprint 2
```sql
create table article  
(  
    id_article int          not null  
 primary key,  nomArticle varchar(256) not null,  
  description text         not null,  
  typeArticle varchar(256) not null,  
  img varchar(256) not null,  
  credits varchar(256) not null  
);  
  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique.jpg', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/');  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire.jpg', 'https://www.iter.org/fr/proj/inafewlines');  
  
create table user  
(  
    id_user int auto_increment  
        primary key,  
  nom varchar(255) not null,  
  prenom varchar(255) not null,  
  adresse varchar(255) not null,  
  username varchar(256) not null,  
  password varchar(256) not null,  
  email varchar(255) not null  
);  
# le mot de passe par défaut de l'administrateur est "password"
INSERT INTO thescienceplace.user (id_user, nom, prenom, adresse, username, password, email) VALUES (1, 'Admin', 'The science Place', 'NULL', 'Admin', '$2y$10$FnYItZ3SgntoweH3sAQv6.flgbhMB7/SixYnfXmX72Mu.szsHbRSu', 'admin-thescienceplace@test.com');
```
# Us embarqués pour le sprint 3

|N°|User story|Valeur/Importance|Note|Critère|  
|-----|----------|--|--|--|--|  
|7|En tant qu'utilisateur, je souhaite m'identifier sur le site|3|||
|8|En tant qu'administrateur, je souhaite pouvoir gérer les utilisateurs du site |1|||  
|9|En tant qu'utilisateur, je souhaite pouvoir reserver une ou plusieurs places pour un evenement |3|||  
|10|En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement |3|||
|11|En tant qu'utilisateur, je souhaite pouvoir annuler une réservation |1|||  
|12|En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur |1|||  
|13|En tant qu'utilisateur, je souhaite pouvoir consulter mes réservations|1|||
|14|En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations|1|||
|15|En tant qu'administrateur,  je souhaite pouvoir gerer les evenements|1|||


# Organisation de la base de donnée pour le sprint 3

```sql
create table article  
(  
    id_article int          not null  
 primary key,  nomArticle varchar(256) not null,  
  description text         not null,  
  typeArticle varchar(256) not null,  
  img varchar(256) not null,  
  credits varchar(256) not null  
);  
  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique.jpg', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/');  
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire.jpg', 'https://www.iter.org/fr/proj/inafewlines');  
  
create table user  
(  
    id_user int auto_increment  
        primary key,  
  nom varchar(255) not null,  
  prenom varchar(255) not null,  
  adresse varchar(255) not null,  
  username varchar(256) not null,  
  password varchar(256) not null,  
  email varchar(255) not null  
);  
  
INSERT INTO thescienceplace.user (id_user, nom, prenom, adresse, username, password, email) VALUES (1, 'Admin', 'The science Place', 'NULL', 'Admin', '$2y$10$FnYItZ3SgntoweH3sAQv6.flgbhMB7/SixYnfXmX72Mu.szsHbRSu', 'admin-thescienceplace@test.com');  
  
create table event  
(  
    id_event int auto_increment  
        primary key,  
  typeEvent varchar(255) not null,  
  article int          not null,  
  description text         not null,  
  remainingPlaces int          not null,  
  placesLimit int          not null,  
  dateEvent datetime     not null,  
 constraint id_article  
        foreign key (article) references article (id_article)  
);  
  
create table reservation  
(  
    id_reservation int auto_increment  
        primary key,  
  id_user int not null,  
  id_event int not null,  
  nbplaces int not null,  
 constraint id_event  
        foreign key (id_event) references event (id_event),  
 constraint id_user  
        foreign key (id_user) references user (id_user)  
);
``` 
<strong>Par manque de temps, les user story numéro 10,12 et 14 ont été embarqué dans le prochain sprint.
</strong>


# Us embarqués pour le sprint 4 (sprint final)

|N°|User story|Valeur/Importance|Note|Critère|  
|-----|----------|--|--|--|--|  
|10|En tant qu'administrateur, je souhaite pouvoir consulter les participant d'un evenement |3|||
|12|En tant qu'administrateur, je souhaite pouvoir retirer une réservation d'utilisateur |1|||
|14|En tant qu'utilisateur,  je souhaite pouvoir modifier mes réservations|1|||


<strong>Ce sprint a pour objectif de faire des corrections de bug, mais aussi d'effectuer un nettoyage de code ainsi qu'une préparation en vue d'un changement  l'architecture de ce projet afin de respecter le modele MVC ou Model View Controller
Les users stories 10,12 et 14 ont été embarqué  car elles n'ont pas été réalisé lors du dernier sprint</strong>