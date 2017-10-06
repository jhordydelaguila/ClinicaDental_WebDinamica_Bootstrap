                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="titulo" value="<?php echo $principal->getTitulo(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">SubTitulo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="subtitulo" value="<?php echo $principal->getSubTitulo();?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Contenido</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="9" name="contenido"><?php echo $principal->getContenido();?></textarea>
                                        </div>
                                    </div>
                                </div>