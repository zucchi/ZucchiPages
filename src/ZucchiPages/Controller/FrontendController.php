<?php
/**
 * Zucchi (http://zucchi.co.uk/)
 *
 * @link      http://github.com/zucchi/ for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zucchi Limited (http://zucchi.co.uk)
 * @license   http://zucchi.co.uk/legals/bsd-license New BSD License
 */
namespace ZucchiPages\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zucchi\Controller\AbstractController;
use Zucchi\Debug\Debug;

class FrontendController extends AbstractController
{
    public function indexAction()
    {
        $event      = $this->getEvent();
        $routeMatch = $event->getRouteMatch();
        Debug::dump($routeMatch->getParam('slug'), 'SLUG');
        Debug::dump($routeMatch->getParam('format'), 'FORMAT');
        
        return $this->loadView('zucchi-pages/page');
    }
}
