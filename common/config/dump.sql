-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 25 2015 г., 09:39
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `admin_first`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1442834468),
('user', '2', 1442832998),
('user', '3', 1442833319),
('user', '4', 1442834468),
('user', '5', 1442906552);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1442560348, 1442560348),
('manager', 1, 'Менеджер', NULL, NULL, 1442560348, 1442560348),
('user', 1, 'Пользователь', NULL, NULL, 1442560348, 1442560348);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `carusel`
--

CREATE TABLE IF NOT EXISTS `carusel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `carusel`
--

INSERT INTO `carusel` (`id`, `title`, `image`, `active`) VALUES
(1, 'Визитки', '1.jpg', 1),
(2, 'dwded', '3.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `car_orders`
--

CREATE TABLE IF NOT EXISTS `car_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `car_orders`
--

INSERT INTO `car_orders` (`id`, `text`, `image`, `sort`) VALUES
(1, 'Вы можете позвонить нам, приехать в офис, отправить письмо по e-mail или запросить консультацию прямо с этого сайта.', 'order_1.png', 1),
(2, 'Для просчета необходима следующая информация:<br>\r\n                        1. Тираж (кол-во изделий)<br>\r\n                        2. Материал на котором будет печать<br>\r\n                        3. Кол-во цветов<br>\r\n                        4. Тиснение или другой вид обработки после печати', 'order_2.png', 2),
(3, 'Для печать нам необходим макет, если у Вас его нет, мы можем предложить наши услуги по его изготовлению', 'order_3.png', 3),
(4, 'Если сроки изготовления и цена Вас устроили, делаете предоплату и мы приступаем к работе', 'order_4.png', 4),
(5, 'Как только мы получаем подтверждение оплаты, уточняем сроки и сразу приступаем к работе.', 'order_5.png', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `header_meny` varchar(255) NOT NULL,
  `h_1` varchar(255) NOT NULL,
  `h_2` varchar(255) DEFAULT NULL,
  `text` text,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '5',
  `voites` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `header_meny`, `h_1`, `h_2`, `text`, `keywords`, `description`, `alias`, `parent_id`, `active`, `type`, `rate`, `voites`) VALUES
(1, 'Полиграфическая продукция', 'Полиграфия', 'Полиграфическая продукция', 'Наша продукция', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'poligraficheskie-uslugi', 0, 1, 'post', 10, 2),
(2, 'Дизайн', 'Дизайн', 'Новости дизайна', 'О дизайне', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция', 'design', 0, 1, 'news', 31, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `collback`
--

CREATE TABLE IF NOT EXISTS `collback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `processed` tinyint(1) DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `collback`
--

INSERT INTO `collback` (`id`, `name`, `tel`, `post`, `created`, `processed`, `time`, `user_id`) VALUES
(12, 'Admin Adminоvich', '(068) 363-64-76', 'http://localhost/newdesign/yii-application/frontend/web/news/vip-vizitki-pechat-nachinaetsa', '2015-09-22 12:15:06', 1, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `title`, `size_id`) VALUES
(1, 'белый', 1),
(2, 'красный', 1),
(3, 'синий', 1),
(4, 'белый', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `coment` text,
  `post` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `processed` tinyint(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `company`, `email`, `tel`, `coment`, `post`, `created`, `processed`, `user_id`) VALUES
(9, 'Admin Adminоvich', '1design', 'yegor@1design.org', '(068) 363-64-76', '11111111111', 'http://localhost/newdesign/yii-application/frontend/web/news/vip-vizitki-pechat-nachinaetsa', '2015-09-22 12:16:53', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materials` decimal(8,2) DEFAULT NULL,
  `works` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id`, `materials`, `works`) VALUES
(1, 22.57, 1.00);

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `workprice` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `title`, `price`, `workprice`) VALUES
(1, 'Клише', 100.33, 16.99),
(2, 'lalala', 300.99, 130.55);

-- --------------------------------------------------------

--
-- Структура таблицы `matrelations`
--

CREATE TABLE IF NOT EXISTS `matrelations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `matrelations`
--

INSERT INTO `matrelations` (`id`, `product_id`, `material_id`) VALUES
(1, 1, 1),
(11, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1437990310),
('m130524_201442_init', 1442832924),
('m140506_102106_rbac_init', 1442558484),
('m150523_122643_create_products_table', 1437990312),
('m150523_122838_create_variants_table', 1437990312),
('m150523_123032_create_size_table', 1437990312),
('m150523_123234_create_colors_table', 1437990313),
('m150523_123530_create_prices_table', 1437990313),
('m150523_123559_create_services_table', 1437990313),
('m150615_133338_create_categories_table', 1437990313),
('m150616_063048_create_posts_table', 1438091088),
('m150619_145032_create_collback_table', 1442840713),
('m150623_140159_create_postimage_table', 1440484270),
('m150626_105329_create_carusel_table', 1437990315),
('m150626_132034_create_feedback_table', 1442840713),
('m150630_112042_create_relations_table', 1437990315),
('m150724_065957_create_news_table', 1437990315),
('m150727_061358_create_pages_table', 1437990316),
('m150811_084915_create_materials_table', 1439554936),
('m150811_090116_create_matrelations_table', 1439364989),
('m150825_084848_create_kurs_table', 1440492757),
('m150826_074001_create_car_orders_table', 1440749042),
('m150828_080514_create_orders_table', 1442840713);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `h_1` varchar(255) NOT NULL,
  `h_2` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `text` text,
  `alias` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '5',
  `voites` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `h_1`, `h_2`, `keywords`, `description`, `text`, `alias`, `category_id`, `rate`, `voites`, `active`, `created`) VALUES
