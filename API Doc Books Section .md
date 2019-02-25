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

# Add book shelf
* Add book shelves for members using OAuth. You'll need to register your app (required). 
* URL: https://www.goodreads.com/user_shelves.xml 
* HTTP method: POST 
* Parameters: 
* user_shelf[name]: Name of the new shelf
* user_shelf[exclusive_flag]: 'true' or 'false' (optional, default false)
* user_shelf[sortable_flag]: 'true' or 'false' (optional, default false)
* #user_shelf[featured]: 'true' or 'false' (optional, default false)

# Edit book shelf
* Edit a shelf using OAuth. You'll need to register your app (required). 
* URL: https://www.goodreads.com/user_shelves/USER_SHELF_ID.xml 
* HTTP method: PUT 
* Parameters: 
* user_shelf[name]: Name of the new shelf
* user_shelf[exclusive_flag]: 'true' or 'false' (optional, default false)
* user_shelf[sortable_flag]: 'true' or 'false' (optional, default false)
* user_shelf[featured]: 'true' or 'false' (optional, default false)
