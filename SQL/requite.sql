create database project_management;

use project_management;


CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE CTO (
    cto_id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE projet (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(5000),
    cto_id INT,
    FOREIGN KEY (cto_id) REFERENCES CTO(cto_id)
) ENGINE=InnoDB;


CREATE TABLE equipe (
    equipe_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    project_id INT,
    FOREIGN KEY (project_id) REFERENCES projet(id)
) ENGINE=InnoDB;


CREATE TABLE member (
    member_id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES equipe(equipe_id)
) ENGINE=InnoDB;


CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB;


CREATE TABLE tache (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(5000) NOT NULL,
    date DATE NOT NULL,
    status ENUM('A_FAIRE', 'EN_COURS', 'TERMINER') NOT NULL,
    tag ENUM('BASIQUE', 'BUG', 'FONCTIONNALITE') NOT NULL,
    member_id INT,
    category_id INT,
    FOREIGN KEY (member_id) REFERENCES member(member_id),
    FOREIGN KEY (category_id) REFERENCES category(category_id)
) ENGINE=InnoDB;



-- insert fake data

INSERT INTO admin (fullname, email, password) 
VALUES ('Admin Name', 'admin@example.com', 'hashedpassword');

INSERT INTO CTO (fullname, email, password) 
VALUES ('John Doe', 'john@example.com', 'hashedpassword');

INSERT INTO projet (title, description, cto_id)
VALUES ('Project 1', 'Description of project 1', 1);

INSERT INTO equipe (title, project_id)
VALUES ('Team Alpha', 1);

INSERT INTO member (fullname, email, password, equipe_id)
VALUES ('Jane Smith', 'jane@example.com', 'hashedpassword', 1);

INSERT INTO category (name)
VALUES ('Development');

INSERT INTO tache (title, description, date, status, tag, member_id, category_id)
VALUES (
    'Create Login Page',
    'Implement user authentication system',
    CURDATE(),
    'A_FAIRE',
    'FONCTIONNALITE',
    1,
    1
);