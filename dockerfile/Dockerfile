FROM ubuntu

MAINTAINER Gregory Becchio

# ENV foo /bar

EXPOSE 80

RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y --force-yes apache2 openssh-server php5 php5-cli libapache2-mod-php5 git-all\
 nano     openssl libssl-dev nano curl mysql-server mysql-client libmysqlclient15-dev mysql-common php5-gd\
 php5-mysql python-software-properties language-pack-en-base


RUN DEBIAN_FRONTEND=noninteractive apt-get -y update
RUN DEBIAN_FRONTEND=noninteractive apt-get -y upgrade
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install python-software-properties
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install software-properties-common
RUN DEBIAN_FRONTEND=noninteractive add-apt-repository ppa:ondrej/php5-5.6
RUN DEBIAN_FRONTEND=noninteractive apt-get -y update
RUN DEBIAN_FRONTEND=noninteractive apt-get -y --force-yes install php5 php5-mhash php5-mcrypt php5-curl php5-cli php5-mysql php5-gd\ 
  php5-intl php5-xsl php5-sqlite
# RUN apt-get update
# RUN apt-get dist-upgrade -y

# RUN DEBIAN_FRONTEND=noninteractive apt-get -y dist-upgrade
# RUN DEBIAN_FRONTEND=noninteractive apt-get -y install python-software-properties
# RUN DEBIAN_FRONTEND=noninteractive apt-get -y install software-properties-common
# RUN DEBIAN_FRONTEND=noninteractive add-apt-repository ppa:ondrej/php-7.0
# RUN apt-get update && apt-get purge -y --force-yes php5-fpm && apt-get install -y --force-yes php7.0 php7.0-fpm php7.0-mysql
# RUN apt-get --purge autoremove -y --force-yes


CMD /etc/init.d/apache2 restart
RUN /etc/init.d/apache2 restart
CMD cd /var/www/html
CMD curl -sS https://getcomposer.org/installer | php
CMD ./composer.phar create-project block8/phpci phpci --keep-vcs --no-dev
CMD cd phpci && ../composer.phar install
CMD ./console phpci:install
CMD echo "This is a test." | wc -
