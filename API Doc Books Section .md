## BOOKS 
# Add review
Add book reviews for members using OAuth. You'll need to register your app (required). 
URL: https://www.goodreads.com/review.xml 
HTTP method: POST 
Parameters: 
* book_id: Goodreads book_id (required)
* review[review]: Text of the review (optional)
* review[rating]: Rating (0-5) (optional, default is 0 (No rating))
* review[read_at]: Date (YYYY-MM-DD format, e.g. 2008-02-01) (optional)
* shelf: read|currently-reading|to-read|<USER SHELF NAME> (optional, must exist, see: shelves.list)
