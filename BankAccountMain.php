<?php
include "IBankAccount.php";
class BankAccount implements IBankAccount
{
    protected $person;
    public function __construct()
    {
        $this->person = [];
    }
    public function getBalance($accountNumber, $name)
    {
        foreach ($this->person as $key => $values) {
            if ($accountNumber == $key) {
                foreach ($values as $balance) {
                    return $balance;
                }
            } else {
                echo "Account not found \n";
            }
        }
    }

    public function withdraw($accountNumber, $name, $amount)
    {
        foreach ($this->person as $key => $values) {
            if ($accountNumber == $key) {
                if ($this->getBalance($accountNumber, $name) > $amount) {
                    $this->person[$key][$name] = $this->getBalance($accountNumber, $name) - $amount;
                    echo "balance : " . $this->getBalance($accountNumber, $name) . "\n";
                } else {
                    throw new Exception("Warning : Your current balance is less than your given ammount\n");
                }
            } else {
                echo "Account not found \n";
            }
        }
    }

    public function deposite($accountNumber, $name, $amount)
    {
        $this->person[$accountNumber][$name] = $amount;
    }
}

$account = new BankAccount();
while (true) {
    echo "1. To deposite In your account\n2. To  withdraw From Your Account\n3. Check Your Balance\n0. Exit\n";
    $option = readline();
    if ($option == 1) {
        try {
            $accountNumber = readline("Enter Your Account Number : \n");
            $name = readline("Enter Your Name : \n");
            $amount = readline("Amount to deposite : \n");
            $account->deposite($accountNumber, $name, $amount);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } elseif ($userInput == 2) {
        try {
            $accountNumber = readline("Enter Your Account Number : \n");
            $name = readline("Enter Your Name :  \n");
            $amount = readline("Amount to withdraw : \n");
            $account->withdraw($accountNumber, $name, $amount);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } elseif ($userInput == 3) {
        $accountNumber = readline("Enter Your account number : ");
        $name = readline("Enter  Your name : ");
        $totalBalance = $account->getBalance($accountNumber, $name);
        echo "Your Current Balance is :" . $totalBalance . "\n";
    } elseif ($userInput == 0) {
        break;
    } else {
        echo "Invalid Input\n";
    }
}
?>
