
# HERMIS
### Household Evacuation and Risk Management Information System

A web-based system designed to support household management, evacuation monitoring, and evacuation route management in **Barangay Anoling, Camalig, Albay, Philippines**.

HERMIS aims to help organize household information, support evacuation-related activities, and provide a centralized platform for monitoring and managing evacuation operations within the community.

---

## Project Overview

The Household Evacuation and Risk Management Information System (HERMIS) is a web-based application developed to assist in managing household records and evacuation-related information.

The system provides a centralized platform for recording household information, monitoring evacuation activities, and managing evacuation routes. It aims to improve the organization, accessibility, and management of community evacuation data.

HERMIS is developed using the Laravel framework and is designed to support both local development and online deployment.

## Key Features

- **Household Management** – Manage and organize household records and related information.
- **Evacuation Management** – Support the management of evacuation-related information and activities.
- **Evacuation Monitoring** – Provide access to information needed to monitor evacuation operations.
- **Route Management** – Support the management and presentation of evacuation routes.
- **Dashboard** – Provide a centralized view of relevant system information.
- **User Authentication** – Provide secure login and access to the system.

## Technologies Used

| Technology | Purpose |
|---|---|
| PHP | Server-side programming language |
| Laravel 12 | Web application framework |
| JavaScript | Client-side functionality |
| HTML5 | Web page structure |
| CSS3 | Styling and layout |
| Tailwind CSS | Utility-first CSS framework |
| Alpine.js | Lightweight JavaScript interactions |
| Vite | Frontend asset development and bundling |
| SQLite | Local development database |
| PostgreSQL | Online production database |
| Composer | PHP dependency management |
| Node.js and npm | JavaScript dependency management |
| Git and GitHub | Version control and source code management |
| Visual Studio Code | Development environment |
| XAMPP | Local development environment |

## System Requirements

Before installing and running HERMIS locally, make sure the following are available:

- PHP 8.2 or later
- Composer
- Node.js and npm
- Git
- Visual Studio Code or another code editor
- XAMPP (for local development)

## Installation and Setup

Follow these steps to set up HERMIS on your local computer.

### 1. Clone the Repository

```bash
git clone https://github.com/jaycedino16/hermis-system.git
```

### 2. Navigate to the Project Directory

```bash
cd hermis-system
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install JavaScript Dependencies

```bash
npm install
```

### 5. Create the Environment File

Copy the example environment file:

```bash
copy .env.example .env
```

For Windows PowerShell, you may also use:

```powershell
Copy-Item .env.example .env
```

### 6. Generate the Application Key

```bash
php artisan key:generate
```

### 7. Configure the Database

For local development, HERMIS uses SQLite.

Make sure the SQLite database file exists at:

```text
database/database.sqlite
```

If the file does not exist, create an empty file with that name.

In your `.env` file, configure the database connection:

```env
DB_CONNECTION=sqlite
```

### 8. Run Database Migrations

```bash
php artisan migrate
```

### 9. Build Frontend Assets

```bash
npm run build
```

### 10. Start the Local Development Server

```bash
php artisan serve
```

Open your browser and visit:

```text
http://127.0.0.1:8000
```

HERMIS should now be accessible through your local development environment.

## Database Information

HERMIS uses different database configurations for local development and online deployment.

| Environment | Database |
|---|---|
| Local Development | SQLite |
| Online Deployment | PostgreSQL |

**Note:** The local SQLite database and the online PostgreSQL database are separate databases. Changes made to one database do not automatically synchronize with the other.

## Deployment

HERMIS is deployed online using EthioDeploy.

**Live Website:**  
https://hermis.ethiodeploy.app

The online deployment uses PostgreSQL as its production database.

## Project Repository

**GitHub Repository:**  
https://github.com/jaycedino16/hermis-system

## Development Team

The following students contributed to the development of HERMIS:

1. **Jay Louise B. Cediño**
2. **Kc San Buenaventura**
3. **Angela Mae Bandoquillo**
4. **Dincel Montales**

## Project Purpose

HERMIS was developed as an information system project focused on improving the management of household information, evacuation monitoring, and evacuation route management in Barangay Anoling, Camalig, Albay.

Through the use of web-based technology, the project aims to support better organization and accessibility of evacuation-related information for the community.

## License

This project is developed for academic purposes. The Laravel framework used in this project is open-source software licensed under the [MIT License](https://opensource.org/licenses/MIT).
