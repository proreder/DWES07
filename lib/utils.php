<?php

/**
 * Incluye un archivo php de forma que las variables creadas en su interior
 * no pasen al ámbito global.
 */
function incluirDeFormaAislada ($file,$params)
{
    extract($params,EXTR_OVERWRITE);
    include($file);
}