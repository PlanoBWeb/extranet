<?php /* Smarty version 2.6.12, created on 2016-02-05 14:09:40
         compiled from admin/fornecedor/dados-contato.html */ ?>
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
	    <input type="hidden" name="idfornecedor" value="<?php echo $this->_tpl_vars['dados'][0]['idfornecedor']; ?>
" />

	    <h1 class="titulo-pag">Fornecedores</h1>
 
	    <label>Fornecedores:</label>
        <select name="cliente">
        	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dadosCliente']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            	<option value="<?php echo $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['dados'][0]['idfornecedor'] == $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['dadosCliente'][$this->_sections['i']['index']]['fornecedor']; ?>
</option>
            <?php endfor; endif; ?>
        </select>

	    <label>*Nome:</label>
	    <input type="text" name="nome" value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
" />

	    <label>*E-mail:</label>
	    <input type="text" name="email" value="<?php echo $this->_tpl_vars['dados'][0]['email']; ?>
" />

	    <label>*DDD:</label>
	    <input type="text" maxlength="3" name="dddtel" value="<?php echo $this->_tpl_vars['dados'][0]['dddtel']; ?>
" />

	    <label>*Telefone:</label>
	    <input type="text" name="telefone" class="telefone" value="<?php echo $this->_tpl_vars['dados'][0]['telefone']; ?>
" />

	    <label>*DDD:</label>
	    <input type="text" maxlength="3" name="dddcel" value="<?php echo $this->_tpl_vars['dados'][0]['dddcel']; ?>
" />

	    <label>*Celular:</label>
	    <input type="text" name="celular" class="telefone" value="<?php echo $this->_tpl_vars['dados'][0]['celular']; ?>
" />

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
				alert(msg + "Email!");
				frm.email.focus();
				return false;
			}

			if(trim(frm.dddtel.value) == "")
			{
				alert(msg + "DDD TELEFONE!");
				frm.dddtel.focus();
				return false;
			}

			if(trim(frm.telefone.value) == "")
			{
				alert(msg + "Telefone!");
				frm.telefone.focus();
				return false;
			}

			if(trim(frm.dddcel.value) == "")
			{
				alert(msg + "DDD CELULAR!");
				frm.dddcel.focus();
				return false;
			}

			if(trim(frm.celular.value) == "")
			{
				alert(msg + "Celular!");
				frm.celular.focus();
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
	</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>