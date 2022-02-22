#!/usr/bin/bash


composer update
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:reset
php artisan migrate

# Python dependencies
ver=$(python -c"import sys; print(sys.version_info.major)")
if [ $ver -eq 3 ]; then
    python -m pip install pillow
    python -m pip install keras
    python -m pip install tensorflow
    python -m pip install matplotlib
    python -m pip install mysql
    python -m pip install mysql-connector
    python -m pip install opencv-python
    python -m pip install numpy
    python -m pip install pathlib
    sed "s/python3/python/g" ./app/Http/Controllers/ImageUploadController.php
elif [ $ver -eq 2 ]; then
    python3 -m pip install pillow
    python3 -m pip install keras
    python3 -m pip install tensorflow
    python3 -m pip install matplotlib
    python3 -m pip install mysql
    python3 -m pip install mysql-connector
    python3 -m pip install opencv-python
    python3 -m pip install numpy
    python3 -m pip install pathlib
fi

echo "Installed!"
