<?php

$numero = $_POST['antibot'];

if ($numero != 5) {
	alerta("Resposta errada, tente novamente!");
	voltar();
	exit();
}

function voltar()
{
	echo "<script>history.go(-1)</script>";
}

function redirect($x)
{
	echo "<script>window.top.location.href = '" . $x . "'</script>";
}

function alerta($x)
{
	echo "<script>alert('" . utf8_decode($x) . "');</script>";
}

date_default_timezone_set('America/Sao_Paulo');
$now = date('d/m/Y H:i:s (T)');

require_once("define.php");

//dados do formulario
$nome = utf8_decode($_POST['nome']);
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = utf8_decode($_POST['mensagem']);

//dados do email
$subject = utf8_encode("Novo contato - JET BM INVEST");
$body = utf8_encode('<table align="center"  border="0" width="50%" style="border:solid 2px #000000;">
        <tr bgcolor="#000000">
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px ;background:#000000; color:#F8F8F8; font-weight:bold; line-height:50px">
				Contato atrav&eacute;s do site
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px">&nbsp;</td>
        </tr>
        <tr>
        	<td width="100%" align="center" style="font-family:Arial; font-size:16px; color: #000000;">
            	<strong>Nome:</strong>
            </td>
        </tr>
        <tr>
            <td align="center" style="font-family:Arial; font-size:16px; color: #3D3D3D;">

            	' . utf8_decode($_POST['nome']) . '
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px">&nbsp;</td>
        </tr>
        <tr>
        	<td align="center" style="font-family:Arial; font-size:16px; text-decoration:none; color: #000000;">
            	<strong>E-mail:</strong>
            </td>
        </tr>
        <tr> 
            <td align="center" style="font-family:Arial; font-size:16px; color:#82777B; text-decoration:none; color: #3D3D3D;">
            	' . $_POST['email'] . '
            </td>
       </tr>
       <tr>
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px">&nbsp;</td>
        </tr>
        <tr>
        	<td align="center" style="font-family:Arial; font-size:16px; text-decoration:none; color: #000000;">
            	<strong>Whatsapp:</strong>
            </td>
        </tr>
        <tr> 
            <td align="center" style="font-family:Arial; font-size:16px; color:#82777B; text-decoration:none; color: #3D3D3D;">
            	' . $_POST['telefone'] . '
            </td>
       </tr>
		<tr>
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px">&nbsp;</td>
        </tr>
        <tr>
        	<td width="100%" align="center" style="font-family:Arial; font-size:16px; color: #000000;">
            	<strong>Mensagem:</strong>
            </td>
        </tr>
        <tr>
            <td align="center" style="font-family:Arial; font-size:16px; color: #3D3D3D;">

            	' . utf8_decode($_POST['mensagem']) . '
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center" style="font-family:Arial; font-size:16px">&nbsp;</td>
        </tr>

</table>');


//inclui a biblioteca
	require_once('PHPMailer-master/src/PHPMailer.php');
    require_once('PHPMailer-master/src/SMTP.php');
    require_once('PHPMailer-master/src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

//configuracoes de email
$mail = new PHPMailer;

$mail->Host = 'empregosnainternet.com.br';
$mail->SMTPAuth = true;
$mail->Username = 'folder';
$mail->Password = 'c6x-o5u-7hq-w3g';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

/*$mail->smtpConnect(
	array(
		"ssl" => array(
			"verify_peer" => false,
			"verify_peer_name" => false,
			"allow_self_signed" => true
		)
	)
);*/

$mail->setFrom($email, $nome);

$mail->isHTML(true);                                // Set email format to HTML


$to = 'alexwebdb@gmail.com';
//$to = 'contato@jetbminvest.com.br';

$mail->Subject = $subject;

$mail->Body    = utf8_decode($body);

$mail->addAddress($to);     // Add a recipient


if ($mail->send()) {
	alerta('Mensagem enviada com sucesso! Aguarde retorno!');
} else {
	alerta('Erro ao enviar mensagem. Tente novamente mais tarde.');
}

redirect(SITE);

?>