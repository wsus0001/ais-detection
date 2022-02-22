composer update
composer install
npm install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate:reset
php artisan migrate

# Python dependencies
python -m pip install pillow
python -m pip install keras
python -m pip install tensorflow
python -m pip install matplotlib
python -m pip install mysql
python -m pip install mysql-connector
python -m pip install opencv-python
python -m pip install numpy
python -m pip install pathlib

# no sed command for Windows, instruct user to do it manually
Write-Output "Installed! Please go to ./app/Http/Controllers/ImageUploadController.php and replace all instances of 'python3' with 'python' for the app to run."
