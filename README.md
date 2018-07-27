# php-vcap

[![Language: PHP](https://img.shields.io/badge/php-5.6+-orange.svg?style=flat)](http://php.net/)
[![Build Status](https://travis-ci.org/mihui/php-vcap.svg?branch=master)](https://travis-ci.org/mihui/php-vcap)
[![codecov](https://codecov.io/gh/mihui/php-vcap/branch/master/graph/badge.svg)](https://codecov.io/gh/mihui/php-vcap)

Library of accessing IBM Cloud VCAP_SERVICES environment variables.

## Installation

Installing [Composer](http://getcomposer.org) will be easier to manage dependencies for your application.

Run the Composer command to install the latest version of the Watson PHP SDK:

```shell
composer require mihui/php-vcap:dev-master
```


If the php-vcap is downloaded from GitHub already, run the update command:
```shell
composer update
```

Include `autoload.php` in your application:

```php
require 'vendor/autoload.php';
```

## Namespaces
For common use, one of the namespaces of `WatsonCredential` or `SimpleTokenProvider` can be optional, depends on how to invoke the Watson services, and you can reference the classes like so:
```php
use ENV\VCAP;
```

## How to use
Refer to the `env.json file` in this repository, it is the example of the VCAP_SERVICES environment data from the IBM Cloud/Cloudfoundry, and it will be the env file for you to do the local development work on your machine, and you SHOULD NOT place the `env.json` file on the cloud. To do that, please add the `env.json` to your `.gitignore`. If you must have this file for other purpuses, please let me know I will add an option to change the file name.

```json
{
    "tone_analyzer": [
        {
            "credentials": {
                "url": "https://gateway.watsonplatform.net/tone-analyzer/api",
                "username": "your_username_tone_analyzer",
                "password": "your_password_tone_analyzer"
            },
            "syslog_drain_url": null,
            "volume_mounts": [],
            "label": "tone_analyzer",
            "provider": null,
            "plan": "standard",
            "name": "Tone Analyzer",
            "tags": [
                "ibm_created",
                "ibm_dedicated_public",
                "lite",
                "watson"
            ]
        }
    ],
    "cloudantNoSQLDB": [
        {
            "credentials": {
                "username": "your_username",
                "password": "your_password",
                "host": "your_username-bluemix.cloudant.com",
                "port": 443,
                "url": "https://your_username-bluemix:your_password@cyour_username-bluemix.cloudant.com"
            },
            "syslog_drain_url": null,
            "volume_mounts": [],
            "label": "cloudantNoSQLDB",
            "provider": null,
            "plan": "Shared",
            "name": "Cloudant NoSQL DB",
            "tags": [
                "data_management",
                "ibm_created",
                "lite",
                "ibm_dedicated_public"
            ]
        }
    ],
    "conversation": [
        {
            "credentials": {
                "url": "https://gateway.watsonplatform.net/conversation/api",
                "username": "your_username",
                "password": "your_password"
            },
            "syslog_drain_url": null,
            "volume_mounts": [],
            "label": "conversation",
            "provider": null,
            "plan": "free",
            "name": "Conversation",
            "tags": [
                "eu_access",
                "ibm_created",
                "ibm_dedicated_public",
                "lite",
                "watson"
            ]
        }
    ]
}
```

In order to get the credentials of `tone_analyzer`, use the sample code below, the parameter `tone_analyzer` must be the key in your JSON: 

```php
$credentails = VCAP::getInstance()->getServiceCredential('tone_analyzer');

echo $credentails['username'];
echo $credentails['password'];
echo $credentails['url'];

```


## License
Copyright 2018 under [the Apache 2.0 license](LICENSE).
