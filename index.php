<?php
require_once 'controllers/template.controller.php';
require_once 'controllers/users.controller.php';
require_once 'controllers/categories.controller.php';
require_once 'controllers/products.controller.php';
require_once 'controllers/customers.controller.php';
require_once 'controllers/sales_admin.controller.php';
require_once 'controllers/sales_new.controller.php';
require_once 'controllers/sales_reports.controller.php';

require_once 'models/users.model.php';
require_once 'models/categories.model.php';
require_once 'models/products.model.php';
require_once 'models/customers.model.php';
require_once 'models/sales_admin.model.php';
require_once 'models/sales_new.model.php';
require_once 'models/sales_reports.model.php';


$template = new TemplateController();
$template->ctrtemplate();

