# PhpCodeChallenge

This project is for the php code challenge of jobsity, the following steps are for ensure that you can install and run this repository.

## FIRST STEP: Install docker
  **if you already have docker in your operating system, please skip this step.**

  Open a new terminal in your machine and copy de following instructions. 

  firtst, update your existing list of packages:
  > sudo apt update

  Next, install a few prerequisite packages which let apt use packages over HTTPS:
  > sudo apt install apt-transport-https ca-certificates curl software-properties-common

  Then add the GPG key for the official Docker repository to your system:
  > curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
 
  Add the Docker repository to APT sources:
  > sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
 
  Next, update the package database with the Docker packages from the newly added repo:
  > sudo apt update
  
  Finally, install Docker:
  > sudo apt install docker-ce
  
  Check that it's running:
  > sudo systemctl status docker
  
  Now, install docker-compose
  > cd sudo apt install docker-compose
  
  Check that it's running
  > docker-compose -version

## SECOND STEP: Install composer
  **if you already have composer in your operating system, please skip this step.**

  Before installing Composer, ensure that you have all the necessary requirements installed on your system:
  > sudo apt update
  > sudo apt install wget php-cli php-zip unzip
  
  Composer offers an installer written in PHP that we’ll use to install Composer. Use wget to download the installer:
  > wget - composer-setup.php https://getcomposer.org/installer
  
  The command above will save the file as composer-setup.php in the current working directory. Composer is a single file CLI application and can be installed either globally or as part of the project. The global installation requires sudo privileges.
   > sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
   
   Check that it's running or a an update is available
   > sudo composer self-update
  
## THIRD STEP: Clone this repository
  First, create a new folder for clone the repository in this location.  
  > mkdir PhpChallenge
  
  Next, access to the folder recently created
  > cd PhpChallenge
  
  Next, clone the repository
  > git clone https://github.com/ch1558/PhpCodeChallenge.git
  
  Now, access to the contains project folder
  > cd PhpCodeChallenge/Currency
  
## FOUR STEP: Deploy the aplication 
  Once you are on the path where the files are, need run the following commands:
  
  First, create app image
  > sudo docker-compose build-app
  
  Next, run the development evironment in the background
  > sudo docker-compose up -d
  
  Now, execute **composer install** for install the aplication dependencies
  > docker-compose exec app composer install

  Finally, generate the key for encrypt the aplication
  > docker-compose exec app php artisan key:generate

## FIVE STEP: Configure the database
  Once yo deploy the aplication, you need manually upload the initial script for database.
  
  First, dowload the sql script, the file be on the root of the repository
  https://github.com/ch1558/PhpCodeChallenge/blob/main/currency.sql
  
  Next, you need access to local PhpMyAdmin, please tipe the following url in your browser
  http://localhost:8004
  
  The credentials for acces be:
 
  Server: (Let a blank space)
  User    : **currency_user** (Is the default user setted in the .env file)
  Password: **currency_user.123** (Is the default user setted in the .env file)
  
  Once you login on the phpmyadmin, browse de database currency and select the import function, for upload de sql script previously mentioned. (https://github.com/ch1558/PhpCodeChallenge/blob/main/currency.sql)
  
## NOW YO CAN ENJOY USING THE CURRENCY BOT
**Remenber you must ensure that all of steps got done**

For start the aplication you must previously run the following command in the aplication path
> cd docker-compose up -d

For pause the aplication, once you start it, you must run the following command in the aplication path
> cd docker-composer dowm

**(if youu need access to the aplication path and you strictly followed the previosly steps, you must execute in your terminal)**
> cd PhpChallenge/PhpCodeChallenge/Currency
