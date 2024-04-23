<?php
    if(isset($_POST['name'])){
        include '../../Model/db.inc.php';

        if($_POST['do'] == 'newtodo' & $_POST['name'] != ""){
            $name = $_POST["name"];

            $newtodoquery = "INSERT INTO todo_admin(username, name, checked) VALUES (
                'sbcaeduph',
                '". $name ."',
                0
            )";
            $result = mysqli_query($conn, $newtodoquery);
        } else if($_POST['do'] == 'updatetodo'){
            $name = $_POST['name'];
            $check = $_POST['check'];
            $todoid = $_POST['todoid'];

            $updatetodoquery = "UPDATE todo_admin SET checked = '$check' WHERE todoid = '$todoid'";
            $result = mysqli_query($conn, $updatetodoquery);
        } else if($_POST['do'] == 'delete'){
            $todoid = $_POST['todoid'];

            $delquery = "DELETE FROM todo_admin WHERE todoid = '$todoid'";
            $result = mysqli_query($conn, $delquery);
        }

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
        mysqli_close($conn);
    }
?>

<script>
// for jquery back

// jquery for todo list
$(document).ready(function(){

    // remove todo by double clicking
    $(".item").dblclick(function(){
        var todoid = $(this).attr('id');
        var todoname = document.getElementById("todonameinput");
        $("#lists_all").load("Resources/data/data.php", {
            name: todoname.value,
            do: 'delete', 
            todoid: todoid
        });
    });

    // adding new todo
    $("#addtodo").click(function(){
        var todoname = document.getElementById("todonameinput");

        $("#lists_all").load("Resources/data/data.php", {
            name: todoname.value,
            do: 'newtodo'
        });
        todoname.value = "";
    });

    $('input[type="checkbox"]').on('change', function(){
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        var check = 0;
        if($(this).is(':checked')){
            check = 1;
        }
        console.log(name + " " + id + " " + check);

        $('#lists_all').load("Resources/data/data.php", {
            name: name,
            todoid: id,
            do: 'updatetodo',
            check: check
        });
    });
});
</script>