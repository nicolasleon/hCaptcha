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

namespace HCaptcha\EventListener;

use HCaptcha\HCaptcha;
// use BackOfficePath\BackOfficePath;
// use PageCache\Controller\PageCacheController;
// use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
// use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
// use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
// use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\RedirectResponse;


// use Thelia\Core\HttpKernel\Exception\RedirectException;
// use Thelia\Model\ConfigQuery;
// use Thelia\Model\ModuleQuery;
use Thelia\Tools\URL;

/**
 * Class PageCacheListener
 * @package PageCache\EventListener
 * @author Nicolas Léon <nicolas@omnitic.com>
 */
class CaptchaListener implements EventSubscriberInterface
{

    /**
     * PageCacheListener constructor.
     *
     * @param $debugMode
     */
    // public function __construct()
    // {

    //     $this->debugMode = true;
    // }


    /*
     * Handle the cached page display
     *
     * @params FilterResponseEvent $event
     *
     */
    public function checkCaptcha(KernelEvent $event)
    {
        $request = $event->getRequest();

        // Apply only if request has a hCaptcha var
        // Verify on the server side
        // echo '<pre>';
        // echo $request->headers->get('referer');
        // die();
        if ($request->get('g-recaptcha-response')) {
            $data = [
                'secret' => HCaptcha::getConfigValue('secret_key'),
                'response' => $request->get('g-recaptcha-response')
            ];

            //
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://hcaptcha.com/siteverify');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

            // Receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = json_decode(curl_exec($ch));

            curl_close($ch);

            // echo '<pre>';
            // var_dump($response);
            if ($response->success == false) {
                // Return to the form
                return new RedirectResponse($request->headers->get('referer'));
            }
        }
        // die();
    }


    /**
     * Returns an array of event names this subscriber wants to listen to.
     */
    public static function getSubscribedEvents()
    {
        return array(
            // KernelEvents::REQUEST => ["checkCaptcha", 250],
            // KernelEvents::RESPONSE => ["checkCaptcha", 250],
            // KernelEvents::RESPONSE => ["createCachedView", 128],
        );
    }
}
