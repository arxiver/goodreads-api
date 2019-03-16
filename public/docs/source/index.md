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

#Activities

APIs for users activities
<!-- START_1c8b56dcc7476331d13beab7a976ba8f -->
## updates
Get user&#039;s updates from following users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/updates" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"user_id":16,"max_updates":15}'
=======
<<<<<<< HEAD
    -d '{"user_id":16,"max_updates":9}'
=======
    -d '{"user_id":16,"max_updates":15}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/updates");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 16,
<<<<<<< HEAD
    "max_updates": 15
=======
<<<<<<< HEAD
    "max_updates": 9
=======
    "max_updates": 15
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "updates": {
        "update": [
            {
                "link": "https:\/\/www.goodreads.com\/review\/show\/2742801555",
                "image_url": "https:\/\/images.gr-assets.com\/books\/1388255167s\/31087.jpg",
                "actor": {
                    "id": "000000",
                    "name": "Salma",
                    "image_url": "https:\/\/image.jpg",
                    "link": "https:\/\/www.goodreads.com\/user\/show\/000000-salma"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "action": {
                    "rating": "5",
                    "_type": "rating"
                },
                "object": {
                    "book": {
                        "id": "31087",
                        "title": "The Last Boleyn",
                        "link": "https:\/\/www.goodreads.com\/book\/show\/31087.The_Last_Boleyn",
                        "authors": {
                            "author": {
                                "id": "17450",
                                "name": "Karen Harper"
                            }
                        }
                    }
                },
                "type": "rate"
            }
        ],
        "_type": "array"
    }
}
```

### HTTP Request
`GET api/updates`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  optional  | optional to get the updates made by a specific user (default all following)
    max_updates | integer |  optional  | optional to get the max limit of updates.

<!-- END_1c8b56dcc7476331d13beab7a976ba8f -->

<!-- START_e65df2963c4f1f0bfdd426ee5170e8b7 -->
## notifications
gets a user&#039;s notifications

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/notifications" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"page":8}'
=======
    -d '{"page":14}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb

```

```javascript
const url = new URL("http://localhost/api/notifications");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "page": 8
=======
    "page": 14
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
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
{}
```

### HTTP Request
`GET api/notifications`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).

<!-- END_e65df2963c4f1f0bfdd426ee5170e8b7 -->

<!-- START_5f591b418d1c653384fb575623715a83 -->
## comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/makeComment" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":9,"type":4,"body":"HUWf0ouVks3nU4Tx"}'
=======
<<<<<<< HEAD
    -d '{"id":18,"type":11,"body":"KOiwEbzpqlIgw2JP"}'
=======
    -d '{"id":9,"type":4,"body":"HUWf0ouVks3nU4Tx"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/makeComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 9,
    "type": 4,
    "body": "HUWf0ouVks3nU4Tx"
=======
<<<<<<< HEAD
    "id": 18,
    "type": 11,
    "body": "KOiwEbzpqlIgw2JP"
=======
    "id": 9,
    "type": 4,
    "body": "HUWf0ouVks3nU4Tx"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`POST api/makeComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | id of the commented resource.
    type | integer |  required  | type of the resource (1 for user status and 2 for review).
    body | string |  required  | the body of the comment .

<!-- END_5f591b418d1c653384fb575623715a83 -->

<!-- START_300ec40d807333984a76a264dac57b69 -->
## list comments
lists comments for a specific resource(review,update)

> Example request:

```bash
curl -X GET -G "http://localhost/api/listComments" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":"YHSy3d5ajVeCoEzT","type":16}'
=======
<<<<<<< HEAD
    -d '{"id":"gWVgwiSqfrzzi1xY","type":11}'
=======
    -d '{"id":"YHSy3d5ajVeCoEzT","type":16}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/listComments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": "YHSy3d5ajVeCoEzT",
    "type": 16
=======
<<<<<<< HEAD
    "id": "gWVgwiSqfrzzi1xY",
    "type": 11
=======
    "id": "YHSy3d5ajVeCoEzT",
    "type": 16
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
{}
```

### HTTP Request
`GET api/listComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | required |  optional  | int id of the commented resource
    type | integer |  required  | type of the resource (1 for user status and 2 for review)

<!-- END_300ec40d807333984a76a264dac57b69 -->

<!-- START_80dc13044fd2676e9d20409a038a90ab -->
## like

> Example request:

```bash
curl -X POST "http://localhost/api/makeLike" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":12,"type":5}'
=======
<<<<<<< HEAD
    -d '{"id":13,"type":13}'
=======
    -d '{"id":12,"type":5}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/makeLike");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 12,
    "type": 5
=======
<<<<<<< HEAD
    "id": 13,
    "type": 13
=======
    "id": 12,
    "type": 5
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
{}
```

### HTTP Request
`POST api/makeLike`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | id of the liked resource
    type | integer |  required  | type of the resource (1 for user status and 2 for review)

<!-- END_80dc13044fd2676e9d20409a038a90ab -->

<!-- START_06b447ff2a11ad98e991c70ded4a0c5e -->
## list likes
lists likes for a specific resource(review,update)

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/listLikes" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":18,"type":15}'
=======
<<<<<<< HEAD
    -d '{"id":6,"type":15}'
=======
    -d '{"id":18,"type":15}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/listLikes");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 18,
=======
<<<<<<< HEAD
    "id": 6,
