<?php /* Smarty version 2.6.12, created on 2015-09-15 12:16:29
         compiled from admin/usuario/dados.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Conteúdo -->
    <form name="frm_cadastro" method="POST">
	    <input type="hidden" name="acao" value="gravar" />
	    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />

	    <h1 class="titulo-pag">Usuarios</h1>

	    <label>*Pefil:</label>
        <select name="perfil">
            <option value="A" <?php if ($this->_tpl_vars['dados'][0]['perfil'] == 'A'): ?>selected="selected"<?php endif; ?>>Administrador</option>
            <option value="M" <?php if ($this->_tpl_vars['dados'][0]['perfil'] == 'M'): ?>selected="selected"<?php endif; ?>>Marketing</option>
            <option value="F" <?php if ($this->_tpl_vars['dados'][0]['perfil'] == 'F'): ?>selected="selected"<?php endif; ?>>Financeiro</option>
            <option value="D" <?php if ($this->_tpl_vars['dados'][0]['perfil'] == 'D'): ?>selected="selected"<?php endif; ?>>Desenvolvedor</option>
        </select>

	    <label>*Nome do usuário:</label>
	    <input type="text" name="nome" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
" />
	    
	    <label>*E-mail do usuário:</label>
	    <input type="text" name="email" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['email']; ?>
" />
	    
	    <?php if ($_GET['acao'] != editar): ?>
		    <label>*Senha:</label>
		    <input type="password" name="senha" size="30" value="<?php echo $this->_tpl_vars['dados'][0]['senha']; ?>
" />
		    
		    <label>*Repetir Senha:</label>
		    <input type="password" name="senha2" size="30" value="<?php echo $this->_tpl_vars['dados'][0]['senha']; ?>
" />
	    <?php endif; ?>
	    
		<input name="submit" type="submit" class="btn-form top-btn" value="<?php echo $this->_tpl_vars['botao']; ?>
" onclick="return checa();" /><br>
	    <label class="no-top">* Campos obrigatórios.</label>
    </form>
<!-- FIM Conteúdo -->
	<?php echo '	
		<script>

			function checa()
			{
				frm = document.frm_cadastro;
				msg = "Preencha o campo ";
				
				if(trim(frm.nome.value)=="")
				{
					alert(msg + "Nome!");
					frm.nome.focus();
					return false;
				}
				
				if(trim(frm.email.value) == "")
				{
					alert(msg + "E-mail!");
					frm.email.focus();
					return false;
				}
				
				if(!email(frm.email, \'E-mail inválido!\'))
					return false;

				if(!frm.id.value){
					if(trim(frm.senha.value) == "")
					{
						alert(msg + "Senha!");
						frm.senha.focus();
						return false;
					}
					
					if(trim(frm.senha2.value) == "")
					{
						alert(msg + "Repetir Senha!");
						frm.senha2.focus();
						return false;
					}
					
					if(trim(frm.senha.value) != trim(frm.senha2.value))
					{
						alert("As senhas estão diferentes!");
						return false;
					}
				} 

				frm.submit();
			}
		</script>
	'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>