<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('users')->insert(
            [
                [
                    'name' => 'Kamil',
                    'email' => 'kamil@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "He was a big beefy man with hardly any neck although he did have a very large mustache.",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Albert',
                    'email' => 'albert@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "A giant of a man was standing in the doorway. His face was almost completely hidden by
                    a long shaggy mane of hair and a wild, tangled beard, but you could make out his eyes
                    glinting like black beetles under all the hair",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Magdalena',
                    'email' => 'magdalena@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "Her skin was a rich black that would have peeled like a plum if snagged but then no one
                    would have thought of getting close enough to Mrs. Flowers",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bob',
                    'email' => 'bob@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "He was most fifty, and he looked it. His hair was long and tangled and greasy and hung down
                    and you could see his eyes shining through like he was behind vines.",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Tom',
                    'email' => 'tom@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "For such and extraordinary athlete—even as a Lower Middler Phineas had been the best athlete
                    in the school—he was not spectacularly built",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Laura',
                    'email' => 'laura@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "I could picture the smooth oval of Lauras face her neatly pinned chignon the dress she would have been wearing: a shirtwaist with a small rounded collar",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Carl',
                    'email' => 'carl@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "My mum is short, my dad says if she was any shorter she would have to be in a car seat. Her hair is like a box and she likes to catch the bad guys",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Barbara',
                    'email' => 'barbara@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "My best friend has blonde hair she is tall and has green eyes. She is wearing a pink dress and a straw hat.",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Carolina',
                    'email' => 'carolina@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "She had dark brown hair and a single eyebrow that made her look permanently fierce. She thought in colours that didnt exist and her sadness could give birth to new worlds",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Stephen',
                    'email' => 'stephen@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "His glasses mirrored his cheery disposition and his wheelchair flattened the toes of his enemies. He thought in all the ways of the universe. Particles protons and parallel universes",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Marilynne',
                    'email' => 'marylinne@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "Her mouth bowed forward and her brow sloped back and her skull shone pink and speckled within a mere haze of hair which hovered about her head like the remembered shape of an altered thing",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'John',
                    'email' => 'john@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "A green hunting cap squeezed the top of the fleshy balloon of a head. The green earflaps, full of large ears and uncut hair and the fine bristles that grew in the ears themselves",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Ender',
                    'email' => 'ender@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "Ender did not see Peter as the beautiful ten-year-old boy that grown-ups saw with dark tousled hair and a face that could have belonged to Alexander the Great.",
                    'gender' => 'male',
                    'pref_gender' => 'female',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Trap',
                    'email' => 'trap@email.com',
                    'password' => Hash::make('1234'),
                    'description' => "She's the twelve-year-old the one who reminded me so of Prim in stature. Up close she looks about ten",
                    'gender' => 'female',
                    'pref_gender' => 'male',
                    'admin' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]





        );
    }
}