=======
    "id": 18,
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
    "type": 15
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
{}
```

### HTTP Request
`GET api/listLikes`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | id of the liked resource
    type | integer |  required  | type of the resource (1 for user status and 2 for review)

<!-- END_06b447ff2a11ad98e991c70ded4a0c5e -->

<!-- START_3d49e7be6b108116b78dde56f94b4d52 -->
## unlike

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/unlike" \
    -H "Content-Type: application/json" \
    -d '{"id":20}'

```

```javascript
const url = new URL("http://localhost/api/unlike");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 20
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
{}
```

### HTTP Request
`DELETE api/unlike`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | like id

<!-- END_3d49e7be6b108116b78dde56f94b4d52 -->

<!-- START_c46bc7cda5782151e86d302b69be7ef7 -->
## delete comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/deleteComment" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"id":19}'
=======
<<<<<<< HEAD
    -d '{"id":18}'
=======
    -d '{"id":19}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/deleteComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "id": 19
=======
<<<<<<< HEAD
    "id": 18
=======
    "id": 19
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`DELETE api/deleteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | comment id

<!-- END_c46bc7cda5782151e86d302b69be7ef7 -->

#Book
<!-- START_c84ecb8d4fd02d9a637dac124b62c629 -->
## List all books

> Example request:

```bash
curl -X GET -G "http://localhost/api/books" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"page":15,"books_per_page":18}'
=======
<<<<<<< HEAD
    -d '{"page":13,"books_per_page":2}'
=======
    -d '{"page":15,"books_per_page":18}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/books");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "page": 15,
    "books_per_page": 18
=======
<<<<<<< HEAD
    "page": 13,
    "books_per_page": 2
=======
    "page": 15,
    "books_per_page": 18
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"book_id":10}'
=======
<<<<<<< HEAD
    -d '{"book_id":11}'
=======
    -d '{"book_id":10}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/books/show/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "book_id": 10
=======
<<<<<<< HEAD
    "book_id": 11
=======
    "book_id": 10
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"genreName":"wZchfSEDAbjheasp","page":1,"books_per_page":11}'
=======
<<<<<<< HEAD
    -d '{"genreName":"sAq2lhbqVKhZQYqv","page":5,"books_per_page":6}'
=======
    -d '{"genreName":"wZchfSEDAbjheasp","page":1,"books_per_page":11}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/books/genre/{genre_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "genreName": "wZchfSEDAbjheasp",
    "page": 1,
    "books_per_page": 11
=======
<<<<<<< HEAD
    "genreName": "sAq2lhbqVKhZQYqv",
    "page": 5,
    "books_per_page": 6
=======
    "genreName": "wZchfSEDAbjheasp",
    "page": 1,
    "books_per_page": 11
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"title":"dZ19NB5YPl2NDaQM"}'
=======
<<<<<<< HEAD
    -d '{"title":"0BSXcNZCVAuMhPAK"}'
=======
    -d '{"title":"dZ19NB5YPl2NDaQM"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/Books/book_title");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "dZ19NB5YPl2NDaQM"
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
    -d '{"ISBN":14}'
=======
<<<<<<< HEAD
    -d '{"ISBN":7}'
=======
    -d '{"ISBN":14}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/Books/book_ISBN");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "ISBN": 14
=======
<<<<<<< HEAD
    "ISBN": 7
=======
    "ISBN": 14
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"Author_name":"UfRqrU3mwTVASuN3"}'
=======
<<<<<<< HEAD
    -d '{"Author_name":"zBUek09h7l2rfDR8"}'
=======
    -d '{"Author_name":"UfRqrU3mwTVASuN3"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/Books/book_Authorname");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "Author_name": "UfRqrU3mwTVASuN3"
=======
<<<<<<< HEAD
    "Author_name": "zBUek09h7l2rfDR8"
=======
    "Author_name": "UfRqrU3mwTVASuN3"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`GET api/Books/book_Authorname`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Author_name | string |  required  | Find books by Author's name.

<!-- END_4ff78ec01f28353c43599b20c5deed9b -->

#Review
<!-- START_b7f52079bc658d3faea44274e95c9859 -->
## Recent reviews from all members.

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
    -d '{"book_id":1,"shelf":4,"review":"InmxTtXRgh3BwRvc","rating":16,"read_at":"LblVhqMjxNmBEPJm"}'
=======
<<<<<<< HEAD
    -d '{"book_id":1,"shelf":12,"review":"7IayPzcRUTVF76qf","rating":3,"read_at":"S7IaVf0vhpBMyz91"}'
=======
    -d '{"book_id":1,"shelf":4,"review":"InmxTtXRgh3BwRvc","rating":16,"read_at":"LblVhqMjxNmBEPJm"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/reviwes/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 1,
<<<<<<< HEAD
=======
<<<<<<< HEAD
    "shelf": 12,
    "review": "7IayPzcRUTVF76qf",
    "rating": 3,
    "read_at": "S7IaVf0vhpBMyz91"
=======
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
    "shelf": 4,
    "review": "InmxTtXRgh3BwRvc",
    "rating": 16,
    "read_at": "LblVhqMjxNmBEPJm"
<<<<<<< HEAD
=======
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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

