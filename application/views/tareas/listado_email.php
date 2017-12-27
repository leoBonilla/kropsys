
<div cla<div class="col-md-12">
   
   
    <table id="tareas_table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th>Email ID</th>
            <th>Archivo</th>
                <th>Accion</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($attachments as $row) : ?>
                <tr>
                    <td><?php echo $row['email_number'] ?></td>
                    <td><?php echo $row['filename'] ?></td>
                    <td><button class="btn btn-success btn-xs">Cargar</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Email ID</th>
            <th>Archivo</th>
                <th>Accion</th>

            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>

</div>