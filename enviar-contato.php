<?php

if($_POST){
  $nome=$_POST['nome'];
  $telefone=$_POST['telefone'];
  $email=$_POST['email'];
  $mensagem=$_POST['mensagem'];


  $assunto = "Contato de: {$nome}";
  $textoEmail = "Nome: {$nome}<br>Telefone: {$telefone}<br>E-Mail: {$email}<br><br>Mensagem:<br>{$mensagem}";
  $destinatario = 'contato@simple.tec.br';

  
  require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "mail.simple.tec.br";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
  $mail->Username = "no-reply@simple.tec.br";
  $mail->Password = "nr@Simple30";
  $mail->SetFrom("no-reply@simple.tec.br");
  $mail->Subject = $assunto;
  $mail->Body = $textoEmail;
  $mail->AddAddress($destinatario);

  if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else {
    echo "
    <script>
      body = document.querySelector('body');
      body.textContent='';
      alert('Mensagem enviada com sucesso!');
      window.location='index.html';
    </script>
    ";
  }
}
?>