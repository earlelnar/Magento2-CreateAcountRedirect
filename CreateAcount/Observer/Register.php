<?php

namespace MageTim\CreateAccount\Observer;

use Magento\Framework\Event\ObserverInterface;


/**
* This is the extension to redirect into thank you page of account creation
*
*/

class Register implements ObserverInterface 
{
    protected $_responseFactory;

    protected $_redirect;

    protected $_url;

    protected $session;

    public function __construct(
        \Magento\Framework\View\Element\BlockFactory $blockFactory,
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Response\Http $redirect,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
        $this->_redirect = $redirect;
        $this->session = $customerSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getCustomer();
        $this->session->setCustomerDataAsLoggedIn($customer);
        $customRedirectionUrl = $this->_url->getUrl('thank-you-account-creation');
        $this->_responseFactory->create()->setRedirect($customRedirectionUrl)->sendResponse();
        die();           
    }
}