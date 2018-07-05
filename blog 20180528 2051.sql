--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.3.148.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 28.05.2018 20:51:22
-- Версия сервера: 5.7.21-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'cp1251';

--
-- Установка базы данных по умолчанию
--
USE blog;

--
-- Удалить таблицу "content"
--
DROP TABLE IF EXISTS content;

--
-- Удалить таблицу "users"
--
DROP TABLE IF EXISTS users;

--
-- Удалить таблицу "menu"
--
DROP TABLE IF EXISTS menu;

--
-- Установка базы данных по умолчанию
--
USE blog;

--
-- Создать таблицу "menu"
--
CREATE TABLE menu (
  id int(11) NOT NULL AUTO_INCREMENT,
  menu_name varchar(50) DEFAULT NULL,
  is_admin tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Создать таблицу "users"
--
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  pass varchar(255) NOT NULL,
  admin tinyint(1) NOT NULL DEFAULT 0,
  email varchar(50) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX UK_users_id (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Создать таблицу "content"
--
CREATE TABLE content (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  short_description text DEFAULT NULL,
  text text DEFAULT NULL,
  date_of_produkcji timestamp NULL DEFAULT NULL,
  blogger_id int(11) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_content_blogger_id2 FOREIGN KEY (blogger_id)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы content
--
-- Таблица blog.content не содержит данных

-- 
-- Вывод данных для таблицы menu
--
INSERT INTO menu VALUES
(1, 'Реєстрація', 0),
(2, 'Вхід', 0),
(3, 'адмін панель', 1),
(4, 'Пошук блогера', 0),
(5, 'Вихід', 0);

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'admin', '12325', 1, 'szpadizor@meta.ua');
-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
