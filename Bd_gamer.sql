create table Producto_gamer (
    id_producto serial primary key, 
    nombre varchar(255) not null,
    precio decimal(10, 2) not null,
    stock int not null default 0
);

create table ventas (
    id_venta serial primary key,
    id_producto int not null,    
    cantidad int not null,
    fecha_venta TIMESTAMPTZ DEFAULT NOW(),
    
    
    constraint fk_producto
        foreign key(id_producto) 
        references Producto_gamer(id_producto) 
        on delete restrict -- sirve para no dejar borrar un producto si ya tiene ventas
);