# to-do-list-api - API/REST

## About

This is a simple API/Rest test. It's a backend API to be consumed 
by [to-do-list-web](https://github.com/leandrorosendo/to-do-list-web) 
frontend.

### Install Dependencies 
```
composer install
```



## How it works

This app is using Laravel Framework. It's a very simple app. There is no auth or CSRF 
protection.

There are only six rotes. 
five for the list default ```/listas``` and one to done item list
 ```/listas/done/```.

The application will allow you to register a list and check if the list item has been completed.
When requesting a registration / updating of a list, the app will check if the name of the list exists in the bank and if user id (owner of the list) exists, and if the rules to be applied in the inputs are valid, otherwise, it will return a error message like `` Response :: HTTP_UNPROCESSABLE_ENTITY. ``
We use the ```ListaFormRequest``` to validate the IDs used in the control in the methods (done, destroy, show) to check if the ID parameter passed is valid and existing, otherwise the app will return an authorization error ```Response :: HTTP_FORBIDDEN.```
the application uses the ```Service layer``` to perform bank operations, we do not use ```Repository``` because it was not necessary.
the application has a test, just perform the command ```php artisan test```