(1, 'Имидж начинается с VIP визитки', 'Имидж начинается с VIP визитки', '', 'пакеты с логотипом,печать на пакетах,печать на пакетах киев,пакеты с логотипом киев,пакеты полиэтиленовые киев,изготовление пакетов с логотипом,печать пакетов,пакеты с печатью,пакет с логотипом,заказать пакеты с логотипом,фирменные пакеты,пакеты полиэтиле', 'Имидж начинается с VIP визитки', '<p><img alt="" src="http://first.rybalka.me/uploads/ckeditor/1443172805_1design-vizitki-tisnenie-thumb-thumb.jpg" style="float:left; height:129px; margin-left:5px; margin-right:5px; width:180px" />Имиджевые, дизайнерские и информационные характеристики, которыми наделяют современные VIP визитки, являются основными моментами, представляющими успешного человека и создающими все предпосылки для продолжения деловых и личностных контактов. Правильно созданный дизайн визитки ставит ее в один ряд с имиджевыми подарками. Настоящие дизайнерские визитки VIP обладают свойством привлекать внимание и усиливать воздействие текста на собеседника.</p>\r\n\r\n<p>Пластиковые визитки &ndash; признак солидности и стиля</p>\r\n\r\n<p>Бурное развитие полиграфии позволяет предложить пользователям современные пластиковые визитки, которые отражают деловые качества владельца &ndash; умение самосовершенствоваться и справляться с возникающими проблемами.</p>\r\n\r\n<p>Применяя дизайнерские визитки из пластика, их владелец получает следующие преимущества:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>вручая подобные VIP визитки можно быть уверенным, что они привлекут внимание собеседников;</li>\r\n		<li>практичный и стильный дизайн визитки из пластика длительное время сохраняет привлекательный вид;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>подобные эксклюзивные визитки &ndash; несомненное свидетельство надежности и солидности бизнеса, который соответствует понятию VIP.</p>\r\n\r\n<p>А зачем они нужны - VIP визитки?</p>\r\n\r\n<p>Эксклюзивные визитки, предлагаемые своим клиентам ООО &laquo;1Дизайн&trade;&raquo;, способны привлечь внимание предполагаемого партнера по бизнесу либо клиента. Возьмем, к примеру, ресторанный бизнес. По традиции, принятой в Италии, ресторатор просто обязан подойти к посетителям, пообщаться с ними, чтобы узнать, что им нравиться. Вручив, при первом знакомстве, свои визитки, VIP персонам предназначенные, шеф-повар может быть уверен, что его кухню посетители не забудут.</p>\r\n\r\n<p>Творчески создавая дизайн визитки, можно предложить сотруднику банка, к примеру, сделать дизайнерские визитки в форме сложенной пополам денежной купюры. Любой человек возьмет подобное полиграфическое изделие, а развернув &ndash; прочтет и запомнит изложенную информацию.</p>\r\n\r\n<p>А если вы работаете с кожаной продукцией - VIP визитки должны быть напечатаны на коже, тем более, что возможности современной полиграфии позволяют создать настоящие произведения искусства (шелкография и лазерная гравировка).</p>\r\n\r\n<p>Пластиковые визитки от &laquo;1Дизайн&trade;&raquo; - для бизнесменов и школьников</p>\r\n\r\n<p>ООО &laquo;1Дизайн&trade;&raquo; изготавливает пластиковые визитки из качественного ПВХ, по размерам и форме, согласованной с заказчиком. Такие эксклюзивные визитки с округлыми краями &ndash; можно вручить и на 20-м Международном туристическом салоне UITM 2013, проведение которого намечено на 23 &ndash; 25 октября этого года. Тем более, что национальные тур операторы многих стран уже забронировали себе стенды (Кипр, Болгария, Египет, Турция, Таиланд).</p>\r\n\r\n<p>Гастрономический туризм &ndash; одно из направлений, в котором работают туроператоры, подразумевает большую культурную программу и возможность дегустировать местную кухню. А это, в свою очередь, приведет к новым знакомствам, появлению новых бизнес контактов, для которых и необходимы VIP визитки.</p>\r\n\r\n<p>Не следует забывать, что не за горами начало нового учебного года. Пластиковые визитки с указанием названия учебного заведения и телефонов родителей, вложенные в специальный кармашек школьной сумки, позволят быть уверенным за своего ребенка. Почему именно пластиковые визитки? Ежедневная проверка, на месте ли данный источник информации, приведет к истиранию традиционных визитных карточек. Пластиковые визитки &ndash; будут длительное время сохранять свой внешний вид.</p>\r\n\r\n<p>Дизайн визитки от &laquo;1Дизайн&trade;&raquo; раскрывает весь ее потенциал</p>\r\n\r\n<p>Чем же выделяется успешный человек на общем фоне? Понимая, что человек сам создает себя, свое имя, свой успех, успешный человек не отдается на волю течения, дожидаясь, когда же о нем и его бизнесе узнают. Он сам идет на контакт, заводит нужные знакомства. И в этом ему помогают VIP визитки от &laquo;1Дизайн&trade;&raquo;.</p>\r\n\r\n<p>Творчески разработанный дизайн визитки, выполненный нашими сотрудниками, позволит максимально использовать потенциальные возможности визитки VIP &ndash; будь то пластиковые визитки либо эксклюзивные визитки не ординарных форм и нетрадиционных материалов.</p>\r\n\r\n<p>И business card, и эпатажные визитки для представителей творческих профессий, и стильные, производящие впечатление VIP визитки &ndash; дизайн визитки и ее изготовление не займет много времени, при обращении в ООО &laquo;1Дизайн&trade;&raquo;.</p>\r\n', 'vip-vizitki-pechat-nachinaetsa', 2, 17, 4, 1, '2015-09-25 06:19:43');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `details` text,
  `active` tinyint(1) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `telephone`, `mail`, `details`, `active`, `created`, `user_id`) VALUES
