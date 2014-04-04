<div class="alert <?php echo (isset($class))? $class : '';?>">
    <?php echo $message; ?>
    <a href="#" class="close" onclick="$(this).parent().fadeOut();return false;">&times;</a>
</div>