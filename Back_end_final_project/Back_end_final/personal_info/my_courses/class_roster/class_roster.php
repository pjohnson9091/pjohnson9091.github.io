<main>
    <a href="../index.php">Back</a>
    <h2>Students</h2>  
        <table>
         
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Student Id</th>
            <th>Letter Grade</th>
            <th>&nbsp;</th>
        </tr>
        
        <?php foreach ($roster as $student) : ?>
        <tr>
            
            <td><?php echo htmlspecialchars($student['first_name']); ?></td>
            <td><?php echo htmlspecialchars($student['last_name']); ?></td>
            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
            <td>
                <form action="." method="post">
                <select name ="final_letter_grade" id ="final_letter_grade"> 
            <?php             
            if($student['final_letter_grade'] == "A"){
            echo "<option value = 'A' selected>A</option>"; 
            }
            else{
            echo "<option value = 'A'>A</option>"; 
            }
            
            if($student['final_letter_grade'] == "B"){
            echo "<option value = 'B' selected>A</option>"; 
            }
            else{
            echo "<option value = 'B'>B</option>"; 
            }
            
            if($student['final_letter_grade'] == "C"){
            echo "<option value = 'C' selected>C</option>"; 
            }
            else{
            echo "<option value = 'C'>C</option>"; 
            }
            
            if($student['final_letter_grade'] == "D"){
            echo "<option value = 'D' selected>D</option>"; 
            }
            else{
            echo "<option value = 'D'>D</option>"; 
            }
            
            if($student['final_letter_grade'] == "F"){
            echo "<option value = 'F' selected>F</option>"; 
            }
            else{
            echo "<option value = 'F'>F</option>"; 
            }
            
            ?></select>
                    
                <input type="hidden" name="action"
                       value="update_grades">
                <input type="hidden" name="student_id"
                       value="<?php echo htmlspecialchars($student['student_id']); ?>">
                <input type="submit" value="Update">        
                </form>

                </td>
            

        </tr>
        <?php endforeach; ?>
        </table>
</main>