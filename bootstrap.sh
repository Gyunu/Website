#!/usr/bin/env bash

##Based on this https://www.dev-metal.com/super-simple-vagrant-lamp-stack-bootstrap-installable-one-command/ provisioning script
##but with locale setting and nvm

# Use single quotes instead of double quotes to make it work with special-character passwords
PASSWORD=$2
PROJECTFOLDER=$1

#set the locale, which causes issues with the package manager if not set
sudo locale-gen en_GB.UTF-8

# create project folder
sudo mkdir -p "${PROJECTFOLDER}"

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server

# install apache 2.5 and php 7
sudo apt-get install -y apache2
sudo apt-get install -y php libapache2-mod-php php-mcrypt php-mysql


# setup hosts file
sudo cat <<EOF | sudo tee /etc/apache2/sites-available/$PROJECTFOLDER.conf
<VirtualHost *:80>
    DocumentRoot /var/www/vhosts/${PROJECTFOLDER}/dist
    <Directory /var/www/vhosts/${PROJECTFOLDER}/dist>
        AllowOverride all
        Require all granted
    </Directory>
</VirtualHost>
EOF


#remove apache default index
sudo rm -rf /var/www/html

# enable mod_rewrite
sudo a2enmod rewrite

# enable the site
sudo a2ensite $PROJECTFOLDER.conf
sudo a2dissite 000-default.conf

# restart apache
service apache2 restart

# install git
sudo apt-get -y install git

# install nvm
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.32.0/install.sh | bash
