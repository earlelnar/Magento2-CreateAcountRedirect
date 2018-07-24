# Magento2 Register Success Redirect Url
  Set Custom Url to redirect upon successful account registration to your Magento 2 site. 
  

</br>

## Installation
1. Download the extension .zip file and extract the files.
2. Copy the extension files folder to the {magento2-root-dir}/app/code
3. Run the following series of command from SSH console of your server:
```
 php -f bin/magento module:enable --clear-static-content MageTim_CreateAccount
 php -f bin/magento setup:upgrade
 php -f bin/magento setup:static-content:deploy
 php -f bin/magento cache:flush
```
4. Go to Admin > Stores > Configuration > MageTim > Create Account redirect > Configure your settings here. 
![image](https://user-images.githubusercontent.com/14094984/43121532-aa3ab4e2-8f50-11e8-914c-e1c249279760.png)

</br>

## Example
After successful registration. It was redirected to a custom thank you page.
![image](https://user-images.githubusercontent.com/14094984/43122968-6641f41c-8f55-11e8-96d4-9c6fc8277be8.png)

</br>

# For Tracking Conversions on Google Analytics
Credits to the owner of the article "Google Analytics 101: How to Track Your Conversions (Step-by-Step)". </br>
by Mary Fernandez
</br>
Here's a detailed tutorial for Google Analytics Tracking conversions step by step: 
https://optinmonster.com/google-analytics-101-how-to-track-your-conversions-step-by-step/

![image](https://user-images.githubusercontent.com/14094984/43121449-676c786c-8f50-11e8-8a74-60ac892e6ba2.png)

</br>

## Magento 2 Tested Versions
> 2.1.3
> 2.2.3

</br>

Special Thanks to these following people below:</br>
https://magento.stackexchange.com/users/35758/prince-patel <br/>
https://magento.stackexchange.com/users/4564/amit-bera
https://github.com/jakevegazzz
