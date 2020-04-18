<div class="offset-md-2 col-md-8">
    <div class="row">
        <div class="col-md-4">

            <select id="category" class="form-control">
                <option selected>All categories</option>
                 <? include_once('load/category.php'); ?>
            </select>

        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Score</th>
                <th scope="col">Esatte</th>
                <th scope="col">Errate</th>
                <th scope="col">Mancate</th>
            </tr>
            </thead>
            <tbody id="table_body_content">

            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function(){

    $("select").change(function() {
        var category = $("select option:selected").text();
        var request = $.ajax({
            type: "POST",
            url: "view/load/ranking.php",
            data: {category: category},
            dataType: "html"
        });
        request.done( function (response) {
            alert(response);
            //visualizzo risultato
            $("#table_body_content").html(response);

        });
    }).trigger( "change" );

});

</script>
<!--
<div class="offset-md-2 col-md-8">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>
-->