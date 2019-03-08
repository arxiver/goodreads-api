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

#Book
<!-- START_c84ecb8d4fd02d9a637dac124b62c629 -->
## List all books

> Example request:

```bash
curl -X GET -G "http://localhost/api/books" \
    -H "Content-Type: application/json" \
    -d '{"page":7,"books_per_page":7}'

```

```javascript
const url = new URL("http://localhost/api/books");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 7,
    "books_per_page": 7
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
    "book_title": "Would you die for me?",
    "isbn": "1234xxxxxx",
    "image_url": "lookdown.jpg",
    "small_image_url": "xyz.com\/images\/uvw.jpg",
    "num_pages": "1000",
    "publisher": "dummyMan",
    "publication_day": 13,
    "publication_year": 1932,
    "publication_month": 10,
    "average_rating": 3.532,
    "ratings_count": 1,
    "description": "dummy",
    "author_id": 1,
    "author_name": "author"
}
```

### HTTP Request
`GET api/books`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).
    books_per_page | integer |  optional  | optional (default 10).

<!-- END_c84ecb8d4fd02d9a637dac124b62c629 -->

<!-- START_5b18d0a1476d11513f07c9427a8f479b -->
## Show book

> Example request:

```bash
curl -X GET -G "http://localhost/api/books/show/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"book_id":2}'

```

```javascript
const url = new URL("http://localhost/api/books/show/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 2
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
null
```

### HTTP Request
`GET api/books/show/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The id of the book.

<!-- END_5b18d0a1476d11513f07c9427a8f479b -->

<!-- START_1ebf60b0f5e42ff9b1cbdcd9f468d722 -->
## Show books by genre

> Example request:

```bash
curl -X GET -G "http://localhost/api/books/genre/{genre_name}" \
    -H "Content-Type: application/json" \
    -d '{"genreName":"gASeWy9gRhJCuGPj","page":20,"books_per_page":20}'