<!-- START_f2bf516816a6bd1a29bad51fe25e8a4a -->
## Edit a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost/api/reviwes/edit" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"review_id":19,"review":"6ISaZ4yRuG7t4iR6","shelf_name":"ydcbFfTWCbcFEkpH","rating":13,"read_at":"CsOTP5myEPahEbQT"}'
=======
<<<<<<< HEAD
    -d '{"review_id":3,"review":"dQcRjLqKGggwWSiv","shelf_name":"0I6BP6Tc2DMgLbt5","rating":6,"read_at":"lXn8SgTKZnmNtVNE"}'
=======
    -d '{"review_id":19,"review":"6ISaZ4yRuG7t4iR6","shelf_name":"ydcbFfTWCbcFEkpH","rating":13,"read_at":"CsOTP5myEPahEbQT"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/reviwes/edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    "review_id": 3,
    "review": "dQcRjLqKGggwWSiv",
    "shelf_name": "0I6BP6Tc2DMgLbt5",
    "rating": 6,
    "read_at": "lXn8SgTKZnmNtVNE"
=======
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
    "review_id": 19,
    "review": "6ISaZ4yRuG7t4iR6",
    "shelf_name": "ydcbFfTWCbcFEkpH",
    "rating": 13,
    "read_at": "CsOTP5myEPahEbQT"
<<<<<<< HEAD
=======
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    review_id | integer |  required  | Review Id.
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
<<<<<<< HEAD
    -d '{"review_id":16}'
=======
    -d '{"review_id":1}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

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
<<<<<<< HEAD
    "review_id": 16
=======
    "review_id": 1
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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

<!-- START_b5b6c6d01bc0058683ce95a3bd41d9ed -->
## Get review statistics given a list of ISBNs
take alist of books and then return their reviews And Rates
and i will use it to get the review for one book array of one element

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/users/books/{book_id}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"isbns":"amC7EeUMJsgSY3lW"}'
=======
<<<<<<< HEAD
    -d '{"isbns":"GpOhz9myoHYbJdqD"}'
=======
    -d '{"isbns":"amC7EeUMJsgSY3lW"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/reviwes/users/books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "isbns": "amC7EeUMJsgSY3lW"
=======
<<<<<<< HEAD
    "isbns": "GpOhz9myoHYbJdqD"
=======
    "isbns": "amC7EeUMJsgSY3lW"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`GET api/reviwes/users/books/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    isbns | ArrayofInt |  required  | Array of ISBNs(1000 ISBNs per request max.).

<!-- END_b5b6c6d01bc0058683ce95a3bd41d9ed -->

<!-- START_ceef72433d94fbcde535849da946b411 -->
## Get the reviews for a book given a title string

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/books/{boodTitle}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"title":"9b3XcuaKdlQVljKG","author":"SmyNHy3gnrRg4iKi","rating":4}'
=======
<<<<<<< HEAD
    -d '{"title":"xEvKR0fd5jDnEDL8","author":"KL45uVNuJeDH7Dm1","rating":20}'
=======
    -d '{"title":"9b3XcuaKdlQVljKG","author":"SmyNHy3gnrRg4iKi","rating":4}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/reviwes/books/{boodTitle}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "title": "9b3XcuaKdlQVljKG",
    "author": "SmyNHy3gnrRg4iKi",
    "rating": 4
=======
<<<<<<< HEAD
    "title": "xEvKR0fd5jDnEDL8",
    "author": "KL45uVNuJeDH7Dm1",
    "rating": 20
=======
    "title": "9b3XcuaKdlQVljKG",
    "author": "SmyNHy3gnrRg4iKi",
    "rating": 4
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`GET api/reviwes/books/{boodTitle}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | The title of the book to lookup.
    author | string |  optional  | optional The author name of the book to lookup.
    rating | integer |  optional  | optional Show only reviews with a particular rating.

<!-- END_ceef72433d94fbcde535849da946b411 -->

<!-- START_5ed232d83e284046b3a323e6e8f98533 -->
## List all reviews of the authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/listmyreviews" 
```

```javascript
const url = new URL("http://localhost/api/listmyreviews");

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
`GET api/listmyreviews`


<!-- END_5ed232d83e284046b3a323e6e8f98533 -->

<!-- START_3b8bc689333e11a42e9435563eb81d81 -->
## List thee reviews for a specific user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/listReviewOfUser" \
    -H "Content-Type: application/json" \
    -d '{"userId":"KQgY1l8syRB1M2bd"}'

```

```javascript
const url = new URL("http://localhost/api/listReviewOfUser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "KQgY1l8syRB1M2bd"
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
`GET api/listReviewOfUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | required |  optional  | id of the user

<!-- END_3b8bc689333e11a42e9435563eb81d81 -->

<!-- START_102e27bc17cce7a0f22b851d24be127a -->
## get a specific review with it&#039;s comments and likes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewOfBook" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":"osd8y7HOJUlBGxZd"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewOfBook");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": "osd8y7HOJUlBGxZd"
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
`GET api/showReviewOfBook`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | required |  optional  | id of the of the review to get it's body when notification happens

<!-- END_102e27bc17cce7a0f22b851d24be127a -->

<!-- START_af645b6773d834ce7a3f0b9c5df967cf -->
## Get the review for specific user on a specific Book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewForBookForUser" \
    -H "Content-Type: application/json" \
    -d '{"userId":"lLAJ8cMakTGut2Au","bookId":"6NqY9gEJFspU68hK"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewForBookForUser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "lLAJ8cMakTGut2Au",
    "bookId": "6NqY9gEJFspU68hK"
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
`GET api/showReviewForBookForUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | required |  optional  | id of the of the user
    bookId | required |  optional  | id of the of the book

<!-- END_af645b6773d834ce7a3f0b9c5df967cf -->

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

<!-- START_f029a85d3a1a2f160cdbf493d58b76da -->
## Show a shelf

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{shelf_name}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"shelf_name":"F0GWSetwxFGZenvK"}'
=======
<<<<<<< HEAD
    -d '{"shelf_name":"U3sddD9pcaz3xYh3"}'
