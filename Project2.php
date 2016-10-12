<?php
//Penis! 123... Test
//Luzi Banane im Gsicht :O
<<<<<<< HEAD
//artartasf
=======
//Blabl12kakaabla
>>>>>>> master
class Person
{
    private $name;
    
    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }


}

class Project
{
    private $leadDeveloper;
    
    function getLeadDeveloper() {
        return $this->leadDeveloper;
    }

    function setLeadDeveloper(Person $leadDeveloper) {
        $this->leadDeveloper = $leadDeveloper;
    }
}

$jacob = new Person();
$jacob->setName("Jacob");

$project_one = new Project();
$project_one->setLeadDeveloper($jacob);

$project_two = clone $project_one;

$matthew = new Person();
$matthew->setName("Matthew");
$project_two->setLeadDeveloper($matthew);

echo $project_one->getLeadDeveloper()->getName(). "<br/>";
echo $project_two->getLeadDeveloper()->getName(). "<br/>";