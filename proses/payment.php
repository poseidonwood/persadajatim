<?php

$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = "62" . $_POST['phone'];
$alamat = $_POST['alamat'];
$nilai = $_POST['exist_text'];


// $message = "*$nama* telah berdonasi sebesar Rp.  $nilai,- .
// Detail rincian donatur :
// Nama = $nama 
// Email = $email 
// Wa / No Hp = $phone
// Alamat = $alamat
// Sebesar = Rp $nilai,-";

// SAMPLE HIT API iPaymu v2 PHP //

$va           = '1179002335494254'; //get on iPaymu dashboard
$secret       = 'E72079CF-D39F-401B-A4EC-A1136257C694'; //get on iPaymu dashboard

$url          = 'https://my.ipaymu.com/api/v2/payment'; //url
$method       = 'POST'; //method

//Request Body//
$body['product']    = array('Donasi');
$body['qty']        = array('1');
$body['price']      = array($nilai);
$body['returnUrl']  = 'https://mywebsite.com/thankyou';
$body['cancelUrl']  = 'https://mywebsite.com/cancel';
$body['notifyUrl']  = 'https://mywebsite.com/notify';
//End Request Body//

//Generate Signature
// *Don't change this
$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
$requestBody  = strtolower(hash('sha256', $jsonBody));
$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
$signature    = hash_hmac('sha256', $stringToSign, $secret);
$timestamp    = Date('YmdHis');
//End Generate Signature


$ch = curl_init($url);

$headers = array(
  'Accept: application/json',
  'Content-Type: application/json',
  'va: ' . $va,
  'signature: ' . $signature,
  'timestamp: ' . $timestamp
);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POST, count($body));
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$err = curl_error($ch);
$ret = curl_exec($ch);
curl_close($ch);
if ($err) {
  echo $err;
} else {

  //Response
  $ret = json_decode($ret);
  if ($ret->Status == 200) {
    $sessionId  = $ret->Data->SessionID;
    $url        =  $ret->Data->Url;
    header('Location:' . $url);
  } else {
    echo $ret;
  }
  //End Response
}
