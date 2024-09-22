<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$description = $_POST['descr'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mx1.cityhost.com.ua';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'department-bazhana@eko3dkt.com.ua';                 // Наш логин
$mail->Password = '135678eko3dkt';                           // Наш пароль от ящика
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
 
$mail->setFrom('department-bazhana@eko3dkt.com.ua', 'Website EKO 3D KT');   // От кого письмо 
$mail->addAddress('eko3d4006894@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);      

$mail->Subject = 'Запит на обстеження';
$mail->Body    = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">  <title></title> <style>  table {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 15px;
    border-radius: 10px;
    border-spacing: 0;
    text-align: center;
    }
    th {
    background: #90EE90;
    color: black;
    text-shadow: 0 1px 1px #2D2020;
    padding: 10px 20px;
    }
    th, td {
    border-style: solid;
    border-width: 0 1px 1px 0;
    border-color: black;
    }
    th:first-child, td:first-child {
    text-align: left;
    }
    th:first-child {
    border-top-left-radius: 10px;
    }
    th:last-child {
    border-top-right-radius: 10px;
    border-right: none;
    }
    td {
    padding: 10px 20px;
    background: #F8E391;
    }
    tr:last-child td:first-child {
    border-radius: 0 0 0 10px;
    }
    tr:last-child td:last-child {
    border-radius: 0 0 10px 0;
    }
    tr td:last-child {
    border-right: none;
    }
    </style>
</head>
<body> <table>
        <tr> <th>ПІБ</th>  <th>' . $name . '</th>  </tr>
         <tr> <td>Номер телефону</td> <td>' . $phone .'</td> </tr>
        <tr> <td>Адреса відділення:</td> <td>' . $address . '</td> </tr>
        <tr> <td>Додаткова інформація, яку залишив клієнт:</td> <td>' . $description . '</td> </tr>
    </table>
</body> </html>';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>