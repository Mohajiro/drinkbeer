<!DOCTYPE html>
<?php 
require 'head.php'
?>
<body class="bg-gray-100">
    <?php 
    require 'header.php'
    ?>
    <main>
        <?php require "app/views/{$view}.php"; ?>
    </main>
    <?php 
    require 'footer.php'
    ?>
</body>
</html>
