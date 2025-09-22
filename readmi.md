## Sistem Autentikasi Pengguna PHP Sederhana

### Apa yang penting untuk saya selalu ingat?
- Password Hashing: Password pengguna tidak pernah disimpan sebagai teks biasa. Fungsi password_hash() digunakan saat registrasi dan password_verify() saat login untuk melindungi kredensial pengguna.

- Pencegahan SQL Injection: Semua query database yang melibatkan input dari pengguna dieksekusi menggunakan Prepared Statements (prepare, bind_param, execute) untuk mencegah serangan SQL Injection.


#### Ya walaupun sudah ada Framework yang sudah memadai dan sudah diatur oleh mereka saya rasa kita tetap perlu memahami code dan bagaimana program kita itu bekerja