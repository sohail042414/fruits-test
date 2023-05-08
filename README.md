How to Set UP Project
-------------------

 --Clone repository on you machine, where your local server can access/run code. 
 -- Adjust your configuration files. (Database credentials) config/db.php
 -- Update email addresss in config/params.php '

```
 return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
];
```
Run 
> composer install
> php yii migrate
    
To Import/Fetch fruits from https://fruityvice.com/

Run  
> path-to-php/yii fruits/fetch

ON success it should give message like : Imported Fruits Count :

TO view/check fruits on frontentd. 

Run server using : 
> php yii serve

Or create a virtual host pointing to web/index.php

and follow links. 
