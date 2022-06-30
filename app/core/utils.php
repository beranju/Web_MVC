<?php
function html($string)
{
    return strip_tags(html_entity_decode(htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'ISO-8859-1')));
} 