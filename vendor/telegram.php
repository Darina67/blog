<?php
/* https://api.telegram.org/bot5185238334:AAEJ9icXy9YDe3NyDW8pHVp58Zal9Hy7O7s/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$text = $_POST['user_text'];
$token = "5185238334:AAEJ9icXy9YDe3NyDW8pHVp58Zal9Hy7O7s";
$chat_id = "-740933760";
$arr = array(
  'Имя пользователя: ' => $name,
  'Email: ' => $email,
  'Сообщение' => $text
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  echo '<script>var alert = bootbox.alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
alert.show();
setTimeout(function(){alert.modal('hide'); }, 4000); </script>';
  header('Location: ../index.php');
} else {
  echo "Error";
}
?>