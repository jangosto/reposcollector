<?php

namespace AppBundle\Entity;

interface UserInterface
{
    private $login;
    private $avatar;

    public function getLogin();
    public function setLogin();
    public function getAvatar();
    public function setAvatar();
}
