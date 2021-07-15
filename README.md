## Set Up

1. In Linux environment, install PHP if not installed yet:

```
sudo apt update && sudo apt install php
```

2. For unit testinng, install PHPUnit testing framework if not installed yet:

```
sudo apt-get install -y phpunit
```

3. Clone the project from GitHub

```
git clone https://github.com/timnqp/user_hierarchy.git <your_preferred_folder_name>
```

## Run The Project

1. Enter the project folder

```
cd <your_preferred_folder_name>
```

2. Run the 'runner.php'. The result should be displayed to the console.

```
php runner.php
```

## Run The Unit Tests

1. Enter the test folder

```
cd <your_preferred_folder_name>/test
```

2. Run the unit tests

```
phpunit test/FunctionalTest.php
```

## View Source Code

```
cd <your_preferred_folder_name>/src
```

## View & Update Seed Data

```
cd <your_preferred_folder_name>/seed
```
