#Mise à jour
apt-get update
apt-get upgrade -y

#Installation d'apache
apt-get -y install apache2

#droit du dossier html
chgrp www-data /var/www/html
adduser vagrant www-data
chmod -R g+rw /var/www/html

#réécriture url
sudo a2enmod rewrite
sudo sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
sudo systemctl restart apache2