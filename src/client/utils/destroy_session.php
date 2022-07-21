<?php

session_start();

include __DIR__ . '/redirect_to.php';


session_destroy();

redirect_to_index();
