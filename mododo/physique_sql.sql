
CREATE DATABASE IF NOT EXISTS Blog;

USE Blog;

CREATE TABLE IF NOT EXISTS Post (
  num_post      BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  title         VARCHAR(100) NOT NULL,
  descrip       TEXT NOT NULL,
  descrip_short VARCHAR(150) NOT NULL,
  audio_link    TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  num_category  BIGINT  UNSIGNED
);

CREATE TABLE IF NOT EXISTS Category (
  num_category BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name         VARCHAR(50) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Comment (
  num_comment BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  body        TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  num_post  BIGINT  UNSIGNED
);

CREATE TABLE IF NOT EXISTS Users (
  num_user BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
  pseudonyme	VARCHAR(100) NOT NULL,
  avatar	VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  num_comment  BIGINT  UNSIGNED
);



ALTER TABLE Comment ADD FOREIGN KEY (num_post) REFERENCES Post (num_post);

ALTER TABLE Post ADD FOREIGN KEY (num_category) REFERENCES Category (num_category);

ALTER TABLE Users ADD FOREIGN KEY (num_comment) REFERENCES Comment (num_comment);
