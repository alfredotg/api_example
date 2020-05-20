<?php

$ctl = RestRouter::resolve($uri, $method, $_GET, $_POST);
if($ctl == null)
  return RESTResponse(null, 404);  
$resp = $ctl->run();
if($resp !== null)
  RESTResponse($resp);

