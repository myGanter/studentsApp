<?php 
namespace App\CastomClasses;

use App\Group;

class studInfo 
{ 
    public $name = '';
    public $summary = [];
    
    function __construct($name, array $summary)
    {
        $this->name = $name;
        $this->summary = $summary;
    }

    public function getCssClass($key)
    {
        if ($this->summary[$key] == 5)
            return 'green';
        else if($this->summary[$key] > 3)
            return 'yellow';
        else
            return 'red';
    }

    static function getStudInfoGroup(Group $group) 
    {
        $result = [];
        $summary = [];
        $counter = [];
        foreach($group->students()->get() as $stud)
        {
            foreach($stud->ratings()->get() as $rating)
            {
                if(isset($rating->item()->get()[0]->name))
                {
                    if(isset($summary[$rating->item()->get()[0]->name]))
                    {                 
                        $summary[$rating->item()->get()[0]->name] += $rating->assessment;
                        $counter[$rating->item()->get()[0]->name] += 1;
                    }
                    else
                    {
                        $summary[$rating->item()->get()[0]->name] = $rating->assessment;
                        $counter[$rating->item()->get()[0]->name] = 1;
                    }                       
                }                
            }

            foreach ($summary as $key => $value)
            {
                $summary[$key] = round($summary[$key] / $counter[$key], 2);
            }
            $result[] = new studInfo($stud->name.' '.$stud->surname.' '.$stud->patronymic, $summary);
            $summary = [];
            $counter = [];
        }
        
        return $result;
    }  
} 