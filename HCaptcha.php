<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) Omnitic                                                        */
/*      email : nicolas@omnitic.com                                                  */
/*      web : http://www.omnitic.com                                                 */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace HCaptcha;

use Thelia\Core\Template\TemplateDefinition;
use Thelia\Module\BaseModule;

class HCaptcha extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'hcaptcha';

    /*
     * You may now override BaseModuleInterface methods, such as:
     * install, destroy, preActivation, postActivation, preDeactivation, postDeactivation
     *
     * Have fun !
     */

    public function getHooks()
    {
        return [
            [
                "type" => TemplateDefinition::FRONT_OFFICE,
                "code" => "hcaptcha.js",
                "title" => [
                    "en_US" => "hCaptcha JS lib",
                    "fr_FR" => "Librairie Javascript hCaptcha",
                ],
                "block" => false,
                "active" => true,
            ],
            [
                "type" => TemplateDefinition::FRONT_OFFICE,
                "code" => "hcaptcha.check",
                "title" => [
                    "en_US" => "hCaptcha spam protection",
                    "fr_FR" => "Protection anti spam hCaptcha",
                ],
                "block" => false,
                "active" => true,
            ],
        ];
    }
}
