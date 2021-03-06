<?php
// src/OC/PlatformBundle/Antispam/OCAntispam.php

	/**
	* Vérifie si le texte est un spam ou non
	*
	* @param string $text
	* @return bool
	*/


namespace OC\PlatformBundle\Antispam;

class OCAntispam
{
	private $mailer;
	private $locale;
	private $minLength;

	public function __construct(\Swift_Mailer $mailer, $locale, $minLength)
	{
		$this->mailer    = $mailer;
		$this->locale    = $locale;
		$this->minLength = (int) $minLength;
	}

	public function isSpam($text)
	{
		return strlen($text) < $this->minLength;
	}
}