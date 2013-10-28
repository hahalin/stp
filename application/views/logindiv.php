<div id="logindiv" class="rborder8">
				<?php echo form_open('login/login_user') ?>
					<div class="modal-header">
						<h3> Login </h3>
					</div>
					<div class="modal-body">
					
					<div class="controlgroup">
						<label class="cotrol-label"> 帳號</label>
						<div class="controls">
							<input type="text" id="userid" name="userid" class="span2" />
						</div>
					</div>
					<div class="controlgroup">
						<label class="cotrol-label"> 密碼</label>
						<div class="controls">
							<input type="password" id="pwd" name="pwd" />
								</div>
							</input>
						</div>
					</div>
					<div class="login-button">
					<!--<button class="logbtn btn-primary" id="btnlogin" type="button">
					Login
					</button>
					-->
					<div class="btn-group btn-group-vertical">
					<button class="btn btn-primary" type="submit">登入</button>
					<!--<button class="btn " type="submit"></button>-->
						
					</div>
					</br></br>
					<a href='auth/register' ><span>註冊會員</span></a>
					<!--
					<div class="controls">
					</div>
					-->
					</div>
				</form>
</div>
			