<?php include 'views/layout/header.php'; ?>

<div class="modal show" style="display: block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Reporte de Denuncia</h5>
                <a href="index.php" class="close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form action="?action=create" method="POST">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="Ingrese ID" disabled>
                    </div>
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" placeholder="Ingrese título" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control" placeholder="Ingrese descripción" required rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" name="ubicacion" class="form-control" placeholder="Ingrese ubicación (ej. coordenadas o dirección)" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudadano</label>
                                <input type="text" name="ciudadano" class="form-control" placeholder="Ingrese nombre del ciudadano" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En proceso">En proceso</option>
                                    <option value="Resuelto">Resuelto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-secondary">Cerrar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>