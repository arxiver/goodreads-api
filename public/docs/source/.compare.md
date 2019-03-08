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
<<<<<<< HEAD
    -d '{"page":8,"books_per_page":18}'
=======
    -d '{"page":2,"books_per_page":17}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/books");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "page": 8,
    "books_per_page": 18
=======
    "page": 2,
    "books_per_page": 17
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
    "author_name": "author",
    "genre": "action"
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
<<<<<<< HEAD
    -d '{"book_id":4}'
=======
    -d '{"book_id":12}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/books/show/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "book_id": 4
=======
    "book_id": 12
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
    "author_name": "author",
    "genre": "action"
}
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
<<<<<<< HEAD
    -d '{"genreName":"ZwZSWDskAiKlbvJz","page":3,"books_per_page":15}'
=======
    -d '{"genreName":"tOQW0Rhu1cOob3MN","page":19,"books_per_page":10}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/books/genre/{genre_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "genreName": "ZwZSWDskAiKlbvJz",
    "page": 3,
    "books_per_page": 15
=======
    "genreName": "tOQW0Rhu1cOob3MN",
    "page": 19,
    "books_per_page": 10
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
    "author_name": "author",
    "genre": "action"
}
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

<!-- START_c4b713b7ad8c485e75fc6f65d7d9fa0a -->
## get the needed book by its name

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_title" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"ovLAod3CZ857gGYl"}'
=======
    -d '{"title":"nM7YeyYEHgpn7abs"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/Books/book_title");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "ovLAod3CZ857gGYl"
=======
    "title": "nM7YeyYEHgpn7abs"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`GET api/Books/book_title`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Find books by title

<!-- END_c4b713b7ad8c485e75fc6f65d7d9fa0a -->

<!-- START_a73245bf8774b9eb80c387dbb9b98573 -->
## get the needed book by its ISBN

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_ISBN" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"ISBN":6}'
=======
    -d '{"ISBN":19}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/Books/book_ISBN");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "ISBN": 6
=======
    "ISBN": 19
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`GET api/Books/book_ISBN`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ISBN | integer |  required  | Find books by ISBN

<!-- END_a73245bf8774b9eb80c387dbb9b98573 -->

<!-- START_4ff78ec01f28353c43599b20c5deed9b -->
## search about the needed book by its Author name

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_Authorname" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"Author_name":"cBVUxh2IUqiQwhVw"}'
=======
    -d '{"Author_name":"3fs9qAukvJXwNbNS"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/Books/book_Authorname");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "Author_name": "cBVUxh2IUqiQwhVw"
=======
    "Author_name": "3fs9qAukvJXwNbNS"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`GET api/Books/book_Authorname`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Author_name | string |  required  | Find books by Author's name.

<!-- END_4ff78ec01f28353c43599b20c5deed9b -->

<<<<<<< HEAD
=======
<!-- START_f354760c4a3de326b7e8d01621b85e5c -->
## List all books

> Example request:

```bash
curl -X GET -G "http://localhost/api/UserController" \
    -H "Content-Type: application/json" \
    -d '{"page":5,"books_per_page":19}'

```

```javascript
const url = new URL("http://localhost/api/UserController");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 5,
    "books_per_page": 19
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
`GET api/UserController`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).
    books_per_page | integer |  optional  | optional (default 10).

<!-- END_f354760c4a3de326b7e8d01621b85e5c -->

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
    -d '{"book_id":20,"condition_description":"Ss8OiEHXS6CwZTW7"}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 20,
    "condition_description": "Ss8OiEHXS6CwZTW7"
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
    -d '{"user_id":7,"page":10,"books_per_page":12}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/list/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 7,
    "page": 10,
    "books_per_page": 12
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
    -d '{"book_id":20}'

```

