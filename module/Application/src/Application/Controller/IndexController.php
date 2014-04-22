<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tweet\Service\TweetService;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $content = "Event Manager Example";
        //$this->getEventManager()->trigger('sendTweet', null, array('content' => $content));
        $tweetService = new TweetService();
        $tweetService->sendTweet($content);
        return new ViewModel();
    }
}
