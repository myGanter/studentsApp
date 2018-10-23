<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemCount = 4;//колличество предметов
        $groupCount = 10;//колличество групп
        $studCountInGroup = 6;//колличество студентов в каждйо группе
        //у каждого студента 5 оценок по каждому из предметов

        for ($i = 0; $i < $itemCount; $i++)
            \App\Item::create(['name' => str_random(10),]);
        
        for ($i = 0; $i < $groupCount; $i++)
        {
            \App\Group::create([
                'name' => str_random(10),
                'description' => str_random(10),
                ]);
        }

        $items = \App\Item::get();
        foreach (\App\Group::get() as $group)
        {
            for ($i = 0; $i < $studCountInGroup; $i++)
            {
                \App\Student::create([
                    'group_id' => $group->id,
                    'name' => str_random(10),
                    'surname' => str_random(10),
                    'patronymic' => str_random(10),
                    'date' => rand(1998, 2005).'-'.rand(1, 12).'-'.rand(1, 25) ,
                    ]); 
            }

            foreach ($items as $item)
            {
                foreach($group->students()->get() as $stud)
                {
                    for ($i = 0; $i < 5; $i++)
                        \App\Rating::create([
                            'item_id' => $item->id,
                            'student_id' => $stud->id,
                            'assessment' => rand(2, 5),
                            ]); 
                }
            }
        }
    }
}