```javascript
const url = new URL("http://localhost/api/owned_books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 20
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

>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
<<<<<<< HEAD
    -d '{"book_id":5,"shelf":20,"review":"zZ1Jl19eU0362xd7","rating":17,"read_at":"5W8xV8mMkbPbcpZn"}'
=======
    -d '{"book_id":16,"shelf":7,"review":"6wQSiTV2bS0CBuN9","rating":15,"read_at":"jqoGreDY9JBWjDPL"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "book_id": 5,
    "shelf": 20,
    "review": "zZ1Jl19eU0362xd7",
    "rating": 17,
    "read_at": "5W8xV8mMkbPbcpZn"
=======
    "book_id": 16,
    "shelf": 7,
    "review": "6wQSiTV2bS0CBuN9",
    "rating": 15,
    "read_at": "jqoGreDY9JBWjDPL"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
<<<<<<< HEAD
    -d '{"id":2}'
=======
    -d '{"id":11}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/show/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 2
=======
    "id": 11
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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

<!-- START_f2bf516816a6bd1a29bad51fe25e8a4a -->
## Edit a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost/api/reviwes/edit" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":1,"review":"06kPfDuuRu5RYGw2","shelf_name":"Bi0z2l80jsUjMIX8","rating":9,"read_at":"n7dgFeABJ2ToElAi"}'
=======
    -d '{"id":11,"review":"N0TzvU6jcvz7m0wm","shelf_name":"mWdgkvOB5f5SyM8R","rating":5,"read_at":"ZPsX6y3G3OW2VVsh"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 1,
    "review": "06kPfDuuRu5RYGw2",
    "shelf_name": "Bi0z2l80jsUjMIX8",
    "rating": 9,
    "read_at": "n7dgFeABJ2ToElAi"
=======
    "id": 11,
    "review": "N0TzvU6jcvz7m0wm",
    "shelf_name": "mWdgkvOB5f5SyM8R",
    "rating": 5,
    "read_at": "ZPsX6y3G3OW2VVsh"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`PUT api/reviwes/edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | Review Id.
    review | text |  optional  | optional The text of the review.
    shelf_name | string |  optional  | optional (read,currently-reading,to-read)  .
    rating | integer |  optional  | optional Rating (0-5) default is the same as it was .
    read_at | date |  optional  | optional  default is (the same as it was).

<!-- END_f2bf516816a6bd1a29bad51fe25e8a4a -->

<!-- START_f05a99566a1946530084c8ed20cdce5a -->
## Remove a Review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/reviwes/{id}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"review_id":1}'
=======
    -d '{"book_id":6}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "review_id": 1
=======
    "book_id": 6
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
    review_id | integer |  required  | The id of review to be deleted.

<!-- END_f05a99566a1946530084c8ed20cdce5a -->

<!-- START_7fb92b5211d2ef6e2ec40d79469401cc -->
## Get a user&#039;s review for a given book.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/users/{user_id}/books/{book_id}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"user_id":8,"book_id":10}'
=======
    -d '{"user_id":14,"book_id":7}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/users/{user_id}/books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "user_id": 8,
    "book_id": 10
=======
    "user_id": 14,
    "book_id": 7
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
<<<<<<< HEAD
    -d '{"book_id":14}'
=======
    -d '{"book_id":9}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/reviwes/books/{bood_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "book_id": 14
=======
    "book_id": 9
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
{
    "shelf_name": "to-read",
    "books_count": 4
}
```

### HTTP Request
`GET api/shlef/list`


<!-- END_8ca8c1ada18abb4fe16799cd67e55e73 -->

<<<<<<< HEAD
=======
<!-- START_7cc029a4af3f3fdc472462b497f87980 -->
## Create a new book shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"MDsB5lQ7s6Zbs6rO"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "MDsB5lQ7s6Zbs6rO"
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

>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
<!-- START_f029a85d3a1a2f160cdbf493d58b76da -->
## Show a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"shelf_name":"vu7KUDkB2PfCTYZF"}'
=======
    -d '{"shelf_name":"l7aIYnY16l9TPVYz"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "shelf_name": "vu7KUDkB2PfCTYZF"
=======
    "shelf_name": "l7aIYnY16l9TPVYz"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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

<!-- START_1e7cb27e22831e4a6163a5908d6b002b -->
## Add a book to a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/shelf/add_book" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"shelf_name":"71SbhX50P2SUI2kj","book_id":12}'
=======
    -d '{"shelf_name":"fwUSAyUP2At9aaiz","book_id":2}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/shelf/add_book");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "shelf_name": "71SbhX50P2SUI2kj",
    "book_id": 12
=======
    "shelf_name": "fwUSAyUP2At9aaiz",
    "book_id": 2
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`POST api/shelf/add_book`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.
    book_id | integer |  required  | The id of the book.

<<<<<<< HEAD
<!-- END_1e7cb27e22831e4a6163a5908d6b002b -->
=======
<!-- END_a77cd3ede5b20ff4f8e61434366ec3c2 -->

<!-- START_610d22f55c271e3e28256802d04e46f1 -->
## Destroy a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"shelf_name":"kGT7ZxiitRYWxs9S"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "kGT7ZxiitRYWxs9S"
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
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

<!-- START_dc4e2f12407ce17b65f4e9e9488551dc -->
## Get User`s shelves

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"user_id":14,"page":7,"books_per_page":7}'
=======
    -d '{"user_id":2,"page":16,"books_per_page":20}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "user_id": 14,
    "page": 7,
    "books_per_page": 7
