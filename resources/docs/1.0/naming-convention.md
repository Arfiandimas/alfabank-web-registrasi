## naming convention migration

naming convention untuk migration
membuat tabel baru 
`create_nama-tabelmu-apa-pake-plurals_table`
contoh: 
users
`php artisan make:migration create_users_table`

menambahkan kolom yang terlupakan 
`add_nama-kolom_to_nama-tabel_table`
contoh :
menambahkan kolom alamat pada tabel user
`php artisan make:migration add_alamat_to_users_table`

menambahkan foreign key pada 
`add_foreign_key_to_nama-tabel_table`

contoh menambahkan foreign key bernama id_user kepada blog tabel
`php artisan make:migration add_foreign_key_to_blogs_table`


## naming convention buat controller 
contoh : 
BlogController, AuthController, UserController
penamaannya disebut dengan `PascalCase`

## naming convention buat model 
contoh : 
User, Blog, ProgramKursus, Admin

inget, penamaannya tunggal bukan jamak

## naming convention nama attribut tabel 
post_body, id, created_at

Primary Key
normalnya bernama id.

Foreign Keys
comment_id, user_id



note: 
`PascalCase`  : LandingPageController
`camelCase`   : digunakan untuk menamai function atau method misal `showInbox()`  
`kebab-case`  : ini-contoh