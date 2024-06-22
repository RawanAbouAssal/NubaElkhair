<?php

interface iPayment{
    public function pay($amount);
    public function validate(array $options, $amount);
}

?>