=======
    "user_id": 2,
    "page": 16,
    "books_per_page": 20
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
<<<<<<< HEAD
    -d '{"shelf_name":"fwsCQsnjJSRPPRxK","book_id":2}'
=======
    -d '{"shelf_name":"91vCBNedZaOWGW5u","book_id":20}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}/remove_book/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "shelf_name": "fwsCQsnjJSRPPRxK",
    "book_id": 2
=======
    "shelf_name": "91vCBNedZaOWGW5u",
    "book_id": 20
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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

<!-- START_85260efa051dfd6095be0d84baf6da98 -->
## show books on the shelf

> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{get_books}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"user_id":12,"shelf_name":"D6Am1zmSyLqzlieW"}'
=======
    -d '{"user_id":4}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/shelf/{get_books}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "user_id": 12,
    "shelf_name": "D6Am1zmSyLqzlieW"
=======
    "user_id": 4
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`GET api/shelf/{get_books}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Get the books on a member's shelf.
    shelf_name | string |  required  | specified shelf`s name.

<!-- END_85260efa051dfd6095be0d84baf6da98 -->

#following management

APIs for managing following process
<!-- START_14b8be892d8419e9f65508229770b44c -->
## followUser  Start following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/followuser" \
    -H "Content-Type: application/json" \
    -d '{"USER_ID":7}'

```

```javascript
const url = new URL("http://localhost/api/followuser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "USER_ID": 7
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

<!-- START_b8da414973862c44f3f0b86f52cbee94 -->
## user_followers

Get a user's followers

> Example request:

```bash
curl -X GET -G "http://localhost/api/followers" \
    -H "Content-Type: application/json" \
    -d '{"page":16}'

```

```javascript
const url = new URL("http://localhost/api/followers");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 16
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
    "id_followers": "123"
}
```

### HTTP Request
`GET api/followers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).

<!-- END_b8da414973862c44f3f0b86f52cbee94 -->

<!-- START_00cf70aa133b8675add61a926a8e351b -->
## user_followering

Get a user's followering

> Example request:

```bash
curl -X GET -G "http://localhost/api/following" \
    -H "Content-Type: application/json" \
    -d '{"page":19}'

```

```javascript
const url = new URL("http://localhost/api/following");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 19
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
    "id_following": "123"
}
```

### HTTP Request
`GET api/following`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).

<!-- END_00cf70aa133b8675add61a926a8e351b -->

<!-- START_5e901bbc73b2f95e077625c8fdf1a97a -->
## followUser  Start following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/" \
    -H "Content-Type: application/json" \
    -d '{"USER_ID":8}'

```

```javascript
const url = new URL("http://localhost/");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "USER_ID": 8
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
`POST /`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    USER_ID | integer |  required  | Goodreads user id of user to follow.

<!-- END_5e901bbc73b2f95e077625c8fdf1a97a -->

<!-- START_668b8efe176aaff0d04b6555c1e4a39c -->
## unfollowUser Stop following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/" \
    -H "Content-Type: application/json" \
    -d '{"USER_ID":19}'

```

```javascript
const url = new URL("http://localhost/");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "USER_ID": 19
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
`DELETE /`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    USER_ID | integer |  required  | Goodreads user id of user to stop following.

<!-- END_668b8efe176aaff0d04b6555c1e4a39c -->

#general
<!-- START_ece00276451311bfb3ecbb519986e6e9 -->
## get the author by name

> Example request:

```bash
curl -X GET -G "http://localhost/api/authorname" \
    -H "Content-Type: application/json" \
    -d '{"auther_name":"M7rS6MVBloqJcC9g"}'

```

```javascript
const url = new URL("http://localhost/api/authorname");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "auther_name": "M7rS6MVBloqJcC9g"
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
    -d '{"author_id":1}'

```

```javascript
const url = new URL("http://localhost/api/authorid");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "author_id": 1
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

<!-- START_f10126ad0059168e8104f2a086e75abe -->
## search for an user

> Example request:

```bash
curl -X GET -G "http://localhost/api/UserController/{user}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"username":"TTsumqywuYysSXbY"}'
=======
    -d '{"username":"RvuaddjFbcEG3dur"}'
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87

```

```javascript
const url = new URL("http://localhost/api/UserController/{user}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "username": "TTsumqywuYysSXbY"
=======
    "username": "RvuaddjFbcEG3dur"
>>>>>>> 5e4825cf7fa6f0cb6e3fa1bef574bda452049b87
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
`GET api/UserController/{user}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | search for a user by his/her username.

<!-- END_f10126ad0059168e8104f2a086e75abe -->


