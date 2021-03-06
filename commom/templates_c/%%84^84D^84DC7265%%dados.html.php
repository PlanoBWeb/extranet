<?php /* Smarty version 2.6.12, created on 2016-02-10 15:32:18
         compiled from admin/fornecedor/dados.html */ ?>
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

	    <h1 class="titulo-pag">Fornecedores</h1>

	    <label>*Fornecedor:</label>
	    <input type="text" name="fornecedor" value="<?php echo $this->_tpl_vars['dados'][0]['fornecedor']; ?>
" />
	    
	    <label>*Site:</label>
	    <input type="text" name="site" value="<?php echo $this->_tpl_vars['dados'][0]['site']; ?>
" />

	    <label>*CNPJ:</label>
	    <input type="text" name="cnpj" id="cnpj" value="<?php echo $this->_tpl_vars['dados'][0]['cnpj']; ?>
" />

	    <label>*Endereço:</label>
	    <input type="text" name="endereco" value="<?php echo $this->_tpl_vars['dados'][0]['endereco']; ?>
" />

	    <label>Complemento:</label>
	    <input type="text" name="complemento" value="<?php echo $this->_tpl_vars['dados'][0]['complemento']; ?>
" />

	    <label>CEP:</label>
	    <input type="text" name="cep" id="cep" value="<?php echo $this->_tpl_vars['dados'][0]['cep']; ?>
" />

	    <label>*Bairro:</label>
	    <input type="text" name="bairro" value="<?php echo $this->_tpl_vars['dados'][0]['bairro']; ?>
" />

	    <label>*Cidade:</label>
	    <input type="text" name="cidade" value="<?php echo $this->_tpl_vars['dados'][0]['cidade']; ?>
" />

	    <label>*Estado:</label>
	    <input type="text" name="estado" maxlength="2" value="<?php echo $this->_tpl_vars['dados'][0]['estado']; ?>
" />
	    
		<label>*DDD:</label>
	    <input type="text" maxlength="3" name="dddtel" value="<?php echo $this->_tpl_vars['dados'][0]['dddtel']; ?>
" />
	    
	    <label>*Telefone:</label>
	    <input type="text" name="tel" class="telefone" value="<?php echo $this->_tpl_vars['dados'][0]['telefone']; ?>
" />

	    <label>Serviços:</label>
        <select name="servicos">
            <option value="HM" <?php if ($this->_tpl_vars['dados'][0]['servicosSigla'] == 'HM'): ?>selected="selected"<?php endif; ?>>Hospedagem e Manutenção</option>
            <option value="PI" <?php if ($this->_tpl_vars['dados'][0]['servicosSigla'] == 'PI'): ?>selected="selected"<?php endif; ?>>PlanoBInfo</option>
            <option value="LP" <?php if ($this->_tpl_vars['dados'][0]['servicosSigla'] == 'LP'): ?>selected="selected"<?php endif; ?>>Link Patrocinado</option>
        </select>

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
			
			if(trim(frm.fornecedor.value)=="")
			{
				alert(msg + "Fornecedor!");
				frm.fornecedor.focus();
				return false;
			}
			
			if(trim(frm.site.value) == "")
			{
				alert(msg + "Site!");
				frm.site.focus();
				return false;
			}

			if(trim(frm.cnpj.value) == "")
			{
				alert(msg + "CNPJ!");
				frm.cnpj.focus();
				return false;
			}

			if(trim(frm.endereco.value) == "")
			{
				alert(msg + "Endereço!");
				frm.endereco.focus();
				return false;
			}

			if(trim(frm.bairro.value) == "")
			{
				alert(msg + "Bairro!");
				frm.bairro.focus();
				return false;
			}

			if(trim(frm.cidade.value) == "")
			{
				alert(msg + "Cidade!");
				frm.cidade.focus();
				return false;
			}

			if(trim(frm.estado.value) == "")
			{
				alert(msg + "Estado!");
				frm.estado.focus();
				return false;
			}

			if(trim(frm.tel.value) == "")
			{
				alert(msg + "Telefone!");
				frm.tel.focus();
				return false;
			}			

			frm.submit();
		}

		$(".telefone")
		.mask("9999-9999?9")
		.focusout(function (event) {  
		    var target, phone, element;  
		    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
		    phone = target.value.replace(/\\D/g, \'\');
		    element = $(target);  
		    element.unmask();  
		    if(phone.length > 10) {  
		        element.mask("99999-999?9");  
		    } else {  
		        element.mask("9999-9999?9");  
		    }  
		});

		$("#cnpj")
		.mask("99.999.999/9999-99")
		.focusout(function (event) {  
		    var target, phone, element;  
		    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
		    phone = target.value.replace(/\\D/g, \'\');
		    element = $(target);  
		    element.unmask();  
		    element.mask("99.999.999/9999-99");  
		    
		});

		$("#cep")
		.mask("99999-999")
		.focusout(function (event) {  
		    var target, phone, element;  
		    target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
		    phone = target.value.replace(/\\D/g, \'\');
		    element = $(target);  
		    element.unmask();  
		    element.mask("99999-999");  
		    
		});
	</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>