=======
    -d '{"shelf_name":"F0GWSetwxFGZenvK"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "shelf_name": "F0GWSetwxFGZenvK"
=======
<<<<<<< HEAD
    "shelf_name": "U3sddD9pcaz3xYh3"
=======
    "shelf_name": "F0GWSetwxFGZenvK"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"shelf_name":"5cs1FPk1jRCP1g3p","book_id":17}'
=======
<<<<<<< HEAD
    -d '{"shelf_name":"HAzXPPv2amcsqNka","book_id":7}'
=======
    -d '{"shelf_name":"5cs1FPk1jRCP1g3p","book_id":17}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/shelf/add_book");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    "shelf_name": "HAzXPPv2amcsqNka",
    "book_id": 7
=======
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
    "shelf_name": "5cs1FPk1jRCP1g3p",
    "book_id": 17
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
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

<!-- END_1e7cb27e22831e4a6163a5908d6b002b -->

<!-- START_dc4e2f12407ce17b65f4e9e9488551dc -->
## Get User`s shelves

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"user_id":20,"page":10,"books_per_page":20}'
=======
<<<<<<< HEAD
    -d '{"user_id":14,"page":14,"books_per_page":11}'
=======
    -d '{"user_id":20,"page":10,"books_per_page":20}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "user_id": 20,
    "page": 10,
    "books_per_page": 20
=======
<<<<<<< HEAD
    "user_id": 14,
    "page": 14,
    "books_per_page": 11
=======
    "user_id": 20,
    "page": 10,
    "books_per_page": 20
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "shelves": {
        "user_shelf": [
            {
                "name": "read",
                "book_count": "0"
            },
            {
                "name": "currently-reading",
                "book_count": "0"
            },
            {
                "name": "to-read",
                "book_count": "0"
            }
        ],
        "_start": "1",
        "_end": "3",
        "_total": "3"
    }
}
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
    -d '{"shelf_name":"YsNKquvhlVla3IRc","book_id":2}'
=======
<<<<<<< HEAD
    -d '{"shelf_name":"riJbhMIaqZx5lKmv","book_id":17}'
=======
    -d '{"shelf_name":"YsNKquvhlVla3IRc","book_id":2}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}/remove_book/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "shelf_name": "YsNKquvhlVla3IRc",
    "book_id": 2
=======
<<<<<<< HEAD
    "shelf_name": "riJbhMIaqZx5lKmv",
    "book_id": 17
=======
    "shelf_name": "YsNKquvhlVla3IRc",
    "book_id": 2
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    -d '{"user_id":15,"shelf_name":"37oxVPvnkZycilNe"}'
=======
<<<<<<< HEAD
    -d '{"user_id":10,"shelf_name":"LI7ly6j4eBShVsqm"}'
=======
    -d '{"user_id":15,"shelf_name":"37oxVPvnkZycilNe"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/shelf/{get_books}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "user_id": 15,
    "shelf_name": "37oxVPvnkZycilNe"
=======
<<<<<<< HEAD
    "user_id": 10,
    "shelf_name": "LI7ly6j4eBShVsqm"
=======
    "user_id": 15,
    "shelf_name": "37oxVPvnkZycilNe"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`GET api/shelf/{get_books}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Get the books on a member's shelf.
    shelf_name | string |  required  | specified shelf`s name.

<!-- END_85260efa051dfd6095be0d84baf6da98 -->

#general
<!-- START_ece00276451311bfb3ecbb519986e6e9 -->
## get the author by name

> Example request:

```bash
curl -X GET -G "http://localhost/api/authorname" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"auther_name":"7lnO7qArfH8ndlBq"}'
=======
    -d '{"userId":11}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb

```

```javascript
const url = new URL("http://localhost/api/authorname");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "auther_name": "7lnO7qArfH8ndlBq"
=======
    "userId": 11
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
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
<<<<<<< HEAD
    -d '{"author_id":11}'
=======
    -d '{"userId":8}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb

```

```javascript
const url = new URL("http://localhost/api/authorid");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "author_id": 11
=======
    "userId": 8
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
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

<!-- START_5b980adc7cae0a3850861e87e9eb4fdc -->
## followUser

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Start following a user

> Example request:

```bash
curl -X POST "http://localhost/api/follow" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"userId":11}'
=======
<<<<<<< HEAD
    -d '{"userId":18}'
=======
    -d '{"page":4,"user_id":6}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/follow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "userId": 11
=======
<<<<<<< HEAD
    "userId": 18
=======
    "page": 4,
    "user_id": 6
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
`POST api/follow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | integer |  required  | Goodreads user id of user to follow.

<!-- END_5b980adc7cae0a3850861e87e9eb4fdc -->

<!-- START_53eaa2aeb494ad42904302950b418b5c -->
## unfollowUser

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Stop following a user

> Example request:

```bash
curl -X DELETE "http://localhost/api/unfollow" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"userId":3}'
=======
    -d '{"page":10,"user_id":18}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb

