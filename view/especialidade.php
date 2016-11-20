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
                <span class="caption-subject bold uppercase">Especialidades cadastrados no sistema</span>
            </div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="?display=especialidade&action=insert" class="btn sbold green"> Nova Especialidade
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th> Especialidade </th>
                        <th> A��o </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Fonoaudiologia </td>
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
                    <i class="icon-layers"></i> Formul�rio Especialidade </div>
                <div class="tools">
                    <!--                    <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>-->
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" id="form_especialidade" class="horizontal-form">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="esp_id" id="esp_id" readonly> 
                                    </div>
                                    <span class="help-block">n�mero gerado autom�ticamente</span>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Nome<span class="required"> * </span></label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="esp_nome" id="esp_nome"> 
                                    </div>
                                    <span class="help-block">entre com o nome</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Observa��es</label>
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <textarea class="form-control" name="esp_observacoes" id="esp_observacoes" rows="6"></textarea>
                                    </div>
                                    <span class="help-block">entre com as observa��es</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group last">
                                    <label class="control-label col-md-12">CIDs</label>
                                    <div class="col-md-12">
                                        <select multiple="multiple" class="multi-select " id="esp_cid" name="esp_cid[]">
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


