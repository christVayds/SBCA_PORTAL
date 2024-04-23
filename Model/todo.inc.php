<?php
    
    function Admin(){
        include 'db.inc.php';

        $todoQuery = 'SELECT * FROM todo_admin';
        $result = mysqli_query($conn, $todoQuery);

        if(mysqli_num_rows($result) > 0){
            while($row = $result->fetch_assoc()){
                $name = $row['name'];
                $todo_id = $row['todoid'];
                $check = '';
                if($row['checked'] != 0){
                    $check = "checked";
                }
                
                echo '<div class="item" id="'. $todo_id .'">
                        <div class="checkbox">
                            <input type="checkbox" id="'. $todo_id .'" name="'. $name .'" '. $check .'>
                            <label for="one">' . $name . '</label>
                        </div>
                    </div>';
            }
        }
    }
?>