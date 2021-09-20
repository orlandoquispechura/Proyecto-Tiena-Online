CREATE DATABASE tienda;
use tienda

CREATE TABLE usuarios(
    id int (255) AUTO_INCREMENT NOT null,
    nombre varchar(50) not null,
    apellidos varchar(100),
    email varchar(255) not null,
    contrasena varchar(255) not null,
	rol varchar(20),
    imagen	varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE (email)
)ENGINE=INNODB;

CREATE TABLE categorias(
	id	int(255) AUTO_INCREMENT not null,
    nombre varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY(id)

)ENGINE=INNODB;

CREATE TABLE productos(
    id	 int(255) AUTO_INCREMENT not null,
    categoria_id int(255) not null,
    nombreProducto varchar(100) not null,
    descripcion text,
    precio float(100,2) not null,
    stock int(255) not null,
    oferta varchar(2),
    fecha date not null,
    imagen varchar(255),
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
    )ENGINE=INNODB;
    
CREATE TABLE pedidos(
	id int(255) AUTO_INCREMENT not null,
    usuario_id int(255) not null,
    provincia varchar(100) not null,
    localidad varchar(100) not null,
    direccion varchar(255) not null,
    coste float(200,2) not null,
    estado varchar(20) not null,
    fecha date,
    hora time,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=INNODB;

CREATE TABLE detalle_pedidos(
	id int(255) AUTO_INCREMENT not null,
    pedido_id int(255) not null,
    producto_id int(255) not null,
    unidades int(255) not null,
    CONSTRAINT pk_detalle_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_detalle_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_detalle_producto FOREIGN KEY(producto_id) REFERENCES productos(id) 
    
)ENGINE=INNODB;
    
    
    
    
    
    
    