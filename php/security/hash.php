<?php
/*
hash to be used in hash(); function
hash_algos();
Array
(
    [0] => md2
    [1] => md4
    [2] => md5
    [3] => sha1
    [4] => sha224
    [5] => sha256
    [6] => sha384
    [7] => sha512/224
    [8] => sha512/256
    [9] => sha512
    [10] => sha3-224
    [11] => sha3-256
    [12] => sha3-384
    [13] => sha3-512
    [14] => ripemd128
    [15] => ripemd160
    [16] => ripemd256
    [17] => ripemd320
    [18] => whirlpool
    [19] => tiger128,3
    [20] => tiger160,3
    [21] => tiger192,3
    [22] => tiger128,4
    [23] => tiger160,4
    [24] => tiger192,4
    [25] => snefru
    [26] => snefru256
    [27] => gost
    [28] => gost-crypto
    [29] => adler32
    [30] => crc32
    [31] => crc32b
    [32] => crc32c
    [33] => fnv132
    [34] => fnv1a32
    [35] => fnv164
    [36] => fnv1a64
    [37] => joaat
    [38] => haval128,3
    [39] => haval160,3
    [40] => haval192,3
    [41] => haval224,3
    [42] => haval256,3
    [43] => haval128,4
    [44] => haval160,4
    [45] => haval192,4
    [46] => haval224,4
    [47] => haval256,4
    [48] => haval128,5
    [49] => haval160,5
    [50] => haval192,5
    [51] => haval224,5
    [52] => haval256,5
)
hash to be used in hash_hmac(); function

hash_hmac_algos();
Array
(
    [0] => md2
    [1] => md4
    [2] => md5
    [3] => sha1
    [4] => sha224
    [5] => sha256
    [6] => sha384
    [7] => sha512/224
    [8] => sha512/256
    [9] => sha512
    [10] => sha3-224
    [11] => sha3-256
    [12] => sha3-384
    [13] => sha3-512
    [14] => ripemd128
    [15] => ripemd160
    [16] => ripemd256
    [17] => ripemd320
    [18] => whirlpool
    [19] => tiger128,3
    [20] => tiger160,3
    [21] => tiger192,3
    [22] => tiger128,4
    [23] => tiger160,4
    [24] => tiger192,4
    [25] => snefru
    [26] => snefru256
    [27] => gost
    [28] => gost-crypto
    [29] => haval128,3
    [30] => haval160,3
    [31] => haval192,3
    [32] => haval224,3
    [33] => haval256,3
    [34] => haval128,4
    [35] => haval160,4
    [36] => haval192,4
    [37] => haval224,4
    [38] => haval256,4
    [39] => haval128,5
    [40] => haval160,5
    [41] => haval192,5
    [42] => haval224,5
    [43] => haval256,5
)
*/
$password = "testing";
echo "<td>".$password."</td><br>";
$password1 = hash('md5', $password);
echo "<td>".$password1."</td><br>";
$password1 = hash('sha1', $password);
echo "<td>".$password1."</td><br>";
$password1 = hash('sha256', $password);
echo "<td>".$password1."</td><br>";
$password1 = hash('sha512', $password);
echo "<td>".$password1."</td><br>";
$password1 = hash('sha512', $password);
echo "<td>".$password1."</td><br>";
$password1 = hash_hmac('sha256', $password, 'secret');
echo "<td>".$password1."</td><br>";
?>