
<main>
    
    <a href="../index.php">Back</a>
    <h2>Courses</h2>    
        <table>
        <tr>
            <th>Course Name</th>
            <th>Course Id</th>
            <th>Instructor</th>
            <th>Time</th>
            <th>Classroom</th>
            <th>Semester</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
        <tr>
            <td><?php echo htmlspecialchars($course['course_name']); ?></td>
            <td><?php echo htmlspecialchars($course['course_id']); ?></td>
            <td><?php echo htmlspecialchars($instructor_lname['last_name']); ?></td>
            <td><?php echo htmlspecialchars($course['courses_time']); ?></td>
            <td><?php echo htmlspecialchars($course['classroom']); ?></td>
            <td><?php echo htmlspecialchars($course['semester']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="class_roster">
                <input type="hidden" name="course_id"
                       value="<?php echo htmlspecialchars($course['course_id']); ?>">
                <input type="submit" value="Class Roster">
            </form></td>
        </tr>
        <?php endforeach; ?>
        </table>
</main>
