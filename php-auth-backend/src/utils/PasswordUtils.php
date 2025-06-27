<?php

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function comparePasswords($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

export { hashPassword, comparePasswords };