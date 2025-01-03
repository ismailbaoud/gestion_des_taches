create database project_management;

use project_management;

Admin Password: admin123
CTO Password: ctoPass2025
Member Password: memberPass2025

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
    status ENUM('ACTIVE','TERMINER') default 'ACTIVE',
    visibility ENUM('private', 'public'),
    FOREIGN KEY (cto_id) REFERENCES CTO(cto_id)
) ENGINE=InnoDB;

CREATE TABLE member (
    member_id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    cto_id int not null,
    FOREIGN KEY (cto_id) REFERENCES CTO(cto_id)
) ENGINE=InnoDB;


CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
    cto_id int,
    FOREIGN KEY (cto_id) REFERENCES CTO(cto_id)

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
    projet_id INT,
    FOREIGN KEY (member_id) REFERENCES member(member_id),
    FOREIGN KEY (category_id) REFERENCES category(category_id),
    FOREIGN KEY (projet_id) REFERENCES projet(id)

) ENGINE=InnoDB;



-- insert fake data

INSERT INTO admin (fullname, email, password)
VALUES
('John Doe', 'john.doe@example.com', '$2y$12$wD3xby1ovbTmmoc6FvjlPODcHgS56jWlPZ2TlgpSkmksTgEuJxtFG') -- hashed 'adminpassword123'



INSERT INTO CTO (fullname, email, password)
VALUES
('Andrew Cox', 'andrew.cox@example.com', '$2y$12$wD3xby1ovbTmmoc6FvjlPODcHgS56jWlPZ2TlgpSkmksTgEuJxtFG'), -- hashed 'ctopassword123'
('James Mitchell', 'james.mitchell@example.com', '$2y$12$ZyI0bAZh5p.lKOMYp.4H.yok9r9D3n0w6Tkq77iVxch7hFztfyZiW'),
('Sophia Campbell', 'sophia.campbell@example.com', '$2y$12$4rxF9s1Vgu6ijcytO9hDD1JH.Om1BhsffglGQ7bZmNlX.yjLoA9Oq'),
('Samuel Parker', 'samuel.parker@example.com', '$2y$12$Txd0McV1ypNj4c1FzTjdruWos8YO7ZulC9M1Oqz4pxlUr4D0hrRk2'),
('Grace Green', 'grace.green@example.com', '$2y$12$U6NJ3.xWdh7KlKbOxgTL2t0.bPzKb6ch1Pzz54hytW0Zh0B7lAs0G'),
('Liam Davis', 'liam.davis@example.com', '$2y$12$ObHg8HTgZvEVTOy4ZTNN5x.kfOX9tVXQzD0H3BvN8ljHcuFkfmwiq'),
('Olivia Johnson', 'olivia.johnson@example.com', '$2y$12$h9rYZtmf79.yLgRYyTkOjsGjWb9Egs8H7B1ZYrsyd7pOYVqb3J6Zuy'),
('Daniel Harris', 'daniel.harris@example.com', '$2y$12$Xrj7V0Xhl5EZ1T6k.77BdLsosd50hRvsJQO6i.f3tU8eX0r13h6hO'),
('Michael White', 'michael.white@example.com', '$2y$12$7KGeZptbNl7xHZAlf2QhOhpPXXm1SJBK5r3VoOjr79C7mqa2K2xyS'),
('Sophia Martin', 'sophia.martin@example.com', '$2y$12$jsR7.5JKYPtEqqkIF4OwQ6cnp.qhg6pH9l.9bpwNGRQ7dZ8sHRsTe'),
('Jack Lee', 'jack.lee@example.com', '$2y$12$pcf6ql66VRHz2F4Q2gUeES65k8c0VfDb7A30dh4bPQYPuIa6RRPVw'),
('Eva Garcia', 'eva.garcia@example.com', '$2y$12$aylEK1o2LMONd6FGeGrkz2LgW4fS9vJGdZSOAFkt5sv5MycZv4Rwy'),
('Henry Brown', 'henry.brown@example.com', '$2y$12$LvwqZnq5pGDC5cG0cx7nD7F1mAiQTh9ECy68qUqgGF7AkhNloKMZG'),
('Ella Thomas', 'ella.thomas@example.com', '$2y$12$zxCdsFVxBjsrIKg9AkZZlAhmbakfjg8gIhIi7lLFwON89Jkg7tcqG'),
('William Miller', 'william.miller@example.com', '$2y$12$xoGbSXB5S8gYoWV1ciZJm.hngnyHt9sdv5uZgkE9d1gh7bvdpgfxe'),
('Megan Scott', 'megan.scott@example.com', '$2y$12$Lx7y25Mfyzjz.c8lqrn8yo2dVV5VZxXeO4gZOtEzLRwnWgtVRJbry'),
('Thomas Adams', 'thomas.adams@example.com', '$2y$12$94w8.eXGz9pfRHnmKDnxZyxaL7ZGvqzZnT.xpVZ4fdTxv5MCt3Vfy'),
('Ethan Roberts', 'ethan.roberts@example.com', '$2y$12$W9d8QqTvhfLVWfId/XZv3OyESpVsIGrfLfZ9tYTHo/Ohu1B6Wltyy'), -- hashed 'newctopassword1'
('Sophia Johnson', 'sophia.johnson@example.com', '$2y$12$PiAq97ytkF2lfE22t65VquFmkT5lNk3KK0np6v7ZyWIaFOsQWseIS'), -- hashed 'newctopassword2'
('Jackson Lee', 'jackson.lee@example.com', '$2y$12$8FwA2SM6uH2U8.X0pPtgtW6v8UJ5ex2Xtpa57bD3J9z9dXqZ7yF6i'), -- hashed 'newctopassword3'
('Olivia Martin', 'olivia.martin@example.com', '$2y$12$wrJHV6HXcbF11dXgl.B9pG2tA7cxv.tpLMexht8spmSFG0goz.qEi'); -- hashed 'newctopassword4'




