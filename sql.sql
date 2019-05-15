SET NAMES utf8;

CREATE DATABASE forum CHARACTER SET utf8;

USE forum;

CREATE TABLE languages (
lang_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
lang VARCHAR(60) NOT NULL,
lang_eng VARCHAR(20) NOT NULL,
PRIMARY KEY (lang_id),
UNIQUE (lang)
);

CREATE TABLE threads (
thread_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
lang_id TINYINT(3) UNSIGNED NOT NULL,
user_id INT UNSIGNED NOT NULL,
subject VARCHAR(150) NOT NULL,
PRIMARY KEY  (thread_id),
INDEX (lang_id),
INDEX (user_id)
);

CREATE TABLE posts (
post_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
thread_id INT UNSIGNED NOT NULL,
user_id INT UNSIGNED NOT NULL,
message TEXT NOT NULL,
posted_on DATETIME NOT NULL,
PRIMARY KEY (post_id),
INDEX (thread_id),
INDEX (user_id)
);

CREATE TABLE users (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
lang_id TINYINT UNSIGNED NOT NULL,
time_zone VARCHAR(30) NOT NULL,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(40) NOT NULL,
username VARCHAR(30) NOT NULL,
pass VARCHAR(255) NOT NULL,
email VARCHAR(60) NOT NULL,
user_level TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
active CHAR(32),
registration_date DATETIME NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username),
UNIQUE KEY (email),
INDEX login (username, pass)
);

CREATE TABLE words (
word_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
lang_id TINYINT UNSIGNED NOT NULL,
title VARCHAR(80) NOT NULL,
intro TINYTEXT NOT NULL,
home VARCHAR(30) NOT NULL,
view_threads VARCHAR(40) NOT NULL,
`language` VARCHAR(40) NOT NULL,
register VARCHAR(30) NOT NULL,
login VARCHAR(30) NOT NULL,
logout VARCHAR(30) NOT NULL,
new_thread VARCHAR(40) NOT NULL,
subject VARCHAR(30) NOT NULL,
body VARCHAR(30) NOT NULL,
submit VARCHAR(30) NOT NULL,
posted_on VARCHAR(30) NOT NULL,
posted_by VARCHAR(30) NOT NULL,
replies VARCHAR(30) NOT NULL,
latest_reply VARCHAR(40) NOT NULL,
post_a_reply VARCHAR(40) NOT NULL,
PRIMARY KEY (word_id),
UNIQUE (lang_id)
);

INSERT INTO languages (lang_id, lang, lang_eng) VALUES
(1, 'English', 'English'),
(2, 'Português', 'Portuguese'),
(3, 'Français', 'French'),
(4, 'Norsk', 'Norwegian'),
(5, 'Romanian', 'Romanian'),
(6, 'Ελληνικά', 'Greek'),
(7, 'Deutsch', 'German'),
(8, 'Srpski', 'Serbian'),
(9, '日本語', 'Japanese'),
(10, 'Nederlands', 'Dutch');

INSERT INTO users (lang_id, time_zone, username, pass, email) VALUES
(1, 1, 'US/Eastern', 'troutster', '', 'email@example.com'),
(2, 7, 'Europe/Berlin', 'Ute', '', 'email1@example.com'),
(3, 4, 'Europe/Oslo', 'Silje', '', 'email2@example.com'),
(4, 2, 'America/Sao_Paulo', 'João', '', 'email3@example.com'),
(5, 1, 'Pacific/Auckland', 'kiwi', '', 'kiwi@example.org');

INSERT INTO words VALUES
(NULL,1, 'PHP and MySQL for Dynamic Web Sites: The Forum!', '<p>Welcome to the site! Please use the links above</p>', 'Home', 'View Threads', 'Language', 'Register', 'Login', 'Logout', 'New Thread', 'Subject', 'Body', 'Submit', 'Posted on', 'Posted by', 'Replies', 'Latest Reply', 'Post a Reply'),
(NULL,4, 'PHP og MySQL for Dyaniske Websider: Forumet!', '<p>Velkommen til denne siden. Introduksjonstekst.</p>', 'Hjem', 'Forumet Hjem', 'Språk', 'Registrer deg', 'Logg inn', 'Logg ut', 'Ny tråd', 'Emne', 'Kropp', 'SUBMIT', 'Lagt til', 'Lagt til av', 'REPLIES', 'LATEST REPLY', 'POST A REPLY'),
(NULL,5, 'Forumul PHP si MySQL pentru site-uri web dinamice', 'Bine ati venit pe acest site. Text introductiv. Bine ati venit pe acest site. Text introductiv. Bine ati venit pe acest site. Text introductiv.', 'Acasa', 'Forumul Acasa', 'Limba', 'Inregistrare', 'Conectare', 'Deconectare', 'Discutie noua', 'Subiect', 'Continut', 'SUBMIT', 'Afisat pe', 'Afisat de', 'REPLIES', 'LATEST REPLY', 'POST A REPLY'),
(NULL,3, 'Sites internet dynamiques avec PHP et MySQL : le forum!', 'Bienvenue sur ce site. Texte d''introduction. Bienvenue sur ce site. Texte d''introduction. Bienvenue sur ce site. Texte d''introduction.', 'Accueil', 'Le Forum Accueil', 'Langue', 'S''enregistrer', 'Se connecter', 'Déconnexion', 'Nouvelle discussion', 'Sujet', 'Contenu', 'Soumettez', 'Posté le', 'Posté par', 'Réponses', 'La Plus défunte Réponse', 'Signalez une réponse'),
(NULL,7, 'PHP en MYSQL voor Dynamische Websites: Het Forum!', 'Welkom op deze site! Inleidingstekst. Hier vind je alles op het gebied van php!', 'Index', 'Forum Index', 'Taal', 'Registreer', 'Uitloggen', 'Inloggen', 'Nieuw onderwerp', 'Onderwerp', 'Body', 'SUBMIT', 'Geplaatst op', 'Geplaatst door', 'REPLIES', 'LATEST REPLY', 'POST A REPLY'),
(NULL,9, 'PHP とMySqlでのだいなみっくなウエブサイト：フォラムです！', 'ようこそこのウエブサイトにおいでくださいました。紹介文。 ようこそこのウエブサイトにおいでくださいました。紹介文。', '話題', '返答を提示', '新しい スレツド ', 'ホーム', 'フォラムのホウムペイジ', '言語', 'レジスター', ' ログイン', 'ログアウト', '本文', 'サブミット', '掲示日', ' 掲示者', '返答数', '最新の返答');

