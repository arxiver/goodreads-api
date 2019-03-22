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
<!-- START_5f591b418d1c653384fb575623715a83 -->
## comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/makeComment" \
    -H "Content-Type: application/json" \
    -d '{"id":13,"type":18,"body":"hEydvDV0DrIEU2qv"}'

```

```javascript
const url = new URL("http://localhost/api/makeComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 13,
    "type": 18,
    "body": "hEydvDV0DrIEU2qv"
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
    "user": 1,
    "resourseId": "1",
    "resourseType": "2",
    "bodyOfReview": "it 's very good to follow me XD"
}
```
> Example response (200):

```json
{}
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

<!-- START_c46bc7cda5782151e86d302b69be7ef7 -->
## delete comment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/deleteComment" \
    -H "Content-Type: application/json" \
    -d '{"id":1}'

```

```javascript
const url = new URL("http://localhost/api/deleteComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 1
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
    "status": "true",
    "Message": "the comment is deleted"
}
```

### HTTP Request
`DELETE api/deleteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | comment id

<!-- END_c46bc7cda5782151e86d302b69be7ef7 -->

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

<!-- START_80dc13044fd2676e9d20409a038a90ab -->
## like

> Example request:

```bash
curl -X POST "http://localhost/api/makeLike" \
    -H "Content-Type: application/json" \
    -d '{"id":14,"type":20}'

```

```javascript
const url = new URL("http://localhost/api/makeLike");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 14,
    "type": 20
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

<!-- START_1c8b56dcc7476331d13beab7a976ba8f -->
## updates
Get user&#039;s updates from following users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/updates" \
    -H "Content-Type: application/json" \
    -d '{"user_id":11,"max_updates":15}'

```

```javascript
const url = new URL("http://localhost/api/updates");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 11,
    "max_updates": 15
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
                "id": "0000000",
                "actor": {
                    "id": "65993249",
                    "name": "Salma Ibrahim",
                    "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "numComments": "",
                "numLikes": "",
                "action": {
                    "id": "5",
                    "type": "0",
                    "rating": "",
                    "body": "",
                    "book": {
                        "id": "31087",
                        "title": "The Last Boleyn",
                        "imgUrl": "",
                        "shelf": "",
                        "rating": ""
                    }
                }
            },
            {
                "id": "000001",
                "actor": {
                    "id": "65993249",
                    "name": "Salma Ibrahim",
                    "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "numComments": "",
                "numLikes": "",
                "action": {
                    "id": "",
                    "type": "2",
                    "user": {
                        "name": "",
                        "imageLink": "",
                        "ratingAvg": "",
                        "ratingCount": ""
                    }
                }
            },
            {
                "id": "0000000",
                "actor": {
                    "id": "65993249",
                    "name": "Salma Ibrahim",
                    "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "numComments": "",
                "numLikes": "",
                "action": {
                    "id": "5",
                    "type": "1",
                    "shelf": "wants to read",
                    "book": {
                        "id": "31087",
                        "title": "The Last Boleyn",
                        "imgUrl": "",
                        "shelf": "",
                        "rating": ""
                    }
                }
            },
            {
                "id": "0000000",
                "actor": {
                    "id": "65993249",
                    "name": "Salma Ibrahim",
                    "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "action": {
                    "id": "7",
                    "type": "3",
                    "resourceType": "1",
                    "update": {
                        "id": "0000000",
                        "actor": {
                            "id": "65993249",
                            "name": "Salma Ibrahim",
                            "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                        },
                        "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                        "numComments": "",
                        "numLikes": "",
                        "action": {
                            "id": "5",
                            "type": "1",
                            "shelf": "wants to read",
                            "book": {
                                "id": "31087",
                                "title": "The Last Boleyn",
                                "imgUrl": "",
                                "shelf": "",
                                "rating": ""
                            }
                        }
                    }
                }
            },
            {
                "id": "0000000",
                "actor": {
                    "id": "65993249",
                    "name": "Salma Ibrahim",
                    "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                },
                "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                "action": {
                    "id": "7",
                    "type": "4",
                    "resourceType": "0",
                    "body": "",
                    "update": {
                        "id": "0000000",
                        "actor": {
                            "id": "65993249",
                            "name": "Salma Ibrahim",
                            "imageLink": "https:\/\/images.gr-assets.com\/users\/1489660298p2\/65993249.jpg"
                        },
                        "updated_at": "Fri, 08 Mar 2019 04:16:55 -0800",
                        "numComments": "",
                        "numLikes": "",
                        "action": {
                            "id": "5",
                            "type": "0",
                            "rating": "",
                            "body": "",
                            "book": {
                                "id": "31087",
                                "title": "The Last Boleyn",
                                "imgUrl": "",
                                "shelf": "",
                                "rating": ""
                            }
                        }
                    }
                }
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
    -d '{"page":10}'

```

