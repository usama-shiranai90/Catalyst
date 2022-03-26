<html>
<head>
    <script src="jquery-2.0.3.min.js"></script>
    <script src="underscore-min.js"></script>
    <script src="mustache.js"></script>
    <script>
        $(function(){

            $('.btn').click(function(e) {
                var user = $.parseJSON( _.unescape( $(this).next().text() ) );
                $('#output').html( Mustache.render( $('#output-tpl').html(), user) );
            });

        });
    </script>
</head>
<body>
<?php

class User {

    var $id;
    var $name;

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

}

$result = array(new User("0", "<script>alert('XSS')</script>"), new User("1", "Foo"), new User("2", "Bar"));

foreach ( $result as $user ) {
    echo "<div class='btn'>" . htmlspecialchars( $user->name ) . "</div>";
    echo '<script type="text/php_data">';
    echo htmlspecialchars( json_encode($user) );
    echo '</script>';
}

?>
<div id="output">
    Empty for now
</div>
<script id="output-tpl" type="text/mustache-tpl">
Clicked user <strong>{{name}}</strong> with ID ({{id}})
</script>
</body>
</html>