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
namespace HCaptcha\Controller;

use HCaptcha\HCaptcha;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Core\Translation\Translator;

class ConfigurationController extends BaseAdminController
{
    public function viewAction()
    {
        return $this->render(
            "hcaptcha/configuration"
        );
    }

    public function saveAction()
    {
        if (null !== $response = $this->checkAuth(array(AdminResources::MODULE), 'HCaptcha', AccessManager::VIEW)) {
            return $response;
        }

        $form = $this->createForm("hcaptcha_configuration.form");

        try {
            $data = $this->validateForm($form)->getData();

            HCaptcha::setConfigValue('site_key', $data['site_key']);
            HCaptcha::setConfigValue('secret_key', $data['secret_key']);
            // HCaptcha::setConfigValue('captcha_style', $data['captcha_style']);

        } catch (\Exception $e) {
            $this->setupFormErrorContext(
                Translator::getInstance()->trans(
                    "Error",
                    [],
                    HCaptcha::DOMAIN_NAME
                ),
                $e->getMessage(),
                $form
            );
            return $this->viewAction();
        }

        return $this->generateSuccessRedirect($form);
    }
}
