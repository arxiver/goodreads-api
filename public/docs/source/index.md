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
<!-- START_e65df2963c4f1f0bfdd426ee5170e8b7 -->
## notifications
gets a user&#039;s notifications

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/notifications" \
    -H "Content-Type: application/json" \
    -d '{"page":15}'

```

```javascript
const url = new URL("http://localhost/api/notifications");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 15
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
    -d '{"id":"ULJwyowYNKLixPdv","type":14}'

```

```javascript
const url = new URL("http://localhost/api/listComments");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": "ULJwyowYNKLixPdv",
    "type": 14
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
    -d '{"id":20,"type":20}'

```

```javascript
const url = new URL("http://localhost/api/listLikes");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 20,
    "type": 20
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
<!-- START_c1831963c98e5d1e2dc2749444d2233b -->
## Show book

> Example request:

```bash
curl -X GET -G "http://localhost/api/books/show" \
    -H "Content-Type: application/json" \
    -d '{"book_id":9}'

```

```javascript
const url = new URL("http://localhost/api/books/show");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "book_id": 9
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
`GET api/books/show`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    book_id | integer |  required  | The id of the book.

<!-- END_c1831963c98e5d1e2dc2749444d2233b -->

<!-- START_c84ecb8d4fd02d9a637dac124b62c629 -->
## List all books

> Example request:

```bash
curl -X GET -G "http://localhost/api/books" \
    -H "Content-Type: application/json" \
    -d '{"page":15,"books_per_page":5}'

```

```javascript
const url = new URL("http://localhost/api/books");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 15,
    "books_per_page": 5
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

<!-- START_1ebf60b0f5e42ff9b1cbdcd9f468d722 -->
## Show books by genre
function is responsible for showing books by
returning the (id,title,publication_date, isbn, image url,publisher,language,
description,reviews count,rating count,link,author id,genre)
all of that formed by sending the parameters which :-
genre type.

> Example request:

```bash
curl -X GET -G "http://localhost/api/books/genre/{genre_name}" \
    -H "Content-Type: application/json" \
    -d '{"genreName":"dF60DmEIQAzlLAD4"}'

```

```javascript
const url = new URL("http://localhost/api/books/genre/{genre_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "genreName": "dF60DmEIQAzlLAD4"
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

<!-- END_1ebf60b0f5e42ff9b1cbdcd9f468d722 -->

<!-- START_5d187f4ec204cb84ae6ab7d7ec4726e8 -->
## get the needed book by its name
this function is responsible for showing certain book by
returning the (id,title,publication_date, isbn, image url,publisher,language,
description,reviews count,rating count,link,author id,genre)
all of that formed by sending the parameters which :-
title.

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_title/{book_title}" \
    -H "Content-Type: application/json" \
    -d '{"title":"rNb4g0eYEN94kKsP"}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_title/{book_title}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "rNb4g0eYEN94kKsP"
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
this function is responsible for showing certain book by
returning the (id,title,publication_date, isbn, image url,publisher,language,
description,reviews count,rating count,link,author id,genre)
all of that formed by sending the parameters which :-
isbn.

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_ISBN/{book_isbn}" \
    -H "Content-Type: application/json" \
    -d '{"ISBN":17}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_ISBN/{book_isbn}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ISBN": 17
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
this function is responsible for showing certain book by
returning the (id,title,publication_date, isbn, image url,publisher,language
,description,reviews count,rating count,link,author id,genre)
all of that formed by sending the parameters which :-
author name

> Example request:

```bash
curl -X GET -G "http://localhost/api/Books/book_Authorname/{author_name}" \
    -H "Content-Type: application/json" \
    -d '{"Author_name":"Et5m37YzvjAcEtTL"}'

```

```javascript
const url = new URL("http://localhost/api/Books/book_Authorname/{author_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Author_name": "Et5m37YzvjAcEtTL"
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

#Review
<!-- START_b5b6c6d01bc0058683ce95a3bd41d9ed -->
## Get review statistics given a list of ISBNs
take alist of books and then return their reviews And Rates
and i will use it to get the review for one book array of one element

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/users/books/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"isbns":"R6G1jXBIIFdzKvYk"}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/users/books/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "isbns": "R6G1jXBIIFdzKvYk"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
```

### HTTP Request
`GET api/reviwes/users/books/{book_id}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    isbns | ArrayofInt |  required  | Array of ISBNs(1000 ISBNs per request max.).