```

```javascript
const url = new URL("http://localhost/api/unfollow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "userId": 3
=======
    "page": 10,
    "user_id": 18
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
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
`DELETE api/unfollow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | integer |  required  | Goodreads user id of user to stop following.

<!-- END_53eaa2aeb494ad42904302950b418b5c -->

<<<<<<< HEAD
<!-- START_7976c3b1a58aad890c3eb3678103c519 -->
## userFollowers

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get a user's followers

> Example request:

```bash
curl -X GET -G "http://localhost/api/followers/{id?}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"page":4,"user_id":6}'
=======
    -d '{"page":14,"user_id":19}'
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/followers/{id?}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "page": 4,
    "user_id": 6
=======
    "page": 14,
    "user_id": 19
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "following": {
        "user": {
            "id": "000000",
            "name": "Salma",
            "image_url": "https:\/\/image.jpg",
            "link": "https:\/\/www.goodreads.com\/user\/show\/000000-salma"
        },
        "_start": "1",
        "_end": "1",
        "_total": "1"
    }
}
```

### HTTP Request
`GET api/followers/{id?}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).
    user_id | integer |  optional  | optional to get the updates made by a specific user (default authenticated user)

<!-- END_7976c3b1a58aad890c3eb3678103c519 -->

<!-- START_7b7ec5a32d9f5fac54fafacc7c1a6b0c -->
## userFollowering

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Get a user's followering

> Example request:

```bash
curl -X GET -G "http://localhost/api/following/{id?}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"page":10,"user_id":18}'
=======
    -d '{"page":6,"user_id":12}'
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/following/{id?}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "page": 10,
    "user_id": 18
=======
    "page": 6,
    "user_id": 12
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "following": {
        "user": {
            "id": "000000",
            "name": "Salma",
            "image_url": "https:\/\/image.jpg",
            "link": "https:\/\/www.goodreads.com\/user\/show\/000000-salma"
        },
        "_start": "1",
        "_end": "1",
        "_total": "1"
    }
}
```

### HTTP Request
`GET api/following/{id?}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1).
    user_id | integer |  optional  | optional to get the updates made by a specific user (default authenticated user)

<!-- END_7b7ec5a32d9f5fac54fafacc7c1a6b0c -->

=======
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
#user management

APIs for managing users (Sofyan)
<!-- START_68ff8c9e5dd1db295b6f780b9fcfbeb2 -->
## Sign Up

> Example request:

```bash
curl -X POST "http://localhost/api/signUp" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"email":"uLk1U7CE2ybdBB5A","password":"NpQ8iHACdcjwa0tb","password_confirmation":"qGLX9sEk26xVe0Nz","name":"zC604TJ0zWU80mEa","gender":"rnelJ2NeifbJPjev","birthday":"bSzpe13Wf8EjcsCa","country":"QBtAJNZkdYMyhGYt","city":"tb7CAqyvLLxej1wp"}'
=======
<<<<<<< HEAD
    -d '{"userName":"tpyWiJlfbHEeph17","fullName":"VJPOHHxqCYxVcPQB","password":"HDOvTghn85jDkrKN","password_confirmation":"J5GqC3zNVOXn00V9","gender":"idzr3NF1OoU49vhj","location":"yUJ6j5XEyqgbyCRi","birthday":"7h2kck29289Zaqug"}'
=======
    -d '{"email":"uLk1U7CE2ybdBB5A","password":"NpQ8iHACdcjwa0tb","password_confirmation":"qGLX9sEk26xVe0Nz","name":"zC604TJ0zWU80mEa","gender":"rnelJ2NeifbJPjev","birthday":"bSzpe13Wf8EjcsCa","country":"QBtAJNZkdYMyhGYt","city":"tb7CAqyvLLxej1wp"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    "userName": "tpyWiJlfbHEeph17",
    "fullName": "VJPOHHxqCYxVcPQB",
    "password": "HDOvTghn85jDkrKN",
    "password_confirmation": "J5GqC3zNVOXn00V9",
    "gender": "idzr3NF1OoU49vhj",
    "location": "yUJ6j5XEyqgbyCRi",
    "birthday": "7h2kck29289Zaqug"
=======
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
    "email": "uLk1U7CE2ybdBB5A",
    "password": "NpQ8iHACdcjwa0tb",
    "password_confirmation": "qGLX9sEk26xVe0Nz",
    "name": "zC604TJ0zWU80mEa",
    "gender": "rnelJ2NeifbJPjev",
    "birthday": "bSzpe13Wf8EjcsCa",
    "country": "QBtAJNZkdYMyhGYt",
    "city": "tb7CAqyvLLxej1wp"
