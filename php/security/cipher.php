<?php
/*
List of ciphers for encryption and decryption
ciphers             = openssl_get_cipher_methods();
$ciphers_and_aliases = openssl_get_cipher_methods(true);
$cipher_aliases      = array_diff($ciphers_and_aliases, $ciphers);

//ECB mode should be avoided
$ciphers = array_filter( $ciphers, function($n) { return stripos($n,"ecb")===FALSE; } );

//At least as early as Aug 2016, Openssl declared the following weak: RC2, RC4, DES, 3DES, MD5 based
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"des")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc2")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc4")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"md5")===FALSE; } );
$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"des")===FALSE; } );
$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"rc2")===FALSE; } );

print_r($ciphers);
print_r($cipher_aliases);

Array
(
    [0] => aes-128-cbc
    [1] => aes-128-cbc-hmac-sha1
    [2] => aes-128-cbc-hmac-sha256
    [3] => aes-128-ccm
    [4] => aes-128-cfb
    [5] => aes-128-cfb1
    [6] => aes-128-cfb8
    [7] => aes-128-ctr
    [9] => aes-128-gcm
    [10] => aes-128-ocb
    [11] => aes-128-ofb
    [12] => aes-128-xts
    [13] => aes-192-cbc
    [14] => aes-192-ccm
    [15] => aes-192-cfb
    [16] => aes-192-cfb1
    [17] => aes-192-cfb8
    [18] => aes-192-ctr
    [20] => aes-192-gcm
    [21] => aes-192-ocb
    [22] => aes-192-ofb
    [23] => aes-256-cbc
    [24] => aes-256-cbc-hmac-sha1
    [25] => aes-256-cbc-hmac-sha256
    [26] => aes-256-ccm
    [27] => aes-256-cfb
    [28] => aes-256-cfb1
    [29] => aes-256-cfb8
    [30] => aes-256-ctr
    [32] => aes-256-gcm
    [33] => aes-256-ocb
    [34] => aes-256-ofb
    [35] => aes-256-xts
    [36] => aria-128-cbc
    [37] => aria-128-ccm
    [38] => aria-128-cfb
    [39] => aria-128-cfb1
    [40] => aria-128-cfb8
    [41] => aria-128-ctr
    [43] => aria-128-gcm
    [44] => aria-128-ofb
    [45] => aria-192-cbc
    [46] => aria-192-ccm
    [47] => aria-192-cfb
    [48] => aria-192-cfb1
    [49] => aria-192-cfb8
    [50] => aria-192-ctr
    [52] => aria-192-gcm
    [53] => aria-192-ofb
    [54] => aria-256-cbc
    [55] => aria-256-ccm
    [56] => aria-256-cfb
    [57] => aria-256-cfb1
    [58] => aria-256-cfb8
    [59] => aria-256-ctr
    [61] => aria-256-gcm
    [62] => aria-256-ofb
    [63] => bf-cbc
    [64] => bf-cfb
    [66] => bf-ofb
    [67] => camellia-128-cbc
    [68] => camellia-128-cfb
    [69] => camellia-128-cfb1
    [70] => camellia-128-cfb8
    [71] => camellia-128-ctr
    [73] => camellia-128-ofb
    [74] => camellia-192-cbc
    [75] => camellia-192-cfb
    [76] => camellia-192-cfb1
    [77] => camellia-192-cfb8
    [78] => camellia-192-ctr
    [80] => camellia-192-ofb
    [81] => camellia-256-cbc
    [82] => camellia-256-cfb
    [83] => camellia-256-cfb1
    [84] => camellia-256-cfb8
    [85] => camellia-256-ctr
    [87] => camellia-256-ofb
    [88] => cast5-cbc
    [89] => cast5-cfb
    [91] => cast5-ofb
    [92] => chacha20
    [93] => chacha20-poly1305
    [111] => id-aes128-CCM
    [112] => id-aes128-GCM
    [113] => id-aes128-wrap
    [114] => id-aes128-wrap-pad
    [115] => id-aes192-CCM
    [116] => id-aes192-GCM
    [117] => id-aes192-wrap
    [118] => id-aes192-wrap-pad
    [119] => id-aes256-CCM
    [120] => id-aes256-GCM
    [121] => id-aes256-wrap
    [122] => id-aes256-wrap-pad
    [124] => idea-cbc
    [125] => idea-cfb
    [127] => idea-ofb
    [137] => seed-cbc
    [138] => seed-cfb
    [140] => seed-ofb
    [141] => sm4-cbc
    [142] => sm4-cfb
    [143] => sm4-ctr
    [145] => sm4-ofb
)
Array
(
    [36] => aes128
    [37] => aes128-wrap
    [38] => aes192
    [39] => aes192-wrap
    [40] => aes256
    [41] => aes256-wrap
    [69] => aria128
    [70] => aria192
    [71] => aria256
    [72] => bf
    [77] => blowfish
    [99] => camellia128
    [100] => camellia192
    [101] => camellia256
    [102] => cast
    [103] => cast-cbc
    [146] => idea
    [164] => seed
    [169] => sm4
)
*/
//src = http://reeteshghimire.com.np/2019/04/29/encrypt-decrypt-string-using-a-private-secret-key-with-php/
//src = https://www.youtube.com/watch?v=cc8xeRD5-lc
function encrypt($message, $encryption_key){
    $key = hex2bin($encryption_key);
    $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
    $nonce = openssl_random_pseudo_bytes($nonceSize);
    $ciphertext = openssl_encrypt(
      $message, 
      'aes-256-ctr', 
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );
    return base64_encode($nonce.$ciphertext);
  }
  function decrypt($message,$encryption_key){
    $key = hex2bin($encryption_key);
    $message = base64_decode($message);
    $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
    $nonce = mb_substr($message, 0, $nonceSize, '8bit');
    $ciphertext = mb_substr($message, $nonceSize, null, '8bit');
    $plaintext= openssl_decrypt(
      $ciphertext, 
      'aes-256-ctr', 
      $key,
      OPENSSL_RAW_DATA,
      $nonce
    );
    return $plaintext;
  }
  $original_string = "password";
  $private_secret_key = '1f4276388ad3214c873428dbef42243f' ; //some random hex characters
  $encrypted = encrypt($original_string,$private_secret_key);
  echo '<h3>Original String : '.$original_string.'</h3>';
  echo '<h3>After Encryption : '.$encrypted.'</h3>';
  echo '<h3>After Decryption : '.decrypt($encrypted,$private_secret_key).'</h3>';
?>