CREATE DATABASE IF NOT EXISTS docker_doc;
CREATE DATABASE IF NOT EXISTS docker_doc_dev;

USE docker_doc;

CREATE TABLE IF NOT EXISTS article (
                                       id BIGINT PRIMARY KEY,
                                       title VARCHAR(32),
    body TEXT
    );

USE docker_doc_dev;

CREATE TABLE IF NOT EXISTS article (
                                       id BIGINT PRIMARY KEY,
                                       title VARCHAR(32),
    body TEXT
    );

INSERT INTO article (id, title, body) VALUES
                                          (1, 'Docker overview', 'Docker is an open platform...'),
                                          (2, 'What is a container?', 'Imagine you’re developing...');