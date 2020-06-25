<?php

class UserImporter
{
  const ROW_FIRST_NAME = 1;
  const ROW_LAST_NAME = 2;
  const ROW_EMAIL = 3;
  const DEFAULT_PASSWORD = 'S3cretpassword';

  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  public function importFile($fileName)
  {
      $csv = array_map('str_getcsv', file($fileName));

      foreach ($csv as $userInfo) {
        $user = new User();
        $user->setFirstName($userInfo[self::ROW_FIRST_NAME]);
        $user->setLastName($userInfo[self::ROW_LAST_NAME]);
        $user->setEmail($userInfo[self::ROW_EMAIL]);
        $user->setPassword(md5(self::DEFAULT_PASSWORD));

        $this->saveUsersToDatabase($user);
      }
  }

  private function saveUsersToDatabase(User $user)
  {
    $sql = "INSERT INTO users (first_name, last_name, email, password)
            VALUES (
             '" . $user->getFirstName() ."',
             '" . $user->getLastName() . "',
             '" . $user->getEmail() . "',
             " . $this->connection->quote($user->getPassword()). ")";

    $this->connection->exec($sql);
  }

}