(12, 'Admin Adminоvich', '(068) 363-64-76', 'yegor@1design.org', '{"product":"Пакеты","variant":"Банан","size":"30х40","color":"белый","colorQuantity1":"1","colorQuantity2":"0","quantity":50,"serv":[],"dopserv":[],"price":1397}', 1, '2015-09-22 12:17:04', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `header_meny` varchar(255) NOT NULL,
  `h_1` varchar(255) NOT NULL,
  `h_2` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `text` text,
  `rate` int(11) NOT NULL DEFAULT '5',
  `voites` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `header_meny`, `h_1`, `h_2`, `keywords`, `description`, `alias`, `text`, `rate`, `voites`, `active`) VALUES
(1, 'Полиграфия Киев Дизайн студия Полиграфические услуги ООО 1Дизайн®', 'Главная', 'ПОЛИГРАФИЯ В КИЕВЕ ОТ 1DESIGN®', 'Полиграфия – невозможное делает возможным', 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design', 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®', 'index', '', 38, 9, 1),
(2, 'Контакты', 'Контакты', 'Контакты', '', 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design', 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®', 'contact', '', 23, 5, 1),
(3, 'Полиграфия Киев Дизайн студия Полиграфические услуги ООО 1Дизайн®', 'О компании', 'Дизайн студия 1Design®', '', 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design', 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®', 'about', '<p>Студия дизайна - ООО &laquo;1Дизайн&reg;&raquo; это организованная в феврале 2008 года команда опытных специалистов, которые обеспечивают быстрое и качественное&nbsp;<a href="http://localhost/newdesign/yii-application/frontend/web/" style="box-sizing: border-box; color: black; text-decoration: none; outline: none; background-color: transparent;" title="полиграфическая продукция">изготовление полиграфической продукции</a>, услуг дизайна, а так же создание и продвижение сайтов любой структуры и сложности.</p>\r\n\r\n<p>Обращаясь в ООО &laquo;1Дизайн&reg;&raquo;, Вы получаете:</p>\r\n\r\n<ul>\r\n	<li>высокое качество полиграфической продукции</li>\r\n	<li>современный дизайн</li>\r\n	<li>доступные цены</li>\r\n	<li>все выполняется на собственном оборудовании</li>\r\n</ul>\r\n\r\n<p>Профессиональные дизайнеры веб-студии ООО &laquo;1Дизайн&reg;&raquo; позаботятся, чтобы разработка сайта отвечала всем необходимым критериям, согласно целевой направленности интернет-ресурса. Качественная раскрутка (продвижение) сайта предусматривает все нюансы и тонкости, которые, так или иначе, отражаются на общей работоспособности сайта.</p>\r\n\r\n<p>Мы можем предложить создание сайта с самого начала, непосредственно в той конфигурации, которая вам необходима. Если вам требуется сайт - визитка или вы предполагаете заказать разработку интернет магазина, веб-студия ООО &laquo;1Дизайн&reg;&raquo; справиться с поставленной задачей любой сложности в самые короткие сроки. Большой опыт и высокий профессионализм наших сотрудников позволяет нам выполнить заказ в точном соответствии с пожеланиями клиента.</p>\r\n\r\n<p>Приняв решение&nbsp;<a href="http://www.1design.net/" style="box-sizing: border-box; color: black; text-decoration: none; outline: none; background-color: transparent;" title="заказать разработку сайта">заказать разработку сайта</a>&nbsp;следует обратиться к помощи профессионалов, которые смогут предложить весь необходимый спектр услуг в комплексе, что поможет существенно сэкономить массу времени и средств. Кроме того, вы гарантированно получите качественный функциональный продукт, который будет отвечать всем предусмотренным в договоре пунктам.</p>\r\n\r\n<p>Качественная разработка и&nbsp;<a href="http://www.1design.net/" style="box-sizing: border-box; color: black; text-decoration: none; outline: none; background-color: transparent;" title="создание сайтов">создание сайтов</a>&nbsp;нашей веб-студией, это прежде всего предусмотрительная разработка логотипа и стиля, логичный и эффектный, а кроме того оригинальный и запоминающийся дизайн сайта, с удобной навигацией по ресурсу и разумной компоновкой его страниц.</p>\r\n\r\n<p>Также, профессиональная web-студия ООО &laquo;<a href="http://www.1design.net/" style="box-sizing: border-box; color: black; text-decoration: none; outline: none; background-color: transparent;">1Дизайн</a>&reg;&raquo; предлагает свои услуги и тем, кто уже имеет свой сайт. Если вам требуется продвижение сайта, наши веб-мастера и оптимизаторы с радостью это выполнят, согласно всем Вашим пожеланиям. Мы можем осуществить качественное наполнения сайта контентом, в который также будут входить seo-оптимизированные тексты, содержащие ключи под основные тематические запросы, согласно направленности сайта. Мы обеспечим вам быстрое продвижение сайта в топ, выводя его на лидирующие позиции в своей сфере. Веб-студия ООО &laquo;1Дизайн&reg;&raquo; предлагает продвижение сайтов как региональное, так и по СНГ. При необходимости, будет проведена раскрутка сайта по СНГ, все зависит от вашего желания и территориальности рынка сбыта, который обслуживает ваша компания. Обеспечивая продвижение сайтов в топ, производится регистрация web-сайтов в каталогах, что позволяет не только занять лидирующие позиции относительно конкурентов, но также надежно их закрепить за собой.</p>\r\n\r\n<p>Качественная ручная и автоматическая регистрация сайтов в каталогах, это далеко не единственный метод, который обеспечивает&nbsp;<a href="http://www.1design.net/prodvizhenie-saita" style="box-sizing: border-box; color: black; text-decoration: none; outline: none; background-color: transparent;" title="продвижение сайта">продвижение сайта</a>&nbsp;по ТИЦ. Веб-студия ООО &laquo;1Дизайн&reg;&raquo; предлагает вам продвижение сайта с помощью статей, что является самым новым и весьма эффективным методом раскрутки из всех известных.</p>\r\n\r\n<p>Мастера веб-студии ООО &laquo;1Дизайн&reg;&raquo; всегда пользуются новинками технологий, которые способствуют улучшенному продвижению сайтов в топ 10. Не тратте время и деньги на аматоров, предоставьте это профессионалам, которые Вас не подведут.</p>\r\n', 45, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `postimage`
--

CREATE TABLE IF NOT EXISTS `postimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `header_meny` varchar(255) NOT NULL,
  `h_1` varchar(255) NOT NULL,
  `h_2` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `text` text,
  `price` text,
  `minorder` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `mainimage` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT '5',
  `voites` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `tegs` varchar(255) DEFAULT NULL,
  `altmainimage` varchar(255) NOT NULL,
  `titlemainimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `header_meny`, `h_1`, `h_2`, `keywords`, `description`, `alias`, `text`, `price`, `minorder`, `category_id`, `mainimage`, `rate`, `voites`, `product_id`, `active`, `tegs`, `altmainimage`, `titlemainimage`) VALUES
