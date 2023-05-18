<?php

namespace Pushpender\MailTracker\Contracts;

interface SentEmailModel
{
    public function getConnectionName();
    public function getAllHeaders();
    public function getHeader(string $key);
    public function fillContent(string $originalHtml, string $hash);
    public function urlClicks();
}