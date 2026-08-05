# Diccionario de Datos — Sistema de Discoteca (Laravel)

**Proyecto:** Gestión de discoteca  
**Framework:** Laravel (migraciones Eloquent)  
**Cantidad de entidades:** 19  
**Fecha:** 29 de julio de 2026  

> Numeradas en el **orden de creación** (padre → hija).  
> `roles` y `usuarios` → **Instructor**. Las demás → estudiantes.  
> Ver también [`README.md`](./README.md).

---

## Resumen (orden de creación)

| # | Entidad | Tabla | Depende de | Encargado |
|---|---------|-------|------------|-----------|
| 1 | Rol | `roles` | — | **Instructor** |
| 2 | Usuario | `usuarios` | `roles` | **Instructor** |
| 3 | Empleado | `empleados` | `usuarios` | Brayan Chavarro Giraldo |
| 4 | Cliente | `clientes` | — | Brayann Orlando Caicedo Tibaquirá |
| 5 | Zona | `zonas` | — | Caren Lizeth Rodriguez Rojas |
| 6 | Mesa | `mesas` | `zonas` | Carlos Tulio Quiroz Perez |
| 7 | DJ / Artista | `djs_artistas` | — | Daniel Santiago Hernandez Daza |
| 8 | Evento | `eventos` | `zonas`, `djs_artistas` | Denis Yuliet Monsalve Diaz |
| 9 | Reserva | `reservas` | `clientes`, `mesas`, `eventos`, `empleados` | Fabio Andrés Mora Garcia |
| 10 | Entrada | `entradas` | `clientes`, `eventos` | Hector David Velasquez Lopez |
| 11 | Categoría de producto | `categorias_producto` | — | Jhoan Sebastian Alfaro Robayo |
| 12 | Proveedor | `proveedores` | — | Jhon Fredy Parales Ontiveros |
| 13 | Producto | `productos` | `categorias_producto`, `proveedores` | Juan Carlos Olaya Lozano |
| 14 | Inventario | `inventarios` | `productos` | Julian Andres Castaneda Gutierrez |
| 15 | Promoción | `promociones` | `eventos` | Marlon Rojas Cortés |
| 16 | Venta | `ventas` | `clientes`, `empleados`, `mesas`, `promociones` | Michael Antonio Beltran Espinosa |
| 17 | Detalle de venta | `detalle_ventas` | `ventas`, `productos` | Santiago Giraldo Betancour |
| 18 | Pago | `pagos` | `ventas` | Sebastian Alexander Siachoque Triana |
| 19 | Incidencia | `incidencias` | `empleados`, `zonas` | Yessika Magaly Jara Herrera |

---

## 1. Rol — `roles`

**Encargado:** Instructor  
**Descripción:** Define los perfiles de acceso del sistema (administrador, cajero, mesero, seguridad, etc.).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del rol |
| nombre | string | VARCHAR | 50 | No | No | Sí | No | Nombre del rol |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción de permisos |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo (default: true) |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Un rol tiene muchos usuarios (`hasMany`).

---

## 2. Usuario — `usuarios`

**Encargado:** Instructor  
**Descripción:** Credenciales de acceso al sistema vinculadas a un rol.  
**Depende de:** `roles`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del usuario |
| rol_id | foreignId | BIGINT | — | No | Sí → `roles.id` | No | No | Rol asignado |
| nombre | string | VARCHAR | 100 | No | No | No | No | Nombre completo |
| email | string | VARCHAR | 150 | No | No | Sí | No | Correo de acceso |
| password | string | VARCHAR | 255 | No | No | No | No | Contraseña hasheada |
| telefono | string | VARCHAR | 20 | No | No | No | Sí | Teléfono de contacto |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un rol (`belongsTo`). Un usuario puede estar asociado a un empleado (`hasOne`).

---

## 3. Empleado — `empleados`

