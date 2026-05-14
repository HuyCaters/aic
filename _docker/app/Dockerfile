FROM almalinux

WORKDIR /home

RUN dnf -y update && \
    dnf -y install epel-release && \
    dnf -y install https://rpms.remirepo.net/enterprise/remi-release-10.rpm && \
    dnf module reset php && \
    dnf module enable php:remi-8.2 -y && \
    dnf -y install php php-zip php-common php-cli php-mbstring php-bcmath php-xml php-opcache php-pdo php-mysqlnd php-json php-curl php-gd php-dom php-fpm php-intl php-pecl-imagick libpng libpng-devel unzip git wget libjpeg-turbo libXpm freetype && \
    # ImageMagick のインストール
    dnf -y install ImageMagick ImageMagick-devel && \
    dnf -y install zip \
    && dnf autoremove -y && \
    dnf clean all

# START ーー 案件によって、以下の設定が不要かも
# Node.js のインストール
RUN curl -fsSL https://rpm.nodesource.com/setup_20.x | bash -
RUN dnf -y install nodejs-20.17.0
RUN npm install -g npm@11.0.0

# Composer のインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
# END ーー 案件によって、以下の設定が不要かも

# タイムゾーンのインストール
RUN dnf -y install tzdata
# Apache のインストール
RUN dnf -y install httpd

# タイムゾーンの設定
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

# PHP の設定
RUN sed -i -e 's/;date.timezone =/date.timezone = Asia\/Tokyo/' /etc/php.ini
RUN sed -i -e 's/;mbstring.language = Japanese/mbstring.language = Japanese/' /etc/php.ini
RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/' /etc/php.ini
RUN sed -i -e 's/;error_log = php_errors.log/error_log = \/var\/log\/php_errors.log/' /etc/php.ini
RUN sed -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 500M/' /etc/php.ini
RUN sed -i -e 's/post_max_size = 8M/post_max_size = 500M/' /etc/php.ini
RUN sed -i -e 's/max_execution_time = 30/max_execution_time = 300/' /etc/php.ini
RUN sed -i -e 's/max_input_time = 60/max_input_time = 100/' /etc/php.ini
RUN sed -i -e 's/memory_limit = 128M/memory_limit = 512M/' /etc/php.ini
RUN sed -i -e 's/expose_php = On/expose_php = Off/' /etc/php.ini
RUN sed -i -e 's|pdo_mysql.default_socket=|pdo_mysql.default_socket=/var/lib/mysql/mysql.sock|' /etc/php.ini

# Apache の設定
RUN sed -i -e 's/#ServerName www.example.com:80/ServerName localhost/' /etc/httpd/conf/httpd.conf
RUN sed -i -e 's|<Directory "/var/www/html">|<Directory "/home/public_html">|' /etc/httpd/conf/httpd.conf
RUN sed -i -e 's|DocumentRoot "/var/www/html"|DocumentRoot "/home/public_html"|' /etc/httpd/conf/httpd.conf
RUN sed -i -e 's/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf
RUN sed -i -e 's/DirectoryIndex index.html/DirectoryIndex index.html index.php/' /etc/httpd/conf/httpd.conf
RUN sed -i -e '$a\
    <VirtualHost *:80>\n\tDocumentRoot /home/public_html\n\t#AccessFileName .local.htaccess\n</VirtualHost>' /etc/httpd/conf/httpd.conf

RUN mkdir -p /run/php-fpm/
RUN chown -R apache:apache /run/php-fpm/

COPY start.sh ./start.sh
RUN chmod +x ./start.sh

CMD ["./start.sh"]
