<?php
/*
* Author : Savaş Can Altun
* Web : http://savascanaltun.com.tr
* Mail : savascanaltun@gmail.com
* GİT : http://github.com/saltun
* Date : 22.06.2014
* Update : 27.08.2014
*/

cLass easyCurl{


  public $referer="http://google.com";
  public $followlocation=false;
  public $header=false;
  public $timeout=5;
  public $ssl_verifypeer=false;
  public $ssl_verifyhost=false;
  public $cookie=false;

  public function __construct(){
        if (!extension_loaded('curl')) {
          die('plase CURL İnstall');
        }
   }



  public function SourceCode($url,$proxy=NULL){
        $user = getenv('USER_AGENT');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, $user);
        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, $this->followlocation);
        curl_setopt($curl, CURLOPT_REFERER, $this->referer);
         if ($proxy) {
          $proxy=explode(':', $proxy);
          curl_setopt( $ch , CURLOPT_PROXY , $proxy[0]);
          curl_setopt( $ch , CURLOPT_PROXYPORT , $proxy[1] );
        }
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, $this->header);
        $data = curl_exec($curl);
        curl_close($curl);

        if($data) return $data; else return false;
  }

  public function curlPost($action=NULL,$content=NULL,$proxy=NULL){

    /* boşmu değil mi diye kontrol ettiriyoruz */
   if (empty($action)) {
      return "Hata : action Adresi boş";
    }else if(empty($content)){
      return "Hata : Post verileri yok";
    }

       $data=null;
            if (isset($content)) {
              $count=count($content);
              $keys=array_keys($content);
              $values=array_values($content);
                  for ($i=0; $i < $count; $i++) { 

                      if ($i>0) {
                        $data=$data.$keys[$i]."=".$values[$i];
                      }else{
                         
                          $data=$data.$keys[$i]."=".$values[$i]."&";
                      }

                  }

               
          }

       $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_HEADER,$this->header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_COOKIESESSION,$this->cookie);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,$this->ssl_verifypeer);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,$this->ssl_verifyhost);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,$this->followlocation);

         if ($proxy) {
          $proxy=explode(':', $proxy);
          curl_setopt( $ch , CURLOPT_PROXY , $proxy[0]);
          curl_setopt( $ch , CURLOPT_PROXYPORT , $proxy[1] );
        }

        curl_setopt($ch, CURLOPT_REFERER, $this->referer);
        curl_setopt($ch, CURLOPT_URL, $action);
        curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);



 
        $exec = curl_exec($ch);
        return $exec;
 

       


  }

}


?>