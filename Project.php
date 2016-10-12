<?php


class Project
{

    private $description;
    public function setDescription($description)
        {
        $this->description = $description;
        return $this;
        }
        
    public function getDescription()
        {
        return $this->description;
        }
}

$project_one = new Project();
$project_one->setDescription("This is my first test project");
$project_two = clone $project_one;
$project_two->setDescription("A new description for my copied project");
echo $project_one->getDescription();
echo $project_two->getDescription();