(1, 'Печать на пакетах Киев Пакеты с логотипом Фирменные кульки с логотипом', 'Пакеты, кульки', 'Печать на пакетах логотипа киев кульки с логотипом', 'Пакеты с логотипом кулек с логотипом печать на кульках', 'пакеты с логотипом,печать на пакетах,печать на пакетах киев,пакеты с логотипом киев,пакеты полиэтиленовые киев,изготовление пакетов с логотипом,печать пакетов,пакеты с печатью,пакет с логотипом,заказать пакеты с логотипом,фирменные пакеты,пакеты полиэтиле', 'Пакеты с логотипом от 1Design®. Печать на пакетах из полиэтилена, печать логотипа на полиэтиленовых кульках 20х30 30х40 40х50 60х60 см, разные цвета. Печать кульков малыми партиями', 'pakety-kulki', '<p style="text-align:justify"><img alt="" src="http://localhost/newdesign/yii-application/frontend/web/uploads/ckeditor/1439974895_1design-vizitka-obiemnaya-kraska-thumb.jpg" style="float:left; height:120px; margin-left:10px; margin-right:10px; width:180px" />Сегодня, когда уникальная&nbsp;<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="полиграфическая продукция">полиграфическая продукция</a>&nbsp;стала общедоступным товаром,<strong>изготовление плакатов, печать плакатов и постеров</strong>&nbsp;является одним из наиболее простых и эффективных способов рекламы. Яркий и красочный&nbsp;<em>плакат</em>, созданный в соответствии с вашими пожеланиями, станет прекрасной платформой для размещения информации с целью привлечения новых клиентов.</p>\r\n\r\n<p>Печать плакатов, постеров и афиш &ndash; лучший инструмент для развития компании</p>\r\n\r\n<p style="text-align:justify">Что делает&nbsp;<em>плакаты</em>&nbsp;уникальным инструментом рекламных компаний? Оптимальное сочетание цены и качества, поскольку этот вид полиграфической продукции обеспечивает достаточную видимость анонсируемого материала.&nbsp;<strong>Плакат или постер</strong>, размещенный в людных местах, может гарантировать вам большой приток клиентов в считанные часы. Не верите? Зря! Ведь на маленькие объявления спешащие клиенты не обратят внимание, листовку выбросят, не посмотрев. Единственное, что еще продолжает обеспечивать наращивание потребительской базы, так это масштабная наружная реклама, которая стоит немалых денег. Если вы не располагаете большими финансовыми средствами, возьмите на вооружение&nbsp;<strong>печать плакатов</strong>&nbsp;&ndash; она наверняка оправдает себя.</p>\r\n\r\n<p>Цветная печать плакатов и афиш для праздника</p>\r\n\r\n<p style="text-align:justify">Думать, что плакаты можно использовать только в производственных целях &ndash; большое заблуждение. Ведь в&nbsp;<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="типография">типография</a>&nbsp;за считанные часы неприметный лист бумаги может превратиться в настоящее произведение искусства, которое станет прекрасным сюрпризом для родных и близких. Пейзажи мест, где вы побывали или хотите побывать, коллажи семейных фото или смешные изображения &ndash; все это за минимальную цену может оказаться на стене вашей спальни или офиса. Цветная&nbsp;<em><a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="печать">печать</a>&nbsp;плакатов</em>&nbsp;или постеров поможет оживить даже самое унылое помещение, придать ему оригинальности и красочности. (<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="полиграфия">полиграфия</a>)</p>\r\n\r\n<p>Изготовление рекламных плакатов: что и как</p>\r\n\r\n<p style="text-align:justify">Само собой разумеется, что порядок и форма размещения рекламной информации на плакате зависит исключительно от желания заказчика. Но если речь идет о полиграфической продукции рекламного характера, то лучше не забывать определенные каноны создания плакатов, которые обеспечат вам эффективность работы полиграфических единиц. Помните: шрифт должен быть достаточно крупным и хорошо читаемым, а цветовая гамма &ndash; приятной для глаза, поскольку изготовление рекламных плакатов в первую очередь основывается на возможности чтения &laquo;на ходу&raquo;.</p>\r\n\r\n<p style="text-align:justify">Спешите&nbsp;<strong><em>заказать плакаты, афиши и постеры</em></strong>, чтобы самостоятельно убедиться в эффективности их функционирования на рекламном рынке!</p>\r\n', '', 100, 1, 'Pretty-Green-1.png', 10, 2, 1, 1, '', 'lalala', 'bebebe'),
(2, 'Печать плаката А3, постеров киев изготовление афиш', 'Афиши, Плакаты', 'Печать плаката А3, постеров киев изготовление афиш', 'Заказать рекламный плакат киев изготовление плакатов А3 А4', 'Печать плаката А3, постеров киев изготовление афиш', 'Печать плаката А3, постеров киев изготовление афиш', 'afishi-plakaty', '<p style="text-align:justify"><img alt="" src="http://first.rybalka.me/uploads/ckeditor/1443173073_plakaty-1design-afisha-thumb.jpg" style="float:left; height:130px; margin-left:5px; margin-right:5px; width:130px" />Сегодня, когда уникальная&nbsp;<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="полиграфическая продукция">полиграфическая продукция</a>&nbsp;стала общедоступным товаром,<strong>изготовление плакатов, печать плакатов и постеров</strong>&nbsp;является одним из наиболее простых и эффективных способов рекламы. Яркий и красочный&nbsp;<em>плакат</em>, созданный в соответствии с вашими пожеланиями, станет прекрасной платформой для размещения информации с целью привлечения новых клиентов.</p>\r\n\r\n<p>Печать плакатов, постеров и афиш &ndash; лучший инструмент для развития компании</p>\r\n\r\n<p style="text-align:justify">Что делает&nbsp;<em>плакаты</em>&nbsp;уникальным инструментом рекламных компаний? Оптимальное сочетание цены и качества, поскольку этот вид полиграфической продукции обеспечивает достаточную видимость анонсируемого материала.&nbsp;<strong>Плакат или постер</strong>, размещенный в людных местах, может гарантировать вам большой приток клиентов в считанные часы. Не верите? Зря! Ведь на маленькие объявления спешащие клиенты не обратят внимание, листовку выбросят, не посмотрев. Единственное, что еще продолжает обеспечивать наращивание потребительской базы, так это масштабная наружная реклама, которая стоит немалых денег. Если вы не располагаете большими финансовыми средствами, возьмите на вооружение&nbsp;<strong>печать плакатов</strong>&nbsp;&ndash; она наверняка оправдает себя.</p>\r\n\r\n<p>Цветная печать плакатов и афиш для праздника</p>\r\n\r\n<p style="text-align:justify">Думать, что плакаты можно использовать только в производственных целях &ndash; большое заблуждение. Ведь в&nbsp;<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="типография">типография</a>&nbsp;за считанные часы неприметный лист бумаги может превратиться в настоящее произведение искусства, которое станет прекрасным сюрпризом для родных и близких. Пейзажи мест, где вы побывали или хотите побывать, коллажи семейных фото или смешные изображения &ndash; все это за минимальную цену может оказаться на стене вашей спальни или офиса. Цветная&nbsp;<em><a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="печать">печать</a>&nbsp;плакатов</em>&nbsp;или постеров поможет оживить даже самое унылое помещение, придать ему оригинальности и красочности. (<a href="https://www.1design.org/" style="box-sizing: border-box; color: black; text-decoration: none; background: 0px 0px;" title="полиграфия">полиграфия</a>)</p>\r\n\r\n<p>Изготовление рекламных плакатов: что и как</p>\r\n\r\n<p style="text-align:justify">Само собой разумеется, что порядок и форма размещения рекламной информации на плакате зависит исключительно от желания заказчика. Но если речь идет о полиграфической продукции рекламного характера, то лучше не забывать определенные каноны создания плакатов, которые обеспечат вам эффективность работы полиграфических единиц. Помните: шрифт должен быть достаточно крупным и хорошо читаемым, а цветовая гамма &ndash; приятной для глаза, поскольку изготовление рекламных плакатов в первую очередь основывается на возможности чтения &laquo;на ходу&raquo;.</p>\r\n\r\n<p style="text-align:justify">Спешите&nbsp;<strong><em>заказать плакаты, афиши и постеры</em></strong>, чтобы самостоятельно убедиться в эффективности их функционирования на рекламном рынке!</p>\r\n', '', 100, 1, 'SA-1-300x300.png', 26, 6, 1, 1, 'печать плаката,изготовление плакатов,печать плакатов постеров,заказать плакат,напечатать плакат,изготовление плакатов киев,изготовление афиш,заказать рекламный плакат,печать плаката а3,печать плакатов на а4,изготовление плакатов баннеров,печать плаката на', 'постеров киев изготовление афиш', 'постеров киев изготовление афиш');

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(8,2) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `prices`
--

