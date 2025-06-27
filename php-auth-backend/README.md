# PHP Authentication Backend

This project is a simple user authentication system built with PHP. It includes functionalities for user registration and login, with a focus on password security.

## Project Structure

```
php-auth-backend
├── src
│   ├── controllers
│   │   └── AuthController.php
│   ├── models
│   │   └── User.php
│   ├── utils
│   │   └── PasswordUtils.php
│   └── config
│       └── database.php
├── public
│   └── index.php
├── composer.json
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone <repository-url>
   ```

2. Navigate to the project directory:
   ```
   cd php-auth-backend
   ```

3. Install dependencies using Composer:
   ```
   composer install
   ```

4. Configure your database settings in `src/config/database.php`.

## Usage

- To register a new user, send a POST request to `/register` with the user's email and password.
- To log in, send a POST request to `/login` with the user's email and password.

## Security

- Passwords are hashed using secure algorithms before being stored in the database.
- Always ensure that your environment variables, such as database credentials and JWT secrets, are kept secure.

## License

This project is licensed under the MIT License. See the LICENSE file for details.