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

<!-- END_INFO -->

#Users
<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Browse all existing users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/users" \
    -H "Authorization: Bearer {token}"
```
```javascript
const url = new URL("http://localhost/api/users");

    let params = {
            "page": "17",
            "filters[name]": "consequatur",
            "fields[users]": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "data": [
        {
            "uuid": "8b258ea2-6c16-4d13-9f54-560032996afe",
            "name": "Jim Burbon",
            "email": "admin@example.com"
        },
        {
            "uuid": "b7b6d876-4f6b-4398-8fa1-5b711d77eb0f",
            "name": "Mr. Urban Balistreri",
            "email": "user@example.com"
        }
    ],
    "links": {
        "first": "http:\/\/localhost\/api\/users?page=1",
        "last": "http:\/\/localhost\/api\/users?page=7",
        "prev": null,
        "next": "http:\/\/localhost\/api\/users?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 7,
        "path": "http:\/\/localhost\/api\/users",
        "per_page": 15,
        "to": 15,
        "total": 102
    }
}
```

### HTTP Request
`GET api/users`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    page |  optional  | The page which should be shown
    filters[name] |  optional  | Optional name which should be filtered
    fields[users] |  optional  | Define fields which should be loaded

<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create a new user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/users" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"consequatur","email":"consequatur","password":"consequatur"}'

```
```javascript
const url = new URL("http://localhost/api/users");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "consequatur",
    "email": "consequatur",
    "password": "consequatur"
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
    "message": "User successfully created.",
    "data": {
        "uuid": "8b258ea2-6c16-4d13-9f54-560032996afe",
        "name": "Jim Burbon",
        "email": "admin@example.com"
    }
}
```

### HTTP Request
`POST api/users`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the new user
    email | string |  required  | The e-mail address of the new user
    password | string |  required  | The password of the new user

<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Read a specific user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375" \
    -H "Authorization: Bearer {token}"
```
```javascript
const url = new URL("http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375");

    let params = {
            "user": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "data": {
        "uuid": "8b258ea2-6c16-4d13-9f54-560032996afe",
        "name": "Jim Burbon",
        "email": "admin@example.com"
    }
}
```

### HTTP Request
`GET api/users/{user}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    user |  required  | The uuid of the user

<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_3a56a3fa621ace409678c31e5eff35f8 -->
## Update a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PATCH "http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"name":"consequatur","email":"consequatur"}'

```
```javascript
const url = new URL("http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375");

    let params = {
            "user": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "consequatur",
    "email": "consequatur"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "User successfully updated.",
    "data": {
        "uuid": "8b258ea2-6c16-4d13-9f54-560032996afe",
        "name": "Jim Burbon",
        "email": "admin@example.com"
    }
}
```

### HTTP Request
`PATCH api/users/{user}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | The name of the new user
    email | string |  optional  | The e-mail address of the new user
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    user |  required  | The uuid of the user which should be updated

<!-- END_3a56a3fa621ace409678c31e5eff35f8 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Delete a specific user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375" \
    -H "Authorization: Bearer {token}"
```
```javascript
const url = new URL("http://localhost/api/users/1b98187c-f3eb-43dc-bde2-6cc56b583375");

    let params = {
            "user": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "message": "User successfully deleted."
}
```

### HTTP Request
`DELETE api/users/{user}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    user |  required  | The uuid of the user which should be deleted

<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->


