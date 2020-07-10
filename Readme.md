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


# Module hCaptcha© pout Thelia

Ce module permet de protéger vos formulaires via le service hCaptcha.

## Installation

Télécharger le fichier zip du module. Dans le backoffice de Thelia rendez vous sur la [page de gestion des modules](http://your_site.com/admin/modules) pour installer et activer le fichier téléchargé.

## Utilisation

Avant de pouvoir utiliser le module vous devez créer une clé d'API à l'adresse suivante [https://dashboard.hcaptcha.com/](https://dashboard.hcaptcha.com/).
Configurez ensuite le module avec les clés créées depuis le dashboard hCaptcha (clé de site et clé secrète) sur la page de configuration du module [http://your_site.com/admin/module/HCaptcha](http://your_site.com/admin/module/HCaptcha).

A l'heure actuelle seule la version invisible de hCaptcha est disponible (plus d'informations ici [invisible captcha](https://docs.hcaptcha.com/invisible))

### Hook

Si votre template n'inclue pas le hook `{hook name="main.head-top"}` vous devrez ajouter le hook suivant `{hook name="hcaptcha.js"}` au début de votre section `<head>`.

Ajoutez ensuite le hook `{hook name="hcaptcha.check"}` dans chacun des formulaires où vous souhaitez contrôler si l'utilisateur est humain. Le hook devra être un descent direct du formulaire comme dans le code suivant :
```
<form id="form-contact" action="{url path="/contact"}" method="post">
    // Descendant diretc de l'élément <form>
    {hook name="hcaptcha.check"}
</form>
```

