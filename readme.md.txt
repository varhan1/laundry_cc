
	Cara mendownload dan instalasi project laravel
	
    ketikan cmd
	pindah direktory xampp/htdocs jika makainya xampp/phpmyadmin
	ketik : cd C://xampp/htdocs
    
    ketik git clone nama reponya
	contoh git clone https://github.com/ahmadPahruroji/blog.git
	tunggu sampai selesai
	kalo sudah pindah direktori yang sudah di clone
	contoh
	cd blog

     lalu lanjut perintah dibawah ini        


    jalankan composer update (didalam project perpus)

    lalu jalankan copy .env.example .env

    setelah itu php artisan key:generate

    jangan lupa buat database (perpusku_gc) di phpmyadmin

    langkah selanjutnya setting database nya di .env

    jalankan php artisan migrate

    jalankan juga php artisan db:seed

    terakhir php artisan serve

    Login admin - username : admin123 - password : admin123

    Login user - username : user123 - password : user123

    selesai deh!
