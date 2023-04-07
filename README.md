<h2>Product Catalogue (LARAVEL + VUE JS PROJECT)</h2>
This project is actually a small product catalogue where you can see the products of the site, 
add a new product, edit an existing one or delete a product.

Steps to follow to install this application:
- clone the project https://github.com/tspoeala/fiipractic-product-catalogue
- install xampp and composer on your computer
- rename .env.example to .env and add your correct database credentials
- in the cmd/windows power shell run the following commands from the path of the project:
    - php artisan migrate
    - php artisan db:seed
    - composer install
    - npm install
- start the apache and mysql services from XAMPP Control Panel
- from two different cmd windows get into the path of the project and run:
    - php artisan serve
    - npm run dev
- keep the both windows open and don't close them
- go to the browser and paste the url http://127.0.0.1:8000/
The project should work :)
