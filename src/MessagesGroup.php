<?php
namespace BobbyFramework\Validation;
class MessagesGroup {
  protected _messages;
  
  public function appendMessage(Message message)
	{
		$this->_messages[] = message;
	}
}
