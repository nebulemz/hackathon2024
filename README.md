# Hackathon 2024 Presents

# RecyCash - Web App that connects sellers and buyers efficiently

![LOGO](/public/images/logo/logo150x300wbg.svg) 

## How to install
1. Open your command prompt and Clone the repository
```bash
$ git clone https://github.com/nebulemz/hackathon2024/ 
```

2. On the project directory input the following commands

- Copy the `.env.example` file and name it `.env`
```bash
$ cp .env.example .env
```

- Install dependencies
```bash
$ composer install
```

- Generate application key
```bash
$ php artisan key:generate
```

- Run the migrations and seed the application
```bash
$ php artisan migrate --seed
```

3. Provide credentials
- On your `.env` file provide a public key for `MAPBOX_PUBLIC_TOKEN` and `MAPBOX_TOKEN`
```env
MAPBOX_PUBLIC_TOKEN=TOKEN_HERE
MAPBOX_TOKEN=TOKEN_HERE
```

4. Run the application (Typically at localhost:8000)
```bash
$ php artisan serve
```

5. Using `vite` bundler, on your command line. 
```bash
$ npm install
```

6. 
- Build the bundler
```bash
$ npm run build
```
