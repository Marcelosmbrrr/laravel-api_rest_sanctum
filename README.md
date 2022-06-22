# About
This application is a Rest API created with the Laravel 9 and package Sanctum for authentication. Being sort, each request to a CRUD operation, of the UserController or CustomerController, for example, needs a bearer token that is generated in a successfully login, and stored in "personal_access_token" table. 

With the token created at login, it along with some other data is sent in the response from the server to the client. Thus, with each new request for a route protected by the "auth:sanctum" middleware, the token should be sent by the client to guarantee access to the server resource.

Postman Documentation: https://documenter.getpostman.com/view/20246142/Uz5AseLN
