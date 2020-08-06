<?php
/**
 * MageTim
 *
 * @category MageTim
 * @package CreateAccount
 * @author Earl Elnar
 * @email acenplify@gmail.com
 */

namespace MageTim\CreateAccount\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    /**
     * Constants
     */
	const XML_CUSTOM_URL = 'createaccount/general/custom_url';
	const XML_ENABLE_ME = 'createaccount/general/enable';

    /**
     * Get Custom Url from the module admin configuration
     *
     * @return mixed
     */
	public function getCustomUrl() {
		return $this->scopeConfig->getValue(
			self::XML_CUSTOM_URL,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}

    /**
     * Check if module is enabled
     *
     * @return mixed
     */
	public function getisEnabled() {
		return $this->scopeConfig->getValue(
			self::XML_ENABLE_ME,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
}

