## BOOKS 
# Add review
Add book reviews for members using OAuth.
* You'll need to register your app (required). 
* URL: https://www.goodreads.com/review.xml 
* HTTP method: POST 
*Parameters: 
* book_id: Goodreads book_id (required)
* review[review]: Text of the review (optional)
* review[rating]: Rating (0-5) (optional, default is 0 (No rating))
* review[read_at]: Date (YYYY-MM-DD format, e.g. 2008-02-01) (optional)
* shelf: read|currently-reading|to-read|<USER SHELF NAME> (optional, must exist, see: shelves.list)
```
   #php prototype to be written here
   #
```

```
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books  -H 
    'Authorization:Basic username:password or email:password' 
```

## Getting with Curl 

```
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X POST -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://localhost:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X PUT -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://localhost:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X DELETE http://localhost:8000/api/books/:id
```
