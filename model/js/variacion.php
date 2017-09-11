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
        url: 'http://ariadna.corpjorge.com/drupal/web/entity/commerce_product_variation/?_format=json',
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
var newNode = JSON.parse('{"type": [{"target_id": "default"}],"sku": [{"value": "<?php echo $datos["codigo"] ?>"}],"price": [{"number": "<?php echo $datos["precio"] ?>","currency_code": "<?php echo $datos["moneda"] ?>"}]}');
getCsrfToken(function(csrfToken) {
    postNode(csrfToken, newNode);
});



</script>