# Mitigating XXE

This project is an example of parsing XML and mitigating [XXE](https://www.owasp.org/index.php/XML_External_Entity_(XXE)_Processing).

## Running the code

The code as shipped does not have side-effects, but you should examine the source code before running it to make sure.

You can run it with the following command:

    docker run --rm -v $(pwd):/code -w /code php:cli php index.php
    
## Applying the mitigation
    
The `index.php` file ships with line 3 as `$applyMitigation = false;`.  

If you set this variable to `true` then the code will run `libxml_disable_entity_loader()` prior to verifying the XML against the DTD (see line 20). 

The code will produce errors when the mitigation is applied.