<<<<<<< HEAD
=======
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "errors": [
        "The email field is required.",
        "The userName field is required.",
        "The password field is required.",
        "The name field is required.",
        "The gender field is required."
    ]
}
```
> Example response (200):

```json
{
    "status": "true",
    "user": {
        "email": "",
        "name": "",
        "age": "",
        "birthDay": "",
        "joinedAt": "",
        "username": "",
        "gender": "",
        "lastActive": "",
        "country": "",
        "city": "",
        "ratingCount": "",
        "ratingAvg": "",
        "followingCounts": "",
        "followersCount": "",
        "imageLink": ""
    },
    "token": "",
    "token_type": "",
    "expires_in": ""
}
```

### HTTP Request
`POST api/signUp`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | .
    password | string |  required  | .
    password_confirmation | string |  required  | this is a special filed so it's not in camel case.
    name | string |  required  | .
    gender | string |  required  | must be [Female , Male or Other].
    birthday | date |  required  | .
    country | string |  required  | .
    city | string |  required  | .

<!-- END_68ff8c9e5dd1db295b6f780b9fcfbeb2 -->

<!-- START_c301d148df10074b99c7c734cf8eeb47 -->
## LogIn

> Example request:

```bash
curl -X POST "http://localhost/api/logIn" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"email":"UZt8rMy210Yia1fr","password":"L6PngkSNd1XFWKZJ"}'
=======
<<<<<<< HEAD
    -d '{"userName":"3PfwJP61PRHpgaGO","password":"C6VHfVUpCXs4kS9u"}'
=======
    -d '{"email":"UZt8rMy210Yia1fr","password":"L6PngkSNd1XFWKZJ"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/logIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "email": "UZt8rMy210Yia1fr",
    "password": "L6PngkSNd1XFWKZJ"
=======
<<<<<<< HEAD
    "userName": "3PfwJP61PRHpgaGO",
    "password": "C6VHfVUpCXs4kS9u"
=======
    "email": "UZt8rMy210Yia1fr",
    "password": "L6PngkSNd1XFWKZJ"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "errors": [
        "The email field is required.",
        "The password field is required."
    ]
}
```
> Example response (200):

```json
{
    "status": "true",
    "user": {
        "email": "",
        "name": "",
        "age": "",
        "birthDay": "",
        "joinedAt": "",
        "username": "",
        "gender": "",
        "lastActive": "",
        "country": "",
        "city": "",
        "ratingCount": "",
        "ratingAvg": "",
        "followingCounts": "",
        "followersCount": "",
        "imageLink": ""
    },
    "token": "",
    "token_type": "",
    "expires_in": ""
}
```

### HTTP Request
`POST api/logIn`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | .
    password | string |  required  | .

<!-- END_c301d148df10074b99c7c734cf8eeb47 -->

<!-- START_dd73fe89d9872ce37d284636141ae526 -->
## Change password

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/changePassword" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"password":"eH1xOKHql8A6V2LT","newPassword":"ktxdaqChe9Epprmw","newPassword_confirmation":"txpjpRIQb98cdHNS"}'
=======
<<<<<<< HEAD
    -d '{"password":"xzw48w0pNq7mMqTt","newPassword":"l8Pvju1gJDgW6Hls","newPassword_confirmation":"NZozq44TXJ718wt9"}'
=======
    -d '{"password":"eH1xOKHql8A6V2LT","newPassword":"ktxdaqChe9Epprmw","newPassword_confirmation":"txpjpRIQb98cdHNS"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changePassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "password": "eH1xOKHql8A6V2LT",
    "newPassword": "ktxdaqChe9Epprmw",
    "newPassword_confirmation": "txpjpRIQb98cdHNS"
=======
<<<<<<< HEAD
    "password": "xzw48w0pNq7mMqTt",
    "newPassword": "l8Pvju1gJDgW6Hls",
    "newPassword_confirmation": "NZozq44TXJ718wt9"
=======
    "password": "eH1xOKHql8A6V2LT",
    "newPassword": "ktxdaqChe9Epprmw",
    "newPassword_confirmation": "txpjpRIQb98cdHNS"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "errors": [
        "The password field is required.",
        "The newPassword field is required.",
        "The newPassword_confirmation field is required."
    ]
}
```
> Example response (200):

```json
{
    "status": "true",
    "message": "You have changed your password"
}
```

### HTTP Request
`POST api/changePassword`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | .
    newPassword | string |  required  | .
    newPassword_confirmation | string |  required  | this filed is special so it isn't camel case .

<!-- END_dd73fe89d9872ce37d284636141ae526 -->

<!-- START_02c8bbcf77a96f67abe8f7b90efa9eac -->
## Change Name

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/changeName" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"password":"QT2oI37eQX4wO0MZ","newName":"enCxmzRp2kKKiNGO"}'
=======
<<<<<<< HEAD
    -d '{"password":"AlpZHGGhJjLBvkab","newName":"euEgEgwWjydb5tWS"}'
=======
    -d '{"password":"QT2oI37eQX4wO0MZ","newName":"enCxmzRp2kKKiNGO"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changeName");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "password": "QT2oI37eQX4wO0MZ",
    "newName": "enCxmzRp2kKKiNGO"
=======
<<<<<<< HEAD
    "password": "AlpZHGGhJjLBvkab",
    "newName": "euEgEgwWjydb5tWS"
