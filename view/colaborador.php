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
    <div class="form-group mt-repeater">
        <div data-repeater-list="group-c">
            <div data-repeater-item class="mt-repeater-item">
                <div class="row mt-repeater-row">
                    <div class="col-md-8">
                        <label class="control-label">Product Variation</label>
                        <input type="text" placeholder="Salted Tuna" class="form-control" /> </div>
                    <div class="col-md-3">
                        <label class="control-label">Qty</label>
                        <input type="text" placeholder="3" class="form-control" /> </div>
                    <div class="col-md-1">
                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
            <i class="fa fa-plus"></i> Add Product Variation</a>
    </div>
    <?php
}