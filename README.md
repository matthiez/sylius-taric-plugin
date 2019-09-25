# INSTALLATION:

1. Add Github repository to composer.json:
    ```Add repository from Github
                {
                    "repositories": [
                        {
                            "type": "vcs",
                            "url":  "git@bitbucket.org:ecolos/sylius-taric-plugin.git"
                        }
                    ]
                }
    ```

2. Install package via composer from Bitbucket 
    ```console
    composer require ecolos/sylius-taric-plugin
    ```

3. Add to config/bundles.php
    ```php
            [
                Ecolos\SyliusTaricPlugin\EcolosSyliusTaricPlugin::class => ['all' => true],
            ]
    ```

4. Clear the symfony cache
    ```shell script
    php bin/console cache:clear
    ```

5.  Determine doctrine schema changes and migrate
    ```shell script
    php bin/console doctrine:migrations:diff
    php bin/console doctrine:migrations:execute --up XXXXXXXXXXXXX
    ```

6. Add to config/services.yaml
    ```yaml
    imports:
      - { resource: "@EcolosSyliusTaricPlugin/Resources/config/config.yml" }
    ```

7. Edit src/Entity/Product.php
    ```php
    <?php
    use Ecolos\SyliusTaricPlugin\Entity\TaricTrait;
    class Product { use TaricTrait; }
    ``` 

8. Add form_row to SyliusAdminBundle/Product/Tab/_details.html.twig
    ```twig
    {{ form_row(form.taric) }}
    ``` 

# USAGE:
Check out the product variant form in the admin section.
An TARIC input should be rendered.

# TODO:
- Add tests
