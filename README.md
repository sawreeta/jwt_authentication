# jwt_authentication
Get and Post method using JWT based token

# Requirements
- wamp or xampp server installed on your local machine
- You will require postman if you are going to test my own function.

# Getting Started
* Get a copy of the project from this repository .
* Then unzip and copy the folder inside www director of wamp or htdocs directory.
* After that, paste the respective url like this http://localhost/jwt_authentication/api.php with method POST,body parameters <b>func:postmethod</b> and basic authorization header with username(sarita) and password(sarita@123) and send the request.
* The response will be a json token.Copy the token and pass it into bearer token header of the get user info api i.e; http://localhost/jwt_authentication/api.php with method POST,body parameters <b>func:getmethod</b> and send the request.
* You can see the output like below/.


# Output
* Following will be the output for post or login functions in postman.
![Alt text](https://github.com/sawreeta/jwt_authentication/blob/master/post_method.png)
* Following will be the output for get user functions in postman.
![Alt text](https://github.com/sawreeta/jwt_authentication/blob/master/get_method.png)
