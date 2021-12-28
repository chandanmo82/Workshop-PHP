<?php
interface IBankAccount
{
    public function getBalance($accountNumber, $name);
    public function deposite($accountNumber, $name, $amount);
    public function withdraw($accountNumber, $name, $amount);
}
?>