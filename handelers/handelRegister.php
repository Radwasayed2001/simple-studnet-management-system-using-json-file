<?php
session_start();
include("../core/functions.php");
include("../core/validation.php");
if(checkRequestMethod('POST') && checkPostInput('email')) {
    $errors = [];
    $allData = json_decode(file_get_contents('../data.json'),true);
    foreach($_POST as $key=>$value) {
        $$key = sanitizeInput($value);
    }
    if (requiredVal($fname))
    {
        $errors['fname']="first name is requiered";
    }
    else if (minVal($fname,3)) {
        $errors['fname']="first name must be greater than 2 chars";
    }
    else if (maxVal($fname,20)) {
        $errors['fname']="first name must be less than 20 chars";
    }
    if (requiredVal($lname))
    {
        $errors['lname']="last name is requiered";
    }
    else if (minVal($lname,3)) {
        $errors['lname']="last name must be greater than 2 chars";
    }
    else if (maxVal($lname,20)) {
        $errors['lname']="last name must be less than 20 chars";
    }
    if (requiredVal($username))
    {
        $errors['username']="username is requiered";
    }
    else if (minVal($username,3)) {
        $errors['username']="username must be greater than 2 chars";
    }
    else if (maxVal($username,20)) {
        $errors['username']="username must be less than 20 chars";
    }
    else {
        foreach($allData as $index) {
            foreach($index as $key=>$value){
            if ($key == 'username'&& $username==$value){
                $errors['username']="username is already exsits";
            }
        }
        }
    }
    if (requiredVal($email)){
        $errors['email']="email is requiered";
    }
    else if (!emailVal($email)){
        $errors['email']="Enter valid email";
    }
    else {
        foreach($allData as $index) {
            foreach($index as $key=>$value){
            if ($key == 'email'&& $email==$value){
                $errors['email']="email is already exsits";
            }
        }
        }
    }
    if (requiredVal($password))
    {
        $errors['password']="password is requiered";
    }
    else if (minVal($password,6)) {
        $errors['password']="password must be greater than 6 chars";
    }
    else if (maxVal($password,25)) {
        $errors['password']="password must be less than 25 chars";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect('../add.php');
        die;
    }
    else{
        $data = [
            'firstname' => $fname,
            'lastname' => $lname,
            'username' => $username,
            'email' => $email,
            'pass' => sha1($password),
        ];
        $allData[] = $data;
        file_put_contents('../data.json',json_encode($allData));
        $_SESSION['success'][] = "student added successfully";
        redirect('../profile.php');
        die;
    }
}