**Encargado:** Brayan Chavarro Giraldo  
**Descripción:** Personal operativo de la discoteca (meseros, bartenders, seguridad, cajeros).  
**Depende de:** `usuarios`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del empleado |
| usuario_id | foreignId | BIGINT | — | No | Sí → `usuarios.id` | Sí | Sí | Usuario del sistema (opcional) |
| documento | string | VARCHAR | 20 | No | No | Sí | No | Documento de identidad |
| nombres | string | VARCHAR | 80 | No | No | No | No | Nombres |
| apellidos | string | VARCHAR | 80 | No | No | No | No | Apellidos |
| cargo | string | VARCHAR | 60 | No | No | No | No | Cargo laboral |
| fecha_ingreso | date | DATE | — | No | No | No | No | Fecha de ingreso |
| salario | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Salario base |
| estado | enum | ENUM | — | No | No | No | No | activo, inactivo, vacaciones |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un usuario (`belongsTo`). Atiende muchas reservas, ventas e incidencias (`hasMany`).

---

## 4. Cliente — `clientes`

**Encargado:** Brayann Orlando Caicedo Tibaquirá  
**Descripción:** Personas que asisten o reservan en la discoteca.  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del cliente |
| documento | string | VARCHAR | 20 | No | No | Sí | No | Documento de identidad |
| nombres | string | VARCHAR | 80 | No | No | No | No | Nombres |
| apellidos | string | VARCHAR | 80 | No | No | No | No | Apellidos |
| email | string | VARCHAR | 150 | No | No | Sí | Sí | Correo electrónico |
| telefono | string | VARCHAR | 20 | No | No | No | No | Teléfono |
| fecha_nacimiento | date | DATE | — | No | No | No | Sí | Para control de mayoría de edad |
| tipo | enum | ENUM | — | No | No | No | No | regular, vip, corporativo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchas reservas, entradas y ventas (`hasMany`).

---

## 5. Zona — `zonas`

**Encargado:** Caren Lizeth Rodriguez Rojas  
**Descripción:** Áreas físicas del local (pista, VIP, terraza, lounge, barra).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la zona |
| nombre | string | VARCHAR | 80 | No | No | Sí | No | Nombre de la zona |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción del área |
| aforo_maximo | unsignedInteger | INT | — | No | No | No | No | Capacidad máxima de personas |
| precio_cover | decimal | DECIMAL(10,2) | 10,2 | No | No | No | Sí | Cover charge de la zona |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible/No disponible |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchas mesas, eventos e incidencias (`hasMany`).

---

## 6. Mesa — `mesas`

**Encargado:** Carlos Tulio Quiroz Perez  
**Descripción:** Mesas o botelleros ubicados dentro de una zona.  
**Depende de:** `zonas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la mesa |
| zona_id | foreignId | BIGINT | — | No | Sí → `zonas.id` | No | No | Zona a la que pertenece |
| numero | string | VARCHAR | 10 | No | No | Sí | No | Número o código de mesa |
| capacidad | unsignedTinyInteger | TINYINT | — | No | No | No | No | Personas que admite |
| tipo | enum | ENUM | — | No | No | No | No | estandar, vip, botellero |
| estado | enum | ENUM | — | No | No | No | No | libre, ocupada, reservada, mantenimiento |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a una zona (`belongsTo`). Tiene muchas reservas (`hasMany`).

---

## 7. DJ / Artista — `djs_artistas`

**Encargado:** Daniel Santiago Hernandez Daza  
**Descripción:** DJs y artistas que se presentan en la discoteca.  
**Depende de:** ninguna  
**Importante:** se crea **antes** que `eventos`.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del artista |
| nombre_artistico | string | VARCHAR | 100 | No | No | Sí | No | Nombre artístico |
| nombre_real | string | VARCHAR | 120 | No | No | No | Sí | Nombre real |
| genero_musical | string | VARCHAR | 60 | No | No | No | No | Género principal |
| biografia | text | TEXT | — | No | No | No | Sí | Biografía breve |
| contacto | string | VARCHAR | 100 | No | No | No | Sí | Teléfono o email de booking |
| cache_base | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Caché o tarifa base |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible para contratar |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos eventos (`hasMany`).

---

## 8. Evento — `eventos`

**Encargado:** Denis Yuliet Monsalve Diaz  
**Descripción:** Noches temáticas, fiestas especiales o fechas programadas.  
**Depende de:** `zonas`, `djs_artistas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del evento |
| zona_id | foreignId | BIGINT | — | No | Sí → `zonas.id` | No | Sí | Zona principal del evento |
| dj_artista_id | foreignId | BIGINT | — | No | Sí → `djs_artistas.id` | No | Sí | Artista principal |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre del evento |
| descripcion | text | TEXT | — | No | No | No | Sí | Detalle promocional |
| fecha_inicio | dateTime | DATETIME | — | No | No | No | No | Inicio del evento |
| fecha_fin | dateTime | DATETIME | — | No | No | No | No | Fin del evento |
| aforo | unsignedInteger | INT | — | No | No | No | No | Aforo permitido |
| precio_entrada | decimal | DECIMAL(10,2) | 10,2 | No | No | No | No | Precio de entrada |
| estado | enum | ENUM | — | No | No | No | No | programado, en_curso, finalizado, cancelado |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a zona y DJ (`belongsTo`). Tiene muchas reservas, entradas y promociones (`hasMany`).

