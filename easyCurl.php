<?php
/**
* @author Savaş Can Altun <savascanaltun@gmail.com>
* @link http://savascanaltun.com.tr
* @link http://github.com/saltun
* @since 27.08.2014
* @version 1.5
*/

cLass easyCurl{

  /**
  * @var string
  */
  public  $referer="http://google.com";

  /**
  * @var bool|boolean
  */
  public  $followlocation=false;

  /**
  * @var bool|boolean
  */
  public  $header=false;

  /**
  * @var int
  */
  public  $timeout=5;

  /**
  * @var bool|boolean
  */
  public  $ssl_verifypeer=false;

  /**
  * @var bool|boolean
  */
  public  $ssl_verifyhost=false;

  /**
  * @var bool|boolean
  */
  public  $cookie=false;

  /**
  * @var string
  */
  public  $error;

  /**
  * @var int
  */
  public  $errorNumber;

  /**
  * @var bool|boolean
  */
  public  $speed="None";

  /**
  * @var string
  */
  private $curl;

  /**
    Run Class and check curl extension. 
  */
  public function __construct(){
        if (!extension_loaded('curl')) {
          die('CURL extension not found!');
        }
   }

  /**
  * CURL Base
  * @param string
  * @param string
  * @return null
  */
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


  /**
  * Get Page source code
  * @param string 
  * @param null|string
  * @return string
  */
  public function sourceCode($url,$proxy=NULL){
     $this->init($url, $proxy); 
         $exec = curl_exec($this->curl);
        return $exec;     
  }

  /**
  * Curl page post
  * @param null|string
  * @param null|string
  * @param null|string
  * @return string
  *
  */

  public function curlPost($url=NULL,$content=NULL,$proxy=NULL){

        /**
        * Check $url varible 
        */
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

  /**
  * End Class and Curl close 
  */
  public function __destruct(){
    curl_close($this->curl);
  }
}

?>
