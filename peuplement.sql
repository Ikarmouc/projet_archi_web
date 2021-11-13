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

INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (1, 'Les ordinateurs quantiques', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Informatique', 'ordinateur_quantique.jpg', 'https://www.futura-sciences.com/sciences/definitions/physique-ordinateur-quantique-4348/');
INSERT INTO thescienceplace.article (id_article, nomArticle, description, typeArticle, img, credits) VALUES (2, 'Reacteur a fusion ITER', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'projet_scientifique', 'reacteur_fusion_nucleaire.jpg', 'https://www.iter.org/fr/proj/inafewlines');

create table user
(
    id_user  int          not null,
    username varchar(256) not null,
    password varchar(256) not null
);


INSERT INTO thescienceplace.user (id_user, username, password) VALUES (1, 'Admin', '$2y$10$FnYItZ3SgntoweH3sAQv6.flgbhMB7/SixYnfXmX72Mu.szsHbRSu');