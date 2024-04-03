<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('genders')->insert(
            [
                [
                'name' => 'male'
                ],
                [
                'name' => 'female'
                ]
            ]
        );

        DB::table('types')->insert(
          [
              [
                  'name' => 'parent'
              ],
              [
                  'name' => 'student'
              ],
              [
                  'name' => 'teacher'
              ],
              [
                  'name' => 'admin'
              ],
              [
                  'name' => 'owner'
              ]
          ]
        );

        DB::table('parameters')->insert(
            [
                [
                    'key' => 'payment_term',
                    'value' => '10'
                ],
                [
                    'key' => 'reminder_days',
                    'value' => '7'
                ]
            ]
        );

        DB::table('cities')->insert(
            [
                [
                    'zipcode' => '2440',
                    'name' => 'Geel'
                ],
                [
                    'zipcode' => '2200',
                    'name' => 'Herentals'
                ],
                [
                    'zipcode' => '2250',
                    'name' => 'Olen'
                ],
                [
                    'zipcode' => '2260',
                    'name' => 'Westerlo'
                ],
                [
                    'zipcode' => '2460',
                    'name' => 'Kasterlee'
                ],
                [
                    'zipcode' => '2500',
                    'name' => 'Lier'
                ],
                [
                    'zipcode' => '2290',
                    'name' => 'Vorselaar'
                ],
                [
                    'zipcode' => '2480',
                    'name' => 'Dessel'
                ],
                [
                    'zipcode' => '2520',
                    'name' => 'Ranst'
                ],
                [
                    'zipcode' => '2580',
                    'name' => 'Putte'
                ],
                [
                    'zipcode' => '2590',
                    'name' => 'Berlaar'
                ],
                [
                    'zipcode' => '2640',
                    'name' => 'Mortsel'
                ],
                [
                    'zipcode' => '2800',
                    'name' => 'Mechelen'
                ],
                [
                    'zipcode' => '2970',
                    'name' => 'Schilde'
                ],
                [
                    'zipcode' => '3000',
                    'name' => 'Leuven'
                ],
                [
                    'zipcode' => '3200',
                    'name' => 'Aarschot'
                ],
                [
                    'zipcode' => '3500',
                    'name' => 'Hasselt'
                ],
                [
                    'zipcode' => '2300',
                    'name' => 'Turnhout'
                ]


            ]
        );

        DB::table('locations')->insert(
            [
                [
                    'name' => 'Thomas More',
                    'city_id' => 1,
                    'street_name' => 'Kleinhoefstraat',
                    'house_number' => '4',
                    'active' => true
                ],
                [
                    'name' => 'Thomas More',
                    'city_id' => 6,
                    'street_name' => 'Antwerpsestraat',
                    'house_number' => '99',
                    'active' => true
                ],
                [
                    'name' => 'Thomas More',
                    'city_id' => 7,
                    'street_name' => 'Lepelstraat',
                    'house_number' => '2',
                    'active' => false
                ],
                [
                    'name' => 'Thomas More',
                    'city_id' => 13,
                    'street_name' => 'Zandpoortvest',
                    'house_number' => '60',
                    'active' => true
                ],
                [
                    'name' => 'Thomas More',
                    'city_id' => 18,
                    'street_name' => 'Campus Blairon',
                    'house_number' => '800',
                    'active' => false
                ]

            ]
        );

        DB::table('users')->insert(
            [
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 1,
                    'first_name' => 'Wim',
                    'sur_name' => 'Verstrepen',
                    'telephone_number' => '+32426563470',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'wimverstrepen@outlook.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '1990-10-06',
                    'active' => true
                ],
                [
                    'user_id' => 1,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 2,
                    'first_name' => 'Vic',
                    'sur_name' => 'Verstrepen',
                    'telephone_number' => null,
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'vicverstrepen@outlook.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '2011-04-28',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 2,
                    'city_id' => 1,
                    'type_id' => 1,
                    'first_name' => 'Marie',
                    'sur_name' => 'Janssens',
                    'telephone_number' => '+32485624803',
                    'street_name' => 'Industrieweg',
                    'house_number' => '114',
                    'email' => 'marie@janssens.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '1989-11-01',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 3,
                    'type_id' => 3,
                    'first_name' => 'Jan',
                    'sur_name' => 'Willems',
                    'telephone_number' => '+32648922713',
                    'street_name' => 'Dorpsweg',
                    'house_number' => '54',
                    'email' => 'janwillems@telent.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '1995-08-22',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 2,
                    'city_id' => 4,
                    'type_id' => 1,
                    'first_name' => 'Eva',
                    'sur_name' => 'Peeters',
                    'telephone_number' => '+32426563472',
                    'street_name' => 'Kerkstraat',
                    'house_number' => '22',
                    'email' => 'evapeeters@outlook.com',
                    'password' => Hash::make('password123'),
                    'birthdate' => '1992-08-18',
                    'active' => true
                ],
                [
                    'user_id' => 5,
                    'gender_id' => 2,
                    'city_id' => 4,
                    'type_id' => 2,
                    'first_name' => 'Lotte',
                    'sur_name' => 'Martens',
                    'telephone_number' => null,
                    'street_name' => 'Kerkstraat',
                    'house_number' => '22',
                    'email' => 'lottemartens@outlook.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '2010-05-01',
                    'active' => true
                ],
                [
                    'user_id' => 5,
                    'gender_id' => 2,
                    'city_id' => 4,
                    'type_id' => 2,
                    'first_name' => 'Liese',
                    'sur_name' => 'Martens',
                    'telephone_number' => null,
                    'street_name' => 'Kerkstraat',
                    'house_number' => '22',
                    'email' => 'liesemartens@outlook.be',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '2012-12-14',
                    'active' => true
                ],
                [
                    'user_id' => 3,
                    'gender_id' => 1,
                    'city_id' => 1,
                    'type_id' => 2,
                    'first_name' => 'Jef',
                    'sur_name' => 'De Smet',
                    'telephone_number' => null,
                    'street_name' => 'Industrieweg',
                    'house_number' => '114',
                    'email' => 'jefdesmet@gmail.com',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '2013-08-26',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 8,
                    'type_id' => 3,
                    'first_name' => 'Lars',
                    'sur_name' => 'Maes',
                    'telephone_number' => '+32422763499',
                    'street_name' => 'Stationsstraat',
                    'house_number' => '214',
                    'email' => 'larsMaes@gmail.com',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '1996-11-01',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 15,
                    'type_id' => 3,
                    'first_name' => 'Jill',
                    'sur_name' => 'Vermeulen',
                    'telephone_number' => '+32446821347',
                    'street_name' => 'Lindestraat',
                    'house_number' => '84',
                    'email' => 'jillvermeulen@outlook.com',
                    'password' => Hash::make('test1234'),
                    'birthdate' => '1990-02-13',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 1,
                    'first_name' => 'parent',
                    'sur_name' => 'parent',
                    'telephone_number' => '+32426563470',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'parent@parent.com',
                    'password' => Hash::make('parent123'),
                    'birthdate' => '1990-10-06',
                    'active' => true
                ],
                [
                    'user_id' => 11,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 4,
                    'first_name' => 'student',
                    'sur_name' => 'student',
                    'telephone_number' => null,
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'student@student.com',
                    'password' => Hash::make('student123'),
                    'birthdate' => '2005-10-06',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 3,
                    'type_id' => 3,
                    'first_name' => 'teacher',
                    'sur_name' => 'teacher',
                    'telephone_number' => '+32426563470',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'teacher@teacher.com',
                    'password' => Hash::make('teacher123'),
                    'birthdate' => '1990-10-06',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 4,
                    'first_name' => 'admin',
                    'sur_name' => 'admin',
                    'telephone_number' => '+32426563470',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('admin123'),
                    'birthdate' => '1990-10-06',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 2,
                    'type_id' => 5,
                    'first_name' => 'owner',
                    'sur_name' => 'owner',
                    'telephone_number' => '+32426563470',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '5',
                    'email' => 'owner@owner.com',
                    'password' => Hash::make('owner123'),
                    'birthdate' => '1990-10-06',
                    'active' => true
                ],
                [
                    'user_id' => null,
                    'gender_id' => 1,
                    'city_id' => 1,
                    'type_id' => 5,
                    'first_name' => 'Brent',
                    'sur_name' => 'Pulmans',
                    'telephone_number' => '+32446337866',
                    'street_name' => 'Schoolstraat',
                    'house_number' => '15',
                    'email' => 'owner@krak.be',
                    'password' => Hash::make('owner123'),
                    'birthdate' => '1997-03-16',
                    'active' => true
                ]
            ]
        );

        DB::table('remarks')->insert(
            [
                [
                    'child_id' => 2,
                    'remarker_id' => 1,
                    'note' => 'Vic kan niet aanwezig zijn in de les wegens ziekte.',
                    'date' => '2024-02-24'
                ],
                [
                    'child_id' => 6,
                    'remarker_id' => 5,
                    'note' => 'Lotte gaat volgende les iets later zijn.',
                    'date' => '2024-03-14'
                ],
                [
                    'child_id' => 7,
                    'remarker_id' => 5,
                    'note' => 'Liese gaat volgende les iets later zijn.',
                    'date' => '2024-03-14'
                ],
                [
                    'child_id' => 8,
                    'remarker_id' => 9,
                    'note' => 'Jef wou niet opletten tijdens de les',
                    'date' => '2024-03-16'
                ]
            ]
        );

        DB::table('target_audiences')->insert(
            [
                [
                    'name' => '10-12 jarige'
                ],
                [
                    'name' => '13-15 jarige'
                ],
                [
                    'name' => '16-18 jarige'
                ]
            ]
        );

        DB::table('courses')->insert(
            [
                [
                    'location_id' => 1,
                    'name' => 'Python',
                    'date' => '2023-12-01',
                    'description' => 'In deze les leren we de basisprincipes van Python.',
                    'max_number' => 20
                ],
                [
                    'location_id' => 2,
                    'name' => 'C#',
                    'date' => '2024-03-15',
                    'description' => 'In deze les leren we de basisprincipes van C#.',
                    'max_number' => 20
                ],
                [
                    'location_id' => 4,
                    'name' => 'Java',
                    'date' => '2024-04-22',
                    'description' => 'In deze les leren we de basisprincipes van Java.',
                    'max_number' => 20
                ],
                [
                    'location_id' => 1,
                    'name' => 'Python advanced',
                    'date' => '2024-04-08',
                    'description' => 'In deze les leren we geavanceerde principes van Python.',
                    'max_number' => 20
                ],
                [
                    'location_id' => 2,
                    'name' => 'C# advanced',
                    'date' => '2024-06-12',
                    'description' => 'In deze les leren we geavanceerde principes van C#.',
                    'max_number' => 20
                ],
                [
                    'location_id' => 4,
                    'name' => 'Java advanced',
                    'date' => '2024-08-05',
                    'description' => 'In deze les leren we geavanceerde principes van Java.',
                    'max_number' => 20
                ]


            ]

        );

        DB::table('prices')->insert(
            [
                [
                    'course_id' => 1,
                    'price' => 180,
                    'valid_from' => '2023-01-01'
                ],
                [
                    'course_id' => 2,
                    'price' => 180,
                    'valid_from' => '2023-01-01'
                ],
                [
                    'course_id' => 3,
                    'price' => 180,
                    'valid_from' => '2023-01-01'
                ],
                [
                    'course_id' => 4,
                    'price' => 200,
                    'valid_from' => '2023-01-01'
                ],
                [
                    'course_id' => 5,
                    'price' => 200,
                    'valid_from' => '2023-01-01'
                ],
                [
                    'course_id' => 6,
                    'price' => 200,
                    'valid_from' => '2023-01-01'
                ]
            ]
        );

        DB::table('course_target_audiences')->insert(
            [
                [
                    'course_id' => 1,
                    'target_audience_id' => 1
                ],
                [
                    'course_id' => 2,
                    'target_audience_id' => 1
                ],
                [
                    'course_id' => 3,
                    'target_audience_id' => 1
                ],
                [
                    'course_id' => 4,
                    'target_audience_id' => 2
                ],
                [
                    'course_id' => 5,
                    'target_audience_id' => 2
                ],
                [
                    'course_id' => 6,
                    'target_audience_id' => 2
                ],

            ]
        );

        DB::table('lessons')->insert(
            [
                [
                    'course_id' => 1,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2023-12-01"
                ],
                [
                    'course_id' => 1,
                    'name' => 'variabelen',
                    'duration' => 120,
                    'date' => "2023-12-08"
                ],
                [
                    'course_id' => 1,
                    'name' => 'datatypes',
                    'duration' => 120,
                    'date' => "2023-12-15"
                ],
                [
                    'course_id' => 1,
                    'name' => 'if statements',
                    'duration' => 120,
                    'date' => "2023-12-22"
                ],
                [
                    'course_id' => 1,
                    'name' => 'for lussen',
                    'duration' => 120,
                    'date' => "2023-12-29"
                ],
                [
                    'course_id' => 1,
                    'name' => 'functies',
                    'duration' => 120,
                    'date' => "2023-01-05"
                ],
                [
                    'course_id' => 2,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2024-03-15"
                ],
                [
                    'course_id' => 2,
                    'name' => 'variabelen',
                    'duration' => 120,
                    'date' => "2024-03-22"
                ],
                [
                    'course_id' => 2,
                    'name' => 'datatypes',
                    'duration' => 120,
                    'date' => "2024-03-29"
                ],
                [
                    'course_id' => 2,
                    'name' => 'if statements',
                    'duration' => 120,
                    'date' => "2024-04-05"
                ],
                [
                    'course_id' => 2,
                    'name' => 'for lussen',
                    'duration' => 120,
                    'date' => "2024-04-13"
                ],
                [
                    'course_id' => 2,
                    'name' => 'functies',
                    'duration' => 120,
                    'date' => "2024-04-20"
                ],
                [
                    'course_id' => 3,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2024-04-22"
                ],
                [
                    'course_id' => 4,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2024-04-08"
                ],
                [
                    'course_id' => 5,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2024-06-12"
                ],
                [
                    'course_id' => 6,
                    'name' => 'introductie',
                    'duration' => 120,
                    'date' => "2024-08-05"
                ]
            ]
        );

        DB::table('teachers')->insert(
            [
                [
                    'user_id' => 4,
                    'lesson_id' => 1
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 2
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 3
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 4
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 5
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 6
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 7
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 8
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 9
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 10
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 11
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 12
                ],
                [
                    'user_id' => 10,
                    'lesson_id' => 13
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 13
                ],
                [
                    'user_id' => 10,
                    'lesson_id' => 13
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 14
                ],
                [
                    'user_id' => 9,
                    'lesson_id' => 14
                ],
                [
                    'user_id' => 10,
                    'lesson_id' => 15
                ],
                [
                    'user_id' => 4,
                    'lesson_id' => 15
                ]
            ]
        );

        DB::table('registrations')->insert(
          [
              [
                  'user_id' => 2,
                  'course_id' => 1,
                  'payment_period' => 30,
                  'registration_date' => '2023-10-10',
                  'structured_message' => '+++123/4567/89012+++'
              ],
              [
                  'user_id' => 6,
                  'course_id' => 1,
                  'payment_period' => 30,
                  'registration_date' => '2023-10-15',
                  'structured_message' => '+++987/6543/21098+++'
              ],
              [
                  'user_id' => 6,
                  'course_id' => 4,
                  'payment_period' => 30,
                  'registration_date' => '2024-01-15',
                  'structured_message' => '+++777/8888/99999+++'
              ],
              [
                  'user_id' => 7,
                  'course_id' => 3,
                  'payment_period' => 30,
                  'registration_date' => '2023-12-29',
                  'structured_message' => '+++111/2222/33333+++'
              ],
              [
                  'user_id' => 8,
                  'course_id' => 2,
                  'payment_period' => 30,
                  'registration_date' => '2023-12-29',
                  'structured_message' => '+++111/2222/33333+++'
              ]


          ]
        );

        DB::table('payments')->insert(
            [
                [
                    'registration_id' => 1,
                    'date' => '2023-10-15',
                    'price' => 180
                ],
                [
                    'registration_id' => 2,
                    'date' => '2023-10-20',
                    'price' => 180
                ],
                [
                    'registration_id' => 3,
                    'date' => '2024-01-15',
                    'price' => 200
                ],

                [
                    'registration_id' => 4,
                    'date' => '2023-12-29',
                    'price' => 180
                ],
                [
                    'registration_id' => 5,
                    'date' => '2023-12-29',
                    'price' => 180
                ],

            ]
        );

        DB::table('attendance_types')->insert(
            [
                [
                    'name' => 'aanwezig'
                ],
                [
                    'name' => 'afwezig'
                ],
                [
                    'name' => 'te laat'
                ]
            ]
        );

        DB::table('attendances')->insert(
            [
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 1,
                    'lesson_id' => 1
                ],
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 3,
                    'lesson_id' => 2
                ],
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 1,
                    'lesson_id' => 3
                ],
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 1,
                    'lesson_id' => 4
                ],
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 2,
                    'lesson_id' => 5
                ],
                [
                    'registration_id' => 1,
                    'attendance_type_id' => 1,
                    'lesson_id' => 6
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 1,
                    'lesson_id' => 1
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 1,
                    'lesson_id' => 2
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 1,
                    'lesson_id' => 3
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 3,
                    'lesson_id' => 4
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 2,
                    'lesson_id' => 5
                ],
                [
                    'registration_id' => 2,
                    'attendance_type_id' => 1,
                    'lesson_id' => 6
                ]

            ]
        );

        DB::table('question_types')->insert(
            [
                [
                    'name' => 'open'
                ],
                [
                    'name' => 'gesloten'
                ]
            ]
        );

        DB::table('questions')->insert(
            [
                [
                    'question_type_id' => 1,
                    'content' => 'Wat heb je allemaal geleerd?',
                    'valid_from' => '2023-01-01 00:00:00'
                ],
                [
                    'question_type_id' => 1,
                    'content' => 'Wat vond je leuk aan de les?',
                    'valid_from' => '2023-01-01 00:00:01'
                ],
                [
                    'question_type_id' => 1,
                    'content' => 'Wat vond je minder leuk aan de les?',
                    'valid_from' => '2023-01-01 00:00:02'
                ],
                [
                    'question_type_id' => 1,
                    'content' => 'Wat wil je nog bijleren?',
                    'valid_from' => '2023-01-01 00:00:03'
                ],
                [
                    'question_type_id' => 2,
                    'content' => 'Hoe leuk vond je de les?',
                    'valid_from' => '2023-01-01 00:00:04'
                ]
            ]
        );

        DB::table('feedback')->insert(
            [
                [
                    'user_id' => 2,
                    'lesson_id' => 1,
                    'time_answered' => '2023-12-01'
                ],
                [
                    'user_id' => 2,
                    'lesson_id' => 2,
                    'time_answered' => '2023-12-08'
                ],
                [
                    'user_id' => 2,
                    'lesson_id' => 3,
                    'time_answered' => '2023-12-15'
                ],
                [
                    'user_id' => 2,
                    'lesson_id' => 4,
                    'time_answered' => '2023-12-22'
                ],
                [
                    'user_id' => 2,
                    'lesson_id' => 5,
                    'time_answered' => '2023-12-30'
                ],
                [
                    'user_id' => 2,
                    'lesson_id' => 6,
                    'time_answered' => '2023-01-09'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 1,
                    'time_answered' => '2023-12-01'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 2,
                    'time_answered' => '2023-12-09'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 3,
                    'time_answered' => '2023-12-16'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 4,
                    'time_answered' => '2023-12-22'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 5,
                    'time_answered' => '2023-12-29'
                ],
                [
                    'user_id' => 6,
                    'lesson_id' => 6,
                    'time_answered' => '2023-12-06'
                ]
            ]
        );

        DB::table('feedback_questions')->insert(
            [
                [
                    'feedback_id' => 1,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd wat Python is.'
                ],
                [
                    'feedback_id' => 1,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'

                ],
                [
                    'feedback_id' => 1,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],

                [
                    'feedback_id' => 1,
                    'question_id' => 5,
                    'answer' => '10'
                ],
                [
                    'feedback_id' => 2,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd over variabelen.'
                ],
                [
                    'feedback_id' => 2,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'
                ],
                [
                    'feedback_id' => 2,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],
                [
                    'feedback_id' => 2,
                    'question_id' => 5,
                    'answer' => '9'
                ],
                [
                    'feedback_id' => 3,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd over datatypes.'
                ],
                [
                    'feedback_id' => 3,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'
                ],
                [
                    'feedback_id' => 3,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],
                [
                    'feedback_id' => 3,
                    'question_id' => 5,
                    'answer' => '9'
                ],
                [
                    'feedback_id' => 4,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd over if statements.'
                ],
                [
                    'feedback_id' => 4,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'
                ],
                [
                    'feedback_id' => 4,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],
                [
                    'feedback_id' => 4,
                    'question_id' => 5,
                    'answer' => '8'
                ],
                [
                    'feedback_id' => 5,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd over for lussen.'
                ],
                [
                    'feedback_id' => 5,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'
                ],
                [
                    'feedback_id' => 5,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],
                [
                    'feedback_id' => 5,
                    'question_id' => 5,
                    'answer' => '7'
                ],
                [
                    'feedback_id' => 6,
                    'question_id' => 1,
                    'answer' => 'Ik heb geleerd over functies.'
                ],
                [
                    'feedback_id' => 6,
                    'question_id' => 2,
                    'answer' => 'Ik vond het leuk om oefeningen te maken.'
                ],
                [
                    'feedback_id' => 6,
                    'question_id' => 3,
                    'answer' => 'Ik vond de theorie minder leuk.'
                ],
                [
                    'feedback_id' => 6,
                    'question_id' => 5,
                    'answer' => '9'
                ],
                [
                    'feedback_id' => 7,
                    'question_id' => 1,
                    'answer' => 'Wat Python is'
                ],
                [
                    'feedback_id' => 7,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 7,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 7,
                    'question_id' => 5,
                    'answer' => '9'
                ],
                [
                    'feedback_id' => 8,
                    'question_id' => 1,
                    'answer' => 'variabelen'
                ],
                [
                    'feedback_id' => 8,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 8,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 8,
                    'question_id' => 5,
                    'answer' => '7'
                ],
                [
                    'feedback_id' => 9,
                    'question_id' => 1,
                    'answer' => 'datatypes'
                ],
                [
                    'feedback_id' => 9,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 9,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 9,
                    'question_id' => 5,
                    'answer' => '9'
                ],
                [
                    'feedback_id' => 10,
                    'question_id' => 1,
                    'answer' => 'for lussen'
                ],
                [
                    'feedback_id' => 10,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 10,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 10,
                    'question_id' => 5,
                    'answer' => '8'
                ],
                [
                    'feedback_id' => 11,
                    'question_id' => 1,
                    'answer' => 'if statements'
                ],
                [
                    'feedback_id' => 11,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 11,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 11,
                    'question_id' => 5,
                    'answer' => '10'
                ],
                [
                    'feedback_id' => 12,
                    'question_id' => 1,
                    'answer' => 'functies'
                ],
                [
                    'feedback_id' => 12,
                    'question_id' => 2,
                    'answer' => 'oefeningen'
                ],
                [
                    'feedback_id' => 12,
                    'question_id' => 3,
                    'answer' => 'theorie'
                ],
                [
                    'feedback_id' => 12,
                    'question_id' => 5,
                    'answer' => '9'
                ],
            ]
        );

    }
}