=======
    "password": "QT2oI37eQX4wO0MZ",
    "newName": "enCxmzRp2kKKiNGO"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "errors": [
        "The password field is required.",
        "The newName field is required."
    ]
}
```
> Example response (200):

```json
{
    "status": "true",
    "message": "You have changed your name"
}
```

### HTTP Request
`POST api/changeName`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | .
    newName | string |  required  | .

<!-- END_02c8bbcf77a96f67abe8f7b90efa9eac -->

<!-- START_763d0e0624078ef7007bb9dd454eb3d8 -->
## Change Image

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/changeImage" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"Image":"Ui7kwv31tvpz7Uxn"}'
=======
<<<<<<< HEAD
    -d '{"Image":"ukd1FX1ZrWtwWsQA"}'
=======
    -d '{"Image":"Ui7kwv31tvpz7Uxn"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changeImage");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "Image": "Ui7kwv31tvpz7Uxn"
=======
<<<<<<< HEAD
    "Image": "ukd1FX1ZrWtwWsQA"
=======
    "Image": "Ui7kwv31tvpz7Uxn"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have updated your profile picture"
}
```

### HTTP Request
`POST api/changeImage`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Image | string |  required  | the URL for the image .

<!-- END_763d0e0624078ef7007bb9dd454eb3d8 -->

<!-- START_b7ec010166214c7cca3a1d83a4a25e51 -->
## Delete

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/delete" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"password":"KIdj9yrxMI1KnEth"}'
=======
<<<<<<< HEAD
    -d '{"password":"Jm8KdaQGgcWLHWY4"}'
=======
    -d '{"password":"KIdj9yrxMI1KnEth"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/delete");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "password": "KIdj9yrxMI1KnEth"
=======
<<<<<<< HEAD
    "password": "Jm8KdaQGgcWLHWY4"
=======
    "password": "KIdj9yrxMI1KnEth"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "errors": [
        "The password is wrong."
    ]
}
```
> Example response (200):

```json
{
    "status": "true",
    "message": "You have deleted your account"
}
```

### HTTP Request
`POST api/delete`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    password | string |  required  | .

<!-- END_b7ec010166214c7cca3a1d83a4a25e51 -->

<!-- START_7440a9fcfb88e4af573ebf8289099bad -->
## Show setting

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showSetting" 
```

```javascript
const url = new URL("http://localhost/api/showSetting");

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
    "status": "true",
    "user": {
        "userName": "",
        "gender": "",
        "name": "",
        "image": "",
        "location": "",
        "birthday": "",
        "seeMyBirthday": "",
        "seeMyCountry": "",
        "seeMyCity": ""
    }
}
```

### HTTP Request
`GET api/showSetting`


<!-- END_7440a9fcfb88e4af573ebf8289099bad -->

<!-- START_efe26608e73efafa8f34757f14dbcf54 -->
## Log Out

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/logOut" 
```

```javascript
const url = new URL("http://localhost/api/logOut");

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
    "status": "true",
    "message": "You have logged out"
}
```
> Example response (200):

```json
{
    "status": "false",
    "message": "Unauthorized"
}
```

### HTTP Request
`GET api/logOut`


<!-- END_efe26608e73efafa8f34757f14dbcf54 -->

<!-- START_02b571ee5bd2fac11f2edd358ef66b79 -->
## Show Profile

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showProfile" \
    -H "Content-Type: application/json" \
    -d '{"id":6}'

```

```javascript
const url = new URL("http://localhost/api/showProfile");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 6
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
    "id": "",
    "name": "",
    "user_name": "",
    "link": "",
    "image_url": "",
    "small_image_url": "",
    "about": "",
    "age": "",
    "gender": "",
    "location": "",
    "joined": "",
    "last_active": "",
    "user_shelves": {
        "user_shelf": [
            {
                "id": {
                    "_type": "",
                    "__text": ""
                },
                "name": "read",
                "book_count": {
                    "_type": "integer",
                    "__text": ""
                }
            },
            {
                "id": {
                    "_type": "",
                    "__text": ""
                },
                "name": "currently-reading",
                "book_count": {
                    "_type": "integer",
                    "__text": "0"
                }
            },
            {
                "id": {
                    "_type": "",
                    "__text": ""
                },
                "name": "to-read",
                "book_count": {
                    "_type": "integer",
                    "__text": "2"
                }
            }
        ],
        "_type": "array"
    },
    "updates": []
}
```

### HTTP Request
`GET api/showProfile`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  optional  | optional this parameter to show the info of the other user (default authenticated user) .

<!-- END_02b571ee5bd2fac11f2edd358ef66b79 -->

<!-- START_420023f5c9516339d727125164ebdc76 -->
## Change birthday

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/changeBirthday" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"birthday":"HFVUhw7tbq6kMEA0"}'
=======
<<<<<<< HEAD
    -d '{"birthday":"0EaM0nrC9uCghEB3"}'
=======
    -d '{"birthday":"HFVUhw7tbq6kMEA0"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changeBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "birthday": "HFVUhw7tbq6kMEA0"
=======
<<<<<<< HEAD
    "birthday": "0EaM0nrC9uCghEB3"
=======
    "birthday": "HFVUhw7tbq6kMEA0"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed your birthday"
}
```

### HTTP Request
`GET api/changeBirthday`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    birthday | date |  required  | .

<!-- END_420023f5c9516339d727125164ebdc76 -->

<!-- START_c5472ce7ed0d1881fe1dcf1f2c1b1b1b -->
## Who can see my birthday

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/whoCanSeeMyBirthday" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"seeMyBirthday":"Ok0VMyL1Btc6cXvE"}'
=======
<<<<<<< HEAD
    -d '{"seeMyBirthday":"C6uE0ro04Tk80nEB"}'
=======
    -d '{"seeMyBirthday":"Ok0VMyL1Btc6cXvE"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "seeMyBirthday": "Ok0VMyL1Btc6cXvE"
=======
<<<<<<< HEAD
    "seeMyBirthday": "C6uE0ro04Tk80nEB"
=======
    "seeMyBirthday": "Ok0VMyL1Btc6cXvE"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed who can see your birthday"
}
```

