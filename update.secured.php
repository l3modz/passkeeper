<?
function secure_encrypt($plaintext, $key) {
    $cipher = "AES-256-CBC";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $key = hash('sha256', $key, true);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}

function secure_decrypt($ciphertext_base64, $key) {
    $cipher = "AES-256-CBC";
    $ciphertext_combined = base64_decode($ciphertext_base64);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext_combined, 0, $ivlen);
    $ciphertext = substr($ciphertext_combined, $ivlen);
    $key = hash('sha256', $key, true);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}

// Usage
//$secure_key = 'replace_this_with_your_env_or_secure_key';
$secure_key = '25f2bf8046aa28e9149941592bc18b5a';
$original = '17';

$encrypted = secure_encrypt($original, $secure_key);
$decrypted = secure_decrypt($encrypted, $secure_key);

echo "Original: $original<br>";
echo "Encrypted: $encrypted<br>";
echo "Decrypted: $decrypted<br>";
?>