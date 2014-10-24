EasyCurl Sınıfı - easyCurl Class PHP 
====================

easyCurl sınıfı sayesinde basit curl işlemleriniz çok az kod bilgisi ile yapabilirsiniz.

Alttaki örnek ile bir siteye proxy ile bağlanma veri çekme ve bir sitedeki veriyi post etme gibi örneklere ulaşabilirsiniz.

Geliştirilmesinde sizde katkı sağlar iseniz çok memnun oluruz.


Not !!
---------------------
Eğer sınıf ile beraber proxy kullanmak isterseniz kullanmak istediğiniz proxy adresini belirtirken proxyadresi:port şeklinde belirtiniz. Yani proxyadresi ikinokta ( : ) ardından ise port numarası.

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
	 * SourceCode Fonksiyonuna adresi tanımlayarak kaynak kodlarını alıp değişkene aktarabilirsiniz veya ekrana yansıtabilirsiniz.
	 * Referans adresi vs.. düzenlemek için bu fonksiyondan önce referer gibi değişkenlere değer vermelisiniz.
	 * Proxy kullanmak için 2. bir parametrede proxy adresini belirtmeniz yeterlidir. proxyip:sifre şeklinde göndermelisiniz
	 */

	$source=$easyCurl->SourceCode('http://savascanaltun.com.tr');
```

Proxy Kullanılmış örnek
---------------------
``` php
	$source=$easyCurl->SourceCode('http://savascanaltun.com.tr','122.323.32.22:8082');
```

Bir adresteki formu post ettirmek
---------------------
Birinci parametrede post edilecek sayfa yanı formun action kısmını veriniz 2. parametrede ise bir dizi gönderip burada name ve değerlerini belirtiniz. Alttaki örnekteki formda baslik ve mesaj alanları mevcuttu ona göre yapıldı. Eğer sizde misal username ve password alanları var ise ona göre ayarlamanız gerekmektedir.

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

Hatalara ulaşma
---------------------
Hata sayısına ulaşma ;
``` php
 $easyCurl->errorNumber;
```
Hataya ulaşma ;
``` php
 $easyCurl->error;
```


Hız bilgisini edinme
---------------------
``` php
 $easyCurl->speed;
```



Author : [Savas Can ALTUN](http://savascanaltun.com.tr/)
Mail : savascanaltun@gmail.com
Web : http://savascanaltun.com.tr


