<?php
include "db.php";
$output = '';

if(isset($_POST["grp_id"])){
    if($_POST["grp_id"] != ''){
        $sql_join = "SELECT * FROM groups JOIN students ON groups.grp_id = students.group_id JOIN grade ON students.std_id = grade.student_id JOIN subjects ON subjects.sub_id = grade.subject_id  WHERE groups.grp_id = '".$_POST["grp_id"]."'";
    }
    else{
        $sql_join = "SELECT * FROM groups JOIN students ON groups.grp_id = students.group_id JOIN grade ON students.std_id = grade.student_id JOIN subjects ON subjects.sub_id = grade.subject_id";
    }
    $sql_join = $dsn->query($sql_join);
    echo "<table>
    <tr>
    <th>Группа</th>
    <th>Студент</th>
    <th>Оценка</th>
    <th>Предмет</th>

    </tr>";
    while($row = mysqli_fetch_array($sql_join)) {
        $output .= '<tr><td>'.$row["group_name"].'</td><td>'.$row["student_name"].'</td><td>'.$row["grade_name"].'</td><td>'.$row["subject_name"].'</td>';
    }
    echo $output;
    echo "</table>";
}
