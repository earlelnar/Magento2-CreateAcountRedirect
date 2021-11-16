<?php
/**
 * EE Bored in the house.
 *
 * @category    EE
 * @package     CreateAccount
 * @author      Earl Elnar
 * @email       acenplify@gmail.com
 */

namespace EE\CreateAccount\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Data for retrieving configurations
 */
class Data extends AbstractHelper
{
    /**
     * Get the custom url path
     */
    const XML_CUSTOM_URL = 'createaccount/general/custom_url';

    /**
     * Check if module is enabled or not.
     */
    const XML_ENABLE_ME = 'createaccount/general/enable';

    /**
     * Get Custom Url from the module admin configuration
     *
     * @return mixed
     */
    public function getCustomUrl()
    {
        return $this->scopeConfig->getValue(
            self::XML_CUSTOM_URL,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check if module is enabled
     *
     * @return mixed
     */
    public function getisEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_ENABLE_ME,
            ScopeInterface::SCOPE_STORE
        );
    }
}
