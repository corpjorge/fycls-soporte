 <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  
<script>
function getCsrfToken(callback) {
    var csrfToken = 'RrKNKQ-EDnQpCJOb89Qr8Vi2IONnJizi3c8t9MLZtK8';
    callback(csrfToken);
}

function postNode(csrfToken, node) {
    jQuery.ajax({
        url: 'http://ariadna.corpjorge.com/drupal/web/entity/commerce_product?_format=json',
        method: 'POST',
        headers: {
            'Content-Type': 'application/hal+json',
            'Authorization': 'Basic YWRtaW46YWRtaW4=',
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-Token': csrfToken
        },
        data: JSON.stringify(node),
        success: function(node) {
            console.log(node);
        }
    });
}
var newNode = JSON.parse('{"type": [{"target_id": "default"}],"title": [{"value": "<?php echo $datos["nombre"] ?>"}],"body": [{"value": "<?php echo $datos["descripcion"] ?>"}],"stores": [{"target_id": 1}],"variations": [{"target_id": <?php echo $id ?> }]}');
getCsrfToken(function(csrfToken) {
    postNode(csrfToken, newNode);
});

location.href ="http://ariadna.corpjorge.com/php/index.php?ok=1";

</script>