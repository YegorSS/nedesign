<?php

$user  = 'yegor@1design.ua';
$pass = '20476';

$connect = imap_open('{mail.1design.ua:143/novalidate-cert}INBOX',$user, $pass);

if ($connect) echo 'Successful <br>'; else {echo 'Failed'; die;}

$emails = imap_search($connect, 'ALL');




function getParts($object, & $parts)
{
	// Object is multipart
	
	if ($object->type == 1) {
		foreach ($object->parts as $part)
		{
			getParts($part, $parts);
		}
	} else{
		
		$p['type'] = $object->type;
		$p['encode'] = $object->encoding;
		$p['subtype'] = $object->subtype;
		$p['bytes'] = $object->bytes;
		
		if ($object->ifparameters == 1) {
			foreach ($object->parameters as $param){
				$p['params'][] = array('attr' => $param->attribute,
				'val'  => $param->value);
			}
		
		}

		if ($object->ifdparameters == 1) {
			foreach ($object->dparameters as $param){
				$p['dparams'][] = array('attr' => $param->attribute,
				'val'  => $param->value);
			}
		}

		$p['disp'] = null;
		if ($object->ifdisposition == 1) {
			$p['disp'] = $object->disposition;
		}
		
		$parts[] = $p;
	}
}


function getPlain($str, $boundary){
	$lines = explode("\n", $str);
	
	$plain = false;
	$res = '';
	$start = false;
	foreach ($lines as $line) {
	
		if (strpos($line, 'text/plain') !== false) $plain = true;
	
		if (strlen($line) == 1 && $plain) {
			$start = true;
			$plain = false;
			continue;
		}
	
		if ($start && strpos($line, 'Content-Type') !== false) $start = false;
		if ($start)
			$res .= $line;
	
	}
	
	$res = substr($res, 0, strpos($res, '--' . $boundary));
	$res = base64_decode($res == '' ? $str : $res);
	
	return $res;
}




$allMails = [];

foreach($emails as $email){
 
	$mail = array();
	$structure = imap_fetchstructure($connect, $email);
	$header = imap_header($connect, $email);
	$boundary = '';
	
	if ($structure->ifparameters) {
	
		foreach ($structure->parameters as $param){
		
			if (strtolower($param->attribute) == 'boundary')
				$boundary = $param->value;
		}
	}
	
	 
	
	$parts = array();
	
	// Get allparts to $parts
	
	getParts($structure, $parts);
	
	if ($structure->type == 1) {
		
		$parts = array();
			
		// Get allparts to $parts
		getParts($structure, $parts);
		
		$mail['body'] = '!!!'; //imap_fetchbody($connect, $email, '1');
		
		//$mail['body'] = imap_base64($mail['body']);
		//$mail['body'] = (getPlain($mail['body'], $boundary));
		
		//$mail['body'] = iconv('KOI8-R', 'utf-8', $mail['body']);
		
		// Get attach
		
		$i = 0;
		foreach ($parts as $part){
		
			// Not text or multipart
			if ($part['type'] > 1) {
				$file = imap_fetchbody($connect, $email, $i);
				$mail['files'][] = array('content' => $file,
				'filename' => $part['params'][0]['val'],
				'size' => $part['bytes']);
			}
			$i++;
		}

	} else{
		$mail['body'] = imap_body($connect, $email, FT_PEEK);
		
		//$mail['body'] = imap_base64($mail['body']);
		//$mail['body'] = imap_utf8((getPlain($mail['body'], $boundary)));
	
		//$mail['body'] = iconv('KOI8-R', 'utf-8', $mail['body']);
	}
	
	$mail['subject'] = imap_utf8($header->subject);
	
	if (isset($header->to[0]->personal))
		$mail['to']['personal'] = imap_utf8($header->to[0]->personal);
	else
		$mail['to']['personal'] = '';

	$mail['to']['mailbox'] = imap_utf8($header->to[0]->mailbox);
	$mail['to']['host'] = imap_utf8($header->to[0]->host);
	
	if (isset($header->from[0]->personal))
		$mail['from']['personal'] = imap_utf8($header->from[0]->personal);
	else
		$mail['from']['personal'] = '';

	$mail['from']['mailbox'] = imap_utf8($header->from[0]->mailbox);
	$mail['from']['host'] = imap_utf8($header->from[0]->host);
	
	$mail['maildate'] = strtotime(imap_utf8($header->MailDate));
	$mail['date'] = strtotime(imap_utf8($header->date));
	$mail['udate'] = imap_utf8($header->udate);
	$mail['size'] = imap_utf8($header->Size);
	$mail['id'] = md5($header->message_id);
	
	$allMails[] = $mail;


//echo base64_decode('0J3QsNGH0LjQvdCw0LnRgtC1INC/0L7Qu9GD0YfQsNGC0Ywg0LHQvtC70YzRiNC1INC30LLQvtC90LrQvtCyINCy0LzQtdGB0YLQtSDRgSBVcFRvQ2FsbA') . '<br>';
	$text = $mail['body'];
	//if(strripos($text, '=?utf-8?B?') === 0){
	//	$text = str_replace('=?utf-8?B?', '', $text);
	//	$text = str_replace('==?=', '', $text);
	//	$text = base64_decode($text);
	//}
echo $text . '<br>';
//echo $mail['body']. '<br>';
echo isset($mail['files'][0]['filename']) ? $mail['files'][0]['filename']."<hr>" : "<hr>";

}










?>
 