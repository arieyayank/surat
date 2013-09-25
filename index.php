<!doctype html>
<html lang="en">
<head>

<title>Membuat Form "Hubungi kami" dengan Ajax dan PHP</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="/style.css">
<!-- Style untuk IE7 -->

<!--[if lt IE 8]>
<style>

/* Menetukan posisi dari fields isian di IE7 */

input, textarea {
  float: right;
}

#formButtons {
  clear: both;
}


#contactForm.positioned, .statusMessage {
  left: 50%;
  top: 50%;
}

#contactForm.positioned {
  margin-left: -20em;
  margin-top: -16.5em;
}

.statusMessage {
  margin-left: -15em;
  margin-top: -1em;
}

</style>
<![endif]-->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
/
var messageDelay = 1000;  // Belerapa lama untuk memunculkan notifikasi (milliseconds)

// Inisialisasi form ketika halaman telah siap
$( init );


// Inisialisasi Form

function init() {

  // Sembunyikan Form
  // Membuat fungsi submitForm()
  // Posisikan form ditengah-tengah halaman.
  $('#contactForm').hide().submit( submitForm ).addClass( 'positioned' );

  // Ketika link "Hubungi Kami" di klik maka:
  // 1. membuat efek fade pada form isian
  // 2. munculkan form isian
  // 3. Fokuskan pada field pertama


  $('a[href="#contactForm"]').click( function() {
    $('#content').fadeTo( 'slow', .2 );
    $('#contactForm').fadeIn( 'slow', function() {
      $('#senderName').focus();
    } )

    return false;
  } );
  
  // Ketika tombol "batal" di klik, tutup form isian
  $('#cancel').click( function() { 
    $('#contactForm').fadeOut();
    $('#content').fadeTo( 'slow', 1 );
  } );  

  // Ketika tombol "Esc" keyboard ditekan, tutup form isian
  $('#contactForm').keydown( function( event ) {
    if ( event.which == 27 ) {
      $('#contactForm').fadeOut();
      $('#content').fadeTo( 'slow', 1 );
    }
  } );

}


// Submit Form dengan ajax

function submitForm() {
  var contactForm = $(this);

  // Apakah semua field dalam isian terisi semua?

  if ( !$('#senderName').val() || !$('#senderEmail').val() || !$('#message').val() ) {

    // Jika tidak; munculkan notifikasi
    $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();
    contactForm.fadeOut().delay(messageDelay).fadeIn();

  } else {

    // Jika ya; Submit isian form ke PHP dengan Ajax

    $('#sendingMessage').fadeIn();
    contactForm.fadeOut();

    $.ajax( {
      url: contactForm.attr( 'action' ) + "?ajax=true",
      type: contactForm.attr( 'method' ),
      data: contactForm.serialize(),
      success: submitFinished
    } );
  }

  return false;
}


// menangani respon dari Ajax

function submitFinished( response ) {
  response = $.trim( response );
  $('#sendingMessage').fadeOut();

  if ( response == "success" ) {

    // Jika isian terkirim sempurna:
    // 1. munculkan notifikasi 
    // 2. Hapus isian Form
    // 3. tutup isian form

    $('#successMessage').fadeIn().delay(messageDelay).fadeOut();
    $('#senderName').val( "" );
    $('#senderEmail').val( "" );
    $('#message').val( "" );

    $('#content').delay(messageDelay+500).fadeTo( 'slow', 1 );

  } else {

    // Jika isian gagal terkirim: Munculkan notifikasi,
    // tampilkan form isian kembali
    $('#failureMessage').fadeIn().delay(messageDelay).fadeOut();
    $('#contactForm').delay(messageDelay+500).fadeIn();
  }
}

</script>

</head>
<body>

<div class="wideBox">
  <h1>Membuat form "Hubungi Kami" dengan Ajax dan PHP</h1>
  <h2>Klik Link "Hubungi Kami"...</h2>
</div>

<div id="content">


  <p style="padding-top: 50px; font-weight: bold; text-align: center;"><a href="#contactForm">~ Hubungi Kami ~</a></p>
 
</div>

<form id="contactForm" action="processForm.php" method="post">

  <h2>Silahkan mengirimkan pesan kepada kami...</h2>

  <ul>

    <li>
      <label for="senderName">Nama Lengkap</label>
      <input type="text" name="senderName" id="senderName" placeholder="Silahkan isi nama lengkap anda" required="required" maxlength="40" />
    </li>

    <li>
      <label for="senderEmail">Alamat Email</label>
      <input type="email" name="senderEmail" id="senderEmail" placeholder="Silahkan isi alamat email anda" required="required" maxlength="50" />
    </li>

    <li>
      <label for="message" style="padding-top: .5em;">Isi Pesan</label>
      <textarea name="message" id="message" placeholder="Silahkan isi pesan anda" required="required" cols="80" rows="10" maxlength="10000"></textarea>
    </li>

  </ul>

  <div id="formButtons">
    <input type="submit" id="sendMessage" name="sendMessage" value="Kirim" />
    <input type="button" id="cancel" name="cancel" value="Batal" />
  </div>

</form>

<div id="sendingMessage" class="statusMessage"><p>Mengirim pesan anda, silahkan...</p></div>
<div id="successMessage" class="statusMessage"><p>Terimakasih telah mengirim pesan! Kami akan segera merespon pesan anda.</p></div>
<div id="failureMessage" class="statusMessage"><p>Pengiriman pesan gagal. Silahkan coba lagi.</p></div>
<div id="incompleteMessage" class="statusMessage"><p>Silahkan cek ulang isian anda.</p></div>

<div class="wideBox">
  <p>&copy; antefer.blogspot.com</p>
</div>

</body>
</html>

