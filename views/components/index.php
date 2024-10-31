<?php include 'views/layout/header.php'; ?>
<div class="main-content">
    <div class="d-flex align-items-center mb-3">
        <h2 class="mr-2">Denuncias</h2>
        <a href="?action=create" class="btn btn-nuevo"><i class="fas fa-plus"></i> Nuevo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <form action="index.php" method="GET" class="form-inline">
                    <input type="hidden" name="action" value="search">
                    <div class="input-group w-100">
                        <input type="text" name="keyword" class="form-control" placeholder="Buscar..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Ubicación</th>
                            <th>Ciudadano</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $isGray = false;
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)):
                            $rowClass = $isGray ? 'bg-light' : '';
                            $isGray = !$isGray;
                        ?>
                            <tr class="<?php echo $rowClass; ?>">
                                <td>
                                    <div class="action-buttons">
                                        <a href="?action=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="openDeleteModal(<?php echo $row['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                                <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                                <td><?php echo htmlspecialchars($row['ubicacion']); ?></td>
                                <td><?php echo htmlspecialchars($row['ciudadano']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['fecha'])); ?></td>
                                <td>
                                    <span class="status-<?php echo strtolower(str_replace(' ', '', $row['estado'])); ?>">
                                        <?php echo $row['estado']; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar registro</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Deseas eliminar este registro?
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-light border border-gray" data-dismiss="modal">Cerrar</button>
                <a href="#" id="confirmDeleteBtn" class="btn btn-outline-light border border-gray">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        document.getElementById('confirmDeleteBtn').href = "?action=delete&id=" + id;
        $('#deleteModal').modal('show');
    }
</script>

<?php include 'views/layout/footer.php'; ?>