<!-- END_b5b6c6d01bc0058683ce95a3bd41d9ed -->

<!-- START_ceef72433d94fbcde535849da946b411 -->
## Get the reviews for a book given a title string.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
this function is responsible for showing certain review by
returning the (body,rating,comments counts, likes counts, user id ,book id , updates date)
of a certain review and also it returns the shelf name of the book the review about
all of that formed by sending the parameters which :-
title -> required.
rating ->optional.
author ->optional.

> Example request:

```bash
curl -X GET -G "http://localhost/api/reviwes/books/{boodTitle}" \
    -H "Content-Type: application/json" \
    -d '{"title":"1vcqSNoYvOYPEYBB","author":"vSAvXRRyb6PQk2Wl","rating":6}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/books/{boodTitle}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "title": "1vcqSNoYvOYPEYBB",
    "author": "vSAvXRRyb6PQk2Wl",
    "rating": 6
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
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
    -d '{"userId":"biPPje8zARJqIZvS"}'

```

```javascript
const url = new URL("http://localhost/api/listReviewOfUser");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "biPPje8zARJqIZvS"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
```

### HTTP Request
`GET api/listReviewOfUser`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    userId | required |  optional  | id of the user

<!-- END_3b8bc689333e11a42e9435563eb81d81 -->

<!-- START_372361de1939f63d652e087d8a0247c1 -->
## get a specific review
this function is responsible for showing details of a certain review by
returning the (body,rating,comments counts, likes counts, user id ,book id )
of a certain review and also it returns the shelf name of the book the review about
all of that formed by sending the parameters which :-
review id.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewOfBook/{id}" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":"fOwtYX6X4JoZgJtX"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewOfBook/{id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": "fOwtYX6X4JoZgJtX"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": "UnAuthorized"
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
this function is responsible for showing review of a certain user on a certain book by
returning the (body,rating) of a certain review and also it returns the shelf name of
the book the review about
all of that formed by sending the parameters which :-
book id and
user id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewForBookForUser/{user_id}/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"userId":"06uaddE5FfH1qM1u","bookId":"zERScqPR2naQwJ59"}'

```

```javascript
const url = new URL("http://localhost/api/showReviewForBookForUser/{user_id}/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userId": "06uaddE5FfH1qM1u",
    "bookId": "zERScqPR2naQwJ59"
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
this function is responsible for showing review of a certain book by returning the (idmbody,rating,likes count,
comments count,user id)
of a certain review and also it returns the shelf name of the book the review about
and also the username as well, all of that formed by sending the parameters which :-
book id

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showReviewsForABook/{book_id}" \
    -H "Content-Type: application/json" \
    -d '{"bookId":15}'

```

```javascript
const url = new URL("http://localhost/api/showReviewsForABook/{book_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "bookId": 15
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

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
```

### HTTP Request
`GET api/myreviews`


<!-- END_6747893efdb21a433cd9cc3b708804f1 -->

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

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
```

### HTTP Request
`GET api/reviwes`


<!-- END_b7f52079bc658d3faea44274e95c9859 -->

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
    -d '{"shelf_name":"wFJiPbesXNrFdPcT"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_name": "wFJiPbesXNrFdPcT"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": "UnAuthorized"
}
```

### HTTP Request
`GET api/shelf/{shelf_name}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_name | string |  required  | The name of the shelf.

<!-- END_f029a85d3a1a2f160cdbf493d58b76da -->

<!-- START_dc4e2f12407ce17b65f4e9e9488551dc -->
## Get User`s shelves

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":3,"page":10,"books_per_page":12}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 3,
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

<!-- START_87fd9bac6b43987c27c7179f6bc63f4d -->
## show books on the shelf
* this function is responsible for showing books on the user&#039;s shelf by
returning the (book id,title).

all of that formed by sending the parameters which :-
shelf name
user id

> Example request:

```bash
curl -X GET -G "http://localhost/api/shelf/{user_id}/{shelf_name}" \
    -H "Content-Type: application/json" \
    -d '{"user_id":19,"shelf_name":"42aRJGFWXUPooE52"}'

```

```javascript
const url = new URL("http://localhost/api/shelf/{user_id}/{shelf_name}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 19,
    "shelf_name": "42aRJGFWXUPooE52"
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

#User 

APIs for managing users (Sofyan)
<!-- START_90f45d502fd52fdc0b289e55ba3c2ec6 -->
## Sign Up

> Example request:

```bash
curl -X POST "http://localhost/api/signup" \
    -H "Content-Type: application/json" \
    -d '{"email":"iou16PPa8YsgDmlH","password":"VYLRHZuE3EYDDaqx","password_confirmation":"zghBbfFjNUiAV5SE","name":"ZjezTL6qocAN87Tf","gender":"pD3riJQmnZKaGJcd","birthday":"Qt1VdUjKzaqHWfg6","country":"iJHv8HdJzYPbeAUZ","city":"MLCvSRSZQA9zc4Ly"}'

```

```javascript
const url = new URL("http://localhost/api/signup");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "iou16PPa8YsgDmlH",
    "password": "VYLRHZuE3EYDDaqx",
    "password_confirmation": "zghBbfFjNUiAV5SE",
    "name": "ZjezTL6qocAN87Tf",
    "gender": "pD3riJQmnZKaGJcd",
    "birthday": "Qt1VdUjKzaqHWfg6",
    "country": "iJHv8HdJzYPbeAUZ",
    "city": "MLCvSRSZQA9zc4Ly"
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
        "name": "",
        "username": "",
        "image_link": ""
    },
    "token": "",
    "token_type": "",
    "expires_in": ""
}
```

### HTTP Request
`POST api/signup`

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

<!-- END_90f45d502fd52fdc0b289e55ba3c2ec6 -->

<!-- START_dd73fe89d9872ce37d284636141ae526 -->
## Change password

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/changePassword" \
    -H "Content-Type: application/json" \
    -d '{"password":"X14pJKVk4sREjiPB","newPassword":"MM0hXNKNEaVBVXSV","newPassword_confirmation":"g8f66PFAGxkyvNbb"}'

```

