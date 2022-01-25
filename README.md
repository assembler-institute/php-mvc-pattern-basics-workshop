`#patterns` `#mvc` `#php` `#master-in-software-engineering`

# Assembler School: PHP MVC Pattern Basics - Workshop <!-- omit in toc -->

In this workshop you will learn how to create a project using MVC Pattern without OOP. In this first approach, you will understand how the pattern works and implement it in a project created from scratch.

## Table of Contents <!-- omit in toc -->

- [Getting Started](#getting-started)
- [Dependencies](#dependencies)
- [Contents](#contents)
- [1. Prepare the constants](#1-prepare-the-constants)
- [2. Application entry point](#2-application-entry-point)
- [3. Main Views](#3-main-views)
- [4. Controllers](#4-controllers)
- [5. Models](#5-models)
- [6. Views](#6-views)
- [Resources](#resources)

## Getting Started

First of all, you will need to clone this repo:

```bash
$ git clone https://github.com/assembler-school/repository-name
```

## Dependencies

- [Bootstrap](https://getbootstrap.com/)

## Contents

When you're creating a MVC project from scratch it's very important to follow correctly the creation steps in order to understand the execution flow. That is why in this workshop we have detailed the steps to follow for a correct operation of the application:

## 1. Prepare the constants

> In order to call dynamically all the CSS, JS and PHP files, we must configure our project constants that will be accessed during the execution of the application.
> These files will be located in `./config/`

### 1.1. `./config/baseConstants.php`

```php
<?php

$documentRoot = getcwd();

//BASE PATH -> FOR REFERENCE FILES
define("BASE_PATH", $documentRoot);

//BASE URL -> FOR LINK CSS
$uri = $_SERVER['REQUEST_URI'];

if (isset($uri) && $uri !== null) {
    $uri = substr($uri, 1);
    $uri = explode('/', $uri);
    $uri = "http://$_SERVER[HTTP_HOST]" . "/" . $uri[0];
} else {
    $uri = null;
}

define("BASE_URL", $uri);
```

### 1.2. `./config/constants.php`

```php
<?php

include_once "baseConstants.php";

//CONTROLLERS
define("CONTROLLERS", BASE_PATH . '/controllers/');

//VIEWS
define("VIEWS", BASE_PATH . '/views/');

//MODELS
define("MODELS", BASE_PATH . '/models/');

//RESOURCES
define("RESOURCES", BASE_PATH . '/resources/');
```

### 1.3. `./config/db.php`

```php
<?php

define('HOST', 'localhost');
define('DB', 'mvc_basics');
define('USER', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8mb4');
```

For this part, you will need to create your local database. In this project, we created a SQL file with all the basic operations. You just need to execute the [db.sql](./resources/db.sql) file in your database manager.

## 2. Application entry point

> All the user requests must be done in the entry point, we will use query params in order to indicate which controller and function must be executed.

### 2.1. `./index.php`

First of all, we need to require once the previous created constants files.

```php
<?php

include_once "config/constants.php";
include_once "config/db.php";
```

Then we create the logic to manage what controller and action is called in the query params.

```php
if (isset($_GET['controller'])) {
    $controller = getControllerPath($_GET['controller']);
    $fileExists = file_exists($controller);
    if ($fileExists) {
        require_once $controller;
    } else {
        $errorMsg = "The page you are trying to access does not exist.";
        require_once VIEWS . "error/error.php";
    }
} else {
    require_once VIEWS . "main/main.php";
}

function getControllerPath($controller): string
{
    return CONTROLLERS . $controller . "Controller.php";
}
```

## 3. Main Views

> As you can see in the previous step, we had two default views, now we're gonna create them.

### 3.1. `./views/main/main.php`

This is the main view that is loaded only if the user doesn't specify any controller or it doesn't exists.

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/php-mvc-pattern-basics-workshop/assets/css/style.css">
</head>

<body>
    <main>
        <?php require_once(BASE_PATH . "/assets/template/navbar.html"); ?>
        <h2 class="p-5 display-4 text-center"><strong>INFORMACIÓN SOBRE POKEMON</strong></h2>
        <section class="container">
            <a class="list-group-item list-group-item-action" href="?controller=pokemon&action=getAllPokemons">Pokemon Controller</a>
            <a class="list-group-item list-group-item-action" href="?controller=typePokemon&action=getAllTypes">Tipos de pokemon Controller</a>
        </section>
    </main>
</body>
```

### 3.2. `./views/error/error.php`

This view will be always loaded when the user specifies a bad parameter. As you can see, we print an error message that we will see in the last steps.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once(BASE_PATH . "/assets/template/navbar.html"); ?>
    <h1> <?= $errorMsg ?> </h1>;
</body>
</html>
```

## 4. Controllers

> This are the PHP files that are called in the [index.php](./index.php) file. Here we will implement the functionalities of each controller.

### `./controllers/pokemonController.php`

Before we start, we need to require the model, that will be responsible of calling the database queries to obtain or modify the information. We will create the model later.

```php
<?php

require_once MODELS . "pokemonModel.php";
```

Now, we know that this is the controller that the user wants to load, but we also need to know which function to execute.

```php
$action = "";

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

if (function_exists($action)) {
    call_user_func($action, $_REQUEST);
} else {
    error("Invalid user action");
}
```

We are going to create the `getAllEmployees` function, as you can see, there is a `get()` function that is not created yet, this is a function of the model that we will create in the following step.

```php
/* ~~~ CONTROLLER FUNCTIONS ~~~ */

function getAllPokemons() {
    $pokemons = getPokemons();
    $types = getTypes();
    if(isset($pokemons) && isset($types)) {
        require_once VIEWS . "pokemon/pokemonDashboard.php";
    } else {
        error("Error database");
    }
}
```

Also we create the `error` function in order to load the error view when something goes wrong.

```php
function error($errorMsg)
{
    require_once VIEWS . "/error/error.php";
}
```

## 5. Models

> As we said before, the models are responsible of calling the database queries to obtain or modify the information.

### 5.1. Connection to the database

In order to send queries to the database, we need to create the connection.

#### 5.1.1. `./models/helper/dbConnection.php`

```php
<?php

// Create connection
function conn()
{
    try {
        $connection = "mysql:host=" . HOST . ";"
            . "dbname=" . DB . ";"
            . "charset=" . CHARSET . ";";

        $options = [
            PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES  => FALSE,
        ];

        $pdo = new PDO($connection, USER, PASSWORD, $options);

        return $pdo;
    } catch (PDOException $e) {
        require_once(VIEWS . "/error/error.php");
    }
}
```

### 5.2. `./models/pokemonModel.php`

First, we must require the previous database connection file in order to execute the database queries.

```php
require_once("helper/dbConnection.php");
```

In this model we will create the `get` function that we are executing in the `employeeController.php`.

```php
function getPokemons() {
    $query = conn()->prepare("SELECT * FROM pokemon");

    try {
        $query->execute();
        $pokemons = $query->fetchAll();
        return $pokemons;
    } catch (PDOException $e) {
        return [];
    }
}
```

## 6. Views

> View are the frontend part of the MVC pattern. Inside them we should create all the necessary code to show the information to the user.

### 6.1. `./views/pokemon/pokemonDashboard.php`

This will be the file that shows all the records of the database.

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/php-mvc-pattern-basics-workshop/assets/css/style.css">
</head>

<body>
    <main>
        <?php require_once(BASE_PATH . "/assets/template/navbar.html"); ?>
        <h2 class="p-5 display-4 text-center">Pokedex Nacional</h2>

        <select id="types">
            <option value="all" selected>All Pokemons</option>
            <?php foreach ($types as $key => $value) { ?>
                <option value="<?= $types[$key]["name"] ?>"><?= $types[$key]["name"] ?></option>
            <?php } ?>
        </select>

        <section class="cards card-pokemons"></section>
    </main>

    <script src="<?=BASE_URL?>/php-mvc-pattern-basics-workshop/assets/js/utils.js"></script>
</body>
```

## Resources

- [Readme example](https://gist.github.com/Villanuevand/6386899f70346d4580c723232524d35a)
