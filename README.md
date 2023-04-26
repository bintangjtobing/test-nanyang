## About Program
Ujian ini diperuntukkan untuk sekolah Nanyang Zhi Hui Modern Indonesian School.
Ada pun program ujiannya seperti berikut:
```
- Daftar No ID, Nama, alamat, nomor telepon, siapa upline nya
- Buat fungsi untuk search nomor id, nama atau nomor telpon untuk menampilkan seluruh datanya, termasuk upline nya dan downline nya
- Setiap member maksimum hanya boleh punya 2 downline saja. Jika ketika input nama, alamat dan nomor uplinenya, dan kemudian diketahui bahwa upline ini telah mempunyai 2 downline, maka akan muncul pilihan member yang belum punya 2 downline. 
```

## Short brief about participant
My name is Bintang, I experienced development and start in the management business experience in 2021 on Boxity startup. I started Boxity because many of my projects use similar programs and I thinking about practical ways, that will not make me develop the application from zero, and I started to design the app, design the flow, design the UI/UX and, the final idea is, I begin to focus develop in ERP section which distributes it with SaaS way to SME needs. Still have progress but it's slow because I do it by myself, I need a tech leader who can help me stay in control of the development process with the vendor, and indeed I need a salesman, who can help me to sell the product to make a GREAT REVENUE for we can fly higher!

Full name: Bintang Cato Jeremia L Tobing
Date of birth: Oct 21, 1998
Years of development skills: 7 years
Years of managing team skills: 5 years
Programming languages that I've mastered: HTML, CSS, PHP, Javascript, SQL, and Ajax
The framework that I've mastered: Laravel, VueJS, Firebase, NodeJS, and Lumen
Supports tools that I've learned: Adobe Photoshop, Adobe Illustrator, and Figma

## How to use this program
I've already make it public, you can see the results in [this link](http://nanyang-test.bintangtobing.com), and if you want to manually install at your computer, you can follow this step:
1. Clone the repository first
   ```sh
   git clone https://github.com/bintangjtobing/test-nanyang
   ```
2. Make sure the ```npm or yarn package``` was installed on your root server.
3. Run the ```composer install && composer update``` to install the npm package of the project.
4. Copy env File to the directory
    ```
    cp .env.example .env
    ```
    and then
    ```
    nano .env
    ``
5. Dont forget to set the .env file,
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1 <- Your site IP
    DB_PORT=3306 <- Dont forget the port of your hosting databases
    DB_DATABASE= (Your database name)
    DB_USERNAME= (Your database username connection)
    DB_PASSWORD= (Your database password if exist)
    
    SET MAILER CONFIG
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io <- Your email host
    MAIL_PORT=2525
    MAIL_USERNAME=de6b1c11b67b43 <- Your mail username / email
    MAIL_PASSWORD=7badd9a3876f36 <- Your mail password
    MAIL_ENCRYPTION=tls
    ```
6. Install composer by running
    ```sh
    composer install
    ```
7. Run the app key, migrate the database and also optimize the artisan
    ```
    php artisan key:generate
    ```
    ```
    php artisan migrate
    ```
    ```
    composer dump-autoload
    ```
    ```
    php artisan db:seed
    ```
    ```
    php artisan optimize:clear
    ```

## End of the section
Thanks for checking :) 