---

## 9. Reserva — `reservas`

**Encargado:** Fabio Andrés Mora Garcia  
**Descripción:** Reservas de mesa o cupo para un evento.  
**Depende de:** `clientes`, `mesas`, `eventos`, `empleados`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la reserva |
| cliente_id | foreignId | BIGINT | — | No | Sí → `clientes.id` | No | No | Cliente que reserva |
| mesa_id | foreignId | BIGINT | — | No | Sí → `mesas.id` | No | Sí | Mesa reservada |
| evento_id | foreignId | BIGINT | — | No | Sí → `eventos.id` | No | Sí | Evento asociado |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | Sí | Empleado que tomó la reserva |
| fecha_reserva | dateTime | DATETIME | — | No | No | No | No | Fecha y hora reservada |
| cantidad_personas | unsignedTinyInteger | TINYINT | — | No | No | No | No | Número de asistentes |
| anticipo | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Valor del anticipo |
| observaciones | text | TEXT | — | No | No | No | Sí | Notas adicionales |
| estado | enum | ENUM | — | No | No | No | No | pendiente, confirmada, cancelada, asistio |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a cliente, mesa, evento y empleado (`belongsTo`).

---

## 10. Entrada — `entradas`

**Encargado:** Hector David Velasquez Lopez  
**Descripción:** Boletas o tickets de ingreso a un evento.  
**Depende de:** `clientes`, `eventos`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la entrada |
| cliente_id | foreignId | BIGINT | — | No | Sí → `clientes.id` | No | No | Cliente comprador |
| evento_id | foreignId | BIGINT | — | No | Sí → `eventos.id` | No | No | Evento al que ingresa |
| codigo | string | VARCHAR | 40 | No | No | Sí | No | Código único de la boleta |
| tipo | enum | ENUM | — | No | No | No | No | general, vip, cortesia |
| precio | decimal | DECIMAL(10,2) | 10,2 | No | No | No | No | Valor pagado |
| fecha_compra | dateTime | DATETIME | — | No | No | No | No | Fecha de compra |
| fecha_uso | dateTime | DATETIME | — | No | No | No | Sí | Momento de validación en puerta |
| estado | enum | ENUM | — | No | No | No | No | comprada, usada, anulada |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a cliente y evento (`belongsTo`).

---

## 11. Categoría de producto — `categorias_producto`

**Encargado:** Jhoan Sebastian Alfaro Robayo  
**Descripción:** Clasificación del catálogo (licores, cocteles, cervezas, snacks, etc.).  
**Depende de:** ninguna

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la categoría |
| nombre | string | VARCHAR | 80 | No | No | Sí | No | Nombre de la categoría |
| descripcion | string | VARCHAR | 255 | No | No | No | Sí | Descripción corta |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activa/Inactiva |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos productos (`hasMany`).

---

## 12. Proveedor — `proveedores`

**Encargado:** Jhon Fredy Parales Ontiveros  
**Descripción:** Empresas o personas que abastecen productos a la discoteca.  
**Depende de:** ninguna  
**Importante:** se crea **antes** que `productos`.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del proveedor |
| nit | string | VARCHAR | 20 | No | No | Sí | No | NIT o documento |
| razon_social | string | VARCHAR | 150 | No | No | No | No | Nombre o razón social |
| contacto | string | VARCHAR | 100 | No | No | No | Sí | Persona de contacto |
| telefono | string | VARCHAR | 20 | No | No | No | No | Teléfono |
| email | string | VARCHAR | 150 | No | No | No | Sí | Correo electrónico |
| direccion | string | VARCHAR | 200 | No | No | No | Sí | Dirección |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activo/Inactivo |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Tiene muchos productos (`hasMany`).

---

## 13. Producto — `productos`

**Encargado:** Juan Carlos Olaya Lozano  
**Descripción:** Bebidas, licores, botellas y snacks que se venden en barra.  
**Depende de:** `categorias_producto`, `proveedores`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del producto |
| categoria_id | foreignId | BIGINT | — | No | Sí → `categorias_producto.id` | No | No | Categoría del producto |
| proveedor_id | foreignId | BIGINT | — | No | Sí → `proveedores.id` | No | Sí | Proveedor principal |
| codigo | string | VARCHAR | 30 | No | No | Sí | No | Código interno o SKU |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre comercial |
| descripcion | text | TEXT | — | No | No | No | Sí | Descripción del producto |
| precio_venta | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Precio al público |
| precio_compra | decimal | DECIMAL(12,2) | 12,2 | No | No | No | Sí | Costo de adquisición |
| unidad_medida | string | VARCHAR | 20 | No | No | No | No | unidad, botella, shot, ml |
| estado | boolean | TINYINT | 1 | No | No | No | No | Disponible para venta |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a categoría y proveedor (`belongsTo`). Tiene inventario y detalles de venta (`hasMany` / `hasOne`).

---

## 14. Inventario — `inventarios`

**Encargado:** Julian Andres Castaneda Gutierrez  
**Descripción:** Control de stock de cada producto en bodega o barra.  
**Depende de:** `productos`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del registro |
| producto_id | foreignId | BIGINT | — | No | Sí → `productos.id` | Sí | No | Producto controlado |
| stock_actual | unsignedInteger | INT | — | No | No | No | No | Cantidad disponible |
| stock_minimo | unsignedInteger | INT | — | No | No | No | No | Umbral de alerta |
| ubicacion | string | VARCHAR | 80 | No | No | No | Sí | Bodega, barra principal, VIP |
| ultima_entrada | dateTime | DATETIME | — | No | No | No | Sí | Última reposición |
| ultima_salida | dateTime | DATETIME | — | No | No | No | Sí | Última salida por venta |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a un producto (`belongsTo`).

---

## 15. Promoción — `promociones`

**Encargado:** Marlon Rojas Cortés  
**Descripción:** Descuentos, 2x1, happy hour u ofertas por evento.  
**Depende de:** `eventos`  
**Importante:** se crea **antes** que `ventas`.

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la promoción |
| evento_id | foreignId | BIGINT | — | No | Sí → `eventos.id` | No | Sí | Evento vinculado (opcional) |
| nombre | string | VARCHAR | 120 | No | No | No | No | Nombre de la promoción |
| descripcion | text | TEXT | — | No | No | No | Sí | Detalle de la oferta |
| tipo_descuento | enum | ENUM | — | No | No | No | No | porcentaje, valor_fijo, 2x1 |
| valor_descuento | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor o porcentaje a aplicar |
| fecha_inicio | dateTime | DATETIME | — | No | No | No | No | Inicio de vigencia |
| fecha_fin | dateTime | DATETIME | — | No | No | No | No | Fin de vigencia |
| estado | boolean | TINYINT | 1 | No | No | No | No | Activa/Inactiva |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Puede pertenecer a un evento (`belongsTo`). Se aplica en muchas ventas (`hasMany`).

---

## 16. Venta — `ventas`

**Encargado:** Michael Antonio Beltran Espinosa  
**Descripción:** Cabecera de la cuenta o factura de consumo en la discoteca.  
**Depende de:** `clientes`, `empleados`, `mesas`, `promociones`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la venta |
| cliente_id | foreignId | BIGINT | — | No | Sí → `clientes.id` | No | Sí | Cliente (si aplica) |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | No | Empleado que registra la venta |
| mesa_id | foreignId | BIGINT | — | No | Sí → `mesas.id` | No | Sí | Mesa asociada |
| promocion_id | foreignId | BIGINT | — | No | Sí → `promociones.id` | No | Sí | Promoción aplicada |
| numero_factura | string | VARCHAR | 30 | No | No | Sí | No | Número de factura/recibo |
| fecha_venta | dateTime | DATETIME | — | No | No | No | No | Fecha y hora de la venta |
| subtotal | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Subtotal sin descuentos |
| descuento | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor descontado |
| total | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Total a pagar |
| estado | enum | ENUM | — | No | No | No | No | abierta, pagada, anulada |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a cliente, empleado, mesa y promoción (`belongsTo`). Tiene muchos detalles y pagos (`hasMany`).

