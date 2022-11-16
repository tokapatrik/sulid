<?php

class Misc{
    
  function stringToColorCode($str)
  {
    $code = dechex(crc32($str));
    $code = substr($code, 0, 6);
    return $code;
  }

  function updateSessionFroDB($variable, $table) //Várja, hogy a $_SESSION melyik változóját, melyik táblából
  {
    //Kell, hogy melyik id. A táblák első adata mindíg id tehát már csak a prfix kell
    $prefix=substr(array_keys($_SESSION[$variable])[0], 0, strpos(array_keys($_SESSION[$variable])[0], '_'));
    $rs=getSQL("SELECT * FROM ".$table." WHERE ".$prefix."_id='".array_values($_SESSION[$variable])[0]."'")[0];
    $_SESSION[$variable]=$rs;
  }
}

?>