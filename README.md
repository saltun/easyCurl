EasyCurl Sınıfı - easyCurl Class PHP 
====================

easyCurl sınıfı sayesinde basit curl işlemleriniz çok az kod bilgisi ile yapa bilirsiniz.

Alttaki örnek ile bir siteye proxy ile bağlanma veri çekme ve bir sitedeki veriyi post etme gibi örneklere ulaşa bilirsiniz.

Geliştirilmesinde sizde katkı sağlar iseniz çok memnun oluruz.


Not !!
---------------------
Eğer sınıf ile beraber proxy kullanmak isterseniz kullanmak proxy adresini belirtirken proxyadresi:port şeklinde belirtiniz yani proxyadresi ikinokta ( : ) ardından ise port numarası.

Sınıfı dahil edip calıştıralım
---------------------
``` php
	require_once "easyCurl.php";

	$easyCurl = new easyCurl();
```
Bir adresten kaynak kodlarını almak
---------------------
``` php
	 /* 
	 * Sayfa Kaynak kodlarını alma
	 * SourceCode Fonksiyonuna adresi tanımlayarak kaynak kodlarını alıp değişkene aktara bilirsiniz veya ekrana yansıta bilirsiniz.
	 * Referans adresi vs.. düzenlemek için bu fonksiyondan önce referer gibi değişkenlere değer vermelisiniz.
	 * Proxy kullanmak için 2. bir parametrede proxy adresini belirtmeniz yeterlidir. proxyip:sifre şeklinde göndermelisiniz
	 */

	$source=$easyCurl->SourceCode('http://savascanaltun.com.tr');
```

Bir adresteki formu post ettirmek
---------------------
``` php
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

```

Sınıf ile kullana bileceğiniz metodlar  
====================

Referans adresi belirtmek isterseniz
---------------------
``` php
$easyCurl->referer="http://savascanaltun.com.tr";
```

Adres yönleniyor ve takip etmek istiyor iseniz
---------------------
``` php
 $easyCurl->followlocation=true;
```

Header bilgisi gönderilsin istiyor iseniz
---------------------
``` php
 $easyCurl->header=true;
```

Bir bağlantının maximum bekleme süresini ayarlamak ( default : 5 ) 
---------------------
``` php
 $easyCurl->timeout=5;
```

Pekiya ssl ? 
---------------------
``` php
 $easyCurl->ssl_verifypeer=true;
 $easyCurl->ssl_verifyhost=true;

```
Çerezleri aktif etmek istiyor iseniz
---------------------
``` php
 $easyCurl->cookie=true;
```


Author : [Savas Can ALTUN](http://savascanaltun.com.tr/)
Mail : savascanaltun@gmail.com
Web : http://savascanaltun.com.tr




