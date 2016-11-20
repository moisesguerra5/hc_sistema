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
                        <th> Ação </th>
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
                    <i class="icon-layers"></i> Formulário Equipamento </div>
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
                            Você tem alguns erros de formulário. Por favor verifique abaixo. 
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> 
                            A validação do formulário foi bem sucedida! 
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_id" id="eqp_id" readonly> 
                                    </div>
                                    <span class="help-block">id automático</span>
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
                                    <label class="control-label">Código Interno</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="eqp_codigoInterno" id="eqp_codigoInterno"> 
                                    </div>
                                    <span class="help-block">entre com o código interno</span>
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
                                    <label class="control-label">Data de Fabricação</label>
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
                                    <label class="control-label">Observações</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" name="eqp_observacoes" id="eqp_observacoes" rows="6"></textarea>
                                    </div>
                                    <span class="help-block">entre com as observações</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group last">
                                    <label class="control-label col-md-12">CIDs</label>
                                    <div class="col-md-12">
                                        <select multiple="multiple" class="multi-select " id="eqp_cid" name="eqp_cid[]">
                                            <optgroup label="A00 CÓLERA">
                                                <option>A00.0 - Cólera Devida a Vibrio Cholerae 01, Biótipo Cholerae</option>
                                                <option>A00.1 - Cólera Devida a Vibrio Cholerae 01, Biótipo El Tor</option>
                                                <option>A00.9 - Cólera Não Especificada</option>
                                            </optgroup>
                                            <optgroup label="A01 - FEBRES TIFÓIDE E PARATIFÓIDE">
                                                <option>A01.0 - Febre Tifóide</option>
                                                <option>A01.1 - Febre Paratifóide A</option>
                                                <option>A01.2 - Febre Paratifóide B</option>
                                                <option>A01.3 - Febre Paratifóide C</option>
                                                <option>A01.4 - Febre Paratifóide Não Especificada</option>
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
                                    <label class="control-label">Laboratório</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control autocomplete" name="eqp_laboratorio" id="eqp_laboratorio"> 
                                    </div>
                                    <span class="help-block">pesquise por um laboratório</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Tipo de Compra</label>
                                    <div class="input-icon left">
                                        <i class="fa"></i>
                                        <select class="form-control" name="eqp_tipoCompra" id="eqp_tipoCompra">
                                            <option value=""></option>
                                            <option value="1">Empréstimos</option>
                                            <option value="2">Lifecare</option>
                                            <option value="3">Retorno</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um tipo de compra</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Valor da Locação</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control real" name="eqp_valorLocacao" id="eqp_valorLocacao"> 
                                    </div>
                                    <span class="help-block">entre com o valor da locação</span>
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


