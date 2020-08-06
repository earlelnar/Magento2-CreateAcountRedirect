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

use Magento\Framework\Event\ObserverInterface;


/**
* This is the extension to redirect into thank you page of account creation
*
*/

class Register implements ObserverInterface {

    /**
     * @var \Magento\Framework\App\ResponseFactory
     */
    protected $_responseFactory;

    /**
     * @var \Magento\Framework\App\Response\Http
     */
    protected $_redirect;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_url;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $session;

    /**
     * @var \MageTim\CreateAccount\Helper\Data
     */
    protected $_helper;

    /**
     * Register constructor.
     * @param \Magento\Framework\View\Element\BlockFactory $blockFactory
     * @param \Magento\Framework\App\ResponseFactory $responseFactory
     * @param \Magento\Framework\UrlInterface $url
     * @param \Magento\Framework\App\Response\Http $redirect
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \MageTim\CreateAccount\Helper\Data $helper
     */
    public function __construct(
        \Magento\Framework\View\Element\BlockFactory $blockFactory,
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\Response\Http $redirect,
        \Magento\Customer\Model\Session $customerSession,
        \MageTim\CreateAccount\Helper\Data $helper
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
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
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