INSERT INTO member (fullname, email, password, cto_id)
VALUES
('Alice Cooper', 'alice.cooper@example.com', '$2y$12$wD3xby1ovbTmmoc6FvjlPODcHgS56jWlPZ2TlgpSkmksTgEuJxtFG', 1), -- hashed 'memberpassword123'
('Bob Allen', 'bob.allen@example.com', '$2y$12$1ywPrmxs0zHjjOcfvV5F9.kO5gRHqXvHccQ6rpFOFYI6wP8mbFfZm', 1),
('Chloe Davis', 'chloe.davis@example.com', '$2y$12$HZxUPXGlNr0YZks9BaHtQ9FgUlqIMpxolz4V.sow19wA0D0gR6iDO', 2),
('Ethan Mitchell', 'ethan.mitchell@example.com', '$2y$12$znF15.MKnS3llRABeO.oyh0TOgyLhjtHkqAmDb9oD1sDZj4hWJfQS', 3),
('Emma Wilson', 'emma.wilson@example.com', '$2y$12$Qohj9oiyx5I.PE3d8hWrhwjdg1z9gmwMlma93dkGGgNwsgWofb77m', 4),
('George Harris', 'george.harris@example.com', '$2y$12$U8jwzD7zIKHqBfsFSqDEmu9hlcQxZjmgsC.Zu3G2jr6CtdZcuSkNK', 5),
('Mia Jackson', 'mia.jackson@example.com', '$2y$12$wo1kBz5XlZOJslFLXgHXFC7bb2VKvnEz2EmWgVybI24e7WqrwGGe.', 6),
('Lucas Brown', 'lucas.brown@example.com', '$2y$12$nxw2GG4.gbKpzWjjWu8jwWBoHRvTr3mr5DmjI1pzDgzAX4ZXjRsjm', 7),
('Sophia Lee', 'sophia.lee@example.com', '$2y$12$u9Lf0Owsu5kS.0g6lsMmmb7grt7Uy5MNWZyG4O5Yth8PRgndFXJHy', 8),
('Zoe Adams', 'zoe.adams@example.com', '$2y$12$DvePoPnOq2lwwg66Q7zp7Fx9zUw9UyikWpgOlP.Ro1zpTRl52Kgh8', 9),
('Nathan Scott', 'nathan.scott@example.com', '$2y$12$XQbChm6sbxRxeO3Sw4y.hVdsXPAhRZTjoYuLf0LMflg6e9hInNTnm', 10),
('Olivia Carter', 'olivia.carter@example.com', '$2y$12$eho0b9UddMplg7Dz4c7zFVNe9yUswz5UJ8hYyLfa5fWv3PrEgnFNS', 11),
('Evan Lewis', 'evan.lewis@example.com', '$2y$12$PZgPo9Vd7X8bje7uS47BdeqBhfzm3cUJAs9Mz7vLZYTch0gOvmW9G', 12),
('Jackson Walker', 'jackson.walker@example.com', '$2y$12$ygXqt6gXtbF.59N5FzNCaeGJ6eEYszrB9y7fHMOsmA9Nj9cxW0pfy', 13),
('Isabella Hall', 'isabella.hall@example.com', '$2y$12$WybwJ1B9YwI2lptlTfZfnY3HwyEyzBrYMyxnFhDOFwQUwfd6Gq8Km', 14),
('Harper Martinez', 'harper.martinez@example.com', '$2y$12$gQt4l3l6peSKdKcm82hdYcBB3NY30UrE35Qp9Fts80IhpiDtW9mBi', 15),
('Aiden Hernandez', 'aiden.hernandez@example.com', '$2y$12$A0.l1CpMLVq.y6F8f6gMMpCFF6u50z7DTeUyjmjBz44jtivg2X0V', 16),
('Benjamin Moore', 'benjamin.moore@example.com', '$2y$12$VbVsPpm.2MFCbx7gOFPS.mS2M1I9NN0AaIFuK9Wjq9F02yog1NwUa', 17),
('William Turner', 'william.turner@example.com', '$2y$12$hxWcD0q3kqEX1j95RbnQmeb3cT7wzN1t.y5XhpXEC2wWw9fgft78W', 1), -- hashed 'newmemberpassword1'
('Isabella Robinson', 'isabella.robinson@example.com', '$2y$12$Xy4INzH8oau13QngZ8Hw5uSmjqlyBmgwmH.W30n4E5.sBG1Hqmh6a', 2), -- hashed 'newmemberpassword2'
('Liam Anderson', 'liam.anderson@example.com', '$2y$12$tsYW5dBzyjXpeUbb9OsDvaWqEXh8XDCsKZG2yFghwgdIPfIvh4d9W', 3); -- hashed 'newmemberpassword3'


