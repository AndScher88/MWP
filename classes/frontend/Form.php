<?php

namespace classes\frontend;


class Form
{
    public string $objectName;
	protected string $employeeDB;
	protected string $articleDB;
	
	
	public function übergabeKey()
    {
    
    }



    /**
     * @param string $contentSubmitButton
     */
    public function setContentSubmitButton(string $contentSubmitButton): void
    {
        $this->contentSubmitButton = $contentSubmitButton;
    }
}