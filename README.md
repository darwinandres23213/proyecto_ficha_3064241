# Sistema de Discoteca — Diccionario de Datos (Laravel)

Proyecto de gestión para discoteca con **19 entidades**.  
- **Instructor:** `roles` y `usuarios`  
- **Estudiantes:** 17 entidades restantes (una por persona)  

Documentación completa: [`diccionario_datos_discoteca.md`](./diccionario_datos_discoteca.md)

---

## Orden de creación de migraciones

Las tablas deben crearse **en este orden** para que las foreign keys no fallen (`SQLSTATE[HY000]: General error: 1005 ... Foreign key constraint is incorrectly formed`).

| Orden | Migración sugerida | Tabla | Depende de | Encargado |
|------:|--------------------|-------|------------|-----------|
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
| 12 | `create_proveedores_table` | `proveedores` | — | Jhon Fredy Parales Ontiveros |
| 13 | `create_productos_table` | `productos` | `categorias_producto`, `proveedores` | Juan Carlos Olaya Lozano |
| 14 | `create_inventarios_table` | `inventarios` | `productos` | Julian Andres Castaneda Gutierrez |
| 15 | `create_promociones_table` | `promociones` | `eventos` | Marlon Rojas Cortés |
| 16 | `create_ventas_table` | `ventas` | `clientes`, `empleados`, `mesas`, `promociones` | Michael Antonio Beltran Espinosa |
| 17 | `create_detalle_ventas_table` | `detalle_ventas` | `ventas`, `productos` | Santiago Giraldo Betancour |
| 18 | `create_pagos_table` | `pagos` | `ventas` | Sebastian Alexander Siachoque Triana |
| 19 | `create_incidencias_table` | `incidencias` | `empleados`, `zonas` | Yessika Magaly Jara Herrera |

---

## Asignación rápida

### Instructor (2)
| Tabla | Encargado |
|-------|-----------|
| `roles` | Instructor |
| `usuarios` | Instructor |

### Estudiantes (17)
| # | Tabla | Estudiante |
|--:|-------|------------|
| 1 | `empleados` | Brayan Chavarro Giraldo |
| 2 | `clientes` | Brayann Orlando Caicedo Tibaquirá |
| 3 | `zonas` | Caren Lizeth Rodriguez Rojas |
| 4 | `mesas` | Carlos Tulio Quiroz Perez |
| 5 | `djs_artistas` | Daniel Santiago Hernandez Daza |
| 6 | `eventos` | Denis Yuliet Monsalve Diaz |
| 7 | `reservas` | Fabio Andrés Mora Garcia |
| 8 | `entradas` | Hector David Velasquez Lopez |
| 9 | `categorias_producto` | Jhoan Sebastian Alfaro Robayo |
| 10 | `proveedores` | Jhon Fredy Parales Ontiveros |
| 11 | `productos` | Juan Carlos Olaya Lozano |
| 12 | `inventarios` | Julian Andres Castaneda Gutierrez |
| 13 | `promociones` | Marlon Rojas Cortés |
| 14 | `ventas` | Michael Antonio Beltran Espinosa |
| 15 | `detalle_ventas` | Santiago Giraldo Betancour |
| 16 | `pagos` | Sebastian Alexander Siachoque Triana |
| 17 | `incidencias` | Yessika Magaly Jara Herrera |

---

## Por qué este orden

```
NIVEL 1 (sin FK)     roles · clientes · zonas · djs_artistas · categorias_producto · proveedores
        │
NIVEL 2              usuarios ← roles
                     mesas ← zonas
                     eventos ← zonas + djs_artistas
                     productos ← categorias_producto + proveedores
                     promociones ← eventos
        │
NIVEL 3              empleados ← usuarios
                     inventarios ← productos
                     reservas ← clientes + mesas + eventos + empleados
                     entradas ← clientes + eventos
                     ventas ← clientes + empleados + mesas + promociones
                     incidencias ← empleados + zonas
        │
NIVEL 4              detalle_ventas ← ventas + productos
                     pagos ← ventas
```

**Regla:** siempre crear primero la tabla **padre** y después la tabla **hija** que tiene el `foreignId`.

### Entidades nuevas (para llegar a 19)
| Tabla | Para qué sirve |
|-------|----------------|
| `entradas` | Control de boletas / ingreso a eventos |
| `incidencias` | Reportes de seguridad o novedades en el local |

---

## Ejemplo de timestamps (para forzar el orden)

En Laravel el orden lo define el prefijo de fecha/hora del archivo:

```
2026_07_29_000001_create_roles_table.php
2026_07_29_000002_create_usuarios_table.php
2026_07_29_000003_create_empleados_table.php
2026_07_29_000004_create_clientes_table.php
2026_07_29_000005_create_zonas_table.php
2026_07_29_000006_create_mesas_table.php
2026_07_29_000007_create_djs_artistas_table.php
2026_07_29_000008_create_eventos_table.php
2026_07_29_000009_create_reservas_table.php
2026_07_29_000010_create_entradas_table.php
2026_07_29_000011_create_categorias_producto_table.php
2026_07_29_000012_create_proveedores_table.php
2026_07_29_000013_create_productos_table.php
2026_07_29_000014_create_inventarios_table.php
2026_07_29_000015_create_promociones_table.php
2026_07_29_000016_create_ventas_table.php
2026_07_29_000017_create_detalle_ventas_table.php
2026_07_29_000018_create_pagos_table.php
2026_07_29_000019_create_incidencias_table.php
```

---

## Cómo correr las migraciones

```bash
php artisan migrate
```

Si algo falla por FK:

```bash
php artisan migrate:fresh
```

> `migrate:fresh` borra todas las tablas y las vuelve a crear en orden. Úsalo solo en desarrollo.

---

## Ejemplo de FK en Laravel

```php
$table->foreignId('rol_id')
      ->constrained('roles')
      ->cascadeOnUpdate()
      ->restrictOnDelete();

$table->foreignId('cliente_id')->constrained('clientes')->restrictOnDelete();
$table->foreignId('evento_id')->constrained('eventos')->restrictOnDelete();

$table->foreignId('empleado_id')->constrained('empleados')->restrictOnDelete();
$table->foreignId('zona_id')->nullable()->constrained('zonas')->nullOnDelete();
```

---

## Diagrama rápido de relaciones

```
roles 1──* usuarios 1──1 empleados
zonas 1──* mesas
zonas 1──* eventos *──1 djs_artistas
clientes / mesas / eventos / empleados ──* reservas
clientes / eventos ──* entradas
categorias_producto 1──* productos *──1 proveedores
productos 1──1 inventarios
eventos 1──* promociones
clientes / empleados / mesas / promociones ──* ventas
ventas 1──* detalle_ventas *──1 productos
ventas 1──* pagos
empleados / zonas ──* incidencias
```
