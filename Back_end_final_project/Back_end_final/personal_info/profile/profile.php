<main>
    <a href="../index.php">Back</a>
    <nav>    
        <?php foreach ($profile as $name) : ?>
    <h2><?php echo htmlspecialchars($name['first_name']); ?> <?php echo htmlspecialchars($name['last_name']); ?>'s Profile</h2>
        <?php endforeach; ?>
    
    </nav>
        <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($profile as $info) : ?>
        <tr>
            <td><?php echo htmlspecialchars($info['first_name']); ?></td>
            <td><?php echo htmlspecialchars($info['last_name']); ?></td>
            <td><?php echo htmlspecialchars($info['birthdate']); ?></td>
            <td><?php echo htmlspecialchars($info['gender']); ?></td>
            <td><?php echo htmlspecialchars($email['email']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="pass">
                <input type="hidden" name="pass"
                       value="<?php echo htmlspecialchars($pass['user_password']); ?>">
                <input type="submit" value="Change Password">
            </form></td>
        </tr>
        <?php endforeach; ?>
        </table>
    
</main>