```javascript
const url = new URL("http://localhost/api/changePassword");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "X14pJKVk4sREjiPB",
    "newPassword": "MM0hXNKNEaVBVXSV",
    "newPassword_confirmation": "g8f66PFAGxkyvNbb"
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
    -d '{"password":"KDEveYuvDC6UFHLq","newName":"qzXC3FUntmMwQjmx"}'

```

```javascript
const url = new URL("http://localhost/api/changeName");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "KDEveYuvDC6UFHLq",
    "newName": "qzXC3FUntmMwQjmx"
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
    -d '{"Image":"heXPkJmXR3wKctrs"}'

```

```javascript
const url = new URL("http://localhost/api/changeImage");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "Image": "heXPkJmXR3wKctrs"
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
    -d '{"password":"yDUHEGCMMmkJFK1D"}'

```

```javascript
const url = new URL("http://localhost/api/delete");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "password": "yDUHEGCMMmkJFK1D"
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

<!-- START_420023f5c9516339d727125164ebdc76 -->
## Change birthday

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/changeBirthday" \
    -H "Content-Type: application/json" \
    -d '{"birthday":"jEn6OtMKumkWNAYw"}'

```

```javascript
const url = new URL("http://localhost/api/changeBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "birthday": "jEn6OtMKumkWNAYw"
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
    -d '{"seeMyBirthday":"Wjg3dYyiH4olJW5v"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyBirthday");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyBirthday": "Wjg3dYyiH4olJW5v"
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
    -d '{"country":"OPq9HHWwzgF2GFdi"}'

```

```javascript
const url = new URL("http://localhost/api/changeCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "country": "OPq9HHWwzgF2GFdi"
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
    -d '{"seeMyCountry":"PRasmjJLD9X61mZl"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCountry");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyCountry": "PRasmjJLD9X61mZl"
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
    -d '{"city":"iJToAigO16tYaKGP"}'

```

```javascript
const url = new URL("http://localhost/api/changeCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "city": "iJToAigO16tYaKGP"
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
    -d '{"seeMyCity":"reuLEnX9G7ozMDwb"}'

```

```javascript
const url = new URL("http://localhost/api/whoCanSeeMyCity");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "seeMyCity": "reuLEnX9G7ozMDwb"
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
    -d '{"userName":"V437iApuCiXBnU2m"}'

```

```javascript
const url = new URL("http://localhost/api/UserController/{user}");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "userName": "V437iApuCiXBnU2m"
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

#[Activities].Delete Comment
deleteComment function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

check that the authenticated user is  the one who create the comment to allow to him to delete it.

delete the comment and decrement the number of comments in review or shelf or follow
<!-- START_c46bc7cda5782151e86d302b69be7ef7 -->
## api/deleteComment
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/deleteComment" \
    -H "Content-Type: application/json" \
    -d '{"id":15}'

```

