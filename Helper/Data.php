<?php
namespace MageTim\CreateAccount\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {

	const XML_CUSTOM_URL = 'createaccount/general/custom_url';
	const XML_ENABLE_ME = 'createaccount/general/enable';

	public function getCustomUrl() {
		return $this->scopeConfig->getValue(
			self::XML_CUSTOM_URL,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}

	public function getisEnabled() {
		return $this->scopeConfig->getValue(
			self::XML_ENABLE_ME,
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
}

