# Sistema de Discoteca — Diccionario de Datos (Laravel)

Proyecto de gestión para discoteca con **30 entidades**.  
- **Instructor:** `roles` y `usuarios`  
- **Aprendices:** 28 entidades (una por aprendiz)  

Documentación completa: [`diccionario_datos_discoteca.md`](./diccionario_datos_discoteca.md)

---

## Orden de creación de migraciones

Las tablas deben crearse **en este orden** para que las foreign keys no fallen.

| Orden | Migración | Tabla | Depende de | Responsable |
|------:|-----------|-------|------------|-------------|
| 1 | `create_roles_table` | `roles` | — | **Instructor** |
| 2 | `create_usuarios_table` | `usuarios` | `roles` | **Instructor** |
| 3 | `create_empleados_table` | `empleados` | `usuarios` | Brayan Chavarro Giraldo |
| 4 | `create_clientes_table` | `clientes` | — | Brayann Orlando Caicedo Tibaquirá |
| 5 | `create_zonas_table` | `zonas` | — | Caren Lizeth Rodriguez Rojas |
| 6 | `create_mesas_table` | `mesas` | `zonas` | Carlos Tulio Quiroz Perez |
| 7 | `create_djs_artistas_table` | `djs_artistas` | — | Daniel Santiago Hernandez Daza |
| 8 | `create_eventos_table` | `eventos` | `zonas`, `djs_artistas` | Denis Yuliet Monsalve Diaz |
| 9 | `create_reservas_table` | `reservas` | `clientes`, `mesas`, `eventos`, `empleados` | Fabio Andrés Mora Garcia |
| 10 | `create_entradas_table` | `entradas` | `clientes`, `eventos` | Hector David Velasquez Lopez |
| 11 | `create_categorias_producto_table` | `categorias_producto` | — | Jhoan Sebastian Alfaro Robayo |
| 12 | `create_proveedores_table` | `proveedores` | — | Jhon Fredy Parrales Ontiveros |
| 13 | `create_productos_table` | `productos` | `categorias_producto`, `proveedores` | Juan Carlos Olaya Lozano |
| 14 | `create_inventarios_table` | `inventarios` | `productos` | Julian Andres Castaneda Gutierrez |
| 15 | `create_promociones_table` | `promociones` | `eventos` | Marlon Rojas Cortés |
| 16 | `create_ventas_table` | `ventas` | `clientes`, `empleados`, `mesas`, `promociones` | Michael Antonio Beltran Espinosa |
| 17 | `create_detalle_ventas_table` | `detalle_ventas` | `ventas`, `productos` | Santiago Giraldo Betancout |
| 18 | `create_tipos_pago_table` | `tipos_pago` | — | Anderson Alejandro Sanchez Martinez |
| 19 | `create_pagos_table` | `pagos` | `ventas`, `tipos_pago` | Sebastian Alexander Siachoque Triana |
| 20 | `create_incidencias_table` | `incidencias` | `empleados`, `zonas` | Yessika Magaly Jara Herrera |
| 21 | `create_devoluciones_table` | `devoluciones` | `ventas`, `empleados` | Andres Felipe Gil Lopez |
| 22 | `create_resenas_table` | `resenas` | `clientes`, `eventos` | Cristian Camilo Monroy Castro |
| 23 | `create_historial_reservas_table` | `historial_reservas` | `reservas`, `empleados` | Edwar Stiven Trujillo Rojas |
| 24 | `create_cargos_empleado_table` | `cargos_empleado` | `empleados` | Erika Andrea Gonzalez Ramos |
| 25 | `create_objetos_perdidos_table` | `objetos_perdidos` | `zonas`, `empleados`, `clientes` | Jhanpol Parra Barreto |
| 26 | `create_personal_seguridad_table` | `personal_seguridad` | `empleados` | Johan Alexis Salas Restrepo |
| 27 | `create_turnos_table` | `turnos` | `empleados` | Marlon Aswin Baldemar Niño Turriago |
| 28 | `create_listas_negras_table` | `listas_negras` | `clientes`, `empleados` | Pedro David Bonilla Alvarez |
| 29 | `create_ordenes_compra_table` | `ordenes_compra` | `proveedores`, `empleados` | Raul Ramirez Llamas |
| 30 | `create_movimientos_inventario_table` | `movimientos_inventario` | `productos`, `empleados` | Sergio Orlando Velandia Quevedo |

---

## Base de datos (Docker)

El puerto **3306** suele estar ocupado por otros contenedores. Este proyecto usa:

| Servicio | Puerto |
|----------|--------|
| MySQL (`c_mysql`) | **3308** |
| phpMyAdmin (`c_phpmyadmin`) | **8881** |

```bash
docker compose up -d
```

En `.env`:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3308
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=1234
```

---

## Cómo correr las migraciones

```bash
php artisan migrate
php artisan migrate:rollback
```

Si algo falla por FK:

```bash
php artisan migrate:fresh
```

> `migrate:fresh` borra todas las tablas y las vuelve a crear. Solo en desarrollo.

---

## Diagrama rápido de relaciones

```
roles 1──* usuarios 1──1 empleados
zonas 1──* mesas
zonas 1──* eventos *──1 djs_artistas
clientes / mesas / eventos / empleados ──* reservas
reservas / empleados ──* historial_reservas
clientes / eventos ──* entradas
clientes / eventos ──* resenas
categorias_producto 1──* productos *──1 proveedores
productos 1──* inventarios
eventos 1──* promociones
clientes / empleados / mesas / promociones ──* ventas
ventas 1──* detalle_ventas *──1 productos
tipos_pago 1──* pagos *──1 ventas
ventas / empleados ──* devoluciones
empleados / zonas ──* incidencias
empleados 1──1 cargos_empleado
empleados 1──1 personal_seguridad
empleados 1──* turnos
clientes / empleados ──* listas_negras
proveedores / empleados ──* ordenes_compra
productos / empleados ──* movimientos_inventario
zonas / empleados / clientes ──* objetos_perdidos
```
