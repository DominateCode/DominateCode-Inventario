<?php

//manejo de funciones de envio de correo electronico
//los formatos de string de correo deben cumplir con la RFC2822

class email{
    public function __construct(){
        
    }
    public function enviar($destinatario,$titulo,$mensaje,$cabeceras){
        //$mensaje = "Línea 1\r\nLínea 2\r\nLínea 3";
        //$mensaje = str_replace("\n.", "\n..", $texto);
        
        // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
        $mensaje = wordwrap($mensaje, 70, "\r\n");

        /*$cabeceras = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();*/

        mail($destinatario, $titulo, $mensaje,$cabeceras);
    }
    public function enviar_html($destinatario,$titulo,$mensaje,$cabeceras){
        //cuando son varios destinatarios separar por comas.
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        /*
        // Cabeceras adicionales
        $cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
        $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
        $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
        */
        mail($destinatario, $titulo, $mensaje,$cabeceras);
    }
}

?>