```javascript
const url = new URL("http://localhost/api/deleteComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 15
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
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't delete comment on this review becouse this review doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't delete comment on this shelf becouse this shelf doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't delete comment on this follow becouse this follow doesn't exists."
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The id must be an integer."
}
```

### HTTP Request
`DELETE api/deleteComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | comment id

<!-- END_c46bc7cda5782151e86d302b69be7ef7 -->

#[Activities].Like
like function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

you can make like on three types only (review,follow,add book to shelf)

the function check that the like is on one of the three type then make the like

increment the number of likes in the review or follow or  add to shelf
<!-- START_80dc13044fd2676e9d20409a038a90ab -->
## api/makeLike
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/makeLike" \
    -H "Content-Type: application/json" \
    -d '{"id":10,"type":2}'

```

```javascript
const url = new URL("http://localhost/api/makeLike");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 10,
    "type": 2
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
    "resourse_id": 1,
    "resourse_type": 2
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a like on this review becouse this review doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a like on this shelf becouse this shelf doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a like on this follow becouse this follow doesn't exists."
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The id must be an integer."
}
```

### HTTP Request
`POST api/makeLike`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | id of the liked resource
    type | integer |  required  | type of the resource (1 for user status and 2 for review)

<!-- END_80dc13044fd2676e9d20409a038a90ab -->

#[Activities].Make Comment
makeComment function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

you can make comment on three types only (review,follow,add book to shelf)

the function check that the comment is on one of the three type then make the comment 

increment the number of comments in the review or follow or  add to shelf
<!-- START_5f591b418d1c653384fb575623715a83 -->
## api/makeComment
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/makeComment" \
    -H "Content-Type: application/json" \
    -d '{"id":7,"type":3,"body":"1XmsZlGJkiHu1QRP"}'

```

```javascript
const url = new URL("http://localhost/api/makeComment");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 7,
    "type": 3,
    "body": "1XmsZlGJkiHu1QRP"
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
    "resourse_id": 1,
    "resourse_type": 2,
    "comment_body": "it 's very good to follow me XD"
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "The body is required to make a comment."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a comment on this review becouse this review doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a comment on this shelf becouse this shelf doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a comment on this follow becouse this follow doesn't exists."
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The id must be an integer."
}
```

### HTTP Request
`POST api/makeComment`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | id of the commented resource.
    type | integer |  required  | type of the resource (0-> review , 1-> shelves , 2-> followings).
    body | string |  required  | the body of the comment .

<!-- END_5f591b418d1c653384fb575623715a83 -->

#[Activities].Unlike
unLike function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

check that the authenticated user is  the one who make like to allow to him to unlike it.

unlike and decrement the number of likes in review or shelf or follow
<!-- START_3d49e7be6b108116b78dde56f94b4d52 -->
## api/unlike
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/unlike" \
    -H "Content-Type: application/json" \
    -d '{"id":19}'

```

```javascript
const url = new URL("http://localhost/api/unlike");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 19
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
    "Message": "unLike "
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a unlike on this review becouse this review doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a unlike on this shelf becouse this shelf doesn't exists."
}
```
> Example response (204):

```json
{
    "status": "false",
    "errors": "can't make a unlike on this follow becouse this follow doesn't exists."
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The id must be an integer."
}
```

### HTTP Request
`DELETE api/unlike`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | like id

<!-- END_3d49e7be6b108116b78dde56f94b4d52 -->

#[Activities].Updates
updates function

Get user's updates from following users

first the function validates the sent parameters if any if it isn't valid 
an error response returns with 400 status code

if there is no parameters sent the default is to return all updates that would be shown to the authenticated user
get all the users followed by the authenticated user then all the activities made by them
those activities are retrieved from five different database tables that store these info 
(shelves,reviews,likes,comments,followings) then the data is merged into one array and sorted 
by updated_at date descendingly in order to show the user the user the latest updates first

if a valid user id is sent then all activities made by this specific user are retrieved the same 
way explained earlier in order to show it in this user's profile

if a valid max updates is sent then this value is retrieved from the array after sorting
<!-- START_1c8b56dcc7476331d13beab7a976ba8f -->
## api/updates
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/updates" \
    -H "Content-Type: application/json" \
    -d '{"user_id":2,"max_updates":1}'