```javascript
const url = new URL("http://localhost/api/notifications");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 10
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

<!-- START_300ec40d807333984a76a264dac57b69 -->
## list comments
lists comments for a specific resource(review,update)

> Example request:

```bash
curl -X GET -G "http://localhost/api/listComments" \
    -H "Content-Type: application/json" \
    -d '{"id":"vsc3bTXxRHtiav2K","type":15}'

```

```javascript
const url = new URL("http://localhost/api/listComments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "vsc3bTXxRHtiav2K",
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
`GET api/listComments`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | required |  optional  | int id of the commented resource
    type | integer |  required  | type of the resource (1 for user status and 2 for review)

<!-- END_300ec40d807333984a76a264dac57b69 -->

<!-- START_06b447ff2a11ad98e991c70ded4a0c5e -->
## list likes
lists likes for a specific resource(review,update)

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/listLikes" \
    -H "Content-Type: application/json" \
    -d '{"id":3,"type":16}'

```

```javascript
const url = new URL("http://localhost/api/listLikes");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 3,
    "type": 16
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

#Book
<!-- START_c84ecb8d4fd02d9a637dac124b62c629 -->
## List all books

> Example request:

```bash
curl -X GET -G "http://localhost/api/books" \
    -H "Content-Type: application/json" \
    -d '{"page":16,"books_per_page":4}'

```

```javascript
const url = new URL("http://localhost/api/books");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 16,
    "books_per_page": 4
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
    -d '{"book_id":13}'

```

```javascript
const url = new URL("http://localhost/api/books/show/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 13
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
    -d '{"genreName":"Zpdr2rN6f3SzAdjl","page":17,"books_per_page":19}'

```

```javascript
const url = new URL("http://localhost/api/books/genre/{genre_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "genreName": "Zpdr2rN6f3SzAdjl",
    "page": 17,
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

<!-- START_5d187f4ec204cb84ae6ab7d7ec4726e8 -->
## get the needed book by its name

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_title/{book_title}" \
    -H "Content-Type: application/json" \
    -d '{"title":"vwqZQiceCMIGlT9t"}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_title/{book_title}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "vwqZQiceCMIGlT9t"
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
`GET api/Books/book_title/{book_title}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | Find books by title

<!-- END_5d187f4ec204cb84ae6ab7d7ec4726e8 -->

<!-- START_d202bd96c80394da054916bbad4afec8 -->
## get the needed book by its ISBN

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_ISBN/{book_isbn}" \
    -H "Content-Type: application/json" \
    -d '{"ISBN":2}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_ISBN/{book_isbn}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ISBN": 2
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
`GET api/Books/book_ISBN/{book_isbn}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ISBN | integer |  required  | Find books by ISBN

<!-- END_d202bd96c80394da054916bbad4afec8 -->

<!-- START_7c9556875434f41a3ca5be8622e54c58 -->
## search about the needed book by its Author name

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_Authorname/{author_name}" \
    -H "Content-Type: application/json" \
    -d '{"Author_name":"aQ4Yk212Fpt1VNZL"}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_Authorname/{author_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Author_name": "aQ4Yk212Fpt1VNZL"
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
`GET api/Books/book_Authorname/{author_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    Author_name | string |  required  | Find books by Author's name.

<!-- END_7c9556875434f41a3ca5be8622e54c58 -->

#Following
<!-- START_5b980adc7cae0a3850861e87e9eb4fdc -->
## Follow User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/follow" \
    -H "Content-Type: application/json" \
    -d '{"user_id":9}'

```

```javascript
const url = new URL("http://localhost/api/follow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 9
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (201):

```json
{
    "status": "true",
    "message": "Successfully started following Prof. Nia White V"
}
```
> Example response (400):

```json
{
    "status": "false",
    "message": "Something gone wrong ."
}
```
> Example response (404):

```json
[]
```

### HTTP Request
`POST api/follow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Goodreads user id of user to follow.

<!-- END_5b980adc7cae0a3850861e87e9eb4fdc -->

<!-- START_53eaa2aeb494ad42904302950b418b5c -->
## Unfollow User
Stop following a user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/unfollow" \
    -H "Content-Type: application/json" \
    -d '{"user_id":19}'

```

```javascript
const url = new URL("http://localhost/api/unfollow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 19
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
    "status": "true",
    "message": "Successfully stopped following Darling White V"
}
```
> Example response (404):

```json
[]
```

### HTTP Request
`DELETE api/unfollow`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Goodreads user id of user to stop following.

<!-- END_53eaa2aeb494ad42904302950b418b5c -->

<!-- START_b8da414973862c44f3f0b86f52cbee94 -->
## Followers List
gets the followers of a user.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/followers" \
    -H "Content-Type: application/json" \
    -d '{"page":5,"user_id":15}'

```

```javascript
const url = new URL("http://localhost/api/followers");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 5,
    "user_id": 15
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
[]
```
> Example response (200):

```json
{
    "followers": [
        {
            "id": 1,
            "name": "Miss Madaline Wisozk V",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": 100,
            "currently_reading": "dummuybookName",
            "book_image": "http:\/\/treutel.biz\/",
            "pages": 1200
        },
        {
            "id": 4,
            "name": "Modu Rosenbaum",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": null,
            "currently_reading": null,
            "book_image": null,
            "pages": null
        },
        {
            "id": 5,
            "name": "Velda Rosenbaum",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": 10,
            "currently_reading": "dummuybookName",
            "book_image": "http:\/\/treutel.biz\/",
            "pages": 1200
        }
    ],
    "_start": 1,
    "_end": 3,
    "_total": 3
}
```

### HTTP Request
`GET api/followers`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1) returns 30 items per page .
    user_id | integer |  optional  | optional to get the followers list of a specific user (default authenticated user)

<!-- END_b8da414973862c44f3f0b86f52cbee94 -->

<!-- START_00cf70aa133b8675add61a926a8e351b -->
## Following List
gets the following list of a user .

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/following" \
    -H "Content-Type: application/json" \
    -d '{"page":1,"user_id":2}'

```

```javascript
const url = new URL("http://localhost/api/following");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 1,
    "user_id": 2
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
    "following": [
        {
            "id": 1,
            "name": "Miss Madaline Wisozk V",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": 100,
            "currently_reading": "dummuybookName",
            "book_image": "http:\/\/treutel.biz\/",
            "pages": 1200
        },
        {
            "id": 4,
            "name": "Modu Rosenbaum",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": null,
            "currently_reading": null,
            "book_image": null,
            "pages": null
        },
        {
            "id": 5,
            "name": "Velda Rosenbaum",
            "image_link": "http:\/\/wolf.info\/molestiae-qui-sed-at-vel",
            "book_id": 10,
            "currently_reading": "dummuybookName",
            "book_image": "http:\/\/treutel.biz\/",
            "pages": 1200
        }
    ],
    "_start": 1,
    "_end": 3,
    "_total": 3
}
```
> Example response (404):

```json
[]
```

### HTTP Request
`GET api/following`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    page | integer |  optional  | optional 1-N (default 1) returns 30 items per page .
    user_id | integer |  optional  | optional to get the following list of a specific user (default authenticated user)

<!-- END_00cf70aa133b8675add61a926a8e351b -->

#Review
<!-- START_1521f8492a220ccff8293eeac79158d1 -->
## Create a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/reviwes/create" \
    -H "Content-Type: application/json" \
    -d '{"bookId":8,"shelf":1,"body":"hkd2MMCaKc4M3yqX","rating":15}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "bookId": 8,
    "shelf": 1,
    "body": "hkd2MMCaKc4M3yqX",
    "rating": 15
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (201):

```json
{
    "status": "true",
    "user": 2,
    "book_id": "1",
    "shelfType": "read",
    "bodyOfReview": "Woooooooooooooow , it's a great booooook",
    "rate": "1"
}
```
> Example response (204):

```json
{
    "status": "false",
    "Message": "There is no Book in the database"
}
```
> Example response (404):

```json
{
    "status": "false",
    "Message": "There is no rate to create the review"
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The rating must be an integer."
}
```

### HTTP Request
`POST api/reviwes/create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    bookId | integer |  required  | The book id has reviewed  to be created.
    shelf | integer |  required  | (read->0,currently-reading->1,to-read->2,nothig of these shelves->3) default is (read) .
    body | optional |  optional  | string optional The text of the review.
    rating | integer |  optional  | optional Rating (0-5) default is 0 (No rating).

<!-- END_1521f8492a220ccff8293eeac79158d1 -->

<!-- START_6747893efdb21a433cd9cc3b708804f1 -->
## List all reviews of the authenticated user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/myreviews" 
```

```javascript
const url = new URL("http://localhost/api/myreviews");

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
    "status": "false",
    "message": "UnAuthorized"
}
```

### HTTP Request
`GET api/myreviews`


<!-- END_6747893efdb21a433cd9cc3b708804f1 -->

<!-- START_f2bf516816a6bd1a29bad51fe25e8a4a -->
## Edit a review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost/api/reviwes/edit" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":2,"body":"8KoRFiUzaA1foE5I","rating":20}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": 2,
    "body": "8KoRFiUzaA1foE5I",
    "rating": 20
}

fetch(url, {
    method: "PUT",
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
    "user": 1,
    "resourseId": "1",
    "resourseType": "2",
    "bodyOfReview": "it 's very good to follow me XD"
}
```

### HTTP Request
`PUT api/reviwes/edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | integer |  required  | Review Id.
    body | text |  optional  | optional The text of the review.
    rating | integer |  required  | Rating (0-5) default is the same as it was .

<!-- END_f2bf516816a6bd1a29bad51fe25e8a4a -->

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

<!-- START_f05a99566a1946530084c8ed20cdce5a -->
## Remove a Review

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/reviwes/{id}" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":2}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": 2
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
    "state": "delete is done"
}
```

### HTTP Request
`DELETE api/reviwes/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | integer |  required  | The id of review to be deleted.

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
    -d '{"isbns":"LF3pAH5UqazaU9nL"}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/users/books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "isbns": "LF3pAH5UqazaU9nL"
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
    -d '{"title":"w3VRrGybKzvyzyu0","author":"Bgr98ZPoW75KoQoc","rating":8}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/books/{boodTitle}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "w3VRrGybKzvyzyu0",
    "author": "Bgr98ZPoW75KoQoc",
    "rating": 8
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

<!-- START_3b8bc689333e11a42e9435563eb81d81 -->
## List the reviews for a specific user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/listReviewOfUser" \
    -H "Content-Type: application/json" \
    -d '{"userId":"LuCKKPqmWczD6FtX"}'

```

```javascript
const url = new URL("http://localhost/api/listReviewOfUser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "LuCKKPqmWczD6FtX"
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

<!-- START_372361de1939f63d652e087d8a0247c1 -->
## get a specific review with it&#039;s comments and likes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewOfBook/{id}" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":"kAhA2qBCy2TC7rmT"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewOfBook/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": "kAhA2qBCy2TC7rmT"
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
    "status": "failed",
    "pages": []
}
```

### HTTP Request
`GET api/showReviewOfBook/{id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | required |  optional  | id of the of the review to get it's body when notification happens

<!-- END_372361de1939f63d652e087d8a0247c1 -->

<!-- START_35312a6c43c9e348424ab1410c1f4202 -->
## Get the review for specific user on a specific Book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewForBookForUser/{user_id}/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"userId":"Ey0hRVIhVEVxtegX","bookId":"9hsF6L4Zpt4PRcfI"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewForBookForUser/{user_id}/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "Ey0hRVIhVEVxtegX",
    "bookId": "9hsF6L4Zpt4PRcfI"
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
[]
```

### HTTP Request
`GET api/showReviewForBookForUser/{user_id}/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | required |  optional  | id of the of the user
    bookId | required |  optional  | id of the of the book

<!-- END_35312a6c43c9e348424ab1410c1f4202 -->

<!-- START_b59d8c710c80a5c61528f8e003c4b30a -->
## Get the review for specific user on a specific Book

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewsForABook/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"bookId":18}'

```

```javascript
const url = new URL("http://localhost/api/showReviewsForABook/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "bookId": 18
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
[]
```

### HTTP Request
`GET api/showReviewsForABook/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    bookId | integer |  required  | id of the of the book

<!-- END_b59d8c710c80a5c61528f8e003c4b30a -->

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
    -d '{"shelf_name":"NB1tRuMXrbMbyPji"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "NB1tRuMXrbMbyPji"
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
    -d '{"shelf_name":"M8AiWY6MMbAnL2gr","book_id":17}'

```

```javascript
const url = new URL("http://localhost/api/shelf/add_book");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "M8AiWY6MMbAnL2gr",
    "book_id": 17
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
    -d '{"user_id":3,"page":8,"books_per_page":9}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 3,
    "page": 8,
    "books_per_page": 9
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
    -d '{"shelf_name":"wHSKYWqOLOnoysaf","book_id":5}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}/remove_book/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "wHSKYWqOLOnoysaf",
    "book_id": 5
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

<!-- START_87fd9bac6b43987c27c7179f6bc63f4d -->
## show books on the shelf

> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":16,"shelf_name":"hRjZI75tMu5VmD6x"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 16,
    "shelf_name": "hRjZI75tMu5VmD6x"
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
`GET api/shelf/{user_id}/{shelf_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    user_id | integer |  required  | Get the books on a member's shelf.
    shelf_name | string |  required  | specified shelf`s name.

<!-- END_87fd9bac6b43987c27c7179f6bc63f4d -->

#user management

APIs for managing users (Sofyan)
<!-- START_68ff8c9e5dd1db295b6f780b9fcfbeb2 -->
## Sign Up

> Example request:

```bash
curl -X POST "http://localhost/api/signUp" \
    -H "Content-Type: application/json" \
    -d '{"email":"3x0qVtp9dNCDWSGe","password":"YT5o3AkhVrun7TJD","password_confirmation":"jrb2GRolK39nWkbe","name":"062bxvWKIhoiealY","gender":"Tnw2K9U0U3CW8jMt","birthday":"9Nq4YFP44bkTOVxc","country":"JKZkYejZ1IkCErpK","city":"Rx6Kk3dTVJSFVA4m"}'

```

```javascript
const url = new URL("http://localhost/api/signUp");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "3x0qVtp9dNCDWSGe",
    "password": "YT5o3AkhVrun7TJD",
    "password_confirmation": "jrb2GRolK39nWkbe",
    "name": "062bxvWKIhoiealY",
    "gender": "Tnw2K9U0U3CW8jMt",
    "birthday": "9Nq4YFP44bkTOVxc",
    "country": "JKZkYejZ1IkCErpK",
    "city": "Rx6Kk3dTVJSFVA4m"
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
        "The username field is required.",
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
        "birthday": "",
        "joined_at": "",
        "username": "",
        "gender": "",
        "last_active": "",
        "country": "",
        "city": "",
        "rating_count": "",
        "rating_avg": "",
        "following_count": "",
        "followers_count": "",
        "image_link": ""
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
    -d '{"email":"LEET7PzntrGu4Qf5","password":"fzmeCwkxb2t1isOW"}'

```

```javascript
const url = new URL("http://localhost/api/logIn");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "LEET7PzntrGu4Qf5",
    "password": "fzmeCwkxb2t1isOW"
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
        "birthday": "",
        "joined_at": "",
        "username": "",
        "gender": "",
        "last_active": "",
        "country": "",
        "city": "",
        "rating_count": "",
        "rating_avg": "",
        "following_count": "",
        "followers_count": "",
        "image_link": ""
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
    -d '{"password":"c5LYqiMbgmJxCGui","newPassword":"vlYlY8Ums7DZq0Vx","newPassword_confirmation":"EHr3oHwgaQsv8yiL"}'

```

```javascript
const url = new URL("http://localhost/api/changePassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "c5LYqiMbgmJxCGui",
    "newPassword": "vlYlY8Ums7DZq0Vx",
    "newPassword_confirmation": "EHr3oHwgaQsv8yiL"
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
    -d '{"password":"h5bAhU5FmztbwArc","newName":"8ZNPUOarhKZ3EcZ9"}'

```

```javascript
const url = new URL("http://localhost/api/changeName");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "h5bAhU5FmztbwArc",
    "newName": "8ZNPUOarhKZ3EcZ9"
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
    -d '{"Image":"Mogfpz0P8ev8wBcs"}'

```

```javascript
const url = new URL("http://localhost/api/changeImage");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Image": "Mogfpz0P8ev8wBcs"
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
    -d '{"password":"wQH2UvnuztNDvl4Z"}'

```

```javascript
const url = new URL("http://localhost/api/delete");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "wQH2UvnuztNDvl4Z"
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
    -d '{"id":12}'

```

```javascript
const url = new URL("http://localhost/api/showProfile");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 12
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
    -d '{"birthday":"1SGpKPmqa5dNwFOX"}'

```

```javascript
const url = new URL("http://localhost/api/changeBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "birthday": "1SGpKPmqa5dNwFOX"
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
    -d '{"seeMyBirthday":"Z55H8AbStQCINwIR"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyBirthday": "Z55H8AbStQCINwIR"
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
    -d '{"country":"R6dmIjxauhY5Wa04"}'

```

```javascript
const url = new URL("http://localhost/api/changeCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "country": "R6dmIjxauhY5Wa04"
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
    -d '{"seeMyCountry":"RNqFIzVXfo0gd6Ae"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyCountry": "RNqFIzVXfo0gd6Ae"
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
    -d '{"city":"bdPmmDfWRMM95PhF"}'

```

```javascript
const url = new URL("http://localhost/api/changeCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "city": "bdPmmDfWRMM95PhF"
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
    -d '{"seeMyCity":"3XIk4v7mKHj9pZbb"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyCity": "3XIk4v7mKHj9pZbb"
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
    -d '{"userName":"8PAga7Df2aIduCfH"}'

```

```javascript
const url = new URL("http://localhost/api/UserController/{user}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userName": "8PAga7Df2aIduCfH"
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


