<?php
/*************************************************************************************/
/*      This file is part of the Maintenance module.                                 */
/*                                                                                   */
/*      Copyright (c) Omnitic                                                        */
/*      email : nicolas@omnitic.com                                                  */
/*      web : http://www.omnitic.com                                                 */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*      along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/

namespace HCaptcha\Hook;

use HCaptcha\HCaptcha;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Core\Translation\Translator;

class FrontHook extends BaseHook
{
    public function onHCaptchaWidget(HookRenderEvent $event)
    {
        $siteKey = HCaptcha::getConfigValue('site_key');

        $event->add('
        	<div class="h-captcha-notice">' . Translator::getInstance()->trans("This form is protected by hCaptcha.", [], HCaptcha::DOMAIN_NAME) .' ' .
        		Translator::getInstance()->trans('<a href="https://hcaptcha.com/privacy">Privacy policies</a> and <a href="https://hcaptcha.com/terms">terms</a> apply', [], HCaptcha::DOMAIN_NAME) .'
   			</div>
        	<div id="hcaptcha" class="h-captcha" data-sitekey="' . $siteKey .'" data-callback="onSubmit" data-size="invisible"></div>
        	'
        );
    }
}