```

```javascript
const url = new URL("http://localhost/api/books/genre/{genre_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "genreName": "gASeWy9gRhJCuGPj",
    "page": 20,
    "books_per_page": 20
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
null
```

### HTTP Request
`GET api/books/genre/{genre_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    genreName | string |  required  | The Genre of list of books.
    page | integer |  optional  | optional 1-N (default 1).
    books_per_page | integer |  optional  | optional (default 10).

<!-- END_1ebf60b0f5e42ff9b1cbdcd9f468d722 -->

<!-- START_d4e4d86c598602034e683244f46d7033 -->
## get the needed book

> Example request:

```bash
curl -X GET -G "http://localhost/api/query" \
    -H "Content-Type: application/json" \
    -d '{"Query":"GCKKVCYbE9actCNv"}'

```

```javascript
const url = new URL("http://localhost/api/query");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Query": "GCKKVCYbE9actCNv"
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
null
```

### HTTP Request
`GET api/query`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Query | string |  required  | Find books by title, author, or ISBN.

<!-- END_d4e4d86c598602034e683244f46d7033 -->

#Owned Books

APIs for GoodReads
<!-- START_e9f083451756993cd580ea88ccd49589 -->
## List all owned books of the authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/owned_books" 
```

```javascript
const url = new URL("http://localhost/api/owned_books");

let headers = {
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
null
```

### HTTP Request
`GET api/owned_books`


<!-- END_e9f083451756993cd580ea88ccd49589 -->

<!-- START_c946a3187edf457113b9279441527ad9 -->
## Add to books owned

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/owned_books/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"book_id":18,"condition_description":"C3bPJFMry70aEjQc"}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 18,
    "condition_description": "C3bPJFMry70aEjQc"
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
`POST api/owned_books/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The id of the book.
    condition_description | string |  optional  | optional The id of the book.

<!-- END_c946a3187edf457113b9279441527ad9 -->

<!-- START_67ef22acf274405a2c6b22866d49d727 -->
## List books owned by a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/owned_books/list/{user_id}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":20,"page":14,"books_per_page":17}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/list/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 20,
    "page": 14,
    "books_per_page": 17
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
null
```

### HTTP Request
`GET api/owned_books/list/{user_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | The id of the user.
    page | integer |  optional  | optional 1-N (default 1).
    books_per_page | integer |  optional  | optional (default 10).

<!-- END_67ef22acf274405a2c6b22866d49d727 -->

<!-- START_edb449eb06b225a6824b20125f35d474 -->
## Delete an owned book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/owned_books/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"book_id":2}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 2
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/owned_books/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The id of the book record.

<!-- END_edb449eb06b225a6824b20125f35d474 -->

#Review
<!-- START_b7f52079bc658d3faea44274e95c9859 -->
## List all reviews of the authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes" 
```

```javascript
const url = new URL("http://localhost/api/reviwes");

let headers = {
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
null
```

### HTTP Request
`GET api/reviwes`


<!-- END_b7f52079bc658d3faea44274e95c9859 -->

<!-- START_1521f8492a220ccff8293eeac79158d1 -->
## Create a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/reviwes/create" \
    -H "Content-Type: application/json" \
    -d '{"book_id":17,"shelf":6,"review":"z0PgbCNYbnguWDs3","rating":6,"read_at":"RCVvM9gqsQUUhOXR"}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 17,
    "shelf": 6,
    "review": "z0PgbCNYbnguWDs3",
    "rating": 6,
    "read_at": "RCVvM9gqsQUUhOXR"
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
`POST api/reviwes/create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The book id has reviewed  to be created.
    shelf | integer |  required  | (read,currently-reading,to-read) default is (read) .
    review | optional |  optional  | string optional The text of the review.
    rating | integer |  optional  | optional Rating (0-5) default is 0 (No rating).
    read_at | date |  optional  | optional (YYYY-MM-DD format, e.g. 2008-02-01).

<!-- END_1521f8492a220ccff8293eeac79158d1 -->

<!-- START_e272531e4b47fd7fc24e0458880aed98 -->
## Show a review of a specified book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/show/{id}" \
    -H "Content-Type: application/json" \
    -d '{"id":7}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/show/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 7
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
null
```

### HTTP Request
`GET api/reviwes/show/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | The id of the review .

<!-- END_e272531e4b47fd7fc24e0458880aed98 -->

<!-- START_53d2a6bdaf9aa89d8d1b91779911dbc9 -->
## Edit a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost/api/reviwes/{id}" \
    -H "Content-Type: application/json" \
    -d '{"id":17,"review":"zdv5X7y6EqZg41zv","shelf_name":"Jws1FGbOBrdWs76i","rating":17,"read_at":"TIRaiAATQCb6jSMc"}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 17,
    "review": "zdv5X7y6EqZg41zv",
    "shelf_name": "Jws1FGbOBrdWs76i",
    "rating": 17,
    "read_at": "TIRaiAATQCb6jSMc"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/reviwes/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Review Id.
    review | text |  optional  | optional The text of the review.
    shelf_name | string |  optional  | optional (read,currently-reading,to-read)  .
    rating | integer |  optional  | optional Rating (0-5) default is the same as it was .
    read_at | date |  optional  | optional  default is (the same as it was).

<!-- END_53d2a6bdaf9aa89d8d1b91779911dbc9 -->

<!-- START_f05a99566a1946530084c8ed20cdce5a -->
## Remove a Review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/reviwes/{id}" \
    -H "Content-Type: application/json" \
    -d '{"book_id":18}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 18
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/reviwes/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The ID of book had a review to be deleted.

<!-- END_f05a99566a1946530084c8ed20cdce5a -->

<!-- START_195b30c3b7c669d1520a64d9d7a07a9a -->
## Recent reviews from all members.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/recent" 
```

```javascript
const url = new URL("http://localhost/api/reviwes/recent");

let headers = {
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
null
```

### HTTP Request
`GET api/reviwes/recent`


<!-- END_195b30c3b7c669d1520a64d9d7a07a9a -->

<!-- START_7fb92b5211d2ef6e2ec40d79469401cc -->
## Get a user&#039;s review for a given book.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/users/{user_id}/books/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":2,"book_id":1}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/users/{user_id}/books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 2,
    "book_id": 1
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
null
```

### HTTP Request
`GET api/reviwes/users/{user_id}/books/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | id of the user.
    book_id | integer |  required  | id of the book.

<!-- END_7fb92b5211d2ef6e2ec40d79469401cc -->

<!-- START_b90ea3c21f5621db8bfb45054f7cf248 -->
## Get a book`s reviews by users.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/books/{bood_id}" \
    -H "Content-Type: application/json" \
    -d '{"book_id":16}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/books/{bood_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 16
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
null
```

### HTTP Request
`GET api/reviwes/books/{bood_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | book_id you want to show its reviews.

<!-- END_b90ea3c21f5621db8bfb45054f7cf248 -->

#Shelf
<!-- START_8ca8c1ada18abb4fe16799cd67e55e73 -->
## List all shelves of the authenticated user .

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shlef/list" 
```

```javascript
const url = new URL("http://localhost/api/shlef/list");

let headers = {
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
null
```

### HTTP Request
`GET api/shlef/list`


<!-- END_8ca8c1ada18abb4fe16799cd67e55e73 -->

<!-- START_7cc029a4af3f3fdc472462b497f87980 -->
## Create a new book shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"3PoXaDsBWTK3ePyu"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "3PoXaDsBWTK3ePyu"
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
`POST api/shelf/{shelf_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the new shelf.

<!-- END_7cc029a4af3f3fdc472462b497f87980 -->

<!-- START_f029a85d3a1a2f160cdbf493d58b76da -->
## Show a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"LTWCopm9tE4vQeI2"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "LTWCopm9tE4vQeI2"
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
null
```

### HTTP Request
`GET api/shelf/{shelf_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.

<!-- END_f029a85d3a1a2f160cdbf493d58b76da -->

<!-- START_a77cd3ede5b20ff4f8e61434366ec3c2 -->
## Add a book to a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/shelf/{shelf_name}/add_book/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"GCc1NGVrLrkfsbVN","book_id":7}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}/add_book/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "GCc1NGVrLrkfsbVN",
    "book_id": 7
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
`POST api/shelf/{shelf_name}/add_book/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.
    book_id | integer |  required  | The id of the book.

<!-- END_a77cd3ede5b20ff4f8e61434366ec3c2 -->

<!-- START_610d22f55c271e3e28256802d04e46f1 -->
## Destroy a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"Z6IaNCLl1S0y1BQs"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "Z6IaNCLl1S0y1BQs"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/shelf/{shelf_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.

<!-- END_610d22f55c271e3e28256802d04e46f1 -->

<!-- START_dc4e2f12407ce17b65f4e9e9488551dc -->
## Get User`s shelves

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":13,"page":9,"books_per_page":11}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 13,
    "page": 9,
    "books_per_page": 11
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
null
```

### HTTP Request
`GET api/shelf/{user_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | The name of the shelf.
    page | integer |  optional  | optional 1-N (default 1).
    books_per_page | integer |  optional  | optional (default 10).

<!-- END_dc4e2f12407ce17b65f4e9e9488551dc -->

<!-- START_50cd03fee8d42aa9c0fa3d943a51f4cf -->
## Remove a book from a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/shelf/{shelf_name}/remove_book/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"VzfTeq77MOf3EkXF","book_id":2}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}/remove_book/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "VzfTeq77MOf3EkXF",
    "book_id": 2
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/shelf/{shelf_name}/remove_book/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.
    book_id | integer |  required  | The id of the book.

<!-- END_50cd03fee8d42aa9c0fa3d943a51f4cf -->

<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## show books on the shelf

> Example request:

```bash
curl -X GET -G "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -d '{"user_id":17}'

```

```javascript
const url = new URL("http://localhost/api/user");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 17
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
null
```

### HTTP Request
`GET api/user`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Get the books on a members shelf.

<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->

#User management

APIs for managing users (Sofyan)
<!-- START_f5980ebe18b1e12221fe39786f0c0a64 -->
## Sign Up

> Example request:

```bash
curl -X POST "http://localhost/api/SignUp" \
    -H "Content-Type: application/json" \
    -d '{"UserName":"rGVZ2Hb4PluLfuQZ","Full_Name":"qX0re3O1xDtyP158","Password":"g9HNaiR4W4VtEZyr","Password_confirmation":"AHj6zjYPzNh3Coe5","Gender":"NUem2eNeFXXEgrvn"}'

```

```javascript
const url = new URL("http://localhost/api/SignUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserName": "rGVZ2Hb4PluLfuQZ",
    "Full_Name": "qX0re3O1xDtyP158",
    "Password": "g9HNaiR4W4VtEZyr",
    "Password_confirmation": "AHj6zjYPzNh3Coe5",
    "Gender": "NUem2eNeFXXEgrvn"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "status": "false",
    "Errors": [
        "The Username field is required.",
        "The password field is required.",
        "The Full_Name field is required.",
        "The gender field is required."
    ]
}
```
> Example response (200):

```json
{
    "Status": "true",
    "User": {
        "UserName": "",
        "Name": "",
        "Image": ""
    }
}
```

### HTTP Request
`POST api/SignUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserName | string |  required  | .
    Full_Name | string |  required  | .
    Password | string |  required  | .
    Password_confirmation | string |  required  | .
    Gender | string |  required  | must be [Female , Male or Other].

<!-- END_f5980ebe18b1e12221fe39786f0c0a64 -->

<!-- START_863c6c7be09bcfa3e142dc18f46ba110 -->
## LogIn

> Example request:

```bash
curl -X POST "http://localhost/api/LogIn" \
    -H "Content-Type: application/json" \
    -d '{"UserName":"DVa9PlpUfmyqvGa3","Password":"sP5xO0uh1ToDnCYb"}'

```

```javascript
const url = new URL("http://localhost/api/LogIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "UserName": "DVa9PlpUfmyqvGa3",
    "Password": "sP5xO0uh1ToDnCYb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "Status": "false",
    "Errors": [
        "The User_Name field is required.",
        "The Password field is required."
    ]
}
```
> Example response (200):

```json
{
    "Status": "true",
    "User": {
        "UserName": "",
        "Name": "",
        "Image": ""
    }
}
```

### HTTP Request
`POST api/LogIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    UserName | string |  required  | .
    Password | string |  required  | .

<!-- END_863c6c7be09bcfa3e142dc18f46ba110 -->

<!-- START_2b7d14fa572021328ea245f701c0c7c2 -->
## api/ChangePassword
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/ChangePassword" \
    -H "Content-Type: application/json" \
    -d '{"Password":"wgZZ01bga8A8Gfae","New_Password":"oIjaOhdDTewQQdNx","New_Password_confirmation":"SoP1UT5dY08n1gW5"}'

```

```javascript
const url = new URL("http://localhost/api/ChangePassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Password": "wgZZ01bga8A8Gfae",
    "New_Password": "oIjaOhdDTewQQdNx",
    "New_Password_confirmation": "SoP1UT5dY08n1gW5"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "Status": "false",
    "Errors": [
        "The password field is required.",
        "The New_password field is required.",
        "The New_password_confirmation field is required."
    ]
}
```
> Example response (200):

```json
{
    "Status": "true",
    "Messages": "You have changed your password"
}
```

### HTTP Request
`POST api/ChangePassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Password | string |  required  | .
    New_Password | string |  required  | .
    New_Password_confirmation | string |  required  | .

<!-- END_2b7d14fa572021328ea245f701c0c7c2 -->

<!-- START_58bc906916d3a60ecd5ee149123ae79e -->
## api/ChangeName
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/ChangeName" \
    -H "Content-Type: application/json" \
    -d '{"Password":"j5IiC4cKjVnNf9lT","New_Name":"A2CDBfKXyrA6uF0I"}'

```

```javascript
const url = new URL("http://localhost/api/ChangeName");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Password": "j5IiC4cKjVnNf9lT",
    "New_Name": "A2CDBfKXyrA6uF0I"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "Status": "false",
    "Errors": [
        "The Password field is required.",
        "The New_Name field is required."
    ]
}
```
> Example response (200):

```json
{
    "Status": "true",
    "Messages": "You have changed your name"
}
```

### HTTP Request
`POST api/ChangeName`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Password | string |  required  | .
    New_Name | string |  required  | .

<!-- END_58bc906916d3a60ecd5ee149123ae79e -->

<!-- START_38f0c6a1f716b2befb99b38926a20508 -->
## Change Image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/ChangeImage" \
    -H "Content-Type: application/json" \
    -d '{"Image":"DrUPfVnfaLVXWGUK"}'

```

```javascript
const url = new URL("http://localhost/api/ChangeImage");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Image": "DrUPfVnfaLVXWGUK"
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
    "Status": "true",
    "Messages": "You have updated your profile picture"
}
```

### HTTP Request
`POST api/ChangeImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Image | string |  required  | the URL for the image .

<!-- END_38f0c6a1f716b2befb99b38926a20508 -->

<!-- START_1893e8caa33c7eb5395030791faf1a37 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/Delete" \
    -H "Content-Type: application/json" \
    -d '{"Password":"XIa4BiadJ8Efcfh9"}'

```

```javascript
const url = new URL("http://localhost/api/Delete");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Password": "XIa4BiadJ8Efcfh9"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "Status": "false",
    "Errors": [
        "The password is wrong."
    ]
}
```
> Example response (200):

```json
{
    "Status": "true",
    "Messages": "You have deleted your account"
}
```

### HTTP Request
`POST api/Delete`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Password | string |  required  | .

<!-- END_1893e8caa33c7eb5395030791faf1a37 -->

<!-- START_5e222b29693a215770e28843619d87e7 -->
## Log Out

> Example request:

```bash
curl -X GET -G "http://localhost/api/LogOut" 
```

```javascript
const url = new URL("http://localhost/api/LogOut");

let headers = {
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
null
```

### HTTP Request
`GET api/LogOut`


<!-- END_5e222b29693a215770e28843619d87e7 -->

<!-- START_4d5b3a579884e9bffcdf6afcff5a236a -->
## search for an user

> Example request:

```bash
curl -X GET -G "http://localhost/api/User" \
    -H "Content-Type: application/json" \
    -d '{"username":"QW1vyXj6kI661Kaw"}'

```

```javascript
const url = new URL("http://localhost/api/User");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "username": "QW1vyXj6kI661Kaw"
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
null
```

### HTTP Request
`GET api/User`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | search for a user by his/her username.

<!-- END_4d5b3a579884e9bffcdf6afcff5a236a -->

#following management

APIs for managing following process
<!-- START_14b8be892d8419e9f65508229770b44c -->
## followUser  Start following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/followuser" \
    -H "Content-Type: application/json" \
    -d '{"USER_ID":12}'

```

```javascript
const url = new URL("http://localhost/api/followuser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "USER_ID": 12
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
    "state": "true"
}
```

### HTTP Request
`POST api/followuser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    USER_ID | integer |  required  | Goodreads user id of user to follow.

<!-- END_14b8be892d8419e9f65508229770b44c -->

<!-- START_4a103eb82f681afeb2e7397eac3f6c99 -->
## unfollowUser Stop following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/unfollowuser" \
    -H "Content-Type: application/json" \
    -d '{"USER_ID":2}'

```

```javascript
const url = new URL("http://localhost/api/unfollowuser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "USER_ID": 2
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "state": "true"
}
```

### HTTP Request
`DELETE api/unfollowuser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    USER_ID | integer |  required  | Goodreads user id of user to stop following.

<!-- END_4a103eb82f681afeb2e7397eac3f6c99 -->

#general
<!-- START_ece00276451311bfb3ecbb519986e6e9 -->
## get the author by name

> Example request:

```bash
curl -X GET -G "http://localhost/api/authorname" \
    -H "Content-Type: application/json" \
    -d '{"auther_name":"3md7QuWZpAx8LD4A"}'

```

```javascript
const url = new URL("http://localhost/api/authorname");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "auther_name": "3md7QuWZpAx8LD4A"
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
null
```

### HTTP Request
`GET api/authorname`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    auther_name | string |  required  | Find an author by name.

<!-- END_ece00276451311bfb3ecbb519986e6e9 -->

<!-- START_8cafc490d5987eeebb7ffd6b85beae0f -->
## search the author by id

> Example request:

```bash
curl -X GET -G "http://localhost/api/authorid" \
    -H "Content-Type: application/json" \
    -d '{"author_id":2}'

```

```javascript
const url = new URL("http://localhost/api/authorid");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "author_id": 2
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
null
```

### HTTP Request
`GET api/authorid`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    author_id | integer |  required  | the ID of the author you search for.

<!-- END_8cafc490d5987eeebb7ffd6b85beae0f -->


