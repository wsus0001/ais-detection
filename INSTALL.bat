@echo off
call composer update
call composer install
call npm install
copy .env.example .env
call php artisan key:generate
call php artisan migrate:reset
call php artisan migrate

rem Python dependencies
call python -m pip install pillow
call python -m pip install keras
call python -m pip install tensorflow
call python -m pip install matplotlib
call python -m pip install mysql
call python -m pip install mysql-connector
call python -m pip install opencv-python
call python -m pip install numpy
call python -m pip install pathlib

rem no sed command for Windows, instruct user to do it manually
echo "Installed! Please go to ./app/Http/Controllers/ImageUploadController.php and replace all instances of 'python3' with 'python' for the app to run."
