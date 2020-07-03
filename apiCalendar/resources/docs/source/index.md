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


> Example response (200):

```json
{
    "status": 0,
    "data": "Datos incorrectos."
}
```

### HTTP Request
`GET api/sesion/{token_email}/{id_org}`


<!-- END_ce6f0e60a625c016cec615d8cc646384 -->

<!-- START_d94b5a6b67136beff37ad88da413309c -->
## api/dataUserById/{id_user}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dataUserById/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dataUserById/1"
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
    "status": 0,
    "data": "Usuario no encontrado ó credenciales incorrectas."
}
```

### HTTP Request
`GET api/dataUserById/{id_user}`


<!-- END_d94b5a6b67136beff37ad88da413309c -->

<!-- START_7d95b9b4f9f2621631b4641ea0633320 -->
## api/dataUserByEmail/{email_user}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/dataUserByEmail/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/dataUserByEmail/1"
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
    "status": 0,
    "data": "Usuario no encontrado ó credenciales incorrectas."
}
```

### HTTP Request
`GET api/dataUserByEmail/{email_user}`


<!-- END_7d95b9b4f9f2621631b4641ea0633320 -->

<!-- START_88c250988c0b04ec97d80e23b481eb32 -->
## api/adminCreate
> Example request:

```bash
curl -X POST \
    "http://localhost/api/adminCreate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/adminCreate"
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
`POST api/adminCreate`


<!-- END_88c250988c0b04ec97d80e23b481eb32 -->

<!-- START_148f0c7a5de81ba51acfc31a3449c962 -->
## api/adminRead
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminRead" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/adminRead"
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
    "status": 0,
    "data": "No existen registros"
}
```

### HTTP Request
`GET api/adminRead`


<!-- END_148f0c7a5de81ba51acfc31a3449c962 -->

<!-- START_6cf13de52a84428cf92948702927be0e -->
## api/adminById/{id_admin}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminById/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/adminById/1"
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
    "status": 0,
    "data": "No existen registros"
}
```

### HTTP Request
`GET api/adminById/{id_admin}`


<!-- END_6cf13de52a84428cf92948702927be0e -->

<!-- START_1f2c9aae5e5238a02a29b48a311c840d -->
## api/admin/{bd_users_id}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/admin/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/admin/1/update"
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
`POST api/admin/{bd_users_id}/update`


<!-- END_1f2c9aae5e5238a02a29b48a311c840d -->

<!-- START_22850398e95445a0b4952f599f58e476 -->
## api/adminDelete/{id_admin}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/adminDelete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/adminDelete/1"
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
    "status": 0,
    "data": "Usuario no encontrado"
}
```

### HTTP Request
`GET api/adminDelete/{id_admin}`


<!-- END_22850398e95445a0b4952f599f58e476 -->

<!-- START_ed5c24aff650a5f0aa91039db6f42384 -->
## api/typesUser
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/typesUser" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/typesUser"
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
    "status": 1,
    "data": [
        {
            "bd_type_users_id": 1,
            "type_user": "AdministradorSys",
            "code": "R90",
            "isAdmin": 1,
            "isEmployer": 1,
            "isDesigned": 1,
            "isActive": 1,
            "description1": "Usuario Administrador",
            "description2": "Usuario Administrador",
            "value": null,
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "bd_type_users_id": 2,
            "type_user": "EmployerSys",
            "code": "GW1",
            "isAdmin": 1,
            "isEmployer": 1,
            "isDesigned": 1,
            "isActive": 1,
            "description1": "Usuario Administrador",
            "description2": "Usuario Administrador",
            "value": null,
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "bd_type_users_id": 3,
            "type_user": "DesignedSys",
            "code": "SV2",
            "isAdmin": 1,
            "isEmployer": 1,
            "isDesigned": 1,
            "isActive": 1,
            "description1": "Usuario Administrador",
            "description2": "Usuario Administrador",
            "value": null,
            "status": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/typesUser`


<!-- END_ed5c24aff650a5f0aa91039db6f42384 -->

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

<!-- START_8ae2afb26b87debc1d5344d0d4c0030c -->
## api/packagesRead
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/packagesRead" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/packagesRead"
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
    "status": 0,
    "data": "No existen registros"
}
```

### HTTP Request
`GET api/packagesRead`


<!-- END_8ae2afb26b87debc1d5344d0d4c0030c -->

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


> Example response (200):

```json
{
    "status": 0,
    "data": "No existen registros"
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


> Example response (200):

```json
{
    "status": 0,
    "data": "Registro no encontrado"
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


