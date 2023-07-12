<?php

const ALERT_SESSION_NAME = 'alert';
function setAlert(string $msg): void
{
    sessionSet(ALERT_SESSION_NAME, $msg);
//    var_dump($_SESSION);exit();
}

/** Affiche un message */
function loadAlert(): string
{
    $alertMsg = sessionGet(ALERT_SESSION_NAME);
    sessionRemove(ALERT_SESSION_NAME);
    return $alertMsg ? "<script>alert('$alertMsg');</script>" : "";
}