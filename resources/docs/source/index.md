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


<!-- START_e5a1815be4049d087777224cdb785154 -->
## Interrogation du serveur distant de Connexion

On se connecte au websocket qui va se connecter au serveur d'authentification et retourner un token valide
en cas de connexion réussit

> Example request:

```bash
curl -X POST \
    "http://localhost/loginDistant" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Email":"dignissimos","Password":"aliquid"}'

```

```javascript
const url = new URL(
    "http://localhost/loginDistant"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Email": "dignissimos",
    "Password": "aliquid"
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
    "token": "token",
    "token_expire": "14400"
}
```

### HTTP Request
`POST loginDistant`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `Email` | String |  required  | L'email de l'utilisateur
        `Password` | String |  required  | Mot de passe de l'utilisateur
    
<!-- END_e5a1815be4049d087777224cdb785154 -->


