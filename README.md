# Sai-CCM Laravel Project

- More Sources Branch - day18

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Environment Variables](#environment-variables)
- [Database Migration & Seeding](#database-migration--seeding)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## About the Project

Sai-CCM is a Laravel-based project designed to provide a robust content and customer management system. The project follows modern development practices and is structured for scalability and maintainability.This project is one of the project that developed while I am learning Laravel with [Creative Coder Myanmar](https://creativecodermm.com/) Zoom Class Batch-7.

## Features

- Authentication (Login, Register, Forgot Password)
- User Role Management
- CRUD Operations for Customers & Content
- API Endpoints for External Integrations
- Secure Authorization with Middleware
- Database Migrations and Seeding
- Eloquent Relationship
- RESTful API Design
- Automatic sending Email with Q-work
- Live Chat (Chat Box)
- Language Translation ( Eng - MM )

## Technologies Used

- **Backend:** Laravel 10, PHP 8.x
- **Frontend:** Blade Templates, TailwindCSS
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **Others:** Composer, tawk.to (for Live Chat)

## Installation

### Prerequisites

Make sure you have the following installed:

- PHP 8.x
- Composer
- Laravel CLI
- MySQL
- Node.js & npm (if using frontend assets)

### Steps

#### Clone the repository:
```sh
git clone -b day-18 https://github.com/SaiAungWann/Sai-CCM-Laravel-project.git
cd Sai-CCM-Laravel-project
```

#### Install dependencies:
```sh
composer install
```

#### Copy and configure environment variables:
```sh
cp .env.example .env
```
Update the `.env` file with database credentials and other configurations.

#### Generate application key:
```sh
php artisan key:generate
```

#### Run database migrations:
```sh
php artisan migrate --seed
```

#### Start the Laravel development server:
```sh
php artisan serve
```

The project should now be accessible at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Usage

Visit [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) to access the system.

Default admin credentials (if seeded):
- **Email:** aungwannbim2022@gmail.com
- **Password:** password

## Environment Variables

Modify the `.env` file as needed:
```env
APP_NAME=SaiCCM
APP_ENV=local
APP_KEY=your_generated_key
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sai_ccm
DB_USERNAME=root
DB_PASSWORD=
```

## Database Migration & Seeding

To migrate and seed the database:
```sh
php artisan migrate --seed
```

## Testing

Run PHPUnit tests:
```sh
php artisan test
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is open-source and available under the MIT License.

## Contact

- **Author:** Sai Aung Wann  
- **GitHub:** [SaiAungWann](https://github.com/SaiAungWann)  
- **Email:** aungwannbim2022@gmail.com
