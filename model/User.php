<?php

class User
{
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $firstName;

  /**
   * @var string
   */
  private $lastName;

  /**
   * @var string
   */
  private $email;

  /**
   * @var string
   */
  private $password;

  /**
   * @var string
   */
  private $confPassword;

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }

  /**
   * @param string $firstName
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
  }

  /**
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }

  /**
   * @param string $lastName
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }

  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return string
   */
  public function getConfPassword()
  {
    return $this->confPassword;
  }

  /**
   * @param string $confPassword
   */
  public function setConfPassword($confPassword)
  {
    $this->confPassword = $confPassword;
  }

  /**
   * @return bool
   */
  public function isValid()
  {
    return $this->email &&
           $this->firstName &&
           $this->lastName &&
           $this->password &&
           $this->confPassword &&
           $this->password === $this->confPassword;
  }
}
