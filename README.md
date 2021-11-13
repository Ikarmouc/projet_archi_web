Karmouche Ismail
# <center> Projet architecture et développement web </center>

Ce projet est hébergé sur le gitlab de l'université a <a href="https://gitlab.univ-lr.fr/ikarmouc/projet_archi_web">cette adresse</a>


<!-- 1. [Backlog produit](#backlog)
	1. [User story 1](#US1)
	2. [User story 2](#US2)
	3. [User story 3](#US3)
	4. [User story 4](#US4)
	5. [User story 5](#US5)
	6. [User story 5](#US6)
	8. [Sprint n°1](#Sprint1)
	    1. [Organisation Base de donnée](#BD)
 -->

# Backlog<a name = "backlog"></a>
   
|N°|User story|Valeur/Importance|Note|Critère|
|-----|----------|--|--|--|--|
|1|En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques|1|l'affichage des documents doit être ergonomique|Les articles doivent etre sous forme de liste|
|2|En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique|1|l'affichage des informations doit être ergonomique et épuré|Les articles doivent etre sous forme de liste|
|3|En tant qu'administrateur je souhaite pouvoir m'identifier sur le site|1|||
|4|En tant qu'administrateur je souhaite pouvoir modifier les informations d'une technologie|1|||
|5|En tant qu'administrateur, je souhaite pouvoir supprimer des technologies scientifiques|1|||
|6|En tant qu'administrateur, je souhaite pouvoir ajouter des technologies scientifiques|1|||
|7|En tant qu'utilisateur, je souhaite pouvoir reserver des cours|1|||





# Us embarqués pour le sprint 1<a name ="Sprint1"></a>

|N°|User story|Valeur/Importance|Note|Critère|
|-----|----------|--|--|--|--|
|1|En tant qu'utilisateur, je souhaite pouvoir consulter des technologies scientifiques|1|l'affichage des documents doit être ergonomique|Les articles doivent etre sous forme de liste|
|2|En tant qu'utilisateur, je souhaite pouvoir consulter un article spécifique|1|l'affichage des informations doit être ergonomique et épuré|Les articles doivent etre sous forme de liste|

# Organisation de la base de donnée <a name = "BD"></a>


Ci dessous est fourni le schéma de la base de donnée nommée <strong> thescienceplace </strong>necessaire pour le fonctionnement des User stories embarqués ainsi que 2 tuples permettant de montrer la bonne implementation des User stories.

```sql
create table article
(
    id_article  int          not null
        primary key,
    nomArticle  varchar(256) not null,
    description text         not null,
    typeArticle varchar(256) not null,
    img         varchar(256) not null,
    credits     varchar(256) not null
);

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