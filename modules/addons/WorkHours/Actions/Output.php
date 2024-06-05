<?php

namespace WorkHours\Actions;

use WorkHours\Controllers\IndexController;
use WHMCS\Database\Capsule;
use WorkHours\Models\Setting;

/**
 *
 */
class Output implements ActionInterface
{
    /**
     * @var \Smarty
     */
    protected \Smarty $smarty;
    /**
     * @var array
     */
    protected array $params;
    /**
     * @var int
     */
    protected int $adminId;

    /**
     * @param \Smarty $smarty
     * @param array $params
     * @param int $adminId
     */
    public function __construct(\Smarty $smarty, array $params, int $adminId)
    {
        $this->smarty = $smarty;
        $this->params = $params;
        $this->adminId = $adminId;
    }

    /**
     * @return void
     */
    public function execute() :void
    {
        $controller = 'WorkHours\\Controllers\\' . $_GET['controller'];
        $action = $_GET['action'];

        $controllerResults = null;

        if(is_callable([$controller, $action]))
        {
            $controllerInstance = new $controller($this->params, $this->adminId);
            $controllerResults = $controllerInstance->$action();
        }
        else
        {
            $controllerInstance = new IndexController($this->params, $this->adminId);
            $controllerResults = $controllerInstance->index();
        }

        $template = $controllerResults['template'];
        $templateParams = $controllerResults['templateParams'];

        $systemUrl = Setting::getSystemURL();
        $this->smarty->assign('systemUrl', $systemUrl);
        $this->smarty->assign('addonUrl', 'addonmodules.php?module=WorkHours');
        $this->smarty->assign('WorkHoursParams', $templateParams);
        $this->smarty->caching = false;
        $this->smarty->compile_dir = $GLOBALS['templates_compiledir'];
        $this->smarty->display(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Templates" . DIRECTORY_SEPARATOR . $template . ".tpl");
    }
}