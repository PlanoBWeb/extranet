<?php /* Smarty version 2.6.12, created on 2015-06-03 18:23:20
         compiled from admin/distribuidor/dados.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/topo.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>

	function checa()
	{
		frm = document.frm_cadastro;
		msg = "Preencha o campo ";
		
		if(trim(frm.nome.value) == "")
		{
			alert(msg + "Nome do estabelecimento!");
			frm.nome.focus();
			return false;
		}
				
		// if(trim(frm.email.value) == "")
		// {
		// 	alert(msg + "Login de acesso!");
		// 	frm.email.focus();
		// 	return false;
		// }
		
		// if(!email(frm.email, \'Login de acesso inválido!\'))
		// 	return false;
		
		// if(trim(frm.senha.value) == "")
		// {
		// 	alert(msg + "Senha!");
		// 	frm.senha.focus();
		// 	return false;
		// }
		
		// if(trim(frm.senha2.value) == "")
		// {
		// 	alert(msg + "Repetir Senha!");
		// 	frm.senha2.focus();
		// 	return false;
		// }
		
		// if(trim(frm.senha.value) != trim(frm.senha2.value))
		// {
		// 	alert("As senhas estão diferentes!");
		// 	return false;
		// }
		
		return true;
	}

    function validaTipo()
    {
        obj = document.getElementById("idPais").value;
        
        if(obj == 1)
        {
            document.getElementById("divUfCidade").style.display=\'block\';
        }else{
            document.getElementById("divUfCidade").style.display=\'none\';
            document.getElementById("onde-estado").selectedIndex=0;
            document.getElementById("onde-cidade").selectedIndex=0;
        }
    }

</script>
'; ?>


<!-- Conteúdo -->
    <form class="form-admin" name="frm_cadastro" onsubmit="return checa()" method="POST">
    <p class="texto">CADASTRO DE DISTRIBUIDOR</p>

    <input type="hidden" name="acao" value="gravar" />
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['dados'][0]['id']; ?>
" />
        <!-- <td><strong>DADOS CADASTRAIS</strong></td> -->
    <label>Visível:</label>
    <select name="visivel">
            <option value="1" <?php if ($this->_tpl_vars['dados'][0]['visivel'] == 1): ?>selected="selected"<?php endif; ?>>Sim</option>
            <option value="0" <?php if ($this->_tpl_vars['dados'][0]['visivel'] == 0): ?>selected="selected"<?php endif; ?>>Não</option>
    </select>

    <label>*Nome do estabelecimento:</label>
    <input type="text" name="nome" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['nome']; ?>
" />
    
    <label>Nome do contato:</label>
    <input type="text" name="contato" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['contato']; ?>
" />
    
    <label>E-mail:</label>
    <input type="text" name="email_contato" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['email_contato']; ?>
" />
    
    <label>Site:</label>
    <input type="text" name="endereco" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['endereco']; ?>
" />

    <label>Pais:</label>
    <select name="idPais" id='idPais' class="cidade default-seleciona" onchange="validaTipo()">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dadosPais']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <option value="<?php echo $this->_tpl_vars['dadosPais'][$this->_sections['i']['index']]['id']; ?>
" <?php if ($this->_tpl_vars['dados'][0]['idPais'] == $this->_tpl_vars['dadosPais'][$this->_sections['i']['index']]['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['dadosPais'][$this->_sections['i']['index']]['nome']; ?>
</option>
        <?php endfor; endif; ?>
    </select>
     
        <div id='divUfCidade' style='display:block'>

            <label>Estado:</label>
            <select id="onde-estado" name="estado" class="formu">
                <option value="">Selecione</option>
                <option value="AC" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'AC'): ?>selected="selected"<?php endif; ?>>Acre</option>
                <option value="AL" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'AL'): ?>selected="selected"<?php endif; ?>>Alagoas</option>
                <option value="AP" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'AP'): ?>selected="selected"<?php endif; ?>>Amapá</option>
                <option value="AM" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'AM'): ?>selected="selected"<?php endif; ?>>Amazonas</option>
                <option value="BA" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'BA'): ?>selected="selected"<?php endif; ?>>Bahia</option>
                <option value="CE" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'CE'): ?>selected="selected"<?php endif; ?>>Ceará</option>
                <option value="DF" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'DF'): ?>selected="selected"<?php endif; ?>>Distrito Federal</option>
                <option value="ES" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'ES'): ?>selected="selected"<?php endif; ?>>Espírito Santo</option>
                <option value="GO" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'GO'): ?>selected="selected"<?php endif; ?>>Goiás</option>
                <option value="MA" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'MA'): ?>selected="selected"<?php endif; ?>>Maranhão</option>
                <option value="MT" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'MT'): ?>selected="selected"<?php endif; ?>>Mato Grosso</option>
                <option value="MS" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'MS'): ?>selected="selected"<?php endif; ?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'MG'): ?>selected="selected"<?php endif; ?>>Minas Gerais</option>
                <option value="PA" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'PA'): ?>selected="selected"<?php endif; ?>>Pará</option>
                <option value="PB" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'PB'): ?>selected="selected"<?php endif; ?>>Paraíba</option>
                <option value="PR" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'PR'): ?>selected="selected"<?php endif; ?>>Paraná</option>
                <option value="PE" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'PE'): ?>selected="selected"<?php endif; ?>>Pernambuco</option>
                <option value="PI" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'PI'): ?>selected="selected"<?php endif; ?>>Piauí</option>
                <option value="RJ" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'RJ'): ?>selected="selected"<?php endif; ?>>Rio de Janeiro</option>
                <option value="RN" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'RN'): ?>selected="selected"<?php endif; ?>>Rio Grande do Norte</option>
                <option value="RS" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'RS'): ?>selected="selected"<?php endif; ?>>Rio Grande do Sul</option>
                <option value="RO" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'RO'): ?>selected="selected"<?php endif; ?>>Rondônia</option>
                <option value="RR" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'RR'): ?>selected="selected"<?php endif; ?>>Roraima</option>
                <option value="SC" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'SC'): ?>selected="selected"<?php endif; ?>>Santa Catarina</option>
                <option value="SP" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'SP'): ?>selected="selected"<?php endif; ?>>São Paulo</option>
                <option value="SE" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'SE'): ?>selected="selected"<?php endif; ?>>Sergipe</option>
                <option value="TO" <?php if ($this->_tpl_vars['dados'][0]['estado'] == 'TO'): ?>selected="selected"<?php endif; ?>>Tocantins</option>
            </select>

            <label>Cidade:</label>
            <select id="onde-cidade" name="dados-cidade" class="cidade default-seleciona">
                <option><?php if ($this->_tpl_vars['dados'][0]['nmCidade']):  echo $this->_tpl_vars['dados'][0]['nmCidade'];  else: ?>Selecione o estado<?php endif; ?></option>
            </select>
        </div>        

        <label>Endereço:</label>
        <input type="text" name="endereco_fisico" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['endereco_fisico']; ?>
" />
    
        <label>Número:</label>
        <input type="text" name="numero" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['numero']; ?>
" />
    
        <label>CEP:</label>
        <input type="text" name="cep" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['cep']; ?>
" />
    
        <label>Telefone:</label>
        <input type="text" name="ddd_telefone" class="formu ddd" size="5" value="<?php echo $this->_tpl_vars['dados'][0]['ddd_telefone']; ?>
" />  

        <input type="text" name="telefone" class="formu telefone" size="20" value="<?php echo $this->_tpl_vars['dados'][0]['telefone']; ?>
" />
    
        <label>Celular:</label>
        <input type="text" name="ddd_celular" class="formu ddd" size="5" value="<?php echo $this->_tpl_vars['dados'][0]['ddd_celular']; ?>
" />  

        <input type="text" name="celular" class="formu telefone" size="20" value="<?php echo $this->_tpl_vars['dados'][0]['celular']; ?>
" />
    
        <!-- <input type="checkbox" name="comunicacao" class="formu" />  
        Desejo receber comunicação da Chamex -->
    
    
    
    
        <br/><br/><p class="texto">DADOS DE ACESSO</p>
        
        <label>Login de acesso (e-mail):</td>
        <input type="text" name="email" class="formu" size="50" value="<?php echo $this->_tpl_vars['dados'][0]['email']; ?>
" />
    
        <label>Senha:</label>
        <input type="password" name="senha" class="formu" size="30" value="<?php echo $this->_tpl_vars['dados'][0]['senha']; ?>
" />
    
        <label>Repetir Senha:</label>
        <input type="password" name="senha2" class="formu" size="30" value="<?php echo $this->_tpl_vars['dados'][0]['senha']; ?>
" />
    

        <input name="submit" type="submit" class="botao" value="<?php echo $this->_tpl_vars['botao']; ?>
" />
        <label class="no-top">* Campos obrigatórios.</label>
    </form>
<!-- FIM Conteúdo -->

<?php echo '
<script src="theme/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#onde-estado").change(function(){
           $.ajax({
             type: "POST",
             url: "select-cidades.php",
             data: {ondeestado: $("#onde-estado").val()},
             dataType: "json",
             success: function(json){
                var options = "";
                $.each(json, function(key, value){
                   options += \'<option value="\' + key + \'">\' + value + \'</option>\';
                });
                $("#onde-cidade").html(options);
             }
          });
        });
    });
    // carrega cidades onde encontrar
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/rodape.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>