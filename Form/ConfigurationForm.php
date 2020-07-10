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

namespace HCaptcha\Form;

use HCaptcha\HCaptcha;
use Thelia\Core\Translation\Translator;
use Thelia\Form\BaseForm;

class ConfigurationForm extends BaseForm
{
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                "site_key",
                "text",
                [
                    "data" => HCaptcha::getConfigValue("site_key"),
                    "label"=>Translator::getInstance()->trans("Site key", array(), HCaptcha::DOMAIN_NAME),
                    "label_attr" => ["for" => "site_key"],
                    "required" => true
                ]
            )
            ->add(
                "secret_key",
                "text",
                [
                    "data" => HCaptcha::getConfigValue("secret_key"),
                    "label"=>Translator::getInstance()->trans("Secret key", array(), HCaptcha::DOMAIN_NAME),
                    "label_attr" => ["for" => "secret_key"],
                    "required" => true
                ]
            );
            // ->add(
            //     "captcha_style",
            //     "choice",
            //     [
            //         "data" => HCaptcha::getConfigValue("captcha_style"),
            //         "label"=>Translator::getInstance()->trans("HCaptcha style", array(), HCaptcha::DOMAIN_NAME),
            //         "label_attr" => ["for" => "captcha_style"],
            //         "required" => true,
            //         'choices'  => [
            //             'normal'=>'Normal',
            //             'compact'=>'Compact',
            //             'invisible'=>'Invisible'
            //         ]
            //     ]
            // );
    }

    public function getName()
    {
        return "hcaptcha_configuration_form";
    }
}