INSERT INTO `prices` (`id`, `price`, `color_id`, `size_id`, `service_id`, `product_id`) VALUES
(1, 75.99, NULL, NULL, 1, 0),
(2, 230.33, NULL, 1, 2, 1),
(3, 0.99, NULL, 1, 3, 1),
(4, 0.99, 1, 1, NULL, NULL),
(5, 0.66, 2, 1, NULL, NULL),
(6, 0.99, 3, 1, NULL, NULL),
(7, 300.55, NULL, 2, 2, 1),
(8, 0.95, NULL, 2, 3, 1),
(9, 0.47, 4, 2, NULL, NULL),
(10, 1561.99, NULL, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `formula` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `formula`) VALUES
(1, 'Пакеты', 'quantity * (colorQuantity * (priceWork * worksKurs) + (colorPrice * materialsKurs)) + (firstPrice * worksKurs) + (dopservice * worksKurs)  + (dopmat * materialsKurs) + (dopwork * worksKurs)');

-- --------------------------------------------------------

--
-- Структура таблицы `relations`
--

CREATE TABLE IF NOT EXISTS `relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `relations`
--

INSERT INTO `relations` (`id`, `product_id`, `service_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `unit`) VALUES
(1, 'Доставка', NULL),
(2, 'Первый прогон', NULL),
(3, 'Печатные работы', NULL),
(4, 'scsc', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `title`, `description`, `variant_id`, `product_id`) VALUES
(1, '30х40', NULL, 1, 1),
(2, '40х50', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `fio`, `company`, `telephone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'uh006zruZj8FZNicGDvZJfp2vYbG5Y4z', '$2y$13$8WXGcUa2RHbCdD80RlpWSeAm0cNi8Gw9ho3DR4tpG01U7l/9VPN..', '', 'yegor@1design.org', 'Admin Adminоvich', '1design', '(068) 363-64-76', 10, 1432381596, 1442842329);

-- --------------------------------------------------------

--
-- Структура таблицы `variants`
--

CREATE TABLE IF NOT EXISTS `variants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `variants`
--

INSERT INTO `variants` (`id`, `title`, `product_id`) VALUES
(1, 'Банан', 1),
(2, 'Петля', 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
