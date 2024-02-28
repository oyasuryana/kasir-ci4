# kasir-ci4
Aplikasi ini merupakan contoh project uji kompetensi program keahlian Rekayasa Perangkat Lunak tahun 2023/2024.

# Download dan Instalasi
1. Jalankan CMD / Terminal
2. Masuk ke drive D: atau yang lain jika di linux silahkan masuk direktori mana saja
3. Jalankan perintah : 
    <code>
    git clone https://github.com/oyasuryana/kasir-ci4.git
    </code>
4. Lakukan update dengan perintah 
   composer update
5. Ganti file env menjadi .env
6. Seting :
    
    <code>CI_ENVIRONMENT = development atau production</code>
   
    <code>app.baseURL = 'http://localhost:8080'</code>

    
    <code>database.default.hostname = localhost
    database.default.database = ukkPOS2
    database.default.username = root
    database.default.password = 
    database.default.DBDriver = MySQLi
    </code>
# Menjalankan aplikasi
1. Buka terminal
2. Jalankan perintah
   php spark serve
3. Buka browser, akeses URL
   http://localhost:8080    

# Default User
Berikut user dan password default

| Username      | Password      | Lever |
| ------------- |-------------  | ----- |
| admin         | 123           | admin |
| kasir         | 123           | kasir |

# Kebutuhan Minimal Server
PHP versi 7.4 atau lebih tinggi ,dengan mengaktifkan  library:

- intl
- mbstring

# Screenshoot
<img width="920" alt="dashboard_ukkpos" src="https://github.com/oyasuryana/kasir-ci4/assets/40240886/8a0f7102-a264-4198-9f01-be979049ab95">
