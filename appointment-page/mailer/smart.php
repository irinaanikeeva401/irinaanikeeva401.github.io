<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include the PHPMailer files
require 'PHPMailer691/src/Exception.php';
require 'PHPMailer691/src/PHPMailer.php';
require 'PHPMailer691/src/SMTP.php';

$mail = new PHPMailer(true);
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$description = $_POST['descr'];
$city = $_POST['city'];
$mail->CharSet = 'utf-8';

try {
    $mail->SMTPDebug = 3;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sandbox.smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'e83739c9773d0e';                 // Наш логин
    $mail->Password = '87140967734be0';                           // Наш пароль от ящика
    $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 2525;                                    // TCP port to connect to
     
    $mail->setFrom('main-eko-3d-kt@eko3dkt.com.ua', 'Website EKO 3D KT');   // От кого письмо 
    $mail->addAddress('irina.anikeeva401@gmail.com');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

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
            <tr> <td>Місто:</td> <td>' . $city . '</td> </tr>
            <tr> <td>Адреса відділення:</td> <td>' . $address . '</td> </tr>
            <tr> <td>Додаткова інформація, яку залишив клієнт:</td> <td>' . $description . '</td> </tr>
        </table>
    </body> </html>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>
