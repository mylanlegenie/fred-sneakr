<?php

require_once '../models/User.php';
require_once '../utils/PasswordUtils.php';

class AuthController {
    public function registerUser($request, $response) {
        $data = json_decode($request->getBody(), true);
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$password) {
            return $response->withStatus(400)->withJson(['message' => 'Email and password are required']);
        }

        $hashedPassword = hashPassword($password);
        $user = new User($email, $hashedPassword);

        if ($user->save()) {
            return $response->withStatus(201)->withJson(['message' => 'User registered successfully']);
        } else {
            return $response->withStatus(500)->withJson(['message' => 'Error registering user']);
        }
    }

    public function loginUser($request, $response) {
        $data = json_decode($request->getBody(), true);
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$password) {
            return $response->withStatus(400)->withJson(['message' => 'Email and password are required']);
        }

        $user = User::findByEmail($email);
        if (!$user) {
            return $response->withStatus(401)->withJson(['message' => 'Invalid email or password']);
        }

        if (!comparePasswords($password, $user->password)) {
            return $response->withStatus(401)->withJson(['message' => 'Invalid email or password']);
        }

        $token = bin2hex(random_bytes(16)); // Replace with JWT generation logic if needed
        return $response->withStatus(200)->withJson(['token' => $token]);
    }
}

?>