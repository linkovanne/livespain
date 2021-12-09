<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5011988317:AAFcssoHYmW7ecf1s7X0X_U5hCsMpk1F9k8";

//Сюда вставляем chat_id
$chat_id = "-342799097";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
  $name = ($_POST['name']);
  $email = ($_POST['email']);

//Собираем в массив то, что будет передаваться боту
  $arr = array(
    'Имя:' => $name,
    'E-Mail:' => $email
  );

  print_r($arr);
//Настраиваем внешний вид сообщения в телеграме
  foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  };

//Передаем данные боту
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
  if ($sendToTelegram) {
    alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
  }

//А здесь сообщение об ошибке при отправке
  else {
    alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
  }
}

?>
