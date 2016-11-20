<?php
spl_autoload_register(function($class_name) {
    $files = array('../../core/model/', '../../admin/model/');
    foreach ($files as $file) {
        if (file_exists($file . $class_name . '.php')) {
            require_once($file . $class_name . '.php');
            return;
        }
    }
});

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_MAGIC_QUOTES);

if ($action == 'list' || empty($action)) {
    ?>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase">Equipamentos cadastrados no sistema</span>
            </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="?display=equipamento&action=insert" class="btn sbold green"> Novo Equipamento
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th> Equipamento </th>
                        <th> A��o </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Cadeira de Roda </td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}

if ($action == 'insert' || $action == 'edit') {
    ?>
    <div class="tab-pane" id="tab_1">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-layers"></i> Formul�rio Equipamento </div>
                <div class="tools">
                    <!--                    <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>-->
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" id="form_equipamento" class="horizontal-form">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> 
                            Voc� tem alguns erros de formul�rio. Por favor verifique abaixo. 
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> 
                            A valida��o do formul�rio foi bem sucedida! 
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_id" id="eqp_id" readonly> 
                                    </div>
                                    <span class="help-block">id autom�tico</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Nome<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_nome" id="eqp_nome"> 
                                    </div>
                                    <span class="help-block">entre com o nome</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Fabricante</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_fabricante" id="eqp_fabricante"> 
                                    </div>
                                    <span class="help-block">entre com o fabricante</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">C�digo Interno</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_codigoInterno" id="eqp_codigoInterno"> 
                                    </div>
                                    <span class="help-block">entre com o c�digo interno</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Lote<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_lote" id="eqp_lote"> 
                                    </div>
                                    <span class="help-block">entre com o lote</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Data de Fabrica��o</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control mask_date" name="eqp_dataFabricacao" id="eqp_dataFabricacao"> 
                                    </div>
                                    <span class="help-block">dd/mm/aaaa</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Data de Vencimento</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control mask_date" name="eqp_dataVencimento" id="eqp_dataVencimento"> 
                                    </div>
                                    <span class="help-block">dd/mm/aaaa</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Observa��es</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" name="eqp_observacoes" id="eqp_observacoes" rows="6"></textarea>
                                    </div>
                                    <span class="help-block">entre com as observa��es</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group last">
                                    <label class="control-label col-md-12">CIDs</label>
                                    <div class="col-md-12">
                                        <select multiple="multiple" class="multi-select " id="eqp_cid" name="eqp_cid[]">
                                            <optgroup label="A00 C�LERA">
                                                <option>A00.0 - C�lera Devida a Vibrio Cholerae 01, Bi�tipo Cholerae</option>
                                                <option>A00.1 - C�lera Devida a Vibrio Cholerae 01, Bi�tipo El Tor</option>
                                                <option>A00.9 - C�lera N�o Especificada</option>
                                            </optgroup>
                                            <optgroup label="A01 - FEBRES TIF�IDE E PARATIF�IDE">
                                                <option>A01.0 - Febre Tif�ide</option>
                                                <option>A01.1 - Febre Paratif�ide A</option>
                                                <option>A01.2 - Febre Paratif�ide B</option>
                                                <option>A01.3 - Febre Paratif�ide C</option>
                                                <option>A01.4 - Febre Paratif�ide N�o Especificada</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Laborat�rio</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control autocomplete" name="eqp_laboratorio" id="eqp_laboratorio"> 
                                    </div>
                                    <span class="help-block">pesquise por um laborat�rio</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Tipo de Compra</label>
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <select class="form-control" name="eqp_tipoCompra" id="eqp_tipoCompra">
                                            <option value=""></option>
                                            <option value="1">Empr�stimos</option>
                                            <option value="2">Lifecare</option>
                                            <option value="3">Retorno</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um tipo de compra</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Valor da Loca��o</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control real" name="eqp_valorLocacao" id="eqp_valorLocacao"> 
                                    </div>
                                    <span class="help-block">entre com o valor da loca��o</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green"><i class="fa fa-save"></i> Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>


