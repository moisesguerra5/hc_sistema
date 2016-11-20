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
                <span class="caption-subject bold uppercase">Hospitais cadastrados no sistema</span>
            </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="?display=hospital&action=insert" class="btn sbold green"> Novo Hospital
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th> Hospital </th>
                        <th> Ação </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Albert Einstein </td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td> Sirio Libanes </td>
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
                    <i class="icon-layers"></i> Formulário Hospital </div>
                <div class="tools">
                    <!--                    <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>-->
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" id="form_hospital" class="horizontal-form">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_id" id="hos_id" readonly> 
                                    </div>
                                    <span class="help-block">número gerado automáticamente</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Nome<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_nome" id="hos_nome"> 
                                    </div>
                                    <span class="help-block">entre com o nome do hospital</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Contato<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_contatoHospital" id="hos_contatoHospital"> 
                                    </div>
                                    <span class="help-block">entre com o contato do hospital</span>
                                </div>
                            </div>
                        </div>
                        <legend>Telefones</legend>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Número</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control tel" name="hos_telefone" id="hos_telefone"> 
                                    </div>
                                    <span class="help-block">(xx) ?xxxx-xxxx</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Contato<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_contatoTelefone" id="hos_contatoTelefone"> 
                                    </div>
                                    <span class="help-block">entre com o contato do telefone</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Departamento<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_departamento" id="hos_departamento"> 
                                    </div>
                                    <span class="help-block">entre com o departamento</span>
                                </div>
                            </div>
                        </div>
                        <legend class="">Endereço</legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Cep<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <div class="input-group">
                                            <input type="text" class="form-control cep" name="hos_endCep" id="hos_endCep" data-end="cep"> 
                                            <span class="input-group-btn">
                                                <button class="btn green" type="button" id="search-cep"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="help-block">entre com o cep</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Logradouro<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_endLogradouro" id="hos_endLogradouro" data-end="logradouro"> 
                                    </div>
                                    <span class="help-block">entre com o endereço</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Número</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_endNumero" id="hos_endNumero" data-end="numero"> 
                                    </div>
                                    <span class="help-block">entre com o número</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Bairro<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_endBairro" id="hos_endBairro" data-end="bairro"> 
                                    </div>
                                    <span class="help-block">entre com o bairro</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Cidade<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_endCidade" id="hos_endCidade" data-end="cidade"> 
                                    </div>
                                    <span class="help-block">entre com a cidade</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Estado<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="hos_endEstado" id="hos_endEstado" data-end="estado"> 
                                    </div>
                                    <span class="help-block">entre com o estado</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Região<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select class="form-control" id="hos_endRegiao" name="hos_endRegiao">
                                            <option value=""></option>
                                            <option value="1">Zona Sul</option>
                                            <option value="2">Zona Norte</option>
                                            <option value="3">Zona Leste</option>
                                            <option value="4">Zona Oeste</option>
                                            <option value="5">Centro</option>
                                            <option value="6">Interior</option>
                                        </select>
                                    </div>
                                    <span class="help-block">escolha uma região</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Observações</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" name="con_observacoes" id="con_observacoes" rows="6"></textarea>
                                    </div>
                                    <span class="help-block">entre com as observações</span>
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


