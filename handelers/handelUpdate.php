<?php
session_start();
include("../core/functions.php");
include("../core/validation.php");
$id = $_GET['id'];
if(checkRequestMethod('POST') && checkPostInput('email')) {
    $errors = [];
    $allData = json_decode(file_get_contents('../data.json'),true);
    foreach($_POST as $key=>$value) {
        $$key = sanitizeInput($value);
    }
    if (requiredVal($_POST['fname']))
    {
        $errors['fname']="first name is requiered";
    }
    else if (minVal($_POST['fname'],3)) {
        $errors['fname']="first name must be greater than 2 chars";
    }
    else if (maxVal($_POST['fname'],20)) {
        $errors['fname']="first name must be less than 20 chars";
    }
    if (requiredVal($_POST['lname']))
    {
        $errors['lname']="last name is requiered";
    }
    else if (minVal($_POST['lname'],3)) {
        $errors['lname']="last name must be greater than 2 chars";
    }
    else if (maxVal($_POST['lname'],20)) {
        $errors['lname']="last name must be less than 20 chars";
    }
    if (requiredVal($_POST['username']))
    {
        $errors['username']="username is requiered";
    }
    else if (minVal($_POST['username'],3)) {
        $errors['username']="username must be greater than 2 chars";
    }
    else if (maxVal($_POST['username'],20)) {
        $errors['username']="username must be less than 20 chars";
    }
    else {
        foreach($allData as $index) {
            foreach($index as $key=>$value){
            if ($key == 'username'&& $_POST['username']==$value){
                $errors['username']="username is already exsits";
            }
        }
        }
    }
    if (requiredVal($_POST['email'])){
        $errors['email']="email is requiered";
    }
    else if (!emailVal($_POST['email'])){
        $errors['email']="Enter valid email";
    }
    else {
        foreach($allData as $index) {
            foreach($index as $key=>$value){
            if ($key == 'email'&& $_POST['email']==$value){
                $errors['email']="email is already exsits";
            }
        }
        }
    }
    if (requiredVal($_POST['password']))
    {
        $errors['password']="password is requiered";
    }
    else if (minVal($_POST['password'],6)) {
        $errors['password']="password must be greater than 6 chars";
    }
    else if (maxVal($_POST['password'],25)) {
        $errors['password']="password must be less than 25 chars";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("../update.php?id=".$_SESSION['id']);
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
        $allData[$_SESSION['id']] = $data;
        unset($_SESSION['id']);
        file_put_contents('../data.json',json_encode($allData));
        $_SESSION['success'][] = "student updated successfully";
        redirect('../profile.php');
        die;
    }
}
