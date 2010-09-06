<?php
class ChatController extends AppController {

	var $name = 'Chat';
	
function chatHeartbeat() {
	
	$items = '';
	$chatBoxes = array();	
  		
	$M_find_conditions = array(
  	'conditions' => array('Chat.to' => mysql_real_escape_string($_SESSION['User']['user_name']) , 'Chat.recd' => 0), 
  	'fields' => array('Chat.id', 'Chat.from', 'Chat.to','Chat.message','Chat.sent','Chat.recd'), 
  	'order' => array('Chat.id ASC'), //string or array defining order

  );
	
	$M_chat = $this->Chat->find('all',$M_find_conditions);
	
  foreach($M_chat AS $chat)
  {
		if (!isset($_SESSION['openChatBoxes'][$chat['Chat']['from']]) && isset($_SESSION['chatHistory'][$chat['Chat']['from']])) {
			$items = $_SESSION['chatHistory'][$chat['Chat']['from']];
		}
    
    $chat['Chat']['message'] = $this->sanitize($chat['Chat']['message']);
    
		$items .= <<<EOD
					   {
			"s": "0",
			"f": "{$chat['Chat']['from']}",
			"m": "{$chat['Chat']['message']}"
	   },
EOD;

	if (!isset($_SESSION['chatHistory'][$chat['Chat']['from']])) {
		$_SESSION['chatHistory'][$chat['Chat']['from']] = '';
	}

	$_SESSION['chatHistory'][$chat['Chat']['from']] .= <<<EOD
						   {
			"s": "0",
			"f": "{$chat['Chat']['from']}",
			"m": "{$chat['Chat']['message']}"
	   },
EOD;

		unset($_SESSION['tsChatBoxes'][$chat['Chat']['from']]);
		$_SESSION['openChatBoxes'][$chat['Chat']['from']] = $chat['Chat']['sent'];
      
  }

	if (!empty($_SESSION['openChatBoxes'])) {
	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
			$now = time()-strtotime($time);
			$time = date('g:iA M dS', strtotime($time));

			$message = "Sent at $time";
			if ($now > 180) {
				$items .= <<<EOD
{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;

	if (!isset($_SESSION['chatHistory'][$chatbox])) {
		$_SESSION['chatHistory'][$chatbox] = '';
	}

	$_SESSION['chatHistory'][$chatbox] .= <<<EOD
		{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;
			$_SESSION['tsChatBoxes'][$chatbox] = 1;
		}
		}
	}
}
	
  $this->Chat->query("update chats set recd = 1 where chats.to = '".mysql_real_escape_string($_SESSION['User']['user_name'])."' and chats.recd = 0");
  
  	
	

	if ($items != '') {
		$items = substr($items, 0, -1);
	}
header('Content-type: application/json');
?>
{
		"items": [
			<?php echo $items;?>
        ]
}

<?php
			exit(0);
}
	
function chatBoxSession($chatbox) {
	
	$items = '';
	
	if (isset($_SESSION['chatHistory'][$chatbox])) {
		$items = $_SESSION['chatHistory'][$chatbox];
	}

	return $items;
}

function startChatSession() {
	
  $items = '';
	
	if (!empty($_SESSION['openChatBoxes'])) {
		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
			$items .= $this->chatBoxSession($chatbox);
		}
	}


	if ($items != '') {
		$items = substr($items, 0, -1);
	}

header('Content-type: application/json');
?>
{
		"username": "<?php echo $_SESSION['User']['user_name'];?>",
		"items": [
			<?php echo $items;?>
        ]
}

<?php


	exit(0);
}

function sendChat() {
	$from = $_SESSION['User']['user_name'];
	$to = $_POST['to'];
	$message = $_POST['message'];

	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
	
	$messagesan = $this->sanitize($message);

	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
		$_SESSION['chatHistory'][$_POST['to']] = '';
	}

	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
					   {
			"s": "1",
			"f": "{$to}",
			"m": "{$messagesan}"
	   },
EOD;


	unset($_SESSION['tsChatBoxes'][$_POST['to']]);

	$M_savedata = array(
  'Chat' => array(
    'to' => mysql_real_escape_string($to),
    'from' => mysql_real_escape_string($from),
    'message' => mysql_real_escape_string($message),
  ),
  );
	
	$this->Chat->save($M_savedata);
	
	echo "1";
	exit(0);
}


function closeChat() {

	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
	
	echo "1";
	exit(0);
}	
	
function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;	
	}
	
}
?>