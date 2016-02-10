<?php /* Smarty version 2.6.12, created on 2015-09-14 18:06:33
         compiled from admin/usuario/senha.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Conteúdo -->
    <form name="frm_cadastro" method="POST">
	    <input type="hidden" name="acao" value="gravar" />
	    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />

	    <h1 class="titulo-pag">Alterar Senha</h1>
	    
	    <label>*Senha Atual:</label>
	    <input type="password" name="senhaatual" size="30"/>

	    <label>*Senha:</label>
	    <input type="password" name="senha" size="30" value="" />
	    
	    <label>*Repetir Senha:</label>
	    <input type="password" name="senha2" size="30" value="" />
	    
		<input name="submit" type="submit" class="btn-form top-btn" value="<?php echo $this->_tpl_vars['botao']; ?>
" onclick="return checa();" /><br>
	    <label>* Campos obrigatórios.</label>
    </form>
<!-- FIM Conteúdo -->
<?php echo '
<script>
	function checa()
	{
		frm = document.frm_cadastro;
		msg = "Preencha o campo ";
		
		if(trim(frm.senhaatual.value) == "")
		{
			alert(msg + "Senha Atual!");
			frm.senhaatual.focus();
			return false;
		}

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
		
		frm.submit();
	}
</script>
'; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>