<?php

function exists(array $pTab, string $pKey): bool
{
    return isset($pTab) && array_key_exists($pKey, $pTab); 
}