```

```javascript
const url = new URL("http://localhost/api/updates");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 2,
    "max_updates": 1
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
    "updates": [
        {
            "id": 2,
            "body": null,
            "rating": null,
            "likes_count": null,
            "comments_count": null,
            "updated_at": "2019-03-21 00:00:00",
            "book_id": 1,
            "title": "a",
            "description": "",
            "img_url": "",
            "reviews_count": null,
            "ratings_count": null,
            "ratings_avg": null,
            "pages_no": null,
            "user_id": 2,
            "name": "",
            "image_link": null,
            "author_name": "a",
            "update_type": 0
        },
        {
            "id": 1,
            "shelf_type": 3,
            "updated_at": "2019-03-15 00:00:00",
            "likes_count": null,
            "comments_count": null,
            "book_id": 1,
            "title": "a",
            "description": "",
            "img_url": "",
            "reviews_count": null,
            "ratings_count": null,
            "ratings_avg": null,
            "pages_no": null,
            "user_id": 2,
            "name": "",
            "image_link": null,
            "author_name": "a",
            "update_type": 1
        },
        {
            "id": 2,
            "shelf_type": 3,
            "updated_at": "2019-03-01 00:00:00",
            "likes_count": null,
            "comments_count": null,
            "book_id": 1,
            "title": "a",
            "description": "",
            "img_url": "",
            "reviews_count": null,
            "ratings_count": null,
            "ratings_avg": null,
            "pages_no": null,
            "user_id": 3,
            "name": "",
            "image_link": null,
            "author_name": "a",
            "update_type": 1
        },
        {
            "updated_at": "2019-03-19 00:00:00",
            "u_id": 2,
            "user_image_link": null,
            "user_name": "",
            "followed_id": 3,
            "followed_image_link": null,
            "followed_name": "",
            "update_type": 2
        },
        {
            "id": 2,
            "resourse_type": 0,
            "updated_at": null,
            "comment_body": "",
            "review_id": 1,
            "body": null,
            "rating": null,
            "comments_count": null,
            "review_updated_at": "2019-03-03 00:00:00",
            "book_id": 1,
            "title": "a",
            "description": "",
            "img_url": "",
            "reviews_count": null,
            "ratings_count": null,
            "ratings_avg": null,
            "pages_no": null,
            "user_id": 1,
            "name": "",
            "image_link": null,
            "author_name": "a",
            "update_type": 4
        },
        {
            "id": 2,
            "resourse_type": 0,
            "updated_at": null,
            "review_id": 1,
            "body": null,
            "rating": null,
            "likes_count": null,
            "comments_count": null,
            "review_updated_at": "2019-03-03 00:00:00",
            "book_id": 1,
            "title": "a",
            "description": "",
            "img_url": "",
            "reviews_count": null,
            "ratings_count": null,
            "ratings_avg": null,
            "pages_no": null,
            "user_id": 1,
            "name": "",
            "image_link": null,
            "author_name": "a",
            "update_type": 3
        }
    ]
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

#[Following].Follow User
followUser function

Checking the request`s paramaters that has [user_id] paramater

it is aborting in case no user_id is given

Validate the existance of the user_id
if the user doesn`t exist aborting

Validate the relationship is not existing before.
responsing 400 if it exist.

if not exists creating new instance of following model

`
increamenting both Follower: follwoing_count / Followed: followers_count 
`

Responses with successfully message in case of passing aborting
<!-- START_5b980adc7cae0a3850861e87e9eb4fdc -->
## api/follow
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/follow" \
    -H "Content-Type: application/json" \
    -d '{"user_id":5}'

