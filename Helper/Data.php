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

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper {

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
			ScopeInterface::SCOPE_STORE
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
			ScopeInterface::SCOPE_STORE
		);
	}
}

