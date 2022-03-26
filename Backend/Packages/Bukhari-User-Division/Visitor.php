<?php

interface Visitor
{
    public function login($email, $password);

    public function logout();

    public function getInstance();

}