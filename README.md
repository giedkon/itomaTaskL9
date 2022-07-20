<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Task Information

Sukurti Rest API, kuris grąžintų automobilių sąrašą su visa aktualia informacija.

## Database Model

![image](https://user-images.githubusercontent.com/24762876/179928054-0ec4acd3-8b28-4995-9c14-771b7364dcd5.png)

---

**Reikalavimai:**
- Pilnai išpildyti pateiktą duomenų modelį;
- Duomenų bazės kūrimui naudoti migracijas;
- Naudoti relations tarp modelių;
- Vartotojo sukūrimui ir testiniams duomenis naudoti &quot;seeds&quot;;
- Puslapiuoti įrašus po 30.

---

### Migrations

- [Car Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_130930_create_cars_table.php)
- [Status Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_131441_create_statuses_table.php)
- [Departments Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_132050_create_departments_table.php)
- [Users Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_132111_create_users_table.php)
- [Car Management Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_132146_create_car_management_table.php)
- [Car Status Migration](https://github.com/giedkon/itomaTaskL9/blob/master/database/migrations/2022_07_19_132646_create_car_status_table.php)

---

### Models

- [Car Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/Car.php)
- [Status Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/Status.php)
- [Department Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/Department.php)
- [User Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/User.php)
- [Car Management Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/CarManagement.php)
- [Car Status Model](https://github.com/giedkon/itomaTaskL9/blob/master/app/Models/Itoma/CarStatus.php)

---

### Seeders

- [Seeder folder](https://github.com/giedkon/itomaTaskL9/tree/master/database/seeders)

### Factories

- [Factory folder](https://github.com/giedkon/itomaTaskL9/tree/master/database/factories/Itoma)

**The database can be populated with**
```php
php artisan migrate --seed
```

---

### Controllers

- [CarDataController](https://github.com/giedkon/itomaTaskL9/blob/master/app/Http/Controllers/Itoma/CarDataController.php) | Main API Controller

### Resources

- [Resource folder](https://github.com/giedkon/itomaTaskL9/tree/master/app/Http/Resources)
- [jsonCarsResourceCollection](https://github.com/giedkon/itomaTaskL9/blob/master/app/Http/Resources/Itoma/jsonCarsResourceCollection.php) | Car collection resource
- [jsonCarsResource](https://github.com/giedkon/itomaTaskL9/blob/master/app/Http/Resources/Itoma/jsonCarsResource.php) | Single car resource

---

**Poreikis:**
- Grąžinti visų automobilių sąrašą JSON formatu.
- Pridėti datos filtrą gauti tai dienai aktualius duomenis – pagal nutylėjimą grąžiname
šiandienos duomenis.
- Aktuali informacija:
    - cars.number;
    - cars.year_made;
    - cars.model;
- Dabartinis automobilio valdytojas iš cars_management. Atitinkamai grąžinamas
departments.name arba users.name priklausomai nuo to, kam automobilis nurodytą
dieną priklauso;
- Dabartinė automobilio būsena iš cars_status;
- Ankstesnis automobilio valdytojas;
- Automobilio kaina cars.price turi būti paslėpta ir užklausos rezultatuose neatsispindėti;

## Example JSON Output with date & page provided

```javacsript
/api/jsonCars?date=2022-07-05&page=2
```

```javascript
{
	"data": [
		{
			"cars": {
				"number": "Itaque at rerum.",
				"year_made": "2006",
				"model": "In sequi magni eum non illo rerum."
			},
			"users": {
				"name": "Mr. Jeromy Turcotte Jr."
			},
			"car_status": "Ducimus placeat ut.",
			"previous_users": {
				"name": "Dr. Malcolm Hirthe I"
			}
		},
		{
			"cars": {
				"number": "Nam voluptatem eum.",
				"year_made": "2020",
				"model": "Delectus aperiam molestiae officia laborum."
			},
			"departments": {
				"name": "Distinctio et."
			},
			"car_status": "Omnis voluptatem.",
			"previous_departments": {
				"name": "Ea beatae suscipit."
			}
		},
		{
			"cars": {
				"number": "Voluptates.",
				"year_made": "2002",
				"model": "Perspiciatis eum fugit rerum."
			},
			"users": {
				"name": "Arnulfo Kuphal"
			},
			"car_status": "Voluptatem fuga.",
			"previous_departments": {
				"name": "Dicta et sed."
			}
		},
		{
			"cars": {
				"number": "Velit distinctio ad.",
				"year_made": "1983",
				"model": "Debitis vero repellat non accusamus illum."
			},
			"users": {
				"name": "Demetris Schmidt"
			},
			"car_status": "Molestias totam.",
			"previous_users": {
				"name": "Dr. Kennedy Macejkovic"
			}
		},
		{
			"cars": {
				"number": "Aliquam quia et.",
				"year_made": "1977",
				"model": "Hic et fugit vel fugiat."
			},
			"departments": {
				"name": "Dicta et sed."
			},
			"car_status": "Nihil doloremque.",
			"previous_users": {
				"name": "Erick Adams"
			}
		},
		{
			"cars": {
				"number": "Dolorem veritatis.",
				"year_made": "1990",
				"model": "At iusto at ut qui."
			},
			"departments": {
				"name": "In rem quibusdam."
			},
			"car_status": "Quam porro deleniti.",
			"previous_departments": {
				"name": "Dolores voluptatem."
			}
		},
		{
			"cars": {
				"number": "Voluptatibus ut a.",
				"year_made": "1983",
				"model": "Fugiat ab nulla non reprehenderit et."
			},
			"departments": {
				"name": "Et ab magnam."
			},
			"car_status": "Molestiae tempora.",
			"previous_users": {
				"name": "Scarlett Koch"
			}
		},
		{
			"cars": {
				"number": "Ducimus eum ut ut.",
				"year_made": "1970",
				"model": "Nam voluptas molestias porro nulla id."
			},
			"users": {
				"name": "Shyann Goodwin"
			},
			"car_status": "Voluptatem fuga.",
			"previous_departments": {
				"name": "Excepturi qui."
			}
		},
		{
			"cars": {
				"number": "Praesentium sit.",
				"year_made": "1988",
				"model": "Iure et ut explicabo facere ad accusantium."
			},
			"departments": {
				"name": "Ad distinctio quia."
			},
			"car_status": "Quam porro deleniti.",
			"previous_departments": {
				"name": "Ratione quam ipsam."
			}
		},
		{
			"cars": {
				"number": "Dolore consequatur.",
				"year_made": "1974",
				"model": "Ipsa incidunt saepe eum reprehenderit assumenda."
			},
			"users": {
				"name": "Roderick Pouros"
			},
			"car_status": "Rerum ratione.",
			"previous_departments": {
				"name": "Quis odio earum."
			}
		},
		{
			"cars": {
				"number": "Quasi impedit omnis.",
				"year_made": "2016",
				"model": "Veritatis quaerat quo non minima ea a illum."
			},
			"users": {
				"name": "Ettie Abernathy"
			},
			"car_status": "Omnis rerum tempore.",
			"previous_users": {
				"name": "Bernadette Hickle"
			}
		},
		{
			"cars": {
				"number": "In quaerat alias.",
				"year_made": "1977",
				"model": "Repellat culpa et rerum quod illum magnam et."
			},
			"users": {
				"name": "Julio Kunze"
			},
			"car_status": "Voluptatem fuga.",
			"previous_departments": {
				"name": "Voluptatem et."
			}
		},
		{
			"cars": {
				"number": "Aut exercitationem.",
				"year_made": "2003",
				"model": "Sit vero sint harum quia."
			},
			"departments": {
				"name": "Et ab magnam."
			},
			"car_status": "Ducimus placeat ut.",
			"previous_departments": {
				"name": "Alias veniam ut."
			}
		},
		{
			"cars": {
				"number": "Quis vel sit quasi.",
				"year_made": "2003",
				"model": "Ut soluta vero culpa ab quasi odio."
			},
			"departments": {
				"name": "Quis odio earum."
			},
			"car_status": "In ex magnam id.",
			"previous_departments": {
				"name": "Quis odio earum."
			}
		},
		{
			"cars": {
				"number": "Itaque voluptatibus.",
				"year_made": "2006",
				"model": "Vel asperiores sed commodi laborum."
			},
			"users": {
				"name": "Tia Ritchie"
			},
			"car_status": "Rem et illo quasi.",
			"previous_departments": {
				"name": "Dolor optio dolores."
			}
		},
		{
			"cars": {
				"number": "Optio aut ut.",
				"year_made": "1998",
				"model": "Ducimus ea ea a."
			},
			"departments": {
				"name": "Aspernatur autem."
			},
			"car_status": "Ducimus placeat ut.",
			"previous_departments": {
				"name": "Est quibusdam."
			}
		},
		{
			"cars": {
				"number": "Eius labore et iure.",
				"year_made": "1977",
				"model": "Voluptas quasi sit incidunt sint qui atque."
			},
			"departments": {
				"name": "Aspernatur autem."
			},
			"car_status": "Nihil doloremque.",
			"previous_departments": {
				"name": "Dolores corrupti."
			}
		},
		{
			"cars": {
				"number": "Laboriosam porro.",
				"year_made": "2018",
				"model": "Dolore eaque ut repellendus voluptas culpa."
			},
			"users": {
				"name": "Dr. Alysson Reinger IV"
			},
			"car_status": "Optio maxime nihil.",
			"previous_users": {
				"name": "Marilou Sipes"
			}
		},
		{
			"cars": {
				"number": "Magni possimus ut.",
				"year_made": "1992",
				"model": "Eligendi sint illum alias veritatis sit rerum."
			},
			"departments": {
				"name": "Suscipit neque."
			},
			"car_status": "Rem porro cumque ut.",
			"previous_users": {
				"name": "Mrs. Abbey Greenholt"
			}
		},
		{
			"cars": {
				"number": "Mollitia quis.",
				"year_made": "1970",
				"model": "Excepturi consequuntur in ut ducimus et non qui."
			},
			"departments": {
				"name": "Minus culpa."
			},
			"car_status": "Quam porro deleniti.",
			"previous_users": {
				"name": "Keeley Kovacek"
			}
		},
		{
			"cars": {
				"number": "Saepe alias fuga.",
				"year_made": "2007",
				"model": "Dolor laudantium deserunt voluptatibus."
			},
			"departments": {
				"name": "Iure dignissimos."
			},
			"car_status": "Velit aut modi et.",
			"previous_departments": {
				"name": "Voluptatem et modi."
			}
		},
		{
			"cars": {
				"number": "Atque nulla culpa.",
				"year_made": "2019",
				"model": "Qui rerum voluptas est et iusto quo enim."
			},
			"departments": {
				"name": "Id asperiores qui."
			},
			"car_status": "In ex magnam id.",
			"previous_departments": {
				"name": "Ut eveniet odit et."
			}
		},
		{
			"cars": {
				"number": "Quam non vero non.",
				"year_made": "1982",
				"model": "Quisquam sit cumque suscipit qui iure."
			},
			"users": {
				"name": "Jarrod Bergnaum PhD"
			},
			"car_status": "Nihil doloremque.",
			"previous_departments": {
				"name": "Et fuga qui enim."
			}
		},
		{
			"cars": {
				"number": "Rem et ut veniam.",
				"year_made": "1989",
				"model": "Iste voluptas vel consequatur molestiae modi."
			},
			"users": {
				"name": "Taurean Keebler MD"
			},
			"car_status": "Nisi eligendi.",
			"previous_departments": {
				"name": "Qui non dignissimos."
			}
		},
		{
			"cars": {
				"number": "Minima delectus.",
				"year_made": "1992",
				"model": "Nihil et assumenda aliquid quaerat repellendus."
			},
			"users": {
				"name": "Trace Howe"
			},
			"car_status": "Voluptatem fuga.",
			"previous_departments": {
				"name": "Libero voluptatum."
			}
		},
		{
			"cars": {
				"number": "Velit accusamus id.",
				"year_made": "2007",
				"model": "Atque qui dolore et. Vitae dolor sunt ut."
			},
			"departments": {
				"name": "Quas illo."
			},
			"car_status": "Ducimus placeat ut.",
			"previous_users": {
				"name": "Mrs. Mertie Schulist DVM"
			}
		},
		{
			"cars": {
				"number": "Nesciunt sint velit.",
				"year_made": "2011",
				"model": "Quaerat maxime asperiores molestias cumque sit."
			},
			"departments": {
				"name": "Aspernatur autem."
			},
			"car_status": "Nisi eligendi.",
			"previous_departments": {
				"name": "Quia reprehenderit."
			}
		},
		{
			"cars": {
				"number": "Dolor voluptatem.",
				"year_made": "1979",
				"model": "Ut iure in fugit ipsum porro ut."
			},
			"users": {
				"name": "Charlotte Harber"
			},
			"car_status": "Nisi eligendi.",
			"previous_users": {
				"name": "Sydney Marks"
			}
		},
		{
			"cars": {
				"number": "Reprehenderit.",
				"year_made": "2014",
				"model": "Nam incidunt quia vitae rerum et."
			},
			"departments": {
				"name": "Necessitatibus."
			},
			"car_status": "Ducimus placeat ut.",
			"previous_users": {
				"name": "Prof. Collin Skiles II"
			}
		},
		{
			"cars": {
				"number": "Quod ad veniam sunt.",
				"year_made": "2009",
				"model": "Quibusdam est sequi dicta esse dicta."
			},
			"users": {
				"name": "Dulce Thompson MD"
			},
			"car_status": "Nihil doloremque.",
			"previous_departments": {
				"name": "Distinctio et."
			}
		}
	],
	"links": {
		"first": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=1",
		"last": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=4",
		"prev": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=1",
		"next": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=3"
	},
	"meta": {
		"current_page": 2,
		"from": 31,
		"last_page": 4,
		"links": [
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=1",
				"label": "&laquo; Previous",
				"active": false
			},
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=1",
				"label": "1",
				"active": false
			},
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=2",
				"label": "2",
				"active": true
			},
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=3",
				"label": "3",
				"active": false
			},
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=4",
				"label": "4",
				"active": false
			},
			{
				"url": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars?page=3",
				"label": "Next &raquo;",
				"active": false
			}
		],
		"path": "http:\/\/localhost\/itomaTaskL9\/public\/api\/jsonCars",
		"per_page": 30,
		"to": 60,
		"total": 100
	}
}
```

# Laravel Information

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
