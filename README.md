# About

This project is written for testing.

# How to install 

Enpointler için Music.json postman'e aktarınız.

<p>
Eğer login sırasında try non-object hatası alırsan.
<pre>php artisan passport:client --personal</pre>
</p>
<br>
<br>
<br>
<p>Step 1:<pre>composer update --no-plugins --no-scripts </pre></p>

after database connection
<p>Step 2:<pre>php artisan migrate </pre> </p>

<p>Step 3:<pre>php artisan passport:install</pre></p>


<p>Step 4:<pre>php artisan db:seed</pre></p>
step 3 not( mail: admin@admin.com, password:123)


 #Docker INSTALL
 <p>
 Aşağıdaki adımlar docker kurulumu içindir. öncellikle veri tabanı bağlantısını aşağıdaki biçimde tanımlayınız.
 <pre>
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=music
 DB_USERNAME=root
 DB_PASSWORD=root
 </pre>
</p>

<p>
Step:1 
composer dizinine geçiş yapırouz
<pre>
cd music && composer update --no-plugins --no-scripts 
</pre>

Step 2:

<pre>docker pull hitalos/laravel && docker-compose up -d && docker exec music-php php artisan migrate && php artisan passport:client --personal
 && php artisan db:seed</pre>
 
 
 Favoriler -> Favori List
 Kitaplık  -> Library List
 Kitaplık Detayı -> Library Show 
 Favori Ekleme -> Add Favor  -> action alıyor
Favoriden Çıkarma -> Add Favor -> action alıyor