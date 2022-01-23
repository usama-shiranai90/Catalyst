<?php

interface UserInterface
{
 public function login($email, $password);
 public function logout();
 public function getUserCode();
 public function setPersonalDetails();
}
?>