INSERT INTO projet (title, description, cto_id, status, visibility)
VALUES
('Project Alpha', 'A major project focusing on the next-gen AI model.', 1, 'ACTIVE', 'public'),
('Project Beta', 'A blockchain-based platform to revolutionize finance.', 2, 'ACTIVE', 'public'),
('Project Gamma', 'AI-driven analytics tool for large enterprises.', 3, 'ACTIVE', 'private'),
('Project Delta', 'A cloud-based SaaS for team collaboration.', 4, 'ACTIVE', 'public'),
('Project Epsilon', 'Platform for automating financial analysis and reports.', 5, 'ACTIVE', 'private'),
('Project Zeta', 'Revolutionizing transportation with self-driving cars.', 6, 'ACTIVE', 'public'),
('Project Eta', 'A machine learning solution for personalized medicine.', 7, 'ACTIVE', 'private'),
('Project Theta', 'A new kind of social media platform with AI integration.', 8, 'ACTIVE', 'public'),
('Project Iota', 'A 3D printing platform for advanced manufacturing.', 9, 'ACTIVE', 'private'),
('Project Kappa', 'AI-based recommendation system for e-commerce platforms.', 10, 'ACTIVE', 'public'),
('Project Lambda', 'Blockchain-powered smart contracts platform.', 11, 'ACTIVE', 'public'),
('Project Mu', 'A data privacy platform using encryption and decentralization.', 12, 'ACTIVE', 'private'),
('Project Nu', 'An AI-powered education assistant for remote learning.', 13, 'ACTIVE', 'public'),
('Project Xi', 'Decentralized finance (DeFi) platform with high security.', 14, 'ACTIVE', 'private'),
('Project Omicron', 'AI-powered diagnostics tool for healthcare professionals.', 15, 'ACTIVE', 'public'),
('Project Pi', 'Cloud-based infrastructure for big data processing.', 16, 'ACTIVE', 'private'),
('Project Rho', 'Smart home automation with AI assistants.', 17, 'ACTIVE', 'public'),
('Project Sigma', 'A platform for digital art creation using AI tools.', 18, 'ACTIVE', 'private'),
('Project Tau', 'A mobile application for personal finance management.', 19, 'ACTIVE', 'public'),
('Project Upsilon', 'Platform to provide AI solutions for the legal industry.', 20, 'ACTIVE', 'private');



