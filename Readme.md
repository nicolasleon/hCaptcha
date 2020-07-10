# hCaptcha© module for Thelia

This module allow you to easily add hCaptcha to your forms.

## Installation

Download the module zip file to your computer. In Thelia's back office go to the module page [http://your_site.com/admin/modules](http://your_site.com/admin/modules) to install and activate the module.

## Usage

Before using this module you have to create an api key here [https://dashboard.hcaptcha.com/](https://dashboard.hcaptcha.com/).
Next configure your hCaptcha© access here [http://your_site.com/admin/module/HCaptcha](http://your_site.com/admin/module/HCaptcha) with the keys given by hCaptcha©'s dashboard page.
As of the current version only the invisible captcha is available (more information on [invisible captcha](https://docs.hcaptcha.com/invisible))

Then you'll need help from a developer to add some hooks in template and dispatch the check events, see details below.

### Hook

First if you don't have `{hook name="main.head-top"}` hook in your template you have to put this hook `{hook name="hcaptcha.js"}` in the top of your head
Then add this hook `{hook name="hcaptcha.check"}` in every form where you want to check if the user is human, directly in the form tag like this :
```
<form id="form-contact" action="{url path="/contact"}" method="post">
    // End of the form
    {hook name="hcaptcha.check"}
</form>
```

