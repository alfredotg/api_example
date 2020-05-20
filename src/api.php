<?php

class RestAuth extends RestAuthTpl {
  function run(string $username, string $password): AuthRes
  {
    $res = new AuthRes();
    return $res;
  }
}
