<?php include 'views/layout/header.php'; ?>

<div class="modal show" style="display: block; background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Reporte de Denuncia</h5>
                <a href="index.php" class="close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form action="?action=edit&id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" value="<?php echo $_GET['id']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo htmlspecialchars($complaint->titulo); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="descripcion" class="form-control" required rows="4"><?php echo htmlspecialchars($complaint->descripcion); ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($complaint->ubicacion); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudadano</label>
                                <input type="text" name="ciudadano" class="form-control" value="<?php echo htmlspecialchars($complaint->ciudadano); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" class="form-control" value="<?php echo $complaint->fecha; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option value="Pendiente" <?php echo ($complaint->estado === 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                    <option value="En proceso" <?php echo ($complaint->estado === 'En proceso') ? 'selected' : ''; ?>>En proceso</option>
                                    <option value="Resuelto" <?php echo ($complaint->estado === 'Resuelto') ? 'selected' : ''; ?>>Resuelto</option>
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