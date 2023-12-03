# Web Application

- Project: _Battle of Classes_ by Yassine Ben Mustapha
- Class WDD0321, Module WBD5204 0322, 28 October 2022

---

## Installation:

1. Create a new database in http://localhost/phpmyadmin/ then import the sql file named "wbd5204_ybm" Located in the db folder

2. Head to _config/prefs/credentials.php_ and adjust the data.

## Email Verification Setup

1. To receive email verification create and account at https://mailtrap.io/ once done head to "My Inbox" > ""SMTP Settings" copy what you find inside user up to the colon.

- Example: user '7c9ba02490ks1g:ya6255f377ee69'

2. Open the sendmail.php file found inside the PHPMailer folder and past inside username

- Username 7c9ba02490ks1g

3. Repeat the same process for the password by copying what comes after the colon.

- Password ya6255f377ee69

---

## User Login

```
Username: saeuser
Password: Test2022
```

## Technical information

- HTML 5 / SASS / CSS 3 / Bootstrap 5.2.2
- Vanilla Javascript / jQuery 3.6.1 / Ajax
- PHP version: 8.1.4
- Apache/2.4.52 (Win64) OpenSSL/1.1.1m PHP/8.1.4
- Server version: 10.4.24-MariaDB - mariadb.org binary distribution
- phpMyAdmin version information: 5.3.0-dev

### Additional Information

The website was built on the concept of PHP Object-Orientation-Programming with PDO.

Ajax is used in the registration, login and search.

The webpage is fully responsive

The play section is only available for logged in users

This is a school project and will not be published.

#### Note

###### game.js is still sadly not done (TERRIBLE TIME PLANING)
