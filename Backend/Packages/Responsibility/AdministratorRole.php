<?php

abstract class AdministratorRole
{
    public function post($content): void
    {
        // Call the factory method to create a Product object...
        $network = $this->getResponsibility();
        // ...then use it as you will.
//        $network->logIn();
//        $network->createPost($content);
//        $network->logout();
    }

    abstract public function getResponsibility(): UserInterface;
}

?>