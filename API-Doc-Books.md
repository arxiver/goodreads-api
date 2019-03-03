# BOOKS 
* all user_id paramaters going to be handled using auth-token *
### Books show method 
### Read [Book] by id
* HTTP method: POST 
* Parameters: 
* book_id: Goodreads book_id (required)
* URL: api/books/book_id
```   
   public function show($book_id ){
    // some code
    }
    
```
### Read [Books] by genre
* URL: api/books/genre

```
   public function show($genre ){
    // some code
    }
    
```
### Add/Remove [Book] to/from a shelf 

* shelves are *[read , currently-reading , to-read]* for each user
* adding a book to a shelf require OAuth. You'll need to register your app (required). 
* URL: https://www.goodreads.com/user/shelves/shlef_name/{add/remove}
* HTTP method: POST
* Parameters: 
* name_shelf : Name of the shelf / id
* user_id : authorized user id
* book_id : id of the book to add to the shelf
```
// shelf_id might be replaced with shelf_name 

public function add($user_id,$book_id,$shelf_id){

}
public function add($user_id,$book_id,$shelf_id){

}
```
## Create / Read / Update / Delete [ Review ]
Add book reviews for members using OAuth.
* You'll need to register your app (required). 
* URL: api/review
* $ cUrl api/review/{create/show/update/delete}
* HTTP method: resources [CURD]
* Parameters: 
* book_id: Goodreads book_id (required)
* review[review]: Text of the review (optional)
* review[rating]: Rating (0-5) (optional, default is 0 (No rating))
* review[read_at]: Date (YYYY-MM-DD format, e.g. 2008-02-01) (optional)
* shelf: read|currently-reading|to-read|<USER SHELF NAME> (optional, must exist, see: shelves.list)
```
   #php method sample
   public function create($user_id ,$book_id ,$review ,$rating ,$read_at){
    // some code
    }
    
   public function show($user_id ,$book_id ){
    // some code
    }
    
   public function update($user_id ,$book_id ,$review ,$rating ,$read_at ){
    // some code
    }
    
   public function delete($user_id ,$book_id ){
    // some code
    }
```
