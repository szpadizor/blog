--
-- ������ ������������ Devart dbForge Studio for MySQL, ������ 7.3.148.0
-- �������� �������� ��������: http://www.devart.com/ru/dbforge/mysql/studio
-- ���� �������: 28.05.2018 20:51:22
-- ������ �������: 5.7.21-log
-- ������ �������: 4.1
--


-- 
-- ���������� ������� ������
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- ���������� ����� SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- ��������� ���������, � �������������� ������� ������ ����� �������� ������� �� ������
--
SET NAMES 'cp1251';

--
-- ��������� ���� ������ �� ���������
--
USE blog;

--
-- ������� ������� "content"
--
DROP TABLE IF EXISTS content;

--
-- ������� ������� "users"
--
DROP TABLE IF EXISTS users;

--
-- ������� ������� "menu"
--
DROP TABLE IF EXISTS menu;

--
-- ��������� ���� ������ �� ���������
--
USE blog;

--
-- ������� ������� "menu"
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
-- ������� ������� "users"
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
-- ������� ������� "content"
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
-- ����� ������ ��� ������� content
--
-- ������� blog.content �� �������� ������

-- 
-- ����� ������ ��� ������� menu
--
INSERT INTO menu VALUES
(1, '���������', 0),
(2, '����', 0),
(3, '���� ������', 1),
(4, '����� �������', 0),
(5, '�����', 0);

-- 
-- ����� ������ ��� ������� users
--
INSERT INTO users VALUES
(1, 'admin', '12325', 1, 'szpadizor@meta.ua');
-- 
-- ������������ ���������� ����� SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- ��������� ������� ������
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
