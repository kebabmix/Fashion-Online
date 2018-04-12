</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    $(".delete").click(function () {
        return confirm("Do you really want to delete " + this.id + "?");
    });
</script>
</body>
</html>
<?php
$db->_close();