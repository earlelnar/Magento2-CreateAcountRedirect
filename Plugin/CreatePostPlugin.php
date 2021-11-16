<?php
/**
 * EE Bored in the house.
 *
 * @category    EE
 * @package     CreateAccount
 * @author      Earl Elnar
 * @email       acenplify@gmail.com
 */

namespace EE\CreateAccount\Plugin;

use Magento\Customer\Controller\Account\CreatePost;
use EE\CreateAccount\Helper\Data;
use Magento\Framework\App\ResponseFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\UrlInterface;

/**
 * Class CreatePostPlugin to redirect after registration with custom url.
 */
class CreatePostPlugin
{
    /**
     * @var \EE\CreateAccount\Helper\Data
     */
    protected $helper;

    /**
     * @var \Magento\Framework\App\ResponseFactory
     */
    protected $responseFactory;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $session;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * Class Constructor
     *
     * @param \EE\CreateAccount\Helper\Data $helper
     * @param \Magento\Framework\App\ResponseFactory $responseFactory
     * @param \Magento\Customer\Model\Session $session
     * @param \Magento\Framework\UrlInterface $url
     */
    public function __construct(
        Data $helper,
        ResponseFactory $responseFactory,
        Session $session,
        UrlInterface $url
    ) {
        $this->helper = $helper;
        $this->responseFactory = $responseFactory;
        $this->session = $session;
        $this->url = $url;
    }

    /**
     * Redirect Customers after registration with a custom url configured from the admin.
     *
     * @param CreatePost $subject
     * @param mixed $result
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterExecute(CreatePost $subject, $result)
    {
        if ($this->helper->getisEnabled()) {
            if ($this->session->isLoggedIn()) {
                if (!empty($result)) {
                    $result->setPath($this->helper->getCustomUrl());
                }
            }
        }

        return $result;
    }
}