### HTTP Request
`GET api/whoCanSeeMyBirthday`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    seeMyBirthday | string |  required  | Must be ["onlyMe","everyOne" or "friends"].

<!-- END_c5472ce7ed0d1881fe1dcf1f2c1b1b1b -->

<!-- START_68706dcbebdc287c69bcb4d30a5dead4 -->
## Change country

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/changeCountry" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"country":"RrBLAaOqH62wwfpS"}'
=======
<<<<<<< HEAD
    -d '{"country":"smKMbJs7Xe4cMzIN"}'
=======
    -d '{"country":"RrBLAaOqH62wwfpS"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changeCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "country": "RrBLAaOqH62wwfpS"
=======
<<<<<<< HEAD
    "country": "smKMbJs7Xe4cMzIN"
=======
    "country": "RrBLAaOqH62wwfpS"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed your country"
}
```

### HTTP Request
`GET api/changeCountry`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    country | string |  required  | .

<!-- END_68706dcbebdc287c69bcb4d30a5dead4 -->

<!-- START_8ad0d2cfe08824d432faa04811393b65 -->
## Who can see my country

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/whoCanSeeMyCountry" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"seeMyCountry":"fq6X3CRT0myFJzAB"}'
=======
<<<<<<< HEAD
    -d '{"seeMyCountry":"aO1fKDLMDKMTKYrj"}'
=======
    -d '{"seeMyCountry":"fq6X3CRT0myFJzAB"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "seeMyCountry": "fq6X3CRT0myFJzAB"
=======
<<<<<<< HEAD
    "seeMyCountry": "aO1fKDLMDKMTKYrj"
=======
    "seeMyCountry": "fq6X3CRT0myFJzAB"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed who can see your country"
}
```

### HTTP Request
`GET api/whoCanSeeMyCountry`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    seeMyCountry | string |  required  | Must be ["onlyMe","everyOne" or "friends"].

<!-- END_8ad0d2cfe08824d432faa04811393b65 -->

<!-- START_7bff2655a3a8b1bce575fb23029c1fa7 -->
## Change city

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/changeCity" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"city":"skUjaYn1Cqhj4puo"}'
=======
<<<<<<< HEAD
    -d '{"city":"qUrmOTSlo9kBxEYV"}'
=======
    -d '{"city":"skUjaYn1Cqhj4puo"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/changeCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "city": "skUjaYn1Cqhj4puo"
=======
<<<<<<< HEAD
    "city": "qUrmOTSlo9kBxEYV"
=======
    "city": "skUjaYn1Cqhj4puo"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed your city"
}
```

### HTTP Request
`GET api/changeCity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    city | string |  required  | .

<!-- END_7bff2655a3a8b1bce575fb23029c1fa7 -->

<!-- START_744779377169b48280074aac19ad6760 -->
## Who can see my city

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/whoCanSeeMyCity" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"seeMyCity":"qRV8S8awjdpGGpLx"}'
=======
<<<<<<< HEAD
    -d '{"seeMyCity":"jTan8aNhdsrn8IWv"}'
=======
    -d '{"seeMyCity":"qRV8S8awjdpGGpLx"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "seeMyCity": "qRV8S8awjdpGGpLx"
=======
<<<<<<< HEAD
    "seeMyCity": "jTan8aNhdsrn8IWv"
=======
    "seeMyCity": "qRV8S8awjdpGGpLx"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "status": "true",
    "message": "You have changed who can see your city"
}
```

### HTTP Request
`GET api/whoCanSeeMyCity`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    seeMyCity | string |  required  | Must be ["onlyMe","everyOne" or "friends"].

<!-- END_744779377169b48280074aac19ad6760 -->

<!-- START_f10126ad0059168e8104f2a086e75abe -->
## search for an user

> Example request:

```bash
curl -X GET -G "http://localhost/api/UserController/{user}" \
    -H "Content-Type: application/json" \
<<<<<<< HEAD
    -d '{"userName":"o2FhYFrwdSOPNnfX"}'
=======
<<<<<<< HEAD
    -d '{"userName":"wInVBZ6d3F07Xg7c"}'
=======
    -d '{"userName":"o2FhYFrwdSOPNnfX"}'
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa

```

```javascript
const url = new URL("http://localhost/api/UserController/{user}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
<<<<<<< HEAD
    "userName": "o2FhYFrwdSOPNnfX"
=======
<<<<<<< HEAD
    "userName": "wInVBZ6d3F07Xg7c"
=======
    "userName": "o2FhYFrwdSOPNnfX"
>>>>>>> a0a4d9430d0e2377e8bec06375d233f80fb70dbb
>>>>>>> 50f3cec466aa2fac4361f639a0991813b9d840fa
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
    "user": {
        "id": "000000",
        "name": "Salma",
        "image_url": "https:\/\/image.jpg",
        "link": "https:\/\/www.goodreads.com\/user\/show\/000000-salma"
    }
}
```

### HTTP Request
`GET api/UserController/{user}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userName | string |  required  | search for a user by his/her userName.

<!-- END_f10126ad0059168e8104f2a086e75abe -->


