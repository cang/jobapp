# JobApp
JobApp is a simple job search app for job seekers and recruiters to meet with Laravel and Livewire

## Introduction - the project's aim
The main purpose of this app is to learn and quickly learn about full stack Laravel developer and I also have to make request "Create 2 3 pages with PHP, Laravel and MySQL"

## Technologies
- Laravel 9.35.1
- Livewire 2.10.7
- MYSQL
- Bootstrap v4.1.3
- PHP 8.1.6

## How to use

- clone this repo

```
    git clone git@github.com:cang/jobapp.git
```

- go to the project directory

```
    cd jobapp
```

- install jobapp

```
    composer install
```
- copy the environment file .env.example , rename to .env and set MySql information for database name and account
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jobapp
DB_USERNAME=root
DB_PASSWORD=
```

- run project

```
    php artisan serve
```

- Recruiters will using link http://localhost:8000/admin in order to create new companies, jobs
- Job Seeker will using link http://localhost:8000 to find jobs

## Screenshoot


### For Recruiters

- Create Company
<img src="https://i.ibb.co/Y32GqhW/company.png" alt="company" border="0" />
<img src="https://i.ibb.co/wWvvJ8f/company-cu.png" alt="company-cu" border="0" />

- Create Job
<img src="https://i.ibb.co/KsMhtyS/job.png" alt="job" border="0" />
<img src="https://i.ibb.co/G7gCXKy/job-cu.png" alt="job-cu" border="0" />

### For job Seekers


- Find and view Jobs 
<img src="https://i.ibb.co/pfm0pW4/jobs.png" alt="jobs" border="0" />
<img src="https://i.ibb.co/vH5xPjQ/job-detail.png" alt="job-detail" border="0" />

## License
None