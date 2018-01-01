<?php

namespace AppBundle\Entity;

interface UserInterface
{
    public function getLogin();
    public function setLogin($login);
    public function getAvatar();
    public function setAvatar($avatar);
}
