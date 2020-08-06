<?php
/**
 * MageTim
 *
 * @category MageTim
 * @package CreateAccount
 * @author Earl Elnar
 * @email acenplify@gmail.com
 */

namespace MageTim\CreateAccount\Observer;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Response\Http;
use Magento\Framework\App\ResponseFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\BlockFactory;
use MageTim\CreateAccount\Helper\Data;


/**
* This is the extension to redirect into thank you page of account creation
*
*/

class Register implements ObserverInterface {

    /**
     * @var ResponseFactory
     */
    protected $_responseFactory;

    /**
     * @var Http
     */
    protected $_redirect;

    /**
     * @var UrlInterface
     */
    protected $_url;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Data
     */
    protected $_helper;

    /**
     * Register constructor.
     * @param BlockFactory $blockFactory
     * @param ResponseFactory $responseFactory
     * @param UrlInterface $url
     * @param Http $redirect
     * @param Session $customerSession
     * @param Data $helper
     */
    public function __construct(
        BlockFactory $blockFactory,
        ResponseFactory $responseFactory,
        UrlInterface $url,
        Http $redirect,
        Session $customerSession,
        Data $helper
    ) {
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
        $this->_redirect = $redirect;
        $this->session = $customerSession;
        $this->_helper = $helper;
    }

    /**
     * After customer registration it will redirect to the specified custom url
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $status = $this->_helper->getisEnabled();
        if (!empty($status)) {
            $thank_you_page = $this->_helper->getCustomUrl();
            $customer = $observer->getCustomer();
            $this->session->setCustomerDataAsLoggedIn($customer);
            $customRedirectionUrl = $this->_url->getUrl($thank_you_page);
            $this->_responseFactory->create()->setRedirect($customRedirectionUrl)->sendResponse();   
            die();
        }           
    }
}