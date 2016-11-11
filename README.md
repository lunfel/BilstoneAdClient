Basic Usage
===

Add these lines to your composer.json. This will ensure your are able to fetch the client from Github.
```
"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:bilstone/bilstoneadclient.git"
        }
    ]
```

In command line at the root of your project run. This will download the client app as a dependency to your project.
```
composer require bilstone/ad-client
```

PHP

You may fetch multiple slot sequentially if needed. Slot must be fetch on each page load to correctly track impression and click information. Avoid the use of caching mechanisms. This would result in broken statistics. 
```
require __DIR__ . '/vendor/autoload.php';

use Bilstone\AdClient\AdClient;

$client = new AdClient("SERVER_HOSTNAME", "YOUR_CLIENT_KEY_HERE");

$ad = $client->fetch("SLOT_NAME_HERE");

```

In the `<head >` of your page put

```
<?php print $ad->getCss(); ?>
```

And where you want to place the slot
```
<?php print $ad->getContent(); ?>
```

Warning
===
Please only use the client application with a content source that you trust. Using untrusted source could compromise your whole userbase and result in serious damage to your systems. Use at your own risks