INSERT INTO category (name, cto_id)
VALUES
('AI', 1),
('Blockchain', 2),
('Machine Learning', 3),
('SaaS', 4),
('Finance', 5),
('Transportation', 6),
('Healthcare', 7),
('Social Media', 8),
('E-commerce', 9),
('Smart Contracts', 10),
('Data Privacy', 11),
('Education', 12),
('DeFi', 13),
('Diagnostics', 14),
('Cloud Computing', 15),
('Home Automation', 16),
('Digital Art', 17),
('Finance Management', 18),
('Legal', 19),
('Big Data', 20);



INSERT INTO tache (title, description, date, status, tag, member_id, category_id, projet_id)
VALUES
('Task 1', 'Set up initial project infrastructure for AI model.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 1, 1, 1),
('Task 2', 'Research and plan the blockchain architecture.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 2, 2, 2),
('Task 3', 'Create machine learning algorithms for data analysis.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 3, 3, 3),
('Task 4', 'Design the UI/UX for the SaaS platform.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 4, 4, 4),
('Task 5', 'Develop financial reporting features for the platform.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 5, 5, 5),
('Task 6', 'Research self-driving car technology and potential partnerships.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 6, 6, 6),
('Task 7', 'Create personalized medicine algorithm based on AI.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 7, 7, 7),
('Task 8', 'Design AI-based content recommendation algorithm.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 8, 8, 8),
('Task 9', 'Research and test materials for 3D printing technology.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 9, 9, 9),
('Task 10', 'Create machine learning models for e-commerce personalization.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 10, 10, 10),
('Task 11', 'Develop the infrastructure for the smart contract platform.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 11, 11, 11),
('Task 12', 'Implement end-to-end encryption for privacy platform.', '2025-01-03', 'A_FAIRE', 'BUG', 12, 12, 12),
('Task 13', 'Design learning modules for the AI-powered education assistant.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 13, 13, 13),
('Task 14', 'Implement decentralized finance protocols.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 14, 14, 14),
('Task 15', 'Build a diagnostics algorithm for detecting diseases.', '2025-01-03', 'A_FAIRE', 'BUG', 15, 15, 15),
('Task 16', 'Set up cloud-based infrastructure for data processing.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 16, 16, 16),
('Task 17', 'Implement AI-based home automation system.', '2025-01-03', 'A_FAIRE', 'BUG', 17, 17, 17),
('Task 18', 'Develop digital art creation tools using AI.', '2025-01-03', 'A_FAIRE', 'FONCTIONNALITE', 18, 18, 18),
('Task 19', 'Develop mobile app for personal finance tracking.', '2025-01-03', 'A_FAIRE', 'BASIQUE', 19, 19, 19),
('Task 20', 'Create AI-powered legal solution for case analysis.', '2025-01-03', 'A_FAIRE', 'BUG', 20, 20, 20);



