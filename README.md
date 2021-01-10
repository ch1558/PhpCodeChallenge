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
  
  Check that it’s running:
  > sudo systemctl status docker

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
  
  ## SECOND STEP: Clone this repository
  First, create a new folder for clone the repository in this location.  
  > mkdir PhpChallenge
  > cd PhpChallenge
  
