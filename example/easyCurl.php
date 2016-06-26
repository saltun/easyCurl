<?php
/*
* Author : Savaş Can Altun
* Web : http://savascanaltun.com.tr
* Mail : savascanaltun@gmail.com
* GİT : http://github.com/saltun
* Date : 27.08.2014
* Update : 26.06.2016
*/

cLass easyCurl{


  public  $referer="http://google.com";
  public  $followlocation=false;
  public  $header=false;
  public  $timeout=5;
  public  $ssl_verifypeer=false;
  public  $ssl_verifyhost=false;
  public  $cookie=false;
  public  $error;
  public  $errorNumber;
  public  $speed="None";
  private $curl;

  /* run class and curl  control - sınıf başlangıcı ve curl kontrolü */
  public function __construct(){
        if (!extension_loaded('curl')) {
          die('CURL extension not found!');
        }
   }

  public function init($url,$proxy){
    $this->curl  = curl_init();
    curl_setopt($this->curl, CURLOPT_URL, $url);
    curl_setopt($this->curl, CURLOPT_USERAGENT, getenv('USER_AGENT'));
    curl_setopt($this->curl, CURLOPT_TIMEOUT, $this->timeout);
    curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, $this->followlocation);
    curl_setopt($this->curl, CURLOPT_REFERER, $this->referer);
    if ($proxy){
      $proxy = explode(':', $proxy);
      curl_setopt($this->curl, CURLOPT_PROXY, $proxy[0]);
      curl_setopt($this->curl, CURLOPT_PROXYPORT, $proxy[1] );
    }
    curl_setopt($this->curl, CURLOPT_BINARYTRANSFER, TRUE);
    curl_setopt($this->curl, CURLOPT_HEADER, $this->header);
    $info=curl_getinfo($this->curl);
    $this->speed=$info['speed_download'];
    $this->errorNumber=curl_errno($this->curl);
    $this->error=curl_error($this->curl);


       
  }



  public function sourceCode($url,$proxy=NULL){
     $this->init($url, $proxy); 
         $exec = curl_exec($this->curl);
        return $exec;     
  }

  public function curlPost($url=NULL,$content=NULL,$proxy=NULL){

      /* boşmu değil mi diye kontrol ettiriyoruz */
        if (empty($url)) {
            return "Hata : action Adresi boş";
        } else if(empty($content)) {
            return "Hata : Post verileri yok";
        }

        $this->init($url, $proxy); 
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($content));
 
        $exec = curl_exec($this->curl);
        return $exec;

  }

  /* finish class - sınıf sonu */
  public function __destruct(){
    curl_close($this->curl);
  }
}

?>
