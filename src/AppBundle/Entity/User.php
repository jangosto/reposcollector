<?php

namespace AppBundle\Entity;

use AppBundle\Entity\UserInterface;
use AppBundle\Entity\Entity;

class User extends Entity implements UserInterface
{
    private $login;
    private $avatar;

    /**
     * Get login.
     *
     * @return login.
     */
    public function getLogin()
    {
        return $this->login;
    }
    
    /**
     * Set login.
     *
     * @param login the value to set.
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this->login;
    }
    
    /**
     * Get avatar.
     *
     * @return avatar.
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
    
    /**
     * Set avatar.
     *
     * @param avatar the value to set.
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
        return $this->avatar;
    }
}
