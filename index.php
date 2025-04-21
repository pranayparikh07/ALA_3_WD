<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BookVault - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="candle" style="top: 100px; left: 20%;"></div>
<div class="candle" style="top: 150px; left: 40%; animation-delay: 2s;"></div>
<div class="candle" style="top: 80px; left: 60%; animation-delay: 1s;"></div>
<div class="candle" style="top: 120px; left: 80%; animation-delay: 3s;"></div>

<div>
  <button onclick="setTheme('gryffindor')">Gryffindor</button>
  <button onclick="setTheme('slytherin')">Slytherin</button>
  <button onclick="setTheme('ravenclaw')">Ravenclaw</button>
  <button onclick="setTheme('hufflepuff')">Hufflepuff</button>
</div>
<script>
  function setTheme(house) {
    document.body.className = house;
  }
</script>


    <h1>📚 Welcome to the BookVault</h1>
    <a href="add.php" class="btn">➕ Add Book</a>
    <table>
        <thead>
            <tr>
                <th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM books");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['genre']}</td>
                    <td>{$row['published_year']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>✏️ Edit</a> | 
                        <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to banish this book?');\">🗑️ Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="floating-emoji">🕯️</div>
    <div class="floating-emoji">🕯️</div>
    <div class="floating-emoji">🕯️</div>
    <div class="floating-emoji">🕯️</div>

</body>
</html>
