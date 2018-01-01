<?php

namespace AppBundle\Entity;

use AppBundle\Entity\RepositoryInterface;
use AppBundle\Entity\Entity;
use AppBundle\Entity\User;

class Repository extends Entity implements RepositoryInterface
{
    private $name;
    private $starsCount;
    private $isFork;
    private $openedIssuesCount;
    private $user;

    /**
     * Get name.
     *
     * @return name.
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set name.
     *
     * @param name the value to set.
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this->name;
    }
    
    /**
     * Get starsCount.
     *
     * @return starsCount.
     */
    public function getStarsCount()
    {
        return $this->starsCount;
    }
    
    /**
     * Set starsCount.
     *
     * @param starsCount the value to set.
     */
    public function setStarsCount($starsCount)
    {
        $this->starsCount = $starsCount;
        return $this->starsCount;
    }
    
    /**
     * Get isFork.
     *
     * @return isFork.
     */
    public function getIsFork()
    {
        return $this->isFork;
    }
    
    /**
     * Set isFork.
     *
     * @param isFork the value to set.
     */
    public function setIsFork($isFork)
    {
        $this->isFork = $isFork;
        return $this->isFork;
    }
    
    /**
     * Get openedIssuesCount.
     *
     * @return openedIssuesCount.
     */
    public function getOpenedIssuesCount()
    {
        return $this->openedIssuesCount;
    }
    
    /**
     * Set openedIssuesCount.
     *
     * @param openedIssuesCount the value to set.
     */
    public function setOpenedIssuesCount($openedIssuesCount)
    {
        $this->openedIssuesCount = $openedIssuesCount;
        return $this->openedIssuesCount;
    }
    
    /**
     * Get user.
     *
     * @return user.
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set user.
     *
     * @param user the value to set.
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this->user;
    }
}
