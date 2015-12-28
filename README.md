# Question Answer

Aplikasi sistem Tanya Jawab (Question Answer) kurang lebih seperti Stackoverflow atau sejenisnya, dibangun dengan:

- CodeIgniter versi 3
- UI
    - Metro UI CSS
    - Twitter Bootstrap

### Structure Database
[Lihat skema Basis Data disini](schema.md)

### Install
- Download:
    - Bisa menggunakan download arsip via `zip` atau tarball.
    - Bisa menggunakan `git` dengan perintah `git clone`.
- Perbarui konfigurasi dibawah ini:
    - Salin file
    `app/config/development/config.php.origin` menjadi `app/config/development/config.php`
    - Salin file
    `app/config/development/database.php.origin` menjadi `app/config/development/database.php`
    - Salin file
    `app/config/qa.php.origin` to `app/config/qa.php`.
    - Atau anda cukup me-rename file tersebut.
    - Perbarui isi dari ketiga file diatas sesuaikan keinginan anda.
- Buat Basis Data, sebagai contoh `qa` atau `QuestionAnswer`. Saya anggap anda sudah mengerti cara membuat basis data pada database server
- Install schema Basis Data [http://localhost/migrate/install](http://localhost/migrate/install) atau lain sebagainya sesuaikan dengan virtualhost masing-masing.

### License
[![MIT License](https://img.shields.io/dub/l/vibe-d.svg)](LICENSE)