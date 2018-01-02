# INTRO

This project is an exercice consisting in get and show some github repositories data from a corporation using github API.

# INSTALLATION

## REQUIREMENTS

To install this application, PHP7.1 is required to be sure it works. PHP7.1-curl and PHP7.1-xml are required too.

## DEPLOYEMENT

The only think you have to make is clone project, make "composer install" (if you don' t have composer installed you have to install it).

## USING

To get this application service you have to call "/repos/[CORP].html" url, where [CORP] is the corporation that you want repositories be shown (in the exercice, the corp proposed is symfony).

# ALTERTNATIVE

In exercice, there is said, PHP version used by you is 5.6. To avoid PHP7.1 installation, I have created a DOCKER container as an apache2 server, with application ready to be used.

## REQUIREMENTS

You need DOCKER installed to run the container.

## RUNNING CONTAINER

The command to run container properly in this case is:
```{r, engine='bash', count_lines}
docker run -itd --expose 80 --name="githubconsumer" jangosto/github_consumer bin/bash
```

- "docker run": Command to run a container
- "-itd": Interactive mode, and detached mode (run container in background)
- "--expose": Expose a port (in this case port number 80)
- "--name": Container name
- "jangosto/github\_consumer": Image used to run container
- "bin/bash": This command is executed when container runs

## SOME INTERESTING COMMANDS

- "docker ps": Show running containers info
- "docker inspect [container\_name]": Info for container with indicated container name (in this case "githubconsumer")
- "docker attach [container\_name]": Access to container with indicated name (if you type this command in this scenario, you wil acceess to container shell).
- "docker stop [container\_name]": Stop container with indicated name.
- "docker rm [container\_name]": Remove container with indicated name (this is necessary if you want to run a container with the same name).
o
## AFTER CONTAINER RUNNING

### Set /etc/hosts file
In container, there is a virtual host configured with domain "www.githubconsumer.com". The only thing we need is container IP to write in /etc/hosts file this equivalence. Typing inspect command ("docker inspect githubconsumer"), we can get container IP in NetworkSettings.IPAddress info json field. Now, you can set host in /etc/hosts file.

### Start container apache2 service
When you run this container, server service is stopped. To start it you have to access and start service.

To enter in container, execute "docker attach githubconsumer". It is probably you have to type enter 2 or 3 times until new prompt appears.
Now you can start apache service typing "service apache2 start"

## USING APPLICATION
Open a browser and type url [http://www.githubconsumer.com/repos/symfony.html](http://www.githubconsumer.com/repos/symfony.html)
