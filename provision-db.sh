#debes completar este archivo con los comandos necesarios para provisionar la base de datos

#!/usr/bin/env bash

# Actualizar paquetes
sudo apt-get update -y

# Instalar PostgreSQL
sudo apt-get install -y postgresql postgresql-contrib

# Habilitar y arrancar el servicio
sudo systemctl enable postgresql
sudo systemctl start postgresql

# Crear base de datos, usuario y tabla de ejemplo
sudo -u postgres psql <<EOF
CREATE DATABASE tienda;
CREATE USER sebastian WITH PASSWORD '12345';
GRANT ALL PRIVILEGES ON DATABASE tienda TO sebastian;

\c tienda

CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(50),
    precio DECIMAL(10,2)
);

INSERT INTO productos (nombre, precio) VALUES 
('Teclado', 120.50),
('Mouse', 75.00),
('Monitor', 950.00)
ON CONFLICT DO NOTHING;
EOF
