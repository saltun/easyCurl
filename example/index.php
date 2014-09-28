<?php
require_once "easyCurl.php";

	$easyCurl = new easyCurl();

	  /* Referans adresi ? */
	  $easyCurl->referer="http://savascanaltun.com.tr";

	  /* eğer ki adres yönlendiriliyor ise takip edilsin mi ? */
	  $easyCurl->followlocation=false;

	  /* header bilgisi gönderilsin mi ? */
	  $easyCurl->header=false;

	  /* maximum bekleme süresi ? */
	  $easyCurl->timeout=5;

	  /* ssl ? */
	  $easyCurl->ssl_verifypeer=false;
	  $easyCurl->ssl_verifyhost=false;

	  /* çerezler aktif mi ? */

	  $easyCurl->cookie=false;


	 /* 
	 * Sayfa Kaynak kodlarını alma
	 * SourceCode Fonksiyonuna adresi tanımlayarak kaynak kodlarını alıp değişkene aktara bilirsiniz veya ekrana yansıta bilirsiniz.
	 * Referans adresi vs.. düzenlemek için bu fonksiyondan önce referer gibi değişkenlere değer vermelisiniz.
	 * Proxy kullanmak için 2. bir parametrede proxy adresini belirtmeniz yeterlidir. proxyip:sifre şeklinde göndermelisiniz
	 */

	$source=$easyCurl->SourceCode('http://savascanaltun.com.tr');
	echo $source;



	/*
	* CURL POST İşlemi 
	* post yapılacak formdaki action alanındaki adres
	* ikinci parametrede ise bir dizi gönderip bu diziyi form name ve değerlerine göre göndertiniz.
	* Proxy kullanmak için 3. bir parametrede proxy adresini belirtmeniz yeterlidir. proxyip:sifre şeklinde göndermelisiniz
	*/

	$postData=array(
		'baslik'=>'easyCurl Class test',
        'mesaj'=>'Merhaba ben savaş can altun bu bizim ilk testimiz.'
	);

	$post=$easyCurl->curlPost('http://savascanaltun.com.tr/app/php/test/post.php',$postData);

	echo $post;







?>