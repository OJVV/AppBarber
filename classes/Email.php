<?php  

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['MAIL_PORT'];

        $mail->setFrom('cuentas@appbarber.com');
        $mail->addAddress('cuentas@appbarber.com', 'AppBarber.com');
        $mail->Subject = "Confirma tu cuenta";

        // set HTML

        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta ahora eres un Vikingo, solo debes confirmarla presionando el siguiente enlace </p>";
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['SERVER_HOST'] . "confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //enviar email

        $mail->send();
    
    }
    public function enviarInstrucciones(){
          // crear el objeto de email
          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'sandbox.smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Port = 2525;
          $mail->Username = 'bfdfd650909afb';
          $mail->Password = '4ca154ab6ca6e0';
  
          $mail->setFrom('cuentas@appbarber.com');
          $mail->addAddress('cuentas@appbarber.com', 'AppBarber.com');
          $mail->Subject = "Restablece tu Password";
  
          // set HTML
  
          $mail->isHTML(TRUE);
          $mail->CharSet = "UTF-8";
  
          $contenido = '<html>';
          $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado resstablecer tu password, sigue en el siguiente enlace para hacerlo. </p>";
          $contenido .= "<p> Presiona aqui: <a href='http://localhost:3008/recuperar?token=" . $this->token . "'>Restablecer Password</a></p>";
          $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
          $contenido .= '</html>';
  
          $mail->Body = $contenido;
  
          //enviar email
  
          $mail->send();
    }
}
