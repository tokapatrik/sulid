<?php

class Misc{
    
  function stringToColorCode($str)
  {
    $code = dechex(crc32($str));
    $code = mb_substr($code, 0, 6);
    return $code;
  }

  function updateSessionFromDB($variable, $table) //Várja, hogy a $_SESSION melyik változóját, melyik táblából
  {
    //Kell, hogy melyik id. A táblák első adata mindíg id tehát már csak a prfix kell
    $prefix=mb_substr(array_keys($_SESSION[$variable])[0], 0, strpos(array_keys($_SESSION[$variable])[0], '_'));
    $rs=getSQL("SELECT * FROM ".$table." WHERE ".$prefix."_id='".array_values($_SESSION[$variable])[0]."'")[0];
    $_SESSION[$variable]=$rs;
  }

  function getNumberOfSelectedUser($userType) //Várja, hogy melyik típusú kijelölt usereket számolja össze. Lehetősgek: tan/okt/vez
  {
    $numberOfSelectedUser=0;
    if (is_array($_SESSION["kijeloltek"])) {
      $keys=array_keys($_SESSION["kijeloltek"]);
      for ($i=0; $i < count($keys); $i++) { 
          if(substr($keys[$i],0,3)==$userType){$numberOfSelectedUser++;}
      }
    }
    return $numberOfSelectedUser;

  }
}

?>