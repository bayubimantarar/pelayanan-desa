<!-- [![Build Status](https://img.shields.io/travis/bayubimantarar/suratapp.svg?style=flat-square)](https://travis-ci.org/bayubimantarar/suratapp) -->
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://github.com/bayubimantarar/suratapp/pulls)
<!-- ![GitHub](https://img.shields.io/github/license/bayubimantarar/suratapp.svg?style=flat-square) -->

# Pelayanan Desa
Pelayanan berksa administrasi desa adalah sebuah aplikasi yang bertujuan untuk :
1. Memudahkan pembuatan berkas administrasi untuk masyarakat sekitar

## Installation
1. Clone repository
2. Install dependencies composer

        composer install --no-dev #for production

        composer install #for development

3. Copy file environment

        cp .env.example .env

4. Generate application key

        php artisan key:generate

## Test
Test with phpunit

    ./vendor/bin/phpunit

Test with laravel dusk
    
    php artisan dusk
