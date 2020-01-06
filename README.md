# docker-php-mysql
Docker Setup for PHP &amp; MySQL (or LAMP stack, I guess). This is meant to be just enough code to get a PHP container and MySQL container up and running so they can be used for an app.

Usage:

The commands I used the most were:
```	
$ docker-compose build  
$ docker-compose up -d
$ docker-compose down
$ docker ps
$ docker network inspect [CONTAINER]
$ docker exec --it [CONTAINER] bash

``` 

What I Learned:
I had a lot of trouble getting the PHP container to be able to access the MySQL container. There were multiple things I had to change to get it right:
- The instruction of ```command: --default-authentication-plugin=mysql_native_password``` in docker-compose.yml. This was needed because in MySQL v8, there was a change in the default authentication plugin, and the mysql library in PHP (and probably in other stacks wouldn't be compatible).
- The use of a custom network "app-net" in docker-compose.yml. 
- The use of a hostname to connect to the MySQL. I left the "hostname" configuration option in the docker-compose.yml, but in the end, the PHP container uses the service name ("db") as the hostname to connect to the database.
- I got so tired of making fine adjustments on the PHP container to help it connect to the MySQL, and it wasn't until toward the end that I figured out I could try things out using the PHP executable in interactive mode in order to make finadjustments to function calls: ```docker exec --it [CONTAINER] php -a```

TODO:
- On my machine, it takes a few seconds before src/index.php successfully connects to the MySQL database. Would be good to look into how to force the db container to start first.
- I should rewrite src/index.php to show it actually has access to the drafts table on MySQL
- The line changing the /etc/hosts file doesn't seem to do anything for me. Perhaps this would only be practical if I were somehow using a web browser on the container itself?

