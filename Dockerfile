FROM ubuntu:latest
RUN apt-get update && DEBIAN_FRONTEND="noninteractive" TZ="America/New_York" apt-get install -y php
RUN date=`date '+%H%M%d%m%Y'` && chmod -R 755 /var/log && echo $date > /var/log/testlog$date.log
COPY test.php /var/www/test.php
RUN chmod +x /var/www/test.php
ENTRYPOINT ["php", "/var/www/test.php"]