INSERT INTO `threads` (`thread_id`, `lang_id`, `user_id`, `subject`) VALUES
(1, 4, 1, 'Byttet til PHP 7.0 fra PHP 5.0 - variabler utilgjengelige'),
(2, 4, 2, 'Automatisk bildekontroll'),
(3, 3, 5, 'Lancer une Page HTML en PHP'),
(4, 3, 4, 'Ajouter des adresses a PHP List depuis un formulaire'),
(5, 9, 4, '取引をおこなう'),
(7, 1, 1, 'Sample Thread');

INSERT INTO `posts` (`post_id`, `thread_id`, `user_id`, `message`, `posted_on`) VALUES
(1, 1, 3, 'Jeg har nettopp gått over til PHP 5.0 og forsøkte å benytte meg av mine gamle scripts. Dette viste seg å være noe vanskelig ettersom de bare generer feil. Hovedproblemet virker å være at jeg ikke får tilgang til variabler som tidligere var tilgjengelige. Noen som har noen forslag?', '2017-10-29 04:15:52'),
(2, 1, 1, 'Har du sjekket om variablene du prøver å få tilgang på er superglobals? Dette forandret seg fra 4.2 og utover, tror jeg...', '2017-10-29 04:20:52'),
(3, 1, 4, 'Hva er superglobals?', '2017-10-29 04:30:30'),
(4, 1, 1, 'http://no.php.net/variables.predefined', '2017-10-30 06:16:30'),
(5, 1, 5, 'Linken Terje ga er manualsiden, men du kan også ta en titt på http://www.linuxjournal.com/article/6559 for en grundig innføring og forklaring. Lykke til!', '2017-10-29 10:26:57'),
(6, 2, 2, 'Har sett flere sider hvor man må skrive inn noen tall for å kunne laste ned, registrere seg, osv. Er dette PHP? Kan noen hjelpe meg å få til en slik?', '2017-10-29 22:45:57'),
(7, 3, 1, 'Je voudrais afficher simplement une nouvelle page HTML ou PHP dans mon\r\nnavigateur web depuis un bout de programme en PHP.\r\nLancer par exemple http://www.google.fr/ depuis un condition if (a>0)\r\nJe trouve pas de solution sur google ni dans mes bouquins', '2017-10-29 04:42:38'),
(8, 3, 2, 'header("Location: http://www.domaine.com");\r\nAttention, cette fonction doit être utilisé avant toute sortie vers le navigateur... le moindre echo et c''est foutu\r\n', '2017-10-29 05:17:38'),
(9, 4, 3, 'J''utilise PHP List. J''ai un formulaire contact avec une case à cocher\r\npermettant de choisir de s''abonner à une newsletter. Je traite ce\r\nformullaire en PHP.\r\nExiste-t-il un moyen au moment où je traite le formulaire d''ajouter la\r\npersonne dans ma liste de diffusion PHP List ?\r\nJe suppose que le problème n''est pas compliqué mais je n''ai pas encore\r\ntrouvé comment faire...\r\n', '2017-10-29 04:43:28'),
(10, 4, 5, 'Dans ce genre de problématiques le mieux est de :\r\na/ regarder de quelle manière php list gère les abonnés dans la base ( en\r\ngros, regarder la structure de la table ).\r\nb/ créer une fonction qui ajoute manuellement les données de votre\r\nformulaire dans la ou les tables mysql utilisée(s) par php list ( en se\r\nméfiant des doublons : est ce que cette adresse est déjà dans la liste ? )\r\nc/ faire un ou plusieurs tests...\r\n', '2017-10-31 12:06:28'),
(11, 5, 2, 'PHP を使って　MySqlでは、取引を どのようにしたら良いかと　\r\nまよっています。良い方法が、あったらおしえてください。', '2017-10-29 04:57:55'),
(12, 5, 3, '次のようにしたらどうですか？', '2017-10-29 04:57:55'),
(13, 5, 4, '反れとも、このようにも　できます。', '2017-10-29 04:58:10'),
(14, 7, 1, 'This is the body of the sample thread. This is the body of the sample thread. This is the body of the sample thread. ', '2017-10-29 05:12:02'),
(15, 7, 1, 'I like your thread. It''s simple and sweet.', '2017-10-29 05:44:07');