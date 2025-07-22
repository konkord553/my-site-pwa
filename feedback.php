<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $db = new mysqli('localhost', 'root', '', 'konkord_feedback');
    
    $db->query("INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')");
    
    $success = true;
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Оставить отзыв</h1>
    
    <?php if (isset($success)): ?>
        <p class="success">Спасибо! Ваш отзыв отправлен.</p>
    <?php endif; ?>
    
    <form method="POST">
        <div>
            <label>Имя:</label>
            <input type="text" name="name" required>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        
        <div>
            <label>Сообщение:</label>
            <textarea name="message" rows="5" required></textarea>
        </div>
        
        <button type="submit">Отправить</button>
    </form>
</body>
</html>