```

```javascript
const url = new URL("http://localhost/api/follow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 5
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

#[Following].Followers List

followersUser function .


returns followers list of the given [ user_id ] and their currently reading books

each page contains 30 user limiting query with max 30 record.

Checking the request paramaters and validate the existance of the user

aborting in-case of user is not exist

other wise returns the user`s followers list from database table .
<!-- START_b8da414973862c44f3f0b86f52cbee94 -->
## api/followers
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/followers" \
    -H "Content-Type: application/json" \
    -d '{"page":7,"user_id":6}'

```

```javascript
const url = new URL("http://localhost/api/followers");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 7,
    "user_id": 6
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

#[Following].Following List


followingUser function .

returns following list of the given [ user_id ] and their currently reading books

each page contains 30 user limiting query with max 30 record.

Checking the request paramaters and validate the existance of the user

aborting in-case of user is not exist

other wise returns the user`s following list from database table .
<!-- START_00cf70aa133b8675add61a926a8e351b -->
## api/following
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/following" \
    -H "Content-Type: application/json" \
    -d '{"page":13,"user_id":12}'

```

```javascript
const url = new URL("http://localhost/api/following");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "page": 13,
    "user_id": 12
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

#[Following].Unfollow User
unfollowUser function

Checking the request`s paramaters that has [user_id] paramater

it is aborting in case no user_id is given

Validate the existance of the user_id
if the user doesn`t exist aborting

Validate the relationship is existing .
if it is not existing it`s aborting .

if exists it is being removes successfully

`
decreamenting both Follower: follwoing_count / Followed: followers_count 
`

Responses with successfully message in case of passing aborting
<!-- START_53eaa2aeb494ad42904302950b418b5c -->
## api/unfollow
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/unfollow" \
    -H "Content-Type: application/json" \
    -d '{"user_id":18}'

```

```javascript
const url = new URL("http://localhost/api/unfollow");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "user_id": 18
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

#[Review].Delete Review
removeReview function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

check that the authenticated user is  the one who create the review to allow to him to delete it.

 delete the review from the databse 

 decrement the number of reviews on this book 

 decrement the number of ratings on this book

 modify the avgrating for this book 

 decrement the number of ratings for the user

 modify the avgrating for the user

 delete the comment and likes on this review and count them
<!-- START_2ecb9931d2d714dcd6eb41145f7f269b -->
## api/reviwes/delete
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/reviwes/delete" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":6}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/delete");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": 6
}

fetch(url, {
    method: "DELETE",
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
    "userId": 2,
    "ratings_countUser": 4,
    "rating_avgUser": "4.0000",
    "BookId": 3,
    "ratings_avgBook": "4.0000",
    "reviews_countBook": 37,
    "ratings_countBook": 19,
    "NumberOfDeletedCommentsOnThisReview": 3,
    "NumberOfDeletedLikesOnThisReview": 1
}
```
> Example response (204):

```json
{
    "status": "false",
    "Message": "This review doesn't belong to you Ahmed"
}
```
> Example response (204):

```json
{
    "status": "false",
    "Message": "The reviewId is wrongggg."
}
```
> Example response (406):

```json
{
    "status": "false",
    "errors": "The reviewId must be an integer."
}
```

### HTTP Request
`DELETE api/reviwes/delete`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | integer |  required  | The id of review to be deleted.

<!-- END_2ecb9931d2d714dcd6eb41145f7f269b -->

#[Review].Edit Review
editReview function

make a validation on the input to check that is satisfing the conditions. 

if tha input is valid it will continue in the code otherwise it will response with error.

check that the authenticated user is  the one who create the review to allow to him to edit it.

edit the review and rating value.
<!-- START_f2bf516816a6bd1a29bad51fe25e8a4a -->
## api/reviwes/edit
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT "http://localhost/api/reviwes/edit" \
    -H "Content-Type: application/json" \
    -d '{"reviewId":2,"body":"Z8eJrPhDCuMry7u1","rating":7}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/edit");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "reviewId": 2,
    "body": "Z8eJrPhDCuMry7u1",
    "rating": 7
}

fetch(url, {
    method: "PUT",
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
    "user": 1,
    "bodyOfReview": "it 's very good to follow me XD",
    "review_id": 2,
    "rate": 4
}
```
> Example response (204):

```json
{
    "status": "false",
    "Message": "The reviewId is wrongggg."
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
`PUT api/reviwes/edit`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    reviewId | integer |  required  | Review Id.
    body | text |  optional  | optional The text of the review.
    rating | integer |  required  | Rating (0-5) default is the same as it was .

<!-- END_f2bf516816a6bd1a29bad51fe25e8a4a -->

#[Review].Make Review
 createReview function

 make a validation on the input to check that is satisfing the conditions 

 if tha input is valid it will continue in the code otherwise it will response with error

 put the book in the shelf_read if it in another shelf or if it wasn't in any shelf 

 create a new review in the databse 

 increment the number of reviews on this book 

 increment the number of ratings on this book

 modify the avgrating for this book 

 increment the number of ratings for the user

 modify the avgrating for the user
<!-- START_1521f8492a220ccff8293eeac79158d1 -->
## api/reviwes/create
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/reviwes/create" \
    -H "Content-Type: application/json" \
    -d '{"bookId":3,"shelf":5,"body":"W2Cv2PQIOgGCVDmf","rating":12}'

```

```javascript
const url = new URL("http://localhost/api/reviwes/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "bookId": 3,
    "shelf": 5,
    "body": "W2Cv2PQIOgGCVDmf",
    "rating": 12
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

#[Shelf].Add Book
addBook function . 

Add a book to a shelf


given request paramters (book_id , shelf_id=0)

checking the existance of the given book on the shelf if it already exists it`s being update

if it`s new entry creating new record and responses successfully add 

in-case of the book is already exists and the user trying to add it onto the same shelf

it returnd an error message ( Something gone wrong).
<!-- START_1e7cb27e22831e4a6163a5908d6b002b -->
## api/shelf/add_book
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "http://localhost/api/shelf/add_book" \
    -H "Content-Type: application/json" \
    -d '{"shelf_id":16,"book_id":9}'

```

```javascript
const url = new URL("http://localhost/api/shelf/add_book");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_id": 16,
    "book_id": 9
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
    "message": "Successfully added ."
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
`POST api/shelf/add_book`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_id | integer |  required  | shelf_id { read:0 ,currently_reading:1, to_read:2 } default is read.
    book_id | integer |  required  | The id of the book.

<!-- END_1e7cb27e22831e4a6163a5908d6b002b -->

#[Shelf].Remove Book
removeBook function

Remove a book from a shelf

it is required (book_id,shelf_id) in the request

Validate the existance of these paramaters in the request

Then searching for them in the DB . deleting them if exists

returns successfully removed when it is deleted 

otherwise it respones with error message .
<!-- START_06eb9d0211faabac28f877685cb3e0d9 -->
## api/shelf/remove_book
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/shelf/remove_book" \
    -H "Content-Type: application/json" \
    -d '{"shelf_id":17,"book_id":12}'

```

```javascript
const url = new URL("http://localhost/api/shelf/remove_book");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "shelf_id": 17,
    "book_id": 12
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (400):

```json
{
    "status": "false",
    "message": "Something gone wrong ."
}
```
> Example response (200):

```json
{
    "status": "true",
    "message": "Successfully removed ."
}
```
> Example response (404):

```json
[]
```

### HTTP Request
`DELETE api/shelf/remove_book`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    shelf_id | integer |  required  | shelf_id { read:0 ,currently_reading:1, to_read:2 } default is read.
    book_id | integer |  required  | The id of the book.

<!-- END_06eb9d0211faabac28f877685cb3e0d9 -->

#[User].Login
logIn function

Take the request has [email , password] and check that the email is email type and exists in database and also the password

if all is correct return a response with status 200 and json file has [name , username , image_link] 

if there are any errors, return a response with status 405 has the message describe the error
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -d '{"email":"UW13N2ftgf6x0zHf","password":"VYJEgLaa8NW1z2Vf"}'

```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "UW13N2ftgf6x0zHf",
    "password": "VYJEgLaa8NW1z2Vf"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (405):

```json
{
    "errors": [
        "The email field is required.",
        "The password field is required."
    ]
}
```
> Example response (405):

```json
{
    "errors": "Already Authorized ."
}
```
> Example response (200):

```json
{
    "status": "true",
    "user": {
        "name": "",
        "username": "",
        "image_link": ""
    },
    "token": "",
    "token_type": "",
    "expires_in": ""
}
```

### HTTP Request
`POST api/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | .
    password | string |  required  | .

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

#[User].Logout
logOut function

Take the request has [Authorization] in the header and this paramater is checked in middleware 

if it valid one the function return it into invalid and return response with status 200 with message [you have logged out]

if this [Authorization] is invalid the middleware return a response with status 405 has a message [UnAuthorized].
<!-- START_bfd94d52f65d7e0282e0634b79e28c7b -->
## api/logout
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE "http://localhost/api/logout" 
```

```javascript
const url = new URL("http://localhost/api/logout");

let headers = {
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
    "message": "You have logged out"
}
```
> Example response (405):

```json
{
    "message": "Unauthorized"
}
```

### HTTP Request
`DELETE api/logout`


<!-- END_bfd94d52f65d7e0282e0634b79e28c7b -->

#[User].Show Profile

showProfile function

checking the request given paramaters if user_id exists 

it returns his profile-details

other-wise it returns authenticated user`s profile from database user table .
<!-- START_02b571ee5bd2fac11f2edd358ef66b79 -->
## api/showProfile
<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "http://localhost/api/showProfile" \
    -H "Content-Type: application/json" \
    -d '{"id":15}'

```

```javascript
const url = new URL("http://localhost/api/showProfile");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 15
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
    "id": 1,
    "name": "Jeromy Heidenreich",
    "username": "Dr. Zaria Witting I",
    "email": "anna29@example.net",
    "email_verified_at": "2019-03-21 20:42:11",
    "link": "http:\/\/kozey.com\/excepturi-nemo-nemo-sequi-corrupti",
    "image_link": "https:\/\/lorempixel.com\/640\/480\/?23657",
    "small_image_link": "https:\/\/lorempixel.com\/100\/100\/?36683",
    "about": "weRmt2re2n",
    "age": 65,
    "gender": "N\/A",
    "country": "Egupt",
    "city": "Cairo",
    "joined_at": "1981-11-16",
    "last_active": "2019-03-23 12:17:09",
    "followers_count": 2,
    "following_count": 5,
    "rating_avg": 2,
    "rating_count": 6,
    "books_count": null,
    "birthday": null,
    "created_at": null,
    "updated_at": null
}
```

### HTTP Request
`GET api/showProfile`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  optional  | optional this parameter to show the info of the other user (default authenticated user) .

<!-- END_02b571ee5bd2fac11f2edd358ef66b79 -->

#general
<!-- START_41d2f7697c6118f36f8b676e5bd19ea0 -->
## Login using the given user ID / email.

> Example request:

```bash
curl -X GET -G "http://localhost/_dusk/login/{userId}/{guard?}" 
```

```javascript
const url = new URL("http://localhost/_dusk/login/{userId}/{guard?}");

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

> Example response (500):

```json
{
    "message": "Auth guard [1] is not defined.",
    "exception": "InvalidArgumentException",
    "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
    "line": 84,
    "trace": [
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
            "line": 68,
            "function": "resolve",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php",
            "line": 237,
            "function": "guard",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php",
            "line": 40,
            "function": "__callStatic",
            "class": "Illuminate\\Support\\Facades\\Facade",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 48,
            "function": "login",
            "class": "Laravel\\Dusk\\Http\\Controllers\\UserController",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET _dusk/login/{userId}/{guard?}`


<!-- END_41d2f7697c6118f36f8b676e5bd19ea0 -->

<!-- START_6375e7300024aae0f6af283b4a72cb1b -->
## Log the user out of the application.

> Example request:

```bash
curl -X GET -G "http://localhost/_dusk/logout/{guard?}" 
```

```javascript
const url = new URL("http://localhost/_dusk/logout/{guard?}");

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

> Example response (500):

```json
{
    "message": "Auth guard [1] is not defined.",
    "exception": "InvalidArgumentException",
    "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
    "line": 84,
    "trace": [
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
            "line": 68,
            "function": "resolve",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php",
            "line": 237,
            "function": "guard",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php",
            "line": 56,
            "function": "__callStatic",
            "class": "Illuminate\\Support\\Facades\\Facade",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 48,
            "function": "logout",
            "class": "Laravel\\Dusk\\Http\\Controllers\\UserController",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET _dusk/logout/{guard?}`


<!-- END_6375e7300024aae0f6af283b4a72cb1b -->

<!-- START_09dcf3e9a9b6585fa40e4ead6c3c858a -->
## Retrieve the authenticated user identifier and class name.

> Example request:

```bash
curl -X GET -G "http://localhost/_dusk/user/{guard?}" 
```

```javascript
const url = new URL("http://localhost/_dusk/user/{guard?}");

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

> Example response (500):

```json
{
    "message": "Auth guard [1] is not defined.",
    "exception": "InvalidArgumentException",
    "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
    "line": 84,
    "trace": [
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Auth\\AuthManager.php",
            "line": 68,
            "function": "resolve",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php",
            "line": 237,
            "function": "guard",
            "class": "Illuminate\\Auth\\AuthManager",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\dusk\\src\\Http\\Controllers\\UserController.php",
            "line": 18,
            "function": "__callStatic",
            "class": "Illuminate\\Support\\Facades\\Facade",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 48,
            "function": "user",
            "class": "Laravel\\Dusk\\Http\\Controllers\\UserController",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 680,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 75,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 66,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 657,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 623,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 612,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 163,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 276,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 260,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 32,
            "function": "call_user_func_array"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 90,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 34,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 580,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 908,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 269,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 90,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\Programs\\PHP\\xampp\\xampp\\htdocs\\phase1\\goodreads-api\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET _dusk/user/{guard?}`


<!-- END_09dcf3e9a9b6585fa40e4ead6c3c858a -->


