# BeerBuddies application
application for all your beer-lover needs

## Dependencies
PHP 7.2
PHPUnit 7
XAMPP


## Instructions for Linux
1. Navigate to the folder you want, type: `git clone https://github.com/blakexcosta/databasebuddies.git`
2. cd into the repo
3. Install XAMPP, to find instructions, navigate to: https://vitux.com/how-to-install-xampp-on-your-ubuntu-18-04-lts-system/
4. Copy the files from here into /opt/lampp/htdocs/
5. run `sudo /opt/lampp/lampp start'
6. Install PHPUnit 7 with `wget -O phpunit https://phar.phpunit.de/phpunit-7.phar`
7. `chmod +x phpunit`
8. Verify that phpunit is running properly with `./phpunit --version`
9. (Assuming that you are running a linux distribution) Add the following repositories with the command `sudo apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml`
10. navigate to http://localhost/BeerBuddies/index.php
11. Congrats! you should now see the application running!

NOTE: If you already have apache2/mysql installed, you may have to restart the apache2 service with `sudo systemctl stop apache2.service` and then run `sudo /opt/lampp/lampp start` again.

