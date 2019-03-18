# goodreads-api
CMP 203 Software Engineering Course`s Project [ Backend repository ]

### How to get start ?
``` 
git clone https://github.com/mohamed-mokhtar/goodreads-api/
``` 

### How to run this appliction in your machine 
### windows
Run these commands in your terminal 
``` 
composer install 
copy .env.example .env 
php artisan serve 
```
### For linux use this command instead of copy 
cp .env.example .env #for linux

### How to start pushing code at your first commit after clone 
```
git add . ; or ur updated files [ dot for all files ]
git commit -m "your comment here"
git remote add origin https://github.com/mohamed-mokhtar/goodreads-api
git push -u origin master
```
#### Incase you dont have the latest pushed version you `ll need to
```
 git pull 
```
# Authentication Edition 
you `ll need to run
```
 php artisan jwt:secret
 php artisan migrate:refresh
 php artisan db:seed
```
open you db , you `ll have 100 users created .
each user has an e-mail . and default hashed password is " password " .
