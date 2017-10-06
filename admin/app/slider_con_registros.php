                                <fieldset>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Titulo: </label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="titulo" value="<?php echo $slider_encontrado->getTitulo();?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-6">
                                            <img src="img/<?php echo $slider_encontrado->getImagen();?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Actualizar imagen: </label>
                                        <div class="col-md-6">
                                            <input type="file" class="" name="imagen">
                                            <p class="note">
                                                <strong>Nota: </strong>
                                                Para una mejor visualización la imagen tiene que tener:
                                                750 largo y 500 ancho; 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Estado: </label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="estado">
                                                <?php if($slider_encontrado->getEstado() == 1) {?>
                                                <option>Activo</option>
                                                <option>Desactivo</option>
                                                <?php } else {?>
                                                <option>Desactivo</option>
                                                <option>Activo</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit" name="modificar">Modificar</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-default" type="reset">Cancelar</button>
                                        </div>
                                    </div>
                                </div>