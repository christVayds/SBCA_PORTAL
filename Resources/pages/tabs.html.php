<?php

function AccountPage(): void{
    session_start();

    if($_SESSION['user']){
        $user = $_SESSION['user'];

        if($user === 'student'){
            // echo '<div class="acc_table_header"> </div>';
        } else if($user === 'teacher'){
            echo '<div class="acc_table_header"> </div>';
        } else {
            echo '<div class="acc_table_header">
                        <h3>BS Information Technology 3</h3>
                        <p>S.Y. 2023-2024</p>
                        <p>2nd Semester</p>
                    </div>
                    <div class="acc_table_view">
                        <table class="acc_table_content">
                            <tr id="tbl_header">
                                <th id="userid">ID No.</th>
                                <th id="username">Name</th>
                                <th id="usercourse">Course</th>
                                <th id="usertotal">Total Fee</th>
                                <th id="usermonthly">Monthly Fee</th>
                                <th id="userreceivable">Total receivable</th>
                                <th id="userunit">No. unit</th>
                            </tr>
                            <tr>
                                <td>C2021-29984</td>
                                <td>
                                    <a href="#">Peter Parker</a>
                                </td>
                                <td>BS Information Technology</td>
                                <td class="balance">10,000</td>
                                <td class="balance">2,000</td>
                                <td class="balance">3,000</td>
                                <td class="balance">12</td>
                            </tr>
                            <tr>
                                <td>C2021-29984</td>
                                <td>
                                    <a href=""#>Johny Sins</a>
                                </td>
                                <td>BS Information Technology</td>
                                <td class="balance">10,000</td>
                                <td class="balance">2,000</td>
                                <td class="balance">3,000</td>
                                <td class="balance">12</td>
                            </tr>
                        </table>
                    </div>';
        }
    }
}

function SchedulePage(): void{

}