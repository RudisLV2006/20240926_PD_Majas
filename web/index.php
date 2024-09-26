<?php
include 'head.php';

?>
<body>
    
    <h1>Piesakies webināram!</h1>
    <form action="confirmation.php" method="get" >
        <label for="name">Vārds</label>
        <input type="name" id='field' name='name' required> <br>
        <label for="email">Ēpasts</label>
        <input type="email" id='field' name='email' required> <br>
        <select name="level" id="">
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select> <br>
        <p style ='width: 300px;'> <i>Vēlaties saņemt info par citiem mūsu organizācijas pasākumiem?</i></p> 
        <label for="true">Yes</label>
        <input type="radio" name="answer" id="true" value='Yes'>
        <label for="false">No</label>
        <input type="radio" name="answer" id="false" value='No'> <br>
        <input type="submit" value="submit" style = 'font-size: 20px; font-weight: bold;'>
    </form>
    <a href="blog.php" style='font-size: 10px;'>Tikt uz blogu lapu</a>

    <h3>Jau reģistrējušies</h3>
    <?php

    $users = [
         1 => ['name' => 'Jānis Bērziņš', 'email'=> 'janis@berzins.com', 'level' => 'Intermediate'],
         2 => ['name' => 'Kristaps Kārkliņš', 'email'=> 'Kristapskakilns@gmail.com', 'level' => 'Beginner'],
         3 => ['name' => 'Markuss Silavs', 'email'=> 'mmsilavs@inbox.lv', 'level' => 'Advanced']
    ];
    
    echo '<ul>';
    foreach ($users as $index => $user) {
        echo '<li>' . 'Vārds ' . $user['name'] . ': ' . 'E-pasts ' . $user['email'] . ': '. 'Līmenis ' . $user['level'] . '</li>';
    }
    echo '</ul>';
    ?>

    <script src="app.js"></script>

</body>