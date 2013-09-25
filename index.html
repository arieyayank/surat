<?php
proccessmail.php
// Menentukan variabel constan
define( "RECIPIENT_NAME", "Antefer" );
define( "RECIPIENT_EMAIL", "arieyayank@gmail.com" );
define( "EMAIL_SUBJECT", "Pesan pengunjung" );

// Ambil isi dari Form isian
$success = false;
$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// Jika semua isian terisi
if ( $senderName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">";
  $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
}

// Mengembalikan respon ke browser
if ( isset($_GET["ajax"]) ) {
  echo $success ? "success" : "error";
} else {
?>
<html>
  <head>
    <title>Terima kasih!</title>
  </head>
  <body>
  <?php if ( $success ) echo "<p>Terimakasih telah mengirim pesan! Kami akan segera merespon pesan anda.</p>" ?>
  <?php if ( !$success ) echo "<p>Pengiriman pesan gagal. Silahkan coba lagi.</p>" ?>
  <p>Klik pada tombol back di bowser anda untuk kembali ke halaman utama.</p>
  </body>
</html>
<?php
}
?>

