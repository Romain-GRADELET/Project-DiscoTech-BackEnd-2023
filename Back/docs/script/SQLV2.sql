-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `album` (`id`, `artist_id`, `user_id`, `name`, `edition`, `release_date`, `created_at`, `updated_at`, `image`) VALUES
(402,	403,	NULL,	'Harvest',	'Reprise Records',	'1972-02-14',	'2023-06-23 08:52:55',	NULL,	'https://media.senscritique.com/media/000004846629/300/harvest.jpg'),
(403,	404,	NULL,	'At Folsom Prison',	'Columbia',	'1968-05-02',	'2023-06-23 08:57:12',	NULL,	'https://media.senscritique.com/media/000007768581/300/at_folsom_prison_legacy_edition.jpg'),
(404,	404,	NULL,	'American IV: The Man Comes Around',	'Amercian Recording',	'2002-11-05',	'2023-06-23 09:02:13',	NULL,	'https://media.senscritique.com/media/000004797165/300/american_iv_the_man_comes_around.jpg'),
(405,	405,	NULL,	'Our Mother the Mountain',	'Poppy',	'1969-04-01',	'2023-06-23 09:05:33',	NULL,	'https://media.senscritique.com/media/000004883422/300/our_mother_the_mountain.jpg'),
(406,	406,	NULL,	'Gunfighter Ballads and Trail Songs',	'Columbia',	'1959-01-01',	'2023-06-23 09:10:47',	NULL,	'https://media.senscritique.com/media/000007147729/300/gunfighter_ballads_and_trail_songs.jpg'),
(407,	407,	NULL,	'Moanin\' the Blues',	'MGM Records',	'1952-01-01',	'2023-06-23 09:14:30',	NULL,	'https://media.senscritique.com/media/000007302796/300/moanin_the_blues.jpg');

INSERT INTO `album_style` (`album_id`, `style_id`) VALUES
(402,	23),
(402,	28),
(403,	23),
(404,	23),
(404,	28),
(405,	23),
(406,	23),
(407,	23);

INSERT INTO `album_support` (`album_id`, `support_id`) VALUES
(402,	5),
(402,	7),
(402,	8),
(403,	5),
(403,	7),
(403,	8),
(404,	5),
(404,	7),
(404,	8),
(405,	5),
(405,	7),
(405,	8),
(406,	5),
(406,	6),
(406,	7),
(406,	8),
(407,	6),
(407,	7),
(407,	8);

INSERT INTO `artist` (`id`, `fullname`) VALUES
(403,	'Neil Young'),
(404,	'Johny Cash'),
(405,	'Townes Van Zandt'),
(406,	'Marty Robbins'),
(407,	'Hank Williams'),
(408,	'The Byrds');

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230620074226',	'2023-06-20 09:42:33',	247);




INSERT INTO `song` (`id`, `album_id`, `title`, `duration`, `preview`, `track_nb`) VALUES
(4006,	402,	'Out on the Weekend',	-3325,	'#',	1),
(4007,	402,	'Harvest',	-3419,	'#',	2),
(4008,	402,	'A Man Needs a Maid',	-3355,	'#',	3),
(4009,	402,	'Heart of Gold',	-3413,	'#',	4),
(4010,	402,	'Are You Ready for the Country?',	-3397,	'#',	5),
(4011,	402,	'Old Man',	-3396,	'#',	6),
(4012,	402,	'There’s a World',	-3421,	'#',	7),
(4013,	402,	'Alabama',	-3360,	'#',	8),
(4014,	403,	'Opening Announcements',	-3539,	'#',	1),
(4015,	403,	'The Old Spinning Wheel',	-3508,	'#',	2),
(4016,	403,	'Send a Picture of Mother',	-3414,	'#',	3),
(4017,	403,	'Blue Suede Shoes',	-3389,	'#',	4),
(4018,	403,	'Opening Announcements from Hugh',	-3524,	'#',	5),
(4019,	403,	'I’m Here to Get My Baby Out of Jail',	-3389,	'#',	6),
(4020,	403,	'This Ole House',	-3503,	'#',	7),
(4021,	403,	'Matchbox',	-3440,	'#',	8),
(4022,	404,	'The Man Comes Around',	-3334,	'#',	1),
(4023,	404,	'Hurt',	-3382,	'#',	2),
(4024,	404,	'Give My Love to Rose',	-3392,	'#',	3),
(4025,	404,	'Bridge Over Troubled Water',	-3365,	'#',	4),
(4026,	404,	'I Hung My Head',	-3367,	'#',	5),
(4027,	404,	'First Time Ever I Saw Your Face',	-3368,	'#',	6),
(4028,	404,	'Personal Jesus',	-3400,	'#',	7),
(4029,	404,	'In my life',	-3473,	'#',	8),
(4030,	405,	'Be Here to Love Me',	-3440,	'#',	1),
(4031,	405,	'Kathleen',	-3431,	'#',	2),
(4032,	405,	'She Came and She Touched Me',	-3360,	'#',	3),
(4033,	405,	'Like a Summer Thursday',	-3420,	'#',	4),
(4034,	404,	'Our Mother the Mountain',	-3339,	'#',	5),
(4035,	405,	'Second Lovers Song',	-3468,	'#',	6),
(4036,	405,	'St. John the Gambler',	-3417,	'#',	7),
(4037,	405,	'Tecumseh Valley',	-3315,	'#',	8),
(4038,	406,	'Big iron',	-3362,	'#',	1),
(4039,	406,	'Cool Water',	-3408,	'#',	2),
(4040,	406,	'Billy the Kid',	-3460,	'#',	3),
(4041,	406,	'A Hundred and Sixty Acres',	-3498,	'#',	4),
(4042,	406,	'They’re Hanging Me Tonight',	-3412,	'#',	5),
(4043,	406,	'The Strawberry Roan',	-3393,	'#',	6),
(4044,	406,	'El paso',	-3339,	'#',	7),
(4045,	406,	'In the valley',	-3489,	'#',	6),
(4046,	407,	'Lovesick Blues',	-3435,	'#',	1),
(4047,	407,	'Moanin\' the Blues',	-3420,	'#',	2),
(4048,	407,	'The Blues Come Around',	-3438,	'#',	3),
(4049,	407,	'I’m So Lonesome I Could Cry',	-3432,	'#',	4),
(4050,	407,	'I\'m a Long Gone Daddy',	-3417,	'#',	5),
(4051,	407,	'My Sweet Love Ain\'t Around',	-3417,	'#',	6),
(4052,	407,	'Long Gone Lonesome Blues',	-3417,	'#',	7),
(4053,	407,	'Honky Tonk Blues',	-3432,	'#',	8);

INSERT INTO `style` (`id`, `name`, `image`) VALUES
(23,	'Country',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923701296058399/country.png'),
(24,	'Pop',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923701757423737/pop.png'),
(25,	'Classique',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923702181044394/classique2.png'),
(26,	'House',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923703296733194/house.png'),
(27,	'Rap',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923703829405778/rap3.png'),
(28,	'Rock',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923705284829214/rock3.png'),
(29,	'K-pop',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923730488410234/kpop.png'),
(30,	'Funk',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923730886864896/funk.png'),
(31,	'Lofi',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923731281121381/lofi2.png'),
(32,	'Soul',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923731654426714/soul.png'),
(33,	'Metal',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923732367446107/metal.png'),
(34,	'Indie',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923733084680293/indie.png'),
(35,	'RnB',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923733579599982/RnB.png'),
(36,	'Opera',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923734242312243/opera2.png'),
(37,	'Jazz',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923739388727437/jazz.png'),
(38,	'Techno',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923739745239170/techno.png'),
(39,	'Afro',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923750939824138/afro2.png'),
(40,	'Reggae',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923751866773559/reggae.png'),
(41,	'Blues',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923752277807237/blues_2.png'),
(42,	'Dub',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923753125064795/dub.png'),
(43,	'chill',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923753594818590/chill.png'),
(44,	'Trance',	'https://cdn.discordapp.com/attachments/1113101484519866380/1118923753976496218/trance.png');

INSERT INTO `support` (`id`, `name`) VALUES
(5,	'CD'),
(6,	'Cassette'),
(7,	'Vinyl 33 tours'),
(8,	'Vinyl 45 tours');

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `avatar`) VALUES
(3,	'admin@admin.com',	'[\"ROLE_ADMIN\"]',	'$2y$13$ZdKTqUsVIggw9REUVSBTn.nwh.YjS8TKqlTme3sTi96HhziHxOfhO',	'admin',	'admin',	'https://media.discordapp.net/attachments/1113101484519866380/1118445749890457661/eva2.png'),
(4,	'user@user.com',	'[\"ROLE_USER\"]',	'$2y$13$LU7xmAHYLxg9cWqkshuUHOJUBZH7vDHKA/wENstwKu8rtwyUJgBRy',	'user',	'user',	'https://media.discordapp.net/attachments/1113101484519866380/1118445361611153529/eva3.png');

-- 2023-06-23 07:18:27