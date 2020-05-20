<?php
/*
NOTE: This class is auto generated
Do not edit the class manually.
*/
RestRouter::registre('/auth', 'post', 'RestAuth'); 

abstract class RestAuthTpl {
  function handle(array $r): AuthRes {
    
      
    if(!isset($r['username']))
      throw new ApiMissParametr('username');
    $username = strval($r['username']);
      
    if(!isset($r['password']))
      throw new ApiMissParametr('password');
    $password = strval($r['password']);
      
    
    return $this->run($username, $password);
  }

  abstract function run(string $username, string $password): AuthRes;
}

RestRouter::registre('/user/me', 'get', 'RestUserMe'); 

abstract class RestUserMeTpl {
  function handle(array $r): UserProfile {
    
    return $this->run();
  }

  abstract function run(): UserProfile;
}

RestRouter::registre('/folder/children', 'get', 'RestFolderChildren'); 

abstract class RestFolderChildrenTpl {
  function handle(array $r): FoldersRes {
    
      
    if(!isset($r['folder_id']))
      throw new ApiMissParametr('folder_id');
    $folder_id = intval($r['folder_id']);
      
    
    return $this->run($folder_id);
  }

  abstract function run(integer $folder_id): FoldersRes;
}


class RestRouter {
  static protected $map = array();

  static function registre($path, $method, $class) 
  {
    $method = strtoupper($method);
    self::$map[$path][$method] = $class;
  } 

  static function resolve($path, $method, $get, $post)
  {
    $method = strtoupper($method);
    if(isset(self::$map[$path][$method]))
    {
      $class = self::$map[$path][$method];
      $data = $method == 'GET' ? $get : $post;
      return new $class($data);
    }
    return null;
  }
}
