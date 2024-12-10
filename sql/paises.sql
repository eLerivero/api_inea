-- Crear la base de datos api @Author: Luis Rivero
CREATE DATABASE api;


CREATE TABLE paises (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(90),
    siglas VARCHAR(10)
);


INSERT INTO paises (nombre, siglas) VALUES ('VENEZUELA', 'VEN');
