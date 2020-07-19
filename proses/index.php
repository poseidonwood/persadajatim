<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$phone = "62" . $_POST['phone'];
$alamat = $_POST['alamat'];
$nilai = $_POST['exist_text'];


$message = "Terimakasih *$nama* telah berdonasi sebesar Rp.  $nilai,- .
Detail rincian donatur :
Nama = $nama 
Email = $email 
Wa / No Hp = $phone
Alamat = $alamat
Sebesar = Rp $nilai,-
Telah kami terima. Semoga rejeki anda bertambah dan semua doa atau harapan $nama segera terlaksanakan. Amin amin yarobal alamin";

// echo $message;
// Send Message
$my_apikey = "KGLJT6KW1J4XB9TPGTFW";
$api_url = "http://panel.rapiwha.com/send_message.php";
$api_url .= "?apikey=" . urlencode($my_apikey);
$api_url .= "&number=" . urlencode($phone);
$api_url .= "&text=" . urlencode($message);
$my_result_object = json_decode(file_get_contents($api_url, false));
echo "<br>Result: " . $my_result_object->success;
echo "<br>Description: " . $my_result_object->description;
echo "<br>Code: " . $my_result_object->result_code;
