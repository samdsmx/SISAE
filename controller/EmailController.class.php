<?php

class EmailController extends _BaseController {

    public function compose (){
        $carreras = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->queryAll();
        $_SESSION[VISTA] = 'view/email.php';
        $_SESSION[NOMBRE_VISTA] = 'Envío de correos';
        include_once 'templates/base.php';
    }
    
    public function send() {
        print_r ($_POST);
        $asunto = filter_input(INPUT_POST, 'asunto');
        $carreras = $_POST['carrera'];
        $generaciones = $_POST['generacion'];
        $body = filter_input(INPUT_POST, 'body');
        $unidad = filter_input(INPUT_POST, 'unidad');
        $remitente = filter_input(INPUT_POST, 'remitente');
        print 'Iniciando envío...';
        var_dump($carreras);
        foreach ($carreras as $carrera){
            print 'Carrera:'.$carrera;
            foreach ($generaciones as $generacion){
                print 'Generacion:'.$generacion;
                $egresados = DAOFactory::getDAOFactory()->getEgreDatosAcadsIpnDAO()->queryCorreosXGeneracion($unidad, $carrera, $generacion);
                print_r($egresados);
                foreach ($egresados as $egresado){
                    $this->sendMail($asunto, $egresado, $remitente, $body);
                }
            }
        }
    }
    
    private function sendMail ($asunto, $egresado, $remitente, $body){
        echo 'Enviando correo a:'.$egresado;
        //Create a new PHPMailer instance
        $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
        $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

//Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
        $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "egresados.dtw@gmail.com";

//Password to use for SMTP authentication
        $mail->Password = "egresadosdtw";

//Set who the message is to be sent from
        $mail->setFrom('egresados.dtw@gmail.com', 'SISAE');

//Set an alternative reply-to address
        $mail->addReplyTo($this->remitente, 'SISAE');

//Set who the message is to be sent to
        $mail->addAddress($this->egresado, $this->egresado);

//Set the subject line
        $mail->Subject = $this->asunto;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//        $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->msgHTML("<html><body>".$this->body."</body></html>");

//Replace the plain text body with one created manually
//        $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//        $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
}