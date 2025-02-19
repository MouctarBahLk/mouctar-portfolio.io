<?php

require_once 'Database.php';



class Contact extends Database
{
  public function __construct()
  {
    parent::__construct();
    
  }



  private function checkField($field, $isRequired, $minLength = null, $maxLength = null, $regex = null)
  {
    if ($isRequired && empty($field)) {
      return false;
    }
    if ($minLength && strlen($field) < $minLength) {
      return false;
    }

    if ($maxLength && strlen($field) > $maxLength) {
      return false;
    }

    if ($regex && !preg_match($regex, $field)) {
      return false;
    }

    return true;
  }
  private function checkClientInputs($clientInputs): bool
  {
    $clientNameValid = $this->checkField($clientInputs[0], true, 3, 255);
    $clientEmailValid = $this->checkField($clientInputs[1], true, 1, 255, '/[a-zA-Z0-9-._]+@[a-zA-Z0-9-._]+\.[a-z]{2,}/');
    $clientPhoneNumberV = $this->checkField($clientInputs[2], true, 1, 255, '/^\d{10}$/');
    $clientMessageV = $this->checkField($clientInputs[3], true, 1, 255);
    return $clientEmailValid && $clientNameValid && $clientMessageV && $clientPhoneNumberV;
  }

  public function ajouterContact($clientInputs)
  {
    if ($this->checkClientInputs($clientInputs)) {
      $stmt = $this->pdo->prepare("INSERT INTO contact (`nom`, `email`, `num`, `msg`) 
                               VALUES (:nom, :email, :num, :msg)");

      $stmt->bindValue(":nom", htmlspecialchars($clientInputs[0]));
      $stmt->bindValue(":email", htmlspecialchars($clientInputs[1]));
      $stmt->bindValue(":num", htmlspecialchars($clientInputs[2]));
      $stmt->bindValue(":msg", htmlspecialchars($clientInputs[3]));

      // echo htmlspecialchars($clientInputs[3]);
      $stmt->execute();
    }
  }
}