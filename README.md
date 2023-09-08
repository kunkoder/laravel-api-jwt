# :bulb: Autentifikasi JWT Pada Laravel API

Repository ini berisi projek API yang menerapkan Json Web Token (JWT) untuk autentifikasi.

## :package: Prasyarat

Sebelum memulai, pastikan telah terinstall beberapa tools:
* Text editor
* Web browser
* Laravel 8
* MySQL

## :cd: Menginstall Aplikasi

Untuk menginstall aplikasi ini, ikuti langkah berikut:

```bash
# clone this repository
git clone https://github.com/kunkoder/laravel-api-jwt.git

# change working directory
cd laravel-api-jwt
```

>Note: jangan lupa untuk mengatur database sebelum menjalankan aplikasi.

## :trident: Route List
|  Method  |        URI        |
|----------|-------------------|
| post     | /api/signup       |
| post     | /api/signin       |
| get      | /api/getuser      | 
| get      | /api/books        |
| post     | /api/book         |
| get      | /api/book/{book}  | 
| put      | /api/book/{book}  |
| delete   | /api/book/{book}  |
| get      | /api/signout      | 

## :eyes: Preview

**post `/api/signup`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/signup.png)

**post `/api/signin`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/signin.png)

**get `/api/getuser`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/user.png)

**get `/api/books`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/books.png)

**post `/api/book`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/post-book.png)

**get `/api/book/{book}`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/get-book.png)

**put `/api/book/{book}`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/put-book.png)

**delete `/api/book/{book}`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/delete-book.png)

**get `/api/signout`**
![alt text](https://raw.githubusercontent.com/kunkoder/laravel-api-jwt/main/images/signout.png)