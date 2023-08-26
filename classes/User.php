<?php

class User
{
    public function __construct(
        private int $id,
        private string $firstname,
        private string $lastname,
        private string $email,
        private string $pseudo,
        private string $password,
        private string $dob,
        private bool $admin,
        private bool $subscribed
    ) {
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $id;
        
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname): self
    {
        $this->firstname = $firstname;
        
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname): self
    {
        $this->lastname = $lastname;
        
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email): self
    {
        $this->email = $email;
        
        return $this;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;
        
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password): self
    {
        $this->password = $password;
        
        return $this;
    }

    public function getDob()
    {
        return $this->dob;
    }
    public function setDob($dob): self
    {
        $this->dob = $dob;
        
        return $this;
    }

    public function getSubscribed()
    {
        return $this->subscribed;
    }
    public function setSubscribed($subscribed): self
    {
        $this->subscribed = $subscribed;
        
        return $this;
    }

    public function isAdmin()
    {
        return $this->admin;
    }
    public function setAdmin($admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
