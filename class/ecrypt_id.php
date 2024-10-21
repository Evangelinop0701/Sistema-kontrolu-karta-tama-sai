<?php

function encrypt($text)
{
    $chiper = "aes-256-cbc";
    $key = "gabpam2024";
    $iv_leng = openssl_cipher_iv_length($chiper);
    $iv = openssl_random_pseudo_bytes($iv_leng);
    $encrypted = openssl_encrypt($text, $chiper, $key, 0, $iv);

    // Combine IV and encrypted data and encode them in base64
    return base64_encode($iv . $encrypted);
}

function decrypt($textExcrypt)
{
    $chiper = "aes-256-cbc";
    $key = "gabpam2024";
    $iv_leng = openssl_cipher_iv_length($chiper);

    // Decode the base64 encoded string
    $data = base64_decode($textExcrypt);

    // Extract IV and encrypted data
    $iv = substr($data, 0, $iv_leng);
    $encryptedData = substr($data, $iv_leng);

    // Decrypt the data
    return openssl_decrypt($encryptedData, $chiper, $key, 0, $iv);
}
?>
