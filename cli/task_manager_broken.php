<?php

class Task {
    //private $id;
    private $description;
    private $title;
    private $category;

    public function __construct($title, $description) {
        //$this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }
    

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCategory($category){
        $this->category=$category;
    }
    public function getCategory(){
        return $this->category;
    }

    public function displayTask() {
        //echo "ID: " . $this->id . "\n";
        echo "Title: " . $this->title . "\n";
        echo "Description: " . $this->description . "\n";
        echo "--------------------------\n";
    }
}

$tasks = [];

function displayAllTasks($tasks) {
    if (empty($tasks)) {
        echo "No tasks available.\n";
    } else {
        foreach ($tasks as $task) {
            $task->displayTask();
        }
    }
}

function createTask(&$tasks) {
    $title = readline("Enter Task Title: ");
    $description = readline("Enter Task Description: ");

    end($tasks);
    $lastKey = key($tasks); 
    echo 'key method' . key($tasks) . "\n"; 
    $id = $lastKey + 1;

    $tasks[$id] = new Task($title, $description);
    echo "Task Created.\n";
}

function updateTask(&$tasks) {
    $id = readline("Enter Task ID to Update: ");

    if (isset($tasks[$id])) {
        $newTitle = readline("Enter New Title: ");
        $newDescription = readline('Enter New Description: ');

        $tasks[$id]->setTitle($newTitle);
        $tasks[$id]->setDescription($newDescription);

        echo "Task Updated.\n";
    } else {
        echo "Task ID not found.\n";
    }
}

function deleteTask(&$tasks) {
    $id = readline("Enter Task ID to Delete: ");

    if (isset($tasks[$id])) {
        unset($tasks[$id]);
        echo "Task Deleted.\n";
    } else {
        echo "Task ID not found.\n";
    }
}
function taskCategory(&$tasks){
    $id = readline("Enter Task ID to Delete: ");
    if (isset($tasks[$id])) {
        $category = readline("Enter Category: ");
        $tasks[$id]->setCategory($category);

        echo "Category setted";
    } else {
        echo "Task ID not found.\n";
    }
}
function searchCategory(&$tasks){
    $category = readline("Enter task category: ");
    foreach ($tasks as $key => $value) {
        if($value->getCategory() == $category){
            echo $value->displayTask();
        }
    }
}

while (true) {
    echo "\nToDo List CLI Application\n";
    echo "1. Create Task\n";
    echo "2. View All Tasks\n";
    echo "3. Update Task\n";
    echo "4. Delete Task\n";
    echo "5. Set Category For Task\n";
    echo "6. Search by category\n";
    echo "7. Exit\n";
    echo "Choose an option: ";
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case 1:
            createTask($tasks);
            break;
        case 2:
            displayAllTasks($tasks);
            break;
        case 3:
            updateTask($tasks);
            break;
        case 4:
            deleteTask($tasks);
            break;
        case 5:
            taskCategory($tasks);
            break;
        case 6:
            searchCategory($tasks);
            break;
        case 7:
            echo "Exiting the application. Goodbye!\n";
            exit;
        case 13:
            print_r($tasks);
        default:
            echo "Invalid option. Please choose again.\n";
    }
}
