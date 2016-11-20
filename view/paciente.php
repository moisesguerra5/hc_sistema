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
                <span class="caption-subject bold uppercase">Pacientes cadastrados no sistema</span>
            </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="?display=paciente&action=insert" class="btn sbold green"> Novo Paciente
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th> Nome </th>
                        <th> Status </th>
                        <th> Ação </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Paciente Sistema </td>
                        <td> <i class="fa fa-check"></i> </td>
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
                    <i class="icon-layers"></i> Formulário Paciente </div>
                <div class="tools">
                    <!--                    <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>-->
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" id="form_paciente" class="horizontal-form">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! 
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Número</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_numero" id="pac_numero" readonly> 
                                    </div>
                                    <span class="help-block">número gerado automáticamente</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Nome Completo <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_nome" id="pac_nome"> 
                                    </div>
                                    <span class="help-block">entre com o nome completo</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Data de Nascimento <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control mask_date" name="pac_dataNascimento" id="pac_dataNascimento"> 
                                    </div>
                                    <span class="help-block">dd/mm/aaaa</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Número da Carteirinha <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_numeroCarteirinha" id="pac_numeroCarteirinha"> 
                                    </div>
                                    <span class="help-block">entre com o número da carteirinha</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Sexo <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select name="pac_sexo" id="pac_sexo" class="form-control">
                                            <option value=""></option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                            <option value="3">Indefinido</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um sexo</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cuidador 1</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_cuidador1" id="pac_cuidador1"> 
                                    </div>
                                    <span class="help-block">entre com o nome do cuidador 1</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cuidador 2</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_cuidador2" id="pac_cuidador2"> 
                                    </div>
                                    <span class="help-block">entre com o nome do cuidador 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Cliente <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select name="pac_cliente" id="pac_cliente" class="form-control">
                                            <option value=""></option>
                                            <option value="1">Porto Seguro</option>
                                            <option value="2">Amil Blue Life</option>
                                            <option value="3">Home Life</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um cliente</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Convênio <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select name="pac_convenio" id="pac_convenio" class="form-control">
                                            <option value=""></option>
                                            <option value="1">Alianz</option>
                                            <option value="2">CABESP</option>
                                            <option value="3">Intermédica</option>
                                            <option value="4">Prodesp</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um convênio</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Data de Cadastro <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control mask_date" name="pac_dataCadastro" id="pac_dataCadastro"> 
                                    </div>
                                    <span class="help-block">dd/mm/aaaa</span>
                                </div>
                            </div>
                        </div>
                        <legend>Plano Terapêutico</legend>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Status <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select name="pac_status" id="pac_status" class="form-control">
                                            <option value=""></option>
                                            <option value="1">Ativo</option>
                                            <option value="2">Readmissão</option>
                                            <option value="3">Hospitalizado</option>
                                            <option value="3">Óbito</option>
                                            <option value="3">Encerrado</option>
                                            <option value="3">Alta</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um status</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Data do Status <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control mask_date" name="pac_dataStatus" id="pac_dataStatus"> 
                                    </div>
                                    <span class="help-block">dd/mm/aaaa</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Sessões Diarias <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <select class="form-control" id="pac_sessoesDiarias" name="pac_sessoesDiarias">
                                            <option value=""></option>
                                            <option value="1">1x por semana</option>
                                            <option value="2">2x por semana</option>
                                            <option value="3">3x por semana</option>
                                            <option value="4">4x por semana</option>
                                            <option value="5">5x por semana</option>
                                            <option value="6">6x por semana</option>
                                            <option value="7">7x por semana</option>
                                            <option value="8">Quinzenal</option>
                                            <option value="9">Mensal</option>
                                        </select>
                                    </div>
                                    <span class="help-block">selecione um status</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Motivo da Mudança <span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="pac_motivoStatus" id="pac_motivoStatus"> 
                                    </div>
                                    <span class="help-block">entre com o motivo da mudança</span>
                                </div>
                            </div>
                        </div>
                        <legend>Telefones</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-repeater">
                                    <div data-repeater-list="telefones">
                                        <div data-repeater-item class="mt-repeater-item">
                                            <div class="row mt-repeater-row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Número <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="tel_numero" id="tel_numero"> 
                                                        </div>
                                                        <span class="help-block">entre com o número</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Contato <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="tel_contato" id="tel_contato"> 
                                                        </div>
                                                        <span class="help-block">entre com o contato</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Departamento <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" id="tel_departamento" name="tel_departamento">
                                                                <option value=""></option>
                                                                <option value="1">RH</option>
                                                                <option value="2">Suporte</option>
                                                                <option value="3">Administrativo</option>
                                                            </select>
                                                        </div>
                                                        <span class="help-block">eselecione um departamento</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                        <i class="fa fa-plus"></i> Add telefone</a>
                                </div>
                            </div>
                        </div>
                        <legend>Emails</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-repeater">
                                    <div data-repeater-list="emails">
                                        <div data-repeater-item class="mt-repeater-item">
                                            <div class="row mt-repeater-row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Email <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="email" class="form-control" name="mail_email" id="mail_email"> 
                                                        </div>
                                                        <span class="help-block">entre com um email válido</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Contato <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="mail_contato" id="mail_contato"> 
                                                        </div>
                                                        <span class="help-block">entre com o contato</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Departamento <span class="required"> * </span></label>
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <select class="form-control" id="mail_departamento" name="mail_departamento">
                                                                <option value=""></option>
                                                                <option value="1">RH</option>
                                                                <option value="2">Suporte</option>
                                                                <option value="3">Administrativo</option>
                                                            </select>
                                                        </div>
                                                        <span class="help-block">eselecione um departamento</span>
                                                    </div>   
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                        <i class="fa fa-plus"></i> Add email</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group last">
                                    <label class="control-label col-md-3">Grouped Options</label>
                                    <div class="col-md-9">
                                        <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]">
                                            <optgroup label="NFC EAST">
                                                <option>Dallas Cowboys</option>
                                                <option>New York Giants</option>
                                                <option>Philadelphia Eagles</option>
                                                <option>Washington Redskins</option>
                                            </optgroup>
                                            <optgroup label="NFC NORTH">
                                                <option>Chicago Bears</option>
                                                <option>Detroit Lions</option>
                                                <option>Green Bay Packers</option>
                                                <option>Minnesota Vikings</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
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


