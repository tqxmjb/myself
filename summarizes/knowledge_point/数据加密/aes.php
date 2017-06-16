<?php
/**
 * Created for moneplus.
 * User: tonghe.wei@moneplus.cn
 * Date: 2016/4/22
 * Time: 14:29
 */
class aes {

    // CRYPTO_CIPHER_BLOCK_SIZE 32

    private $_secret_key = 'default_secret_key';

//    public function setKey($key) {
//        $this->_secret_key = $key;
//    }

    public function encode($data) {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_256,'',MCRYPT_MODE_CBC,'');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td),MCRYPT_RAND);
        mcrypt_generic_init($td,'default_secret_key',$iv);
        $encrypted = mcrypt_generic($td,$data);
        mcrypt_generic_deinit($td);

        return $iv . $encrypted;
//        return base64_encode($iv . $encrypted);
    }

    public function decode($data) {
//        $data = base64_decode($data);

        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_256,'',MCRYPT_MODE_CBC,'');
        $iv = mb_substr($data,0,32,'latin1');
        var_dump($iv);exit;
        mcrypt_generic_init($td,'default_secret_key',$iv);
        $data = mb_substr($data,32,mb_strlen($data,'latin1'),'latin1');
        $data = mdecrypt_generic($td,$data);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        return trim($data);
    }
}

$aes = new aes();
//$aes->setKey('key');
header("Content-type: text/html; charset=utf-8");
// 加密
$string = $aes->encode('name');
var_dump($string);
echo '</br>';
// 解密
$string = $aes->decode($string);
var_dump($string);
?>