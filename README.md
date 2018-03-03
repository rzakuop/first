# moving

## Development

```
$ git clone

$ cd moving/dev
$ vagrant up
```

When the virtual machine is up successfully, access to http://localhost:8081.

### gulp

```
moving-php$ gulp
```

```
moving-php$ gulp watch
```

## SSHing to web server.

```
local$ cd dev
local$ vagrant ssh
moving$ docker exec -it moving-php /bin/bash
```

Source code is at /vagrant directory.


## SSHing to mysql server.

```
local$ cd dev
local$ vagrant ssh
moving$ docker exec -it moving-mysql /bin/bash
```
