#Mise à jour
apt-get update
apt-get upgrade -y

curl -sL https://deb.nodesource.com/setup_11.x | sudo -E bash -
apt-get install -y nodejs

# Using Debian, as root
curl -sL https://deb.nodesource.com/setup_11.x | bash -
apt-get install -y nodejs

apt-get install -y build-essential