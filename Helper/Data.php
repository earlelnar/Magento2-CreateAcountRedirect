<?php
namespace MageTim\CreateAccount\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

	const XML_CUSTOM_URL = 'createaccount/general/custom_url';

	public function getCustomUrl() {
		return $this->scopeConfig->getValue(
			self::XML_CUSTOM_URL,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
}

