# PhpCodeChallenge

This project is for the php code challenge of jobsity.

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
