						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombre" name="nombre" <?php $validador_mensaje->mostrar_nombre();?> >
							<?php $validador_mensaje->mostrar_error_nombre();?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Telefono" name="telefono" <?php $validador_mensaje->mostrar_telefono();?> maxlength="9" >
							<?php $validador_mensaje->mostrar_error_telefono();?>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Correo electronico" name="email" <?php $validador_mensaje->mostrar_email();?> >
							<?php $validador_mensaje->mostrar_error_email();?>
						</div>
						<div class="form-group">
							<textarea class="form-control" rows=5 placeholder="Mensaje" name="mensaje" <?php $validador_mensaje->mostrar_mensaje();?> ></textarea>
							<?php $validador_mensaje->mostrar_error_mensaje();?>
						</div>
						<div class="form-group">
							<label >Cuanto es 2 + dos</label>
							<input type="text" class="form-control" placeholder="Resultado" name="captcha">
							<?php $validador_mensaje->mostrar_error_captcha();?>
						</div>
						<div class="form-actions">
							<input class="btn btn-default" type="submit" value="Enviar" name="enviar">
							<input class="btn btn-default" type="reset" value="Borrar">
						</div>