<?php

// 1. Start the session first
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Load Environment Variables / Database connection
require_once 'db.php';

// 3. Set global settings (timezones, error reporting)
date_default_timezone_set('UTC');
