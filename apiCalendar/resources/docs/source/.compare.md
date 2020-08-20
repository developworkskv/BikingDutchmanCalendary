---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#ADMINISTRACION


<!-- START_d94b5a6b67136beff37ad88da413309c -->
## ADMINISTRACION USUARIO-ADMINISTRADOR.

Buscar por Id los datos del Usuario-Administrador. Table: bd_user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dataUserById/1?alias_name=bra&user_password=abcd" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"bryan","contrase\u00f1a":"abcd"}'

```

```javascript
const url = new URL(
    "http://localhost/api/dataUserById/1"
);

let params = {
    "alias_name": "bra",
    "user_password": "abcd",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "bryan",
    "contrase\u00f1a": "abcd"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "id_user": "1",
        "email": "br@gmail.com",
        "name": "Bra"
    }
}
```

### HTTP Request
`GET api/dataUserById/{id_user}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `alias_name` |  required  | Nombre del usuario.
    `user_password` |  required  | Contraseña del usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nombre` | string |  required  | usuario.
        `contraseña` | string |  required  | Contraseña del usuario'.
    
<!-- END_d94b5a6b67136beff37ad88da413309c -->

<!-- START_7d95b9b4f9f2621631b4641ea0633320 -->
## Leer Data Email.

Obtener el dato "Email" del Usuario-Administrador

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dataUserByEmail/1?user=bra&email=br%40gmail.com" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"bryan","email":"br@gmail.com"}'

```

```javascript
const url = new URL(
    "http://localhost/api/dataUserByEmail/1"
);

let params = {
    "user": "bra",
    "email": "br@gmail.com",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "bryan",
    "email": "br@gmail.com"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/dataUserByEmail/{email_user}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `user` |  required  | Nombre del usuario.
    `email` |  required  | Email del usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | string |  required  | usuario.
        `email` | string |  required  | email.
    
<!-- END_7d95b9b4f9f2621631b4641ea0633320 -->

<!-- START_88c250988c0b04ec97d80e23b481eb32 -->
## Crear Usuario-Administrador.

insertar usuarios para ingresar al sistema. Table: bd_user
Guardar los datos del usuario.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/adminCreate?name=Bryan&fechaNacimiento=18%2F05%2F1997&gender=Macho&dni=1724005827&password=bra1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nombre":"Bryan","apellido":"Roblero","email":"br@gmail.com","fechaNacimiento":"18\/05\/1997","genero":"Masculino","dni":"1724005827","clave":"bra1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/adminCreate"
);

let params = {
    "name": "Bryan",
    "fechaNacimiento": "18/05/1997",
    "gender": "Macho",
    "dni": "1724005827",
    "password": "bra1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nombre": "Bryan",
    "apellido": "Roblero",
    "email": "br@gmail.com",
    "fechaNacimiento": "18\/05\/1997",
    "genero": "Masculino",
    "dni": "1724005827",
    "clave": "bra1"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": 1,
    "data": {
        "mensaje": "Usuario Creado"
    }
}
```

### HTTP Request
`POST api/adminCreate`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | Nombre del usuario.
    `fechaNacimiento` |  required  | Nombre del usuario.
    `gender` |  required  | Nombre del usuario.
    `dni` |  required  | Nombre del usuario.
    `password` |  required  | Clave.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `nombre` | string |  required  | Nombre.
        `apellido` | string |  required  | Apellido.
        `email` | string |  required  | Email.
        `fechaNacimiento` | string |  required  | Fecha de Nacimiento.
        `genero` | string |  required  | Genero.
        `dni` | string |  required  | Cedula.
        `clave` | string |  required  | Clave.
    
<!-- END_88c250988c0b04ec97d80e23b481eb32 -->

<!-- START_23257a326e6c7af8efd79ff52796bcf1 -->
## Mostrar Usuario-Administrador.

Todas los Usuarios

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminRead/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/adminRead/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/adminRead/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_23257a326e6c7af8efd79ff52796bcf1 -->

<!-- START_2665cec57a4716a6a51855ff9510411c -->
## Mostrar Administradores.

Todas los Administradores.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminById/1/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/adminById/1/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/adminById/{id_admin}/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_2665cec57a4716a6a51855ff9510411c -->

<!-- START_ee9b1ef7d72580c8db14fee5c778e911 -->
## Actualizar Usuario-Administrador.

Actualizar los datos del Usuario-Administrador.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/admin/1/update/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/admin/1/update/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/admin/{bd_users_id}/update/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_ee9b1ef7d72580c8db14fee5c778e911 -->

<!-- START_208484b4a7fc1b542de8857555f898a4 -->
## Eliminar Usuario-Administrador.

Eliminar a los Usuarios por Id.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminDelete/1/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/adminDelete/1/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/adminDelete/{id_admin}/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_208484b4a7fc1b542de8857555f898a4 -->

<!-- START_ed5c24aff650a5f0aa91039db6f42384 -->
## Mostrar Tipos de Usuarios.

Los roles que maneja el sistema.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/typesUser?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/typesUser"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/typesUser`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_ed5c24aff650a5f0aa91039db6f42384 -->

<!-- START_8f84e5d482eb4cbd68262b517164f482 -->
## ADMINISTRACION CIUDADES.

Insertar nuevas ciudades en el sistema.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/newCity/1?name=Quito" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"description":"Sierra"}'

```

```javascript
const url = new URL(
    "http://localhost/api/newCity/1"
);

let params = {
    "name": "Quito",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "description": "Sierra"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/newCity/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | name.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  required  | description.
    
<!-- END_8f84e5d482eb4cbd68262b517164f482 -->

<!-- START_22a8347e7ad7ca01afc6530993bc4b90 -->
## Mostrar Ciudades.

Todas las Ciudades registradas.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/citiesRead/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/citiesRead/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/citiesRead/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_22a8347e7ad7ca01afc6530993bc4b90 -->

<!-- START_aa257aea1a88c4d04ab63e31ce46a7f4 -->
## Mostrar Ciudades Por Parametro.

Buscar Ciudades por Id.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/getCityId/1/org/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/getCityId/1/org/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/getCityId/{id_city}/org/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_aa257aea1a88c4d04ab63e31ce46a7f4 -->

<!-- START_e8175e0adb586e69c308057cbfabb502 -->
## Actualizar Ciudades.

Actualizar los datos de la Ciudad.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/city/1/update/1/org?name=Quito&description=Sierra" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Quito","description":"Sierra"}'

```

```javascript
const url = new URL(
    "http://localhost/api/city/1/update/1/org"
);

let params = {
    "name": "Quito",
    "description": "Sierra",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Quito",
    "description": "Sierra"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/city/{id_city}/update/{id_org}/org`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | Nombre de la Ciudad.
    `description` |  required  | Descripcion.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | nombreCiudad.
        `description` | string |  required  | Descripcion.
    
<!-- END_e8175e0adb586e69c308057cbfabb502 -->

<!-- START_40250da2e84b9acc8809cc31d65447d3 -->
## Eliminar Ciudades.

Eliminar a las Ciudades por Id.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/deleteCity/1/org/1?id=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"1"}'

```

```javascript
const url = new URL(
    "http://localhost/api/deleteCity/1/org/1"
);

let params = {
    "id": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "1"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/deleteCity/{id_package}/org/{id_org}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | id_usuario.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | id_usuario.
    
<!-- END_40250da2e84b9acc8809cc31d65447d3 -->

#general


<!-- START_7bf0cfffa0d1c6bffbfc1dab2528175f -->
## api/conexionApiTest
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/conexionApiTest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/conexionApiTest"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "x": "Testing Conexion con el Api Calendar",
    "y": "DevelopWorKs"
}
```

### HTTP Request
`GET api/conexionApiTest`


<!-- END_7bf0cfffa0d1c6bffbfc1dab2528175f -->

<!-- START_ccd8d5be100573405dfb9fe38eab42f0 -->
## api/iniciarSesion
> Example request:

```bash
curl -X POST \
    "http://localhost/api/iniciarSesion" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/iniciarSesion"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/iniciarSesion`


<!-- END_ccd8d5be100573405dfb9fe38eab42f0 -->

<!-- START_ce6f0e60a625c016cec615d8cc646384 -->
## api/sesion/{token_email}/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sesion/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sesion/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/sesion/{token_email}/{id_org}`


<!-- END_ce6f0e60a625c016cec615d8cc646384 -->

<!-- START_47062fbb5b613307ff87b2a1015fb5ce -->
## api/packageCreate/{id_org}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/packageCreate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packageCreate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/packageCreate/{id_org}`


<!-- END_47062fbb5b613307ff87b2a1015fb5ce -->

<!-- START_42c937588873c12bbecfa78b02928220 -->
## api/packagesRead/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packagesRead/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packagesRead/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packagesRead/{id_org}`


<!-- END_42c937588873c12bbecfa78b02928220 -->

<!-- START_cb958151cbfc9155cac45e7adec80d85 -->
## api/packageById/{id_admin}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packageById/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packageById/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packageById/{id_admin}/org/{id_org}`


<!-- END_cb958151cbfc9155cac45e7adec80d85 -->

<!-- START_60766bd289098120df38066dcd4e431a -->
## api/package/{bd_users_id}/update/{id_org}/org
> Example request:

```bash
curl -X POST \
    "http://localhost/api/package/1/update/1/org" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/package/1/update/1/org"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/package/{bd_users_id}/update/{id_org}/org`


<!-- END_60766bd289098120df38066dcd4e431a -->

<!-- START_38370fa50d46ad9f0ffef2e090fcc771 -->
## api/packageDelete/{id_package}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packageDelete/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packageDelete/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packageDelete/{id_package}/org/{id_org}`


<!-- END_38370fa50d46ad9f0ffef2e090fcc771 -->

<!-- START_2efd561670e60033a15ce84b11390f46 -->
## api/packagesReadB
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packagesReadB" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packagesReadB"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/packagesReadB`


<!-- END_2efd561670e60033a15ce84b11390f46 -->

<!-- START_23999160cf1836526b2399bdf54477f4 -->
## api/testChatbot
> Example request:

```bash
curl -X POST \
    "http://localhost/api/testChatbot" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/testChatbot"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/testChatbot`


<!-- END_23999160cf1836526b2399bdf54477f4 -->

<!-- START_685a00cffc76919b1f8503ed2b342635 -->
## api/responseTest
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/responseTest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/responseTest"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/responseTest`


<!-- END_685a00cffc76919b1f8503ed2b342635 -->

<!-- START_e65df2963c4f1f0bfdd426ee5170e8b7 -->
## api/notifications
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/notifications`


<!-- END_e65df2963c4f1f0bfdd426ee5170e8b7 -->

<!-- START_b1f41b8828c93dc06fe5bb5b73b40eb7 -->
## api/destinations
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/destinations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/destinations`


<!-- END_b1f41b8828c93dc06fe5bb5b73b40eb7 -->

<!-- START_052005c4630f29a53d1f2737eee5403b -->
## api/destinoCreate/{id_org}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/destinoCreate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinoCreate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/destinoCreate/{id_org}`


<!-- END_052005c4630f29a53d1f2737eee5403b -->

<!-- START_18613b72bb5ccdb1a334b5597c08f753 -->
## api/destinoRead/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/destinoRead/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinoRead/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/destinoRead/{id_org}`


<!-- END_18613b72bb5ccdb1a334b5597c08f753 -->

<!-- START_960866a7a9c086d7e6264484bcc4b6fc -->
## api/destinoUpdate/{id_destino}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/destinoUpdate/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinoUpdate/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/destinoUpdate/{id_destino}/update`


<!-- END_960866a7a9c086d7e6264484bcc4b6fc -->

<!-- START_2d0626d936d21d9c4aaf96a80494c5f4 -->
## api/destinoDelete/{id_destino}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/destinoDelete/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinoDelete/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/destinoDelete/{id_destino}/org/{id_org}`


<!-- END_2d0626d936d21d9c4aaf96a80494c5f4 -->

<!-- START_502d1b10e479e24873add9aca9b8dbaa -->
## api/destinoById/{id_destino}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/destinoById/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinoById/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/destinoById/{id_destino}/org/{id_org}`


<!-- END_502d1b10e479e24873add9aca9b8dbaa -->

<!-- START_1e746e316cde623db3075370a27665d0 -->
## api/descargar-pdf/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/descargar-pdf/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/descargar-pdf/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/descargar-pdf/{id_org}`


<!-- END_1e746e316cde623db3075370a27665d0 -->

<!-- START_1fbe31f1b8bbe3db5d9fd85a6236eea7 -->
## api/trasnformUrlToDownloadPdf/{id_org}/doc/{id_documentoToPDF}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/trasnformUrlToDownloadPdf/1/doc/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/trasnformUrlToDownloadPdf/1/doc/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/trasnformUrlToDownloadPdf/{id_org}/doc/{id_documentoToPDF}`


<!-- END_1fbe31f1b8bbe3db5d9fd85a6236eea7 -->

<!-- START_0df2e347e4adfec90c5a94b9cff7e6fd -->
## api/clientCreate/{id_org}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/clientCreate/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clientCreate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/clientCreate/{id_org}`


<!-- END_0df2e347e4adfec90c5a94b9cff7e6fd -->

<!-- START_c3b3fbe9b3d1b455af493de30619270c -->
## api/clientRead/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clientRead/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clientRead/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/clientRead/{id_org}`


<!-- END_c3b3fbe9b3d1b455af493de30619270c -->

<!-- START_ce40eaf327ac90f890b46a3f65f4b513 -->
## api/clientUpdate/{id_client}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/clientUpdate/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clientUpdate/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/clientUpdate/{id_client}/update`


<!-- END_ce40eaf327ac90f890b46a3f65f4b513 -->

<!-- START_22b085b956be8456afe15386427173d9 -->
## api/clientDelete/{id_client}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clientDelete/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clientDelete/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/clientDelete/{id_client}/org/{id_org}`


<!-- END_22b085b956be8456afe15386427173d9 -->

<!-- START_ddf40ca6d3ac1dad8232861e70e435a6 -->
## api/clientById/{id_client}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clientById/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clientById/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/clientById/{id_client}/org/{id_org}`


<!-- END_ddf40ca6d3ac1dad8232861e70e435a6 -->

<!-- START_6e5e8741e4407268df32fa728329197e -->
## api/packsRead/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packsRead/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsRead/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packsRead/{id_org}`


<!-- END_6e5e8741e4407268df32fa728329197e -->

<!-- START_c2ed9ddac9419eb72f1f3873cdf01b2e -->
## api/packsCreate/{id_org}/destino/{id_destino}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/packsCreate/1/destino/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsCreate/1/destino/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/packsCreate/{id_org}/destino/{id_destino}`


<!-- END_c2ed9ddac9419eb72f1f3873cdf01b2e -->

<!-- START_3130eab38bd8e51300d30685c55785b2 -->
## api/createPackDestination/{id_org}/destino/{id_destino}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/createPackDestination/1/destino/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/createPackDestination/1/destino/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/createPackDestination/{id_org}/destino/{id_destino}`


<!-- END_3130eab38bd8e51300d30685c55785b2 -->

<!-- START_a3cb1241b4b06524c1a3e2e59ed0bc46 -->
## api/packsDelete/{code_pack}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packsDelete/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsDelete/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packsDelete/{code_pack}/org/{id_org}`


<!-- END_a3cb1241b4b06524c1a3e2e59ed0bc46 -->

<!-- START_f391d217944776700ddeab6b841363dd -->
## api/packsById/{id_packs}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packsById/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsById/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packsById/{id_packs}/org/{id_org}`


<!-- END_f391d217944776700ddeab6b841363dd -->

<!-- START_4f40bf74ef57cab01ef4f20389b4f07d -->
## api/packsEdit/{id_org}/typePackage/{id_type_pakage}
> Example request:

```bash
curl -X POST \
    "http://localhost/api/packsEdit/1/typePackage/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsEdit/1/typePackage/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/packsEdit/{id_org}/typePackage/{id_type_pakage}`


<!-- END_4f40bf74ef57cab01ef4f20389b4f07d -->

<!-- START_de70c30ac88600a18ac9bd1bab038477 -->
## api/destinations/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/destinations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/destinations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/destinations/{id_org}`


<!-- END_de70c30ac88600a18ac9bd1bab038477 -->

<!-- START_5a7f278a6d545fed0a92547ddc8213e8 -->
## api/packsByNameOfDestination/{destionName}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packsByNameOfDestination/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packsByNameOfDestination/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/packsByNameOfDestination/{destionName}/org/{id_org}`


<!-- END_5a7f278a6d545fed0a92547ddc8213e8 -->

<!-- START_0113b67f508ccb28b7f58990518c48d9 -->
## api/searchPacksDetails/{code_pack}/org/{id_org}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/searchPacksDetails/1/org/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/searchPacksDetails/1/org/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/searchPacksDetails/{code_pack}/org/{id_org}`


<!-- END_0113b67f508ccb28b7f58990518c48d9 -->