---

## 17. Detalle de venta — `detalle_ventas`

**Encargado:** Santiago Giraldo Betancour  
**Descripción:** Ítems consumidos en cada venta (líneas de factura).  
**Depende de:** `ventas`, `productos`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del detalle |
| venta_id | foreignId | BIGINT | — | No | Sí → `ventas.id` | No | No | Venta a la que pertenece |
| producto_id | foreignId | BIGINT | — | No | Sí → `productos.id` | No | No | Producto vendido |
| cantidad | unsignedInteger | INT | — | No | No | No | No | Cantidad vendida |
| precio_unitario | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Precio al momento de la venta |
| subtotal | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | cantidad × precio_unitario |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a venta y producto (`belongsTo`).

---

## 18. Pago — `pagos`

**Encargado:** Sebastian Alexander Siachoque Triana  
**Descripción:** Registro de medios y montos con los que se cancela una venta.  
**Depende de:** `ventas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único del pago |
| venta_id | foreignId | BIGINT | — | No | Sí → `ventas.id` | No | No | Venta pagada |
| metodo | enum | ENUM | — | No | No | No | No | efectivo, tarjeta, transferencia, mixtos |
| monto | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor pagado |
| referencia | string | VARCHAR | 80 | No | No | No | Sí | Número de transacción |
| fecha_pago | dateTime | DATETIME | — | No | No | No | No | Fecha y hora del pago |
| estado | enum | ENUM | — | No | No | No | No | exitoso, pendiente, fallido |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a una venta (`belongsTo`).

---

## 19. Incidencia — `incidencias`

**Encargado:** Yessika Magaly Jara Herrera  
**Descripción:** Novedades de seguridad o reportes operativos dentro del local.  
**Depende de:** `empleados`, `zonas`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la incidencia |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | No | Empleado que reporta |
| zona_id | foreignId | BIGINT | — | No | Sí → `zonas.id` | No | Sí | Zona donde ocurrió |
| titulo | string | VARCHAR | 120 | No | No | No | No | Título corto del reporte |
| descripcion | text | TEXT | — | No | No | No | No | Detalle de lo ocurrido |
| tipo | enum | ENUM | — | No | No | No | No | seguridad, mantenimiento, queja, otro |
| gravedad | enum | ENUM | — | No | No | No | No | baja, media, alta |
| fecha_reporte | dateTime | DATETIME | — | No | No | No | No | Fecha y hora del reporte |
| estado | enum | ENUM | — | No | No | No | No | abierta, en_proceso, cerrada |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a empleado y zona (`belongsTo`).

---

## 20. Devolución — `devoluciones`

**Encargado:** Anderson Alejandro Sanchez Martinez
**Descripción:** Registra las devoluciones o reembolsos asociados a una venta realizada.
**Depende de:** `ventas`, `empleados`

| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | bigIncrements | BIGINT | — | Sí | No | Sí | No | Identificador único de la devolución |
| venta_id | foreignId | BIGINT | — | No | Sí → `ventas.id` | No | No | Venta asociada a la devolución |
| empleado_id | foreignId | BIGINT | — | No | Sí → `empleados.id` | No | No | Empleado que registra o autoriza la devolución |
| motivo | text | TEXT | — | No | No | No | No | Motivo de la devolución |
| monto_devuelto | decimal | DECIMAL(12,2) | 12,2 | No | No | No | No | Valor reembolsado al cliente |
| metodo_reembolso | enum | ENUM | — | No | No | No | No | efectivo, tarjeta, transferencia |
| estado | enum | ENUM | — | No | No | No | No | pendiente, aprobada, rechazada |
| fecha_devolucion | dateTime | DATETIME | — | No | No | No | No | Fecha y hora en que se realizó la devolución |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |

**Relaciones:** Pertenece a una venta y a un empleado (`belongsTo`).

---

## 21. Tipo de pago  —  `tipo_pago`

**Encargado:** Aswin Turriago
**Descripción:** Clasificación de las diferentes formas de pago disponibles en el establecimiento (PSE, Daviplata, Nequi, tarjeta, efectivo, entre otras).
**Depende de:** Ninguna

| Campo       | Tipo Laravel  | Tipo BD   | Longitud | PK | FK | Único | Nulo | Descripción                               |
| ----------- | ------------- | --------- | -------- | -- | -- | ----- | ---- | ----------------------------------------- |
| id          | bigIncrements | BIGINT    | —        | Sí | No | Sí    | No   | Identificador único del tipo de pago      |
| nombre      | string        | VARCHAR   | 80       | No | No | Sí    | No   | Nombre del tipo de pago                   |
| descripcion | string        | VARCHAR   | 255      | No | No | No    | Sí   | Descripción corta del tipo de pago        |
| estado      | boolean       | TINYINT   | 1        | No | No | No    | No   | Estado del tipo de pago (Activo/Inactivo) |
| created_at  | timestamp     | TIMESTAMP | —        | No | No | No    | Sí   | Fecha de creación                         |
| updated_at  | timestamp     | TIMESTAMP | —        | No | No | No    | Sí   | Fecha de actualización                    |

**Relaciones:** Ninguna.


---

## 22. Historial de reserva — historial_reservas
 
*Encargado:* Erika Gonzalez 
*Descripción:* Registra la trazabilidad de cambios de estado de una reserva (creación, edición, eliminación, recuperación).  
*Depende de:* reservas, empleados
 
| Campo | Tipo Laravel | Tipo BD | Longitud | PK | FK | Único | Nulo | Descripción |
|-------|--------------|---------|----------|----|----|-------|------|-------------|
| id | id | BIGINT | — | Sí | No | Sí | No | Identificador único del historial |
| reserva_id | unsignedBigInteger | BIGINT | — | No | Sí → reservas.id | No | No | Reserva asociada |
| empleado_id | unsignedBigInteger | BIGINT | — | No | Sí → empleados.id | No | No | Empleado que realizó la acción |
| accion | enum | ENUM | — | No | No | No | No | creada, editada, eliminada, recuperada |
| estado_anterior | string | VARCHAR | 255 | No | No | No | Sí | Estado de la reserva antes del cambio |
| estado_nuevo | string | VARCHAR | 255 | No | No | No | Sí | Estado de la reserva después del cambio |
| observaciones | string | VARCHAR | 255 | No | No | No | Sí | Notas adicionales sobre la acción |
| created_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de creación |
| updated_at | timestamp | TIMESTAMP | — | No | No | No | Sí | Fecha de actualización |
 
*Relaciones:* Pertenece a una reserva y a un empleado (belongsTo).

---

## 23. Cargo de Empleado — `cargos_empleado`

**Encargado:** Raul Ramirez
**Descripción:** Almacena el cargo asignado a cada empleado dentro del establecimiento.
**Depende de:** `empleados`

| Campo       | Tipo Laravel  | Tipo BD   | Longitud | PK | FK                  | Único | Nulo | Descripción                                        |
| ----------- | ------------- | --------- | -------- | -- | ------------------- | ----- | ---- | -------------------------------------------------- |
| id          | bigIncrements | BIGINT    | —        | Sí | No                  | Sí    | No   | Identificador único del registro                   |
| empleado_id | foreignId     | BIGINT    | —        | No | Sí → `empleados.id` | Sí    | No   | Empleado al que se le asigna el cargo              |
| nombre      | string        | VARCHAR   | 100      | No | No                  | No    | No   | Nombre del cargo (Mesero, Bartender, Cajero, etc.) |
| descripcion | text          | TEXT      | —        | No | No                  | No    | Sí   | Descripción de las funciones del cargo             |
| created_at  | timestamp     | TIMESTAMP | —        | No | No                  | No    | Sí   | Fecha de creación                                  |
| updated_at  | timestamp     | TIMESTAMP | —        | No | No                  | No    | Sí   | Fecha de actualización                             |

**Relaciones:** Pertenece a un empleado (`belongsTo`). Cada empleado tiene un único cargo registrado (`hasOne`).

---
## 24. Membresía — `membresias`

**Encargado:** Andres Gil
**Descripción:** Almacena la información de las membresías asignadas a los clientes, incluyendo su tipo, vigencia y beneficios.
**Depende de:** `clientes`

| Campo             | Tipo Laravel       | Tipo BD   | Longitud | PK | FK                 | Único | Nulo | Descripción                                            |
| ----------------- | ------------------ | --------- | -------- | -- | ------------------ | ----- | ---- | ------------------------------------------------------ |
| id                | bigIncrements      | BIGINT    | —        | Sí | No                 | Sí    | No   | Identificador único de la membresía                    |
| id_cliente        | unsignedBigInteger | BIGINT    | —        | No | Sí → `clientes.id` | No    | No   | Cliente al que pertenece la membresía                  |
| tipo_membresia    | string             | VARCHAR   | 50       | No | No                 | No    | No   | Bronce, Plata, Oro, VIP                                |
| puntos_acumulados | integer            | INT       | —        | No | No                 | No    | No   | Puntos acumulados por el cliente (default: 0)          |
| fecha_inicio      | date               | DATE      | —        | No | No                 | No    | No   | Fecha de inicio de la membresía                        |
| fecha_vencimiento | date               | DATE      | —        | No | No                 | No    | Sí   | Fecha de vencimiento de la membresía                   |
| estado            | string             | VARCHAR   | 20       | No | No                 | No    | No   | Activa, Vencida, Cancelada (default: Activa)           |
| beneficios        | text               | TEXT      | —        | No | No                 | No    | Sí   | Descripción de los beneficios asociados a la membresía |
| created_at        | timestamp          | TIMESTAMP | —        | No | No                 | No    | Sí   | Fecha de creación                                      |
| updated_at        | timestamp          | TIMESTAMP | —        | No | No                 | No    | Sí   | Fecha de actualización                                 |

**Relaciones:** Pertenece a un cliente (`belongsTo`). Un cliente puede tener una o varias membresías (`hasMany`).

---

## 25. Seguridad — `seguridad`

**Encargado:** Edwar Stiven Trujillo Rojas

**Descripción:** Personal de seguridad encargado de la vigilancia, el control de acceso y el mantenimiento del orden dentro de la discoteca.

**Depende de:** `empleados`

| Campo             | Tipo Laravel  | Tipo BD   | Longitud | PK | FK                  | Único | Nulo | Descripción                                   |
| ----------------- | ------------- | --------- | -------- | -- | ------------------- | ----- | ---- | --------------------------------------------- |
| id                | bigIncrements | BIGINT    | —        | Sí | No                  | Sí    | No   | Identificador único del registro de seguridad |
| empleado_id       | foreignId     | BIGINT    | —        | No | Sí → `empleados.id` | Sí    | No   | Empleado asignado como personal de seguridad  |
| empresa_seguridad | string        | VARCHAR   | 100      | No | No                  | No    | Sí   | Empresa de seguridad (si es externa)          |
| cargo             | string        | VARCHAR   | 50       | No | No                  | No    | No   | Cargo del personal de seguridad               |
| turno             | enum          | ENUM      | —        | No | No                  | No    | No   | Turno de trabajo (Día, Noche o Rotativo)      |
| licencia          | string        | VARCHAR   | 50       | No | No                  | Sí    | Sí   | Número de licencia o acreditación             |
| estado            | boolean       | TINYINT   | 1        | No | No                  | No    | No   | Estado del personal (Activo/Inactivo)         |
| created_at        | timestamp     | TIMESTAMP | —        | No | No                  | No    | Sí   | Fecha de creación                             |
| updated_at        | timestamp     | TIMESTAMP | —        | No | No                  | No    | Sí   | Fecha de actualización                        |

**Relaciones:** Pertenece a un empleado (`belongsTo`). Cada empleado puede tener un único registro de seguridad (`hasOne`).

---

## Diagrama de relaciones (resumen)

```
roles 1──* usuarios 1──1 empleados
zonas 1──* mesas
djs_artistas 1──* eventos *──1 zonas
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

---

## Convención de claves foráneas (Laravel)

```php
$table->foreignId('rol_id')->constrained('roles')->cascadeOnUpdate()->restrictOnDelete();
```

En detalles (`detalle_ventas`, `pagos`) se recomienda `cascadeOnDelete()` cuando el hijo